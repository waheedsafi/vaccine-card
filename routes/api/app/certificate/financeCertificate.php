<?php

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\app\certificate\finance\CertificatePaymentController;


// Route::get('/search/certificate', [CertificatePaymentController::class, 'searchCertificate']);
// Route::get('/reciept', [CertificatePaymentController::class, 'payment']);
// Route::get('/reciept/download', [CertificatePaymentController::class, 'downloadReceipt']);





Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
    // Route::post('/epi/certificate/detail/store', [CertificatePaymentController::class, 'searchCertificate'])->middleware(["financeHasMainPermission:" . PermissionEnum::certificate_payment->value . ',' . 'view']);
    Route::get('/finance/certificate/search', [CertificatePaymentController::class, 'searchCertificate'])->middleware(["financeHasMainPermission:" . PermissionEnum::certificate_payment->value . ',' . 'view']);
    Route::get('/finance/certificate/info', [CertificatePaymentController::class, 'infoCertificate'])->middleware(["financeHasMainPermission:" . PermissionEnum::certificate_payment->value . ',' . 'view']);

    Route::get('/finance/certificate/amount', [CertificatePaymentController::class, 'certificatePaymentAmount']);
});
