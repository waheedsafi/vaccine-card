<?php

namespace App\Http\Controllers\api\app\payment;

use App\Http\Controllers\Controller;
use App\Models\SystemPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function payments(Request $request)
    {
        $locale = App::getLocale();
        // 1. Create
        $system_payments = DB::table('system_payments as sp')
            ->join('finance_users as fu', 'fu.id', '=', 'sp.finance_user_id')
            ->join('currency_trans as ct', function ($join) use (&$locale) {
                $join->on('ct.currency_id', '=', 'sp.currancy_id')
                    ->where('ct.language_name', $locale);
            })
            ->join('payment_status_trans as pst', function ($join) use (&$locale) {
                $join->on('pst.payment_status_id', '=', 'sp.payment_status_id')
                    ->where('pst.language_name', $locale);
            })
            ->select(
                'sp.id',
                'sp.active',
                'fu.username as finance_user',
                'sp.amount',
                'ct.name as currency',
                'pst.name as payment_status',
                'sp.created_at',
            )
            ->get();

        return response()->json(
            $system_payments,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'payment_status_id' => 'required|exists:payment_statuses,id',
            'currancy_id' => 'required|exists:currencies,id',
            'amount' => 'required|numeric',
        ]);

        $user = $request->user();

        SystemPayment::query()->update([ // <-- fixed this line
            'active' => false,
        ]);

        SystemPayment::create([
            'payment_status_id' => $request->payment_status_id,
            'finance_user_id' => $user->id,
            'currancy_id' => $request->currancy_id,
            'amount' => $request->amount,
            'active' => true,
        ]);

        return response()->json(
            [
                'message' => __('app_translation.success'),
            ],
            201,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
