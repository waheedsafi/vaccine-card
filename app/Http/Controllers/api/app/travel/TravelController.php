<?php

namespace App\Http\Controllers\api\app\travel;

use App\Http\Controllers\Controller;
use App\Models\TravelTypeTran;
use Illuminate\Support\Facades\App;

class TravelController extends Controller
{
    public function travelsTypes()
    {
        $locale = App::getLocale();
        $travleType = TravelTypeTran::select('travel_type_id as id', 'value as name')
            ->where('language_name', $locale)
            ->get();

        return response()->json(
            $travleType,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
