<?php

namespace App\Http\Controllers\api\app\zone;

use App\Models\Zone;
use App\Models\ZoneTrans;
use App\Enums\LanguageEnum;
use App\Models\AddressTran;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZoneController extends Controller
{

    public function zones()
    {
        $locale = App()->getLocale();
        $zones =    ZoneTrans::select('value as name', 'zone_id as id')->where('language_name', $locale)->get();
        return response()->json(
            $zones,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name_english' => 'required',
            'name_pashto' => 'required',
            "name_farsi" => 'required'
        ]);
        $zone =    Zone::create();

        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            ZoneTrans::create([
                'zone_id' => $zone->id,
                'value' => $validatedData["name_{$name}"],
                'language_name' =>  $code,
            ]);
        }

        return response()->json([
            "message" => __('app_translation.success')
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
