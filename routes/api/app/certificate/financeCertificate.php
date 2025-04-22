<?php

use App\Http\Controllers\api\app\certificate\finance\CertificatePaymentController;
use Illuminate\Support\Facades\Route;






Route::get('/search/certificate', [CertificatePaymentController::class, 'searchCertificate']);
Route::get('/reciept', [CertificatePaymentController::class, 'payment']);


Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {});
