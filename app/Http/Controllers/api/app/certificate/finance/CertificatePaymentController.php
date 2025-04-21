<?php

namespace App\Http\Controllers\api\app\certificate\finance;

use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Person;
use App\Models\Reciept;
use Illuminate\Http\Request;
use App\Models\VaccinePayment;
use App\Http\Controllers\Controller;
use App\Traits\Reciept\RecieptTrait;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class CertificatePaymentController extends Controller
{
    //

    use RecieptTrait;


    public function payment(Request $request)
    {




        $validateData = $request->validate([
            'passport_number' => 'required|string',
            'paid_amount' => 'required|numeric',
            'payment_amount_id' => 'required|tables:payment_amounts,id',
            'payment_status_id' => 'required|tables:payment_statuses,id',

        ]);

        $person = Person::where('passport_number', $request->passport_number)->first();
        if (!$person) {
            return response()->json([
                "message" => __("app_translation.not_found"),
            ], 404);
        }

        $visit = Visit::where('people_id', $person->id)
            ->whereDate('visited_date', Carbon::today())
            ->orderBy('id', 'desc')
            ->first();
        if (!$visit) {
            return response()->json([
                "message" => __("app_translation.today_visit_not_found"),
            ], 404);
        }

        $vaccine_payment = VaccinePayment::create([
            'payment_uuid' => '',
            'paid_amount' => $request->paid_amount,
            'visit_id' => $visit->id,
            'payment_status_id' => $validateData['payment_status_id'],
            'payment_amount_id' => $validateData['payment_amount_id'],
            'finance_user_id' => $request->user()->id
        ]);

        $vaccine_payment->payment_uuid = 'MoPH-' . $vaccine_payment->visit_id . '-' . Carbon::now()->format('Y-m-d');

        $vaccine_payment->save();




        $reciept = Reciept::create([
            'download_count' => 1,
            'issue_date' => Carbon::now(),
            'is_downloaded' => true,
            'paid_amount' => $validateData['paid_amount'],
            'finance_user_id' => $request->user()->id,
            'vaccine_payment_id' => $vaccine_payment->id,
        ]);


        return    $this->generateRecipt($vaccine_payment->id, $vaccine_payment->payment_uuid);
    }



    public function activity($user_id)
    {


        // Build query
        $complete = Reciept::where('user_id', $user_id)
            ->count();

        $today_count = Reciept::where('user_id', $user_id)
            ->whereDate('created_at', Carbon::today())
            ->count();

        $data = [
            "complete_count" => $complete,
            "today_count" => $today_count,
        ];

        return response()->json([
            'data' => $data,
            'message' => __('app_translation.success'),
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
