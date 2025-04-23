<?php

namespace App\Http\Controllers\api\app\dashboard\epi;

use App\Enums\RoleEnum;
use App\Models\VaccineCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ZoneTrans;

class EpiDashboardController extends Controller
{
    //

    public function dashboard()
    {
        $locale = app()->getLocale();
        $user = request()->user();
        $zone_id = $user->role_id == RoleEnum::epi_admin->value ? $user->zone_id : null;

        // Vaccine Cards Count by Zone
        $vaccineCardCounts = DB::table('vaccine_cards')
            ->join('epi_users as usr', 'usr.id', '=', 'vaccine_cards.epi_user_id')
            ->join('zones as z', 'z.id', '=', 'usr.zone_id')
            ->join('zone_trans as zt', function ($join) use ($locale) {
                $join->on('zt.id', '=', 'z.id')
                    ->where('zt.language_name', '=', $locale);
            })
            ->when($zone_id, fn($query) => $query->where('z.id', $zone_id))
            ->select('zt.value as zone_name', DB::raw('COUNT(vaccine_cards.id) as vaccine_card_count'))
            ->groupBy('z.id', 'zt.value')
            ->get();

        // Vaccine Cards Count by Vaccine Type
        $vaccineTypeCounts = DB::table('vaccine_cards as vc')
            ->join('vaccine_payment as vp', 'vp.id', '=', 'vc.vaccine_payment_id')
            ->join('vaccines as v', 'vp.visit_id', '=', 'v.visit_id')
            ->join('vaccine_type_trans as vtt', 'vtt.id', '=', 'v.vaccine_type_id')
            ->join('epi_users as eu', 'vc.epi_user_id', '=', 'eu.id')
            ->when($zone_id, fn($query) => $query->where('eu.zone_id', $zone_id))
            ->select('vtt.name as vaccine_type', DB::raw('COUNT(vc.id) as vaccine_card_count'))
            ->groupBy('vtt.id', 'vtt.name')
            ->get();

        // Vaccine Card Statistics (All Time, Today, Last Week, Last Month)
        $statistics = DB::selectOne("
            SELECT
                COUNT(vc.id) AS allTimeCount,
                (
                    SELECT COUNT(vc1.id)
                    FROM vaccine_cards vc1
                    JOIN epi_users eu1 ON vc1.epi_user_id = eu1.id
                    WHERE DATE(vc1.created_at) >= CURDATE()
                    " . ($zone_id ? "AND eu1.zone_id = ?" : "") . "
                ) AS todayCount,
                (
                    SELECT COUNT(vc2.id)
                    FROM vaccine_cards vc2
                    JOIN epi_users eu2 ON vc2.epi_user_id = eu2.id
                    WHERE DATE(vc2.created_at) >= CURDATE() - INTERVAL 7 DAY
                    " . ($zone_id ? "AND eu2.zone_id = ?" : "") . "
                ) AS lastWeekCount,
                (
                    SELECT COUNT(vc3.id)
                    FROM vaccine_cards vc3
                    JOIN epi_users eu3 ON vc3.epi_user_id = eu3.id
                    WHERE DATE(vc3.created_at) >= CURDATE() - INTERVAL 1 MONTH
                    " . ($zone_id ? "AND eu3.zone_id = ?" : "") . "
                ) AS lastMonthCount
            FROM vaccine_cards vc
            JOIN epi_users eu ON vc.epi_user_id = eu.id
            " . ($zone_id ? "WHERE eu.zone_id = ?" : "") . "
        ", $zone_id ? [$zone_id, $zone_id, $zone_id, $zone_id] : []);




        return response()->json([
            'zone_wise_counts'     => $vaccineCardCounts,
            'vaccine_type_counts'  => $vaccineTypeCounts,
            'statistics'           => $statistics
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
