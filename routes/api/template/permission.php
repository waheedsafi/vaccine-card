
<?php

use App\Enums\PermissionEnum;
use App\Enums\SubPermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\template\PermissionController;


Route::prefix('v1')->middleware(["multiAuthorized:" . 'epi:api,finance:api'])->group(function () {
    Route::get('/role-permissions/{id}', [PermissionController::class, "rolePermissions"]);
});

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::get('/epi/user/permissions/{id}', [PermissionController::class, "epiPermissions"])->middleware(["epiHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_permission->value . ',' . 'view']);
    Route::post('/edit/epi/user/permissions', [PermissionController::class, "editEpiPermissions"])->middleware(["epiHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_permission->value . ',' . 'edit']);
});

Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
    Route::get('/finance/user/permissions/{id}', [PermissionController::class, "financePermissions"])->middleware(["financeHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_permission->value . ',' . 'view']);
    Route::post('/edit/finance/user/permissions', [PermissionController::class, "editFinancePermissions"])->middleware(["financeHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_permission->value . ',' . 'edit']);
});
