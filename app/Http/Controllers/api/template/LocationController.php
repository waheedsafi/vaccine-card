<?php

namespace App\Http\Controllers\api\template;

use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use App\Enums\LanguageEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\CountryTrans;
use App\Models\ProvinceTrans;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function countries()
    {
        $locale = App::getLocale();
        $tr = DB::table('country_trans as ct')
            ->where('ct.language_name', $locale)
            ->select('ct.country_id as id', 'ct.value as name')
            ->get();
        return response()->json($tr);
    }

    public function destinactionCountries()
    {

        $locale = App::getLocale();
        $afg = DB::table('country_trans')
            ->select('country_id as id')
            ->where('language_name', 'en')
            ->where('value', 'Afghanistan') // You were missing the column name here
            ->first();

        $tr = DB::table('country_trans as ct')
            ->where('ct.language_name', $locale)
            ->whereNotIn('ct.country_id', [$afg->id])
            ->select('ct.country_id as id', 'ct.value as name')
            ->get();

        return response()->json($tr);
    }


    public function provinces($country_id)
    {
        $locale = App::getLocale();
        $tr = DB::table('provinces as p')
            ->where('p.country_id', $country_id)
            ->join('province_trans as pt', function ($join) use ($locale) {
                $join->on('pt.province_id', '=', 'p.id')
                    ->where('pt.language_name', $locale);
            })
            ->select('pt.province_id as id', 'pt.value as name')
            ->get();
        return response()->json($tr);
    }

    public function districts($province_id)
    {
        $locale = App::getLocale();
        $tr = DB::table('districts as d')
            ->where('d.province_id', $province_id)
            ->join('district_trans as dt', function ($join) use ($locale) {
                $join->on('dt.district_id', '=', 'd.id')
                    ->where('dt.language_name', $locale);
            })
            ->select('dt.district_id as id', 'dt.value as name')
            ->get();
        return response()->json($tr, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
