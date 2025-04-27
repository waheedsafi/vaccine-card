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
use App\Models\People;
use App\Models\ReceiptDownloadByUser;
use App\Models\ViolationLog;
use Illuminate\Support\Facades\App;

class CertificatePaymentController extends Controller
{
    use RecieptTrait;

    public function searchCertificate(Request $request)
    {
        $request->validate([
            'filters.search.value' => 'required|string',
        ]);
        $locale = App::getLocale();
        $authUser = $request->user();
        $zone_id = $authUser->zone_id;

        $query = DB::table('people as p');
        $this->applySearch($query, $request);
        $person_certificate = $query
            ->join('epi_users as eu', 'eu.id', '=', 'p.epi_user_id')
            ->join('visits as v', function ($join) use (&$zone_id) {
                $join->on('v.people_id', '=', 'p.id')
                    ->where('v.zone_id', $zone_id);
            })
            ->leftJoin('vaccine_payments as vp', 'vp.visit_id', '=', 'v.id')
            ->select(
                "p.id",
                "eu.zone_id",
                "p.passport_number",
                "p.full_name",
                "p.father_name",
                "p.created_at",
                "v.id as visit_id",
                "v.visited_date as last_visit_date",
                "vp.payment_status_id",
            )
            ->latest('v.id')
            ->first(); // You can apply latest ordering here if needed
        if (!$person_certificate) {
            return response()->json(
                [
                    'message' => __('app_translation.not_allowed_different_zone'),
                    "person_certificate" => null,
                ],
                404,
                [],
                JSON_UNESCAPED_UNICODE
            );
        } else if ($authUser->zone_id != $person_certificate->zone_id) {
            return response()->json(
                [
                    'message' => __('app_translation.not_allowed_different_zone'),
                    "certificate_payment" => null,
                ],
                500,
                [],
                JSON_UNESCAPED_UNICODE
            );
        }

        $amount = DB::table('system_payments as sp')
            ->where('sp.active', '=', true)
            ->leftjoin('currency_trans as ct', function ($join) use (&$locale) {
                $join->on('ct.id', '=', 'sp.currancy_id')
                    ->where('ct.language_name', $locale);
            })
            ->select('sp.amount', 'ct.name as currency')
            ->first();

        return response()->json(
            [
                "certificate_payment" => [
                    'id' => $person_certificate->id,
                    'passport_number' => $person_certificate->passport_number,
                    'full_name' => $person_certificate->full_name,
                    'father_name' => $person_certificate->father_name,
                    'created_at' => $person_certificate->created_at,
                    'visit_id' => $person_certificate->visit_id,
                    'last_visit_date' => $person_certificate->last_visit_date,
                    'payment_status_id' => $person_certificate->payment_status_id,
                    'amount' => $amount->amount,
                    'currency' => $amount->currency,
                ],
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
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


        $system_payment = DB::table('system_payments as sp')
            ->where('sp.active', '=', true)
            ->select('sp.id')
            ->first();
        // Create payment
        $vaccinePayment = VaccinePayment::create([
            'payment_uuid'       => '', // will update below
            'paid_amount'        => $validated['paid_amount'],
            'visit_id'           => $validated['visit_id'],
            'payment_status_id'  => StatusTypeEnum::paid->value, // default or handle null gracefully
            'system_payment_id'    => $system_payment->id,
            'finance_user_id'    => $user->id,
        ]);

        // Update UUID after creation
        $vaccinePayment->update([
            'payment_uuid' => 'Fin-' . now()->format('Y') . '-' . $vaccinePayment->visit_id,
        ]);

        Reciept::create([
            'download_count'     => 0,
            'issue_date'         => now(),
            'is_downloaded'      => false,
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
            'passport_number' => 'required|string',
            'visit_id' => 'required|numeric',
        ]);
        $user = $request->user();
        $passport_number = $request->passport_number;
        $zone_id =  $user->zone_id;


        // Validate zone and passport
        $record = DB::table('vaccine_payments as vp')
            ->join('visits as v', 'v.id', '=', 'vp.visit_id')
            ->join('people as p', function ($join) use (&$passport_number) {
                $join->on('v.people_id', '=', 'p.id')
                    ->where('p.passport_number', $passport_number);
            })
            ->join('epi_users as eu', function ($join) use (&$zone_id) {
                $join->on('eu.id', '=', 'p.epi_user_id')
                    ->where('eu.zone_id', $zone_id);
            })
            ->where('v.id', '=', $request->visit_id)
            ->select(
                'vp.id as vaccine_pay_id',
                'v.id as visit_id'
            )
            ->first();


        if ($record) {
            // Means payment_id belongs to the people also people is in the same zone
        }


        // Eager load related models in a single querpy
        // $person = People::with(['visits.vaccinePayment.receipt'])
        //     ->where('passport_number', $request->passport_numbere)
        //     ->first();




        $receipt = Reciept::where('vaccine_payment_id', $record->vaccine_pay_id)->first();
        if (!$receipt) {
            return response()->json([
                'message' => __('app_translation.unauthorized'),
            ], 403);
        }

        ReceiptDownloadByUser::create([
            'finance_user_id' => $user->id,
            'receipt_id' => $receipt->id,
        ]);
        // Update download count
        $receipt->increment('download_count');



        return $this->generateRecipt($request->visit_id, $user);
    }

    // search function 
    protected function applySearch($query, $request)
    {
        $searchColumn = $request->input('filters.search.column');
        $searchValue = $request->input('filters.search.value');

        if ($searchColumn && $searchValue) {
            $allowedColumns = [
                'passport_number' => 'p.passport_number'
            ];
            // Ensure that the search column is allowed
            if (in_array($searchColumn, array_keys($allowedColumns))) {
                $query->where($allowedColumns[$searchColumn], '=', $searchValue);
            }
        }
    }
    public function paymentInfo($id)
    {
        $tr = DB::table('people as p')
            ->where('p.id', $id)
            ->join('epi_users as eu', 'eu.id', '=', 'p.epi_user_id')
            ->join('visits as v', 'v.people_id', '=', 'p.id')
            ->leftJoin('vaccine_payments as vp', 'vp.visit_id', '=', 'v.id')
            ->select(
                "p.id",
                "eu.zone_id",
                "p.passport_number",
                "p.full_name",
                "p.father_name",
                "p.created_at",
                "v.id as visit_id",
                "v.visited_date as last_visit_date",
                "vp.payment_status_id",
            )
            ->latest('v.id')
            ->get();
        return response()->json([
            'data' => $tr,
            // 'payment_amounts' => $row->amount,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
    // End approved
    public function certificatePaymentAmount(Request $request)
    {
        // $row = PaymentAmount::select('amount')->where('payment_status_id', StatusTypeEnum::paid->value)->first();

        return response()->json([
            'message' => __('app_translation.success'),
            // 'payment_amounts' => $row->amount,
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
