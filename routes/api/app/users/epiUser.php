
<?php

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Enums\SubPermissionEnum;
use App\Http\Controllers\api\app\users\epi\EpiUserController;

Route::prefix('v1')->middleware(['api.key', "authorized:" . 'user:api'])->group(function () {
    Route::get('/users/record/count', [EpiUserController::class, "userCount"])->middleware(["userHasMainViewPermission:" . PermissionEnum::users->value]);
    Route::get('/users', [EpiUserController::class, "users"])->middleware(["userHasMainViewPermission:" . PermissionEnum::users->value]);
    Route::get('/user/{id}', [EpiUserController::class, "user"])->middleware(['accessUserCheck', "userHasMainViewPermission:" . PermissionEnum::users->value]);
    Route::delete('/user/delete/profile-picture/{id}', [EpiUserController::class, 'deleteProfilePicture'])->middleware(['accessUserCheck', "userHasMainDeletePermission:" . PermissionEnum::users->value]);
    Route::post('/user/update/profile-picture', [EpiUserController::class, 'updateProfilePicture'])->middleware(['accessUserCheck', "userHasMainEditPermission:" . PermissionEnum::users->value]);
    Route::post('/user/update/information', [EpiUserController::class, 'updateInformation'])->middleware(['accessUserCheck', "userHasSubEditPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_information->value]);
    Route::post('/user/store', [EpiUserController::class, 'store'])->middleware(["userHasMainAddPermission:" . PermissionEnum::users->value]);
    Route::delete('/user/{id}', [EpiUserController::class, 'destroy'])->middleware(["userHasMainDeletePermission:" . PermissionEnum::users->value]);
    Route::post('/user/validate/email/contact', [EpiUserController::class, "validateEmailContact"]);
    Route::post('/user/accpunt/change-password', [EpiUserController::class, 'changePassword'])->middleware(['accessUserCheck']);
});
