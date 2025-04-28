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
    public function vaccineType($id)
    {
        $vaccineType = DB::table('vaccine_type_trans as vtt')
            ->join('vaccine_types as vt', 'vtt.vaccine_type_id', '=', 'vt.id') // Joining with vaccine_types table
            ->where('vtt.vaccine_type_id', $id)
            ->select(
                'vtt.vaccine_type_id',
                DB::raw("MAX(CASE WHEN vtt.language_name = 'fa' THEN vtt.name END) as farsi"),
                DB::raw("MAX(CASE WHEN vtt.language_name = 'en' THEN vtt.name END) as english"),
                DB::raw("MAX(CASE WHEN vtt.language_name = 'ps' THEN vtt.name END) as pashto"),
                'vt.number_of_doses' // Select the number_of_doses from the vaccine_types table
            )
            ->groupBy('vtt.vaccine_type_id', 'vt.number_of_doses') // Group by number_of_doses as well
            ->first();

        return response()->json(
            [
                "id" => $vaccineType->vaccine_type_id,
                "english" => $vaccineType->english,
                "farsi" => $vaccineType->farsi,
                "pashto" => $vaccineType->pashto,
                "doses" => $vaccineType->number_of_doses // Include number_of_doses in the response
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
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

    public function fullVaccineTypes()
    {
        $locale = App::getLocale();
        $types = DB::table('vaccine_types as vt')
            ->join('vaccine_type_trans as vtt', function ($join) use ($locale) {
                $join->on('vtt.vaccine_type_id', '=', 'vt.id')
                    ->where('vtt.language_name', $locale);
            })
            ->select(
                'vt.id',
                'vt.description',
                'vt.number_of_doses',
                'vtt.name',
            )->get();

        return  response()->json(
            $types,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'english' => 'required|string',
            'pashto' => 'required|string',
            'farsi' => 'required|string',
            'doses' => 'required|string',
        ]);

        DB::beginTransaction();


        $vaccineType = VaccineType::create([
            'description' => $request->description ?? '',
            'number_of_doses' => $request->doses,
        ]);


        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            VaccineTypeTran::create([
                "name" => $request["{$name}"],
                "vaccine_type_id" => $vaccineType->id,
                "language_name" => $code,
            ]);
        }

        DB::commit();
        $locale = App::getLocale();
        $name = $request->english;
        if ($locale == LanguageEnum::farsi->value) {
            $name = $request->farsi;
        } else {
            $name = $request->pashto;
        }
        return response()->json([
            'message' => __('app_translation.success'),
            'vaccine_type' => [
                "id" => $vaccineType->id,
                "name" => $name,
                "created_at" => $vaccineType->created_at
            ]
        ], 200);
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string',
            'english' => 'required|string',
            'pashto' => 'required|string',
            'farsi' => 'required|string',
            'doses' => 'required|string',
        ]);

        DB::beginTransaction();
        $vaccineType = VaccineType::where('id', $request->id)
            ->first();
        if (!$vaccineType) {
            return response()->json([
                'message' => __('app_translation.not_found')
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }
        $vaccineType->description = $request->description ?? '';
        $vaccineType->number_of_doses = $request->doses;
        $vaccineType->save();


        $trans = VaccineTypeTran::where('vaccine_type_id', $request->id)
            ->select('id', 'language_name', 'name')
            ->get();
        // Update
        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            $tran =  $trans->where('language_name', $code)->first();
            $tran->name = $request["{$name}"];
            $tran->save();
        }

        DB::commit();

        $locale = App::getLocale();
        $name = $request->english;
        if ($locale == LanguageEnum::farsi->value) {
            $name = $request->farsi;
        } else {
            $name = $request->pashto;
        }
        return response()->json([
            'message' => __('app_translation.success'),
            'vaccine_type' => [
                "id" => $vaccineType->id,
                "name" => $name,
                "created_at" => $vaccineType->created_at
            ]
        ], 200);
    }


    public function vaccineCenters()
    {
        $locale = App::getLocale();
        $vaccinecenter = VaccineCenterTran::select('vaccine_center_id as id', 'name')
            ->where('language_name', 'en')->get();
        return  response()->json(
            $vaccinecenter,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
    public function vaccineCenter($id)
    {
        $vaccineCenter = DB::table('vaccine_center_trans as vct')
            ->join('vaccine_centers as vc', 'vct.vaccine_center_id', '=', 'vc.id')
            ->join('addresses as a', 'vc.address_id', '=', 'a.id')
            ->join('districts as d', 'a.district_id', '=', 'd.id')
            ->join('district_trans as dt', function ($join) {
                $join->on('dt.district_id', '=', 'd.id')
                    ->where('dt.language_name', 'en');
            })
            ->join('provinces as p', 'a.province_id', '=', 'p.id')
            ->join('province_trans as pt', function ($join) {
                $join->on('pt.province_id', '=', 'p.id')
                    ->where('pt.language_name', 'en');
            })
            ->where('vct.vaccine_center_id', $id)
            ->where('vct.language_name', 'en')
            ->select(
                'vct.vaccine_center_id',
                'vct.name as english',
                'vc.address_id',
                'd.id as district_id',
                'dt.value as district_name',
                'p.id as province_id',
                'pt.value as province_name'
            )
            ->first();

        if (!$vaccineCenter) {
            return response()->json(['message' => 'Vaccine center not found'], 404);
        }

        return response()->json(
            [
                "id" => $vaccineCenter->vaccine_center_id,
                "name" => $vaccineCenter->english,
                "district" => [
                    "id" => $vaccineCenter->district_id,
                    "name" => $vaccineCenter->district_name
                ],
                "province" => [
                    "id" => $vaccineCenter->province_id,
                    "name" => $vaccineCenter->province_name
                ]
            ],
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
            'name' => 'required|string',
        ]);

        DB::beginTransaction();


        $address = Address::create([
            'district_id' => $request->district_id,
            'province_id' => $request->province_id,

        ]);

        $vaccineCenter = VaccineCenter::create([
            'description' => $request->description ?? "",
            'address_id' => $address->id,
        ]);


        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            VaccineCenterTran::create([
                "name" => $request->name,
                "vaccine_center_id" => $vaccineCenter->id,
                "language_name" => $code,
            ]);
        }

        DB::commit();

        return response()->json([
            'message' => __('app_translation.success'),
            'vaccine_center' => [
                "id" => $vaccineCenter->id,
                "name" => $request->name,
            ]
        ], 200);
    }
    public function vaccineCenterUpdate(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|numeric',
            'province_id' => 'required|exists:provinces,id',
            'district_id' => 'required|exists:districts,id',
            'name' => 'required|string',
        ]);

        DB::beginTransaction();
        $vaccine_center = VaccineCenter::where('id', $request->id)
            ->first();
        if (!$vaccine_center) {
            return response()->json(['message' => 'Vaccine center not found'], 404);
        }

        $address = Address::where('id', $vaccine_center->address_id)
            ->select('id', 'district_id', 'province_id')
            ->first();
        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }
        $address->province_id = $request->province_id;
        $address->district_id = $request->district_id;
        $address->save();

        $trans = VaccineCenterTran::where('vaccine_center_id', $request->id)
            ->select('id', 'language_name', 'name')
            ->get();
        // Update
        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            $tran =  $trans->where('language_name', $code)->first();
            $tran->name = $request->name;
            $tran->save();
        }

        DB::commit();

        return response()->json([
            'message' => __('app_translation.success'),
            'vaccine_center' => [
                "id" => $vaccine_center->id,
                "name" => $request->name,
            ]
        ], 200);
    }
}
