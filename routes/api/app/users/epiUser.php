
<?php

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Enums\SubPermissionEnum;
use App\Http\Controllers\api\app\users\epi\EpiUserController;


Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::get('/epi/record/count', [EpiUserController::class, "userCount"])->middleware(["epiHasMainPermission:" . PermissionEnum::users->value . ',' . 'view']);
    Route::get('/epi/users', [EpiUserController::class, "users"])->middleware(["epiHasMainPermission:" . PermissionEnum::users->value . ',' . 'view']);
    Route::get('/epi/user/{id}', [EpiUserController::class, "user"])->middleware(['checkEpiAccess', "epiHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_information->value . ',' . 'view']);
    Route::delete('/epi/user/delete/profile-picture/{id}', [EpiUserController::class, 'deleteProfilePicture'])->middleware(['checkEpiAccess', "epiHasMainPermission:" . PermissionEnum::users->value . ',' . 'delete']);
    Route::post('/epi/user/update/profile-picture', [EpiUserController::class, 'updateProfilePicture'])->middleware(['checkEpiAccess', "epiHasMainPermission:" . PermissionEnum::users->value . ',' . 'edit']);
    Route::post('/epi/user/update/information', [EpiUserController::class, 'updateInformation'])->middleware(['checkEpiAccess', "epiHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_information->value . ',' . 'edit']);
    Route::post('/epi/user/store', [EpiUserController::class, 'store'])->middleware(["epiHasMainPermission:" . PermissionEnum::users->value . ',' . 'add']);
    Route::post('/epi/user/change/account/password', [EpiUserController::class, 'changePassword'])->middleware(['checkEpiAccess', "epiHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_password->value . ',' . 'edit']);
});
