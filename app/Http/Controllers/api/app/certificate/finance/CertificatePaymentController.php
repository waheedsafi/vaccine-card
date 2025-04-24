<?php

namespace App\Http\Controllers\api\app\certificate\finance;

use App\Enums\StatusTypeEnum;
use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Person;
use App\Models\Reciept;
use Illuminate\Http\Request;
use App\Models\VaccinePayment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FinanceUser;
use App\Traits\Reciept\RecieptTrait;
use App\Models\FinanceUserPasswordChange;
use App\Models\PaymentAmount;
use App\Models\People;
use App\Models\ViolationLog;
use Pest\Arch\ValueObjects\Violation;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class CertificatePaymentController extends Controller
{
    use RecieptTrait;

    public function searchCertificate(Request $request)
    {
        $request->validate([
            'filters.search.value' => 'required|string',
        ]);

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $searchValue = $request->input('filters.search.value');

        // Get the payment amount where status is 'paid'
        $paymentAmount = DB::table('payment_amounts as pa')
            ->join('payment_statuses as ps', 'ps.id', '=', 'pa.payment_status_id')
            ->where('ps.id', StatusTypeEnum::paid->value)
            ->value('pa.amount');

        // Fallback to 0 if no value is found
        $paymentAmount = $paymentAmount ?? 0;

        $query = DB::table('people as p')
            ->where('p.passport_number', '=', $searchValue)
            ->join('visits as v', 'v.people_id', '=', 'p.id')
            ->leftJoin('vaccine_payments as vp', 'vp.visit_id', '=', 'v.id')
            ->select(
                "p.id",
                "p.passport_number",
                "p.full_name",
                "p.father_name",
                "p.created_at",
                "v.id as visit_id",
                "v.visited_date as last_visit_date",
                DB::raw('CASE WHEN vp.id IS NULL THEN 0 ELSE 1 END as has_payment')
            )
            ->latest('v.id'); // You can apply latest ordering here if needed



        $tr = $query->paginate($perPage, ['*'], 'page', $page);
        return response()->json(
            [
                "person_certificates" => $tr,
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function certificatePaymentAmount(Request $request)
    {


        $row = PaymentAmount::select('amount')->where('payment_status_id', StatusTypeEnum::paid->value)->first();

        return response()->json([
            'message' => __('app_translation.success'),
            'payment_amounts' => $row->amount,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function infoCertificate(Request $request)
    {


        $request->validate([
            'id' => 'required|numeric',
        ]);

        $row = People::join('visits as v', 'v.people_id', '=', 'people.id')
            ->leftJoin('vaccine_payments as vp', 'vp.visit_id', '=', 'v.id')
            ->select(
                "people.id",
                "people.passport_number",
                "people.full_name",
                "people.father_name",
                "people.created_at",
                "v.id as visit_id",
                "v.visited_date",
                "vp.paid_amount" ?? '',
                DB::raw('CASE WHEN vp.id IS NULL THEN 0 ELSE 1 END as has_payment')
            )
            ->where('people.id', $request->id)
            ->get();


        return response()->json([
            'message' => __('app_translation.success'),
            'person_certificates' => $row,

        ], 200, [], JSON_UNESCAPED_UNICODE);
    }



    public function payment(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'passport_number'     => 'required|string',
            'visit_id'            => 'required|numeric',
            'paid_amount'         => 'required|numeric',
        ]);

        $user = $request->user();

        // Get person and check visit existence
        $person = People::where('passport_number', $validated['passport_number'])->first();

        if (!$person || !Visit::where('id', $validated['visit_id'])->where('people_id', $person->id)->exists()) {
            // Deactivate user and log violation
            FinanceUser::where('id', $user->id)->update(['status' => false]);

            ViolationLog::create([
                'user_type'       => 'FinanceUser',
                'user_id'         => $user->id,
                'target_zone_id'  => $user->zone_id,
                'action'          => 'Payment',
                'target_type'     => 'people',
                'target_id'       => $person?->id,
                'reason'          => "Attempted to process payment for a non-existent visit (ID: {$validated['visit_id']}) and passport number: {$validated['passport_number']}. Action flagged and user deactivated.",
                'ip_address'      => $request->ip(),
            ]);

            return response()->json([
                'message' => __('app_translation.unauthorized'),
            ], 403);
        }

        // Create payment
        $vaccinePayment = VaccinePayment::create([
            'payment_uuid'       => '', // will update below
            'paid_amount'        => $validated['paid_amount'],
            'visit_id'           => $validated['visit_id'],
            'payment_status_id'  => $validated['payment_status_id'] ?? 1, // default or handle null gracefully
            'payment_amount_id'  => 1,
            'finance_user_id'    => $user->id,
        ]);

        // Update UUID after creation
        $vaccinePayment->update([
            'payment_uuid' => 'MoPH-' . $vaccinePayment->visit_id . '-' . now()->format('Y-m-d'),
        ]);

        Reciept::create([
            'download_count'     => 0,
            'issue_date'         => now(),
            'is_downloaded'      => true,
            'paid_amount'        => $validated['paid_amount'],
            'finance_user_id'    => $user->id,
            'vaccine_payment_id' => $vaccinePayment->id,
        ]);

        return response()->json([
            'message' => __('app_translation.success'),
            'payment_id' => $vaccinePayment->id,
        ], 200);
    }


    public function downloadReceipt(Request $request)
    {
        $request->validate([
            'passport_numbere' => 'required|numeric',
        ]);

        $user = $request->user();

        // Eager load related models in a single query
        $person = People::with(['visits.vaccinePayment.receipt'])
            ->where('passport_number', $request->passport_numbere)
            ->first();

        if (
            !$person ||
            !$person->visits->first() ||
            !$person->visits->first()->vaccinePayment ||
            !$person->visits->first()->vaccinePayment->receipt
        ) {
            return response()->json([
                'message' => __('app_translation.unauthorized'),
            ], 403);
        }

        $vaccinePayment = $person->visits->first()->vaccinePayment;
        $receipt = $vaccinePayment->receipt;

        // Update download count
        $receipt->increment('download_count');

        return $this->generateRecipt($vaccinePayment->id, $user);
    }



    public function activity($user_id)
    {



        // Build query
        $query  = DB::select(
            "select count(*) as complete_count,
            (select count(*) from receipts where finance_user_id = {$user_id} AND DATE(created_at) = CURDATE() ) as today_count
            from receipts where finance_user_id ={$user_id}"
        );


        $changePass = FinanceUserPasswordChange::join('finance_users as fiu', 'finance_user_password_changes.affected_user_id', '=', 'fiu.id')
            ->join('documents as doc', 'finance_user_password_changes.document_id', '=', 'doc.id')
            ->select('doc.path', 'fiu.full_name', 'doc.created_at')->get();





        $data = [

            "complete_count" => $query[0]->complete_count,
            "today_count" => $query[0]->today_count,
            "password_change" => $changePass,
        ];

        return response()->json([
            'data' => $data,
            'message' => __('app_translation.success'),
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
