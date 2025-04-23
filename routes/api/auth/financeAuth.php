<?php

use App\Http\Controllers\api\auth\FinanceAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/auth-finance', [FinanceAuthController::class, 'login']);
});

Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
    Route::get('/auth-financeuser', [FinanceAuthController::class, 'user']);
    Route::post('/logout-finance', [FinanceAuthController::class, 'logout']);
});
