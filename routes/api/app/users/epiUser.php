
<?php

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Enums\SubPermissionEnum;
use App\Http\Controllers\api\app\users\epi\EpiUserController;


Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::get('/epi/record/count', [EpiUserController::class, "userCount"])->middleware(["epiHasMainPermission:" . PermissionEnum::users->value . ',' . 'view']);
    Route::get('/epi/users', [EpiUserController::class, "users"])->middleware(["epiHasMainPermission:" . PermissionEnum::users->value . ',' . 'view']);
    // Route::get('/user/{id}', [EpiUserController::class, "user"])->middleware(['accessUserCheck', "userHasMainViewPermission:" . PermissionEnum::users->value]);
    // Route::delete('/user/delete/profile-picture/{id}', [EpiUserController::class, 'deleteProfilePicture'])->middleware(['accessUserCheck', "userHasMainDeletePermission:" . PermissionEnum::users->value]);
    // Route::post('/user/update/profile-picture', [EpiUserController::class, 'updateProfilePicture'])->middleware(['accessUserCheck', "userHasMainEditPermission:" . PermissionEnum::users->value]);
    // Route::post('/user/update/information', [EpiUserController::class, 'updateInformation'])->middleware(['accessUserCheck', "userHasSubEditPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_information->value]);
    Route::post('/epi/user/store', [EpiUserController::class, 'store'])->middleware(["epiHasMainPermission:" . PermissionEnum::users->value . ',' . 'add']);
    // Route::delete('/user/{id}', [EpiUserController::class, 'destroy'])->middleware(["userHasMainDeletePermission:" . PermissionEnum::users->value]);
    // Route::post('/user/validate/email/contact', [EpiUserController::class, "validateEmailContact"]);
    // Route::post('/user/accpunt/change-password', [EpiUserController::class, 'changePassword'])->middleware(['accessUserCheck']);
});
