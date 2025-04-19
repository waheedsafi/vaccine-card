
<?php

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Enums\SubPermissionEnum;
use App\Http\Controllers\api\app\users\finance\FinanceUserController;

Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
    Route::get('/finance/record/count', [FinanceUserController::class, "userCount"])->middleware(["financeHasMainViewPermission:" . PermissionEnum::users->value]);
    Route::get('/finance/users', [FinanceUserController::class, "users"])->middleware(["financeHasMainViewPermission:" . PermissionEnum::users->value]);
    // Route::get('/user/{id}', [FinanceUserController::class, "user"])->middleware(['accessUserCheck', "userHasMainViewPermission:" . PermissionEnum::users->value]);
    // Route::delete('/user/delete/profile-picture/{id}', [FinanceUserController::class, 'deleteProfilePicture'])->middleware(['accessUserCheck', "userHasMainDeletePermission:" . PermissionEnum::users->value]);
    // Route::post('/user/update/information', [FinanceUserController::class, 'updateInformation'])->middleware(['accessUserCheck', "userHasSubEditPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_information->value]);
    Route::post('/finance/user/store', [FinanceUserController::class, 'store'])->middleware(["userHasMainAddPermission:" . PermissionEnum::users->value]);
    // Route::delete('/user/{id}', [FinanceUserController::class, 'destroy'])->middleware(["userHasMainDeletePermission:" . PermissionEnum::users->value]);
    // Route::post('/user/validate/email/contact', [FinanceUserController::class, "validateEmailContact"]);
    // Route::post('/user/accpunt/change-password', [FinanceUserController::class, 'changePassword'])->middleware(['accessUserCheck']);
});
