<?php

use App\Http\Controllers\api\app\zone\ZoneController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::get('/zones', [ZoneController::class, "zones"]);
    Route::get('/zone/store', [ZoneController::class, "store"]);
});
