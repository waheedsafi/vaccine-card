
<?php

use App\Enums\PermissionEnum;
use App\Enums\SubPermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\template\JobController;

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::delete('/job/{id}', [JobController::class, "destroy"])->middleware(["epiHasSubPermission:" . PermissionEnum::settings->value . "," . SubPermissionEnum::setting_job->value . ',' . 'delete']);
    Route::post('/job/store', [JobController::class, "store"])->middleware(["epiHasSubPermission:" . PermissionEnum::settings->value . "," . SubPermissionEnum::setting_job->value . ',' . 'add']);
    Route::post('/job/update', [JobController::class, "update"])->middleware(["epiHasSubPermission:" . PermissionEnum::settings->value . "," . SubPermissionEnum::setting_job->value . ',' . 'edit']);
});
Route::prefix('v1')->group(function () {
    Route::get('/jobs', [JobController::class, "jobs"]);
    Route::get('/job/{id}', [JobController::class, "job"]);
});
