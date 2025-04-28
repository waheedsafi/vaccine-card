<?php

use App\Enums\PermissionEnum;
use App\Enums\SubPermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\app\vaccine\VaccineController;

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {

    Route::post('/epi/vaccine/type/store', [VaccineController::class, "store"])->middleware(["epiHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_vaccine_type->value . ',' . 'add']);
    // Route::delete('/epi/vaccine/type/{id}', [VaccineController::class, "destroy"])->middleware(["epiHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_vaccine_type->value . ',' . 'delete']);
    Route::post('/epi/vaccine/type/update', [VaccineController::class, "update"])->middleware(["epiHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_vaccine_type->value . ',' . 'edit']);
    Route::get('/epi/vaccine/type/{id}', [VaccineController::class, "vaccineType"]);


    Route::get('/vaccine-centers', [VaccineController::class, "vaccineCenters"]);
    Route::get('/epi/vaccine/center/{id}', [VaccineController::class, "vaccineCenter"]);
    Route::post('/epi/vaccine/center/store', [VaccineController::class, "vaccineCenterStore"]);
    Route::post('/epi/vaccine/center/update', [VaccineController::class, "vaccineCenterUpdate"])->middleware(["epiHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_vaccine_center->value . ',' . 'edit']);


    Route::get('/vaccine-types', [VaccineController::class, "vaccineTypes"]);
    Route::get('/full/vaccine/types', [VaccineController::class, "fullVaccineTypes"]);
});
