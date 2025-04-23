
<?php

use App\Http\Controllers\api\template\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(["authorized:" . 'user:api'])->group(function () {
    Route::post('/user/profile/picture-update', [ProfileController::class, 'updateUserPicture']);
    Route::post('/user/profile/info/update', [ProfileController::class, 'updateUserProfileInfo']);
});
Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
    Route::post('/finance/profile/picture-update', [ProfileController::class, 'updateFinancePicture']);
});

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::post('/epi/profile/picture-update', [ProfileController::class, 'updateEpiPicture']);
});
Route::prefix('v1')->middleware(["multiAuthorized:" . 'epi:api,finance:api'])->group(function () {
    Route::delete('/delete/profile-picture', [ProfileController::class, 'deleteProfilePicture']);
    Route::post('/general/profile/info/update', [ProfileController::class, 'updateProfileInfo']);
});
