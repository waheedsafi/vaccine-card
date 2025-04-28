<?php

namespace App\Http\Controllers\api\template;

use Exception;
use App\Models\Email;
use App\Models\Gender;
use App\Models\Contact;
use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use App\Enums\LanguageEnum;
use App\Enums\StatusTypeEnum;
use App\Models\NidTypeTrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\CurrencyTran;
use App\Models\Nationality;
use App\Models\NationalityTrans;
use App\Models\PaymentStatusTran;

class ApplicationController extends Controller
{
    public function changeLocale($locale)
    {
        try {
            // Set the language in a cookie
            if ($locale === "en" || $locale === "fa" || $locale === "ps") {
                // 1. Set app language
                App::setLocale($locale);
                return response()->json([
                    'message' => __('app_translation.lang_change_success'),
                ], 200, [], JSON_UNESCAPED_UNICODE);
            } else {
                // 3. Passed language not exist in system
                response()->json([
                    'message' => __('app_translation.lang_change_failed'),
                ], 404, [], JSON_UNESCAPED_UNICODE);
            }
        } catch (Exception $err) {
            Log::info('User login error =>' . $err->getMessage());
            response()->json([
                'message' => __('app_translation.server_error'),
            ], 500, [], JSON_UNESCAPED_UNICODE);
        }
    }
    public function font($direction)
    {
        try {
            $path = storage_path("app/public/fonts/");
            if ($direction === "rtl") {
                $path = $path . "nazanin.ttf";

                if (!file_exists($path)) {
                    return response()->json("Not found");
                }
                return response()->file($path);
            }
            return response()->json(["message" => "Not allowed", 405]);
        } catch (Exception $err) {
            Log::info('User login error =>' . $err->getMessage());
            return response()->json(['message' => "Something went wrong please try again later!"], 500);
        }
    }
    public function genders()
    {
        $locale = App::getLocale();
        $gender = Gender::select('id', "name_{$locale} as name")->get();
        return response()->json($gender);
    }

    public function nidTypes()
    {
        $locale = App::getLocale();
        $nidtype =  NidTypeTrans::select('value as name', 'nid_type_id as id')
            ->where('language_name', $locale)
            ->get();
        return response()->json($nidtype);
    }
    public function validateEmailContact(Request $request)
    {
        $request->validate(
            [
                "email" => "required",
                "contact" => "required",
            ]
        );
        $email = Email::where("value", '=', $request->email)->first();
        $contact = Contact::where("value", '=', $request->contact)->first();
        // Check if both models are found
        $emailExists = $email !== null;
        $contactExists = $contact !== null;

        return response()->json([
            'email_found' => $emailExists,
            'contact_found' => $contactExists,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function nationalities()
    {
        $locale = App::getLocale();
        $countryId = 2;
        $nationality = NationalityTrans::select('nationality_id as id', 'value as name')
            ->where('language_name', $locale)
            ->orderByRaw("FIELD(nationality_id," . $countryId . ") DESC") // ID 2 will come first
            ->get();

        return  response()->json(
            $nationality,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
    public function currencies()
    {
        $locale = App::getLocale();
        $currency = CurrencyTran::select('currency_id as id', 'name')
            ->where('language_name', $locale)
            ->get();

        return  response()->json(
            $currency,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
    public function paymentStatuses()
    {
        $locale = App::getLocale();
        $include = [StatusTypeEnum::no_payment->value, StatusTypeEnum::payment->value];
        $paymentStatuses = PaymentStatusTran::whereIn('payment_status_id', $include)
            ->select('payment_status_id as id', 'name')
            ->where('language_name', $locale)
            ->get();

        return  response()->json(
            $paymentStatuses,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
