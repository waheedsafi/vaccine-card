<?php

namespace App\Http\Controllers\api\app\log\login;

use App\Enums\RoleEnum;
use App\Models\EpiUser;
use App\Models\FinanceUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class EpiLoginLogController extends Controller
{
    public function userLoginLogs(Request $request)
    {
        $locale = App::getLocale();
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $join_table = '';
        $user_type = '';

        $admin = '';

        // Determine user type based on role
        if ($request->user()->role_id === RoleEnum::epi_super->value) {
            $join_table = 'epi_users';
            $user_type = EpiUser::class;
            $admin = RoleEnum::epi_user->value;

            if ($request->admin == true) {
                $admin = RoleEnum::epi_admin->value;
            }
        } elseif ($request->user()->role_id === RoleEnum::finance_super->value) {
            $join_table = 'finance_users';
            $user_type = FinanceUser::class;

            $admin = RoleEnum::finance_user->value;

            if ($request->admin == true) {
                $admin = RoleEnum::finance_admin->value;
            }
        } else {
            return response()->json([
                "message" => __("app_translation.invalid_user_type"),
            ], 403);
        }

        // Build query
        $query = DB::table('user_login_logs as log')
            ->leftJoin("{$join_table} as usr", 'usr.id', '=', 'log.userable_id')
            ->where('userable_type', $user_type)
            ->where("usr.role_id", $admin)
            ->select(
                "log.id",
                "usr.username",
                "usr.profile",
                "log.userable_type",
                "log.action",
                "log.ip_address",
                "log.browser",
                "log.device",
                "log.created_at as date"
            );



        $query->orderBy('log.created_at', 'desc');

        // Pagination
        $logs = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            "logs" => $logs,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
