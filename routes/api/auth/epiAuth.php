<?php

use App\Http\Controllers\api\auth\EpiAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/auth-epi', [EpiAuthController::class, 'login']);
});

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::get('/auth-epiuser', [EpiAuthController::class, 'user']);
    Route::post('/logout-epi', [EpiAuthController::class, 'logout']);
    Route::post('/finance/profile/change-password', [EpiAuthController::class, 'changePassword']);
});
