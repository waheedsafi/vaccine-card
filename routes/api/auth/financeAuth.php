<?php

use App\Enums\PermissionEnum;
use App\Enums\SubPermissionEnum;
use App\Http\Controllers\api\auth\FinanceAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(['api.key'])->group(function () {
    Route::post('/auth-ngo', [FinanceAuthController::class, 'login']);
});

Route::prefix('v1')->middleware(['api.key', "authorized:" . 'ngo:api'])->group(function () {
    Route::get('/auth-ngo', [FinanceAuthController::class, 'authNgo']);
    Route::post('/logout-ngo', [FinanceAuthController::class, 'logout']);
    Route::post('/ngo/profile/change-password', [FinanceAuthController::class, 'changePassword']);
});
