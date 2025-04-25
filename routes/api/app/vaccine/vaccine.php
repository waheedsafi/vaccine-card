<?php

use App\Http\Controllers\api\app\vaccine\VaccineController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::get('/vaccine-centers', [VaccineController::class, "vaccineCenters"]);
    Route::get('/vaccine-types', [VaccineController::class, "vaccineTypes"]);
    Route::get('/vaccine-types', [VaccineController::class, "vaccineTypes"]);
});
