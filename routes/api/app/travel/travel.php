<?php

use App\Http\Controllers\api\app\travel\TravelController;
use Illuminate\Support\Facades\Route;




Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::get('/travel/types', [TravelController::class, "travelsTypes"]);
});
