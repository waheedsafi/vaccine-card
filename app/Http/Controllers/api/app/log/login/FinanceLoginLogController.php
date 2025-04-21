<?php

namespace App\Http\Controllers\api\app\log\login;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class FinanceLoginLogController extends Controller
{
    //

    /**
     * Get user login logs.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function userLoginLogs(Request $request)
    {
        $locale = App::getLocale();
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $includeRole = [];

        if ($request->admin === "true") {
            $includeRole[] = RoleEnum::finance_admin->value;
            $includeRole[] = RoleEnum::finance_super->value;
        } else {
            $includeRole[] = RoleEnum::finance_user->value;
        }

        // Build query
        $query = DB::table('user_login_logs as log')
            ->leftJoin("finance_users as usr", 'usr.id', '=', 'log.userable_id')
            ->where('userable_type', 'FinanceUser')
            ->whereIn("usr.role_id", $includeRole) // Use whereIn for multiple roles
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
            )
            ->orderBy('log.created_at', 'desc');

        // Pagination
        $logs = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            "logs" => $logs,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
