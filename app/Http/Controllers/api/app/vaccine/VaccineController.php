<?php

namespace App\Http\Controllers\api\app\vaccine;

use App\Models\Address;
use App\Enums\LanguageEnum;
use App\Models\VaccineType;
use Illuminate\Http\Request;
use App\Models\VaccineCenter;
use App\Models\VaccineTypeTran;
use App\Models\VaccineCenterTran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\AddressTran;

class VaccineController extends Controller
{
    //

    public function vaccineTypes()
    {
        $locale = App::getLocale();
        $vaccinetype = VaccineTypeTran::select('vaccine_type_id as id', 'name')
            ->where('language_name', $locale)->get();

        return  response()->json(
            $vaccinetype,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }


    public function vaccineTypeStore(Request $request)
    {
        $validated = $request->validate([
            'vaccine_type_english' => 'required|string',
            'vaccine_type_pashto' => 'required|string',
            'vaccine_type_farsi' => 'required|string',

        ]);

        DB::beginTransaction();


        $vaccineType = VaccineType::create([
            $request->description ?? ''
        ]);


        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            VaccineTypeTran::create([
                "name" => $request["{$name}"],
                "vaccine_type_id" => $vaccineType->id,
                "language_name" => $code,
            ]);
        }

        DB::commit();

        return response()->json([
            'message' => __('app_translation.success'),

        ], 201);
    }


    public function vaccineTypeUpdate(Request $request)
    {
        $validated = $request->validate([
            'vaccine_type_id' => 'required|numeric',
            'vaccine_type_english' => 'required|string',
            'vaccine_type_pashto' => 'required|string',
            'vaccine_type_farsi' => 'required|string',

        ]);

        DB::beginTransaction();


        $vaccineType = VaccineType::where('vaccine_type_id', $request->vaccine_type_id)
            ->first();
        $vaccineType->description = $request->description;
        $vaccineType->save();


        VaccineTypeTran::where('vaccine_type_id', $request->vaccine_type_id)->delete();

        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            VaccineTypeTran::create([
                "name" => $request["{$name}"],
                "vaccine_type_id" => $vaccineType->id,
                "language_name" => $code,
            ]);
        }

        DB::commit();

        return response()->json([
            'message' => __('app_translation.success'),

        ], 201);
    }


    public function vaccineCenters()
    {
        $locale = App::getLocale();
        $vaccinecenter = VaccineCenterTran::select('vaccine_center_id as id', 'name')
            ->where('language_name', $locale)->get();
        return  response()->json(
            $vaccinecenter,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }



    public function vaccineCenterStore(Request $request)
    {
        $validated = $request->validate([
            'province_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'vaccine_center_english' => 'required|string',
            'vaccine_center_pashto' => 'required|string',
            'vaccine_center_farsi' => 'required|string',

        ]);

        DB::beginTransaction();


        $address =     Address::create([
            'district_id' => $request->district_id,
            'province_id' => $request->province_id,

        ]);

        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            AddressTran::create([
                "value" => $request["area_{$name}"],
                "language_name" => $code,
            ]);
        }

        $vaccineCenter = VaccineCenter::create([
            'description' => $request->description ?? '',
            'address_id' => $address->id,


        ]);


        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            VaccineTypeTran::create([
                "name" => $request["vaccine_center_{$name}"],
                "vaccine_center_id" => $vaccineCenter->id,
                "language_name" => $code,
            ]);
        }

        DB::commit();

        return response()->json([
            'message' => __('app_translation.success'),

        ], 201);
    }
}
