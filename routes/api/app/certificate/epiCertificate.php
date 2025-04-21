<?php

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\app\certificate\epi\CertificateController;



Route::get('/cert', [CertificateController::class, 'certificate']);

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::post('/epi/certificate/detail/store', [CertificateController::class, 'storeCertificateDetail'])->middleware(["epiHasMainPermission:" . PermissionEnum::vaccine_certificate->value . ',' . 'add']);
});
