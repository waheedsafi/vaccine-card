<?php

use App\Http\Controllers\api\app\certificate\qrcode\QrCodeController;
use Illuminate\Support\Facades\Route;

// Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
//     Route::get('/zone/store', [ZoneController::class, "store"]);
// });
Route::get('/certificate/qrcode/search/{id}', [QrCodeController::class, "search"]);

Route::prefix('v1')->group(function () {
    Route::get('/certificate/qrcode/search/{id}', [QrCodeController::class, "search"]);
});
