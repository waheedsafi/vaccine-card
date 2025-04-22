
<?php

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Enums\SubPermissionEnum;
use App\Http\Controllers\api\app\users\finance\FinanceUserController;

Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
    Route::get('/finance/record/count', [FinanceUserController::class, "userCount"])->middleware(["financeHasMainPermission:" . PermissionEnum::users->value . ',' . 'view']);
    Route::get('/finance/users', [FinanceUserController::class, "users"])->middleware(["financeHasMainPermission:" . PermissionEnum::users->value . ',' . 'view']);
    Route::get('/finance/user/{id}', [FinanceUserController::class, "user"])->middleware(['checkFinanceAccess', "financeHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_information->value . ',' . 'view']);
    Route::delete('/finance/user/delete/profile-picture/{id}', [FinanceUserController::class, 'deleteProfilePicture'])->middleware(['checkFinanceAccess', "financeHasMainPermission:" . PermissionEnum::users->value . ',' . 'delete']);
    Route::post('/finance/user/update/profile-picture', [FinanceUserController::class, 'updateProfilePicture'])->middleware(['checkFinanceAccess', "financeHasMainPermission:" . PermissionEnum::users->value . ',' . 'edit']);
    Route::post('/finance/user/update/information', [FinanceUserController::class, 'updateInformation'])->middleware(['checkFinanceAccess', "financeHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_information->value . ',' . 'edit']);
    Route::post('/finance/user/store', [FinanceUserController::class, 'store'])->middleware(["financeHasMainPermission:" . PermissionEnum::users->value . ',' . 'add']);
    Route::post('/finance/user/change/account/password', [FinanceUserController::class, 'changePassword'])->middleware(['checkFinanceAccess', "financeHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_password->value . ',' . 'edit']);
});
