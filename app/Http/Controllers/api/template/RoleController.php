<?php

namespace App\Http\Controllers\api\template;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function roles(Request $request)
    {
        $role_id = $request->user()->role_id;
        $includeRole = [];

        if ($role_id === RoleEnum::finance_super->value) {
            array_push($includeRole, RoleEnum::finance_admin->value);
            array_push($includeRole, RoleEnum::finance_user->value);
        } else if ($role_id === RoleEnum::finance_admin->value) {
            array_push($includeRole, RoleEnum::finance_user->value);
        } else if ($role_id === RoleEnum::epi_super->value) {
            array_push($includeRole, RoleEnum::epi_admin->value);
            array_push($includeRole, RoleEnum::epi_user->value);
        } else if ($role_id === RoleEnum::epi_admin->value) {
            array_push($includeRole, RoleEnum::epi_user->value);
        } else {
            return response()->json([
                'message' => __('app_translation.unauthorized'),
            ], 401, [], JSON_UNESCAPED_UNICODE);
        }

        $tr = Role::whereIn('id', $includeRole)->select("name", 'id')->get();
        return response()->json();
    }
    public function financeRoles()
    {
        $excludedIds = [
            RoleEnum::debugger->value,
            RoleEnum::epi_admin->value,
            RoleEnum::epi_user->value,
        ];
        return response()->json(Role::whereNotIn('id', $excludedIds)->select("name", 'id', 'created_at as createdAt')->get());
    }
}
