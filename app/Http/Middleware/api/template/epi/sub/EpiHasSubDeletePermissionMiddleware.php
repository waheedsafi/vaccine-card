<?php

namespace App\Http\Middleware\api\template\epi\sub;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EpiHasSubDeletePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission = null, $subPermission = null): Response
    {
        $authUser = $request->user();

        if ($authUser) {
            // 1. Check user has user permission
            $permission = DB::table("epi_permissions as ep")
                ->where("epi_user_id", "=", $authUser->id)
                ->where("permission", $permission)
                ->join("epi_permission_subs as eps", function ($join) use ($subPermission) {
                    return $join->on('eps.epi_permission_id', '=', 'ep.id')
                        ->where('eps.sub_permission_id', $subPermission)
                        ->where('eps.delete', true);
                })->select("eps.id")->first();

            if ($permission) {
                return $next($request);
            }
        }
        return response()->json([
            'message' => __('app_translation.unauthorized'),
        ], 403, [], JSON_UNESCAPED_UNICODE);
    }
}
