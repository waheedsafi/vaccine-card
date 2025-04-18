<?php

use App\Http\Controllers\api\auth\EpiAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(['api.key'])->group(function () {
    Route::post('/auth-donor', [EpiAuthController::class, 'login']);
});

Route::prefix('v1')->middleware(['api.key', "authorized:" . 'donor:api'])->group(function () {
    Route::get('/auth-donor', [EpiAuthController::class, 'authDonor']);
    Route::post('/logout-donor', [EpiAuthController::class, 'logout']);
});
