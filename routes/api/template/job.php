
<?php

use App\Enums\PermissionEnum;
use App\Enums\SubPermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\template\JobController;

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::delete('/epi/job/{id}', [JobController::class, "destroy"])->middleware(["epiHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_job->value . ',' . 'delete']);
    Route::post('/epi/job/store', [JobController::class, "store"])->middleware(["epiHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_job->value . ',' . 'add']);
    Route::post('/epi/job/update', [JobController::class, "update"])->middleware(["epiHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_job->value . ',' . 'edit']);
});
Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
    Route::delete('/finance/job/{id}', [JobController::class, "destroy"])->middleware(["financeHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_job->value . ',' . 'delete']);
    Route::post('/finance/job/store', [JobController::class, "store"])->middleware(["financeHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_job->value . ',' . 'add']);
    Route::post('/finance/job/update', [JobController::class, "update"])->middleware(["financeHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_job->value . ',' . 'edit']);
});
Route::prefix('v1')->group(function () {
    Route::get('/jobs', [JobController::class, "jobs"]);
    Route::get('/job/{id}', [JobController::class, "job"]);
});
Route::prefix('v1')->middleware(["multiAuthorized:" . 'epi:api,finance:api'])->group(function () {
    Route::get('/jobs', [JobController::class, "jobs"]);
    Route::get('/job/{id}', [JobController::class, "job"]);
});
