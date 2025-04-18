<?php

namespace App\Http\Controllers\api\template;

use App\Enums\StatusTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function blockStatusesType()
    {
        $locale = App::getLocale();
        $includes = [StatusTypeEnum::blocked->value];
        $statusesType = DB::table('status_types as st')
            ->whereIn('st.id', $includes)
            ->leftjoin('status_type_trans as stt', function ($join) use ($locale) {
                $join->on('stt.status_type_id', '=', 'st.id')
                    ->where('stt.language_name', $locale);
            })
            ->select('st.id', 'stt.name')->get();

        return response()->json($statusesType);
    }
}
