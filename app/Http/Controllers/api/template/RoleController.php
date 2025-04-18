<?php

namespace App\Http\Controllers\api\template;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function epiRoles()
    {
        $excludedIds = [
            RoleEnum::debugger->value,
            RoleEnum::finance_admin->value,
            RoleEnum::finance_user->value,
        ];
        return response()->json(Role::whereNotIn('id', $excludedIds)->select("name", 'id', 'created_at as createdAt')->get());
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
