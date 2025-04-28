<?php

namespace App\Http\Controllers\api\app\payment;

use App\Enums\StatusTypeEnum;
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
            ->leftJoin('currency_trans as ct', function ($join) use (&$locale) {
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
            ->orderBy('sp.id', 'desc')
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
        ]);
        if ($request->payment_status_id == StatusTypeEnum::payment->value) {
            $request->validate([
                'payment_status' => 'required',
                'currency_id' => 'required|exists:currencies,id',
                'currency' => 'required',
                'amount' => 'required|numeric',
            ]);
        }
        $user = $request->user();
        SystemPayment::query()->update([ // <-- fixed this line
            'active' => false,
        ]);

        $systemPayment = SystemPayment::create([
            'payment_status_id' => $request->payment_status_id,
            'finance_user_id' => $user->id,
            'currancy_id' => $request->currency_id,
            'amount' => $request->amount,
            'active' => true,
        ]);

        $authUser = $request->user();
        return response()->json(
            [
                'system_payment' => [
                    "id" => $systemPayment->id,
                    "active" => $systemPayment->active,
                    "finance_user" => $authUser->username,
                    "amount" => $request->payment_status_id == StatusTypeEnum::payment->value ? $request->amount : 0,
                    "currency" => $request->payment_status_id == StatusTypeEnum::payment->value ? $request->currency : null,
                    "payment_status" => $request->payment_status,
                    "created_at" => $systemPayment->created_at
                ],
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
