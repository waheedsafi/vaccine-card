<?php

use App\Enums\PermissionEnum;
use App\Enums\SubPermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\app\certificate\epi\CertificateController;



Route::get('/cert', [CertificateController::class, 'generateCertificate']);
Route::get('/activity/{id}', [CertificateController::class, 'activity']);

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::get('/epi/person/information/{id}', [CertificateController::class, "personalInformation"])->middleware(["epiHasSubPermission:" . PermissionEnum::vaccine_certificate->value . "," . SubPermissionEnum::vaccine_certificate_person_info->value . ',' . 'view']);
    Route::post('/epi/certificate/detail/store', [CertificateController::class, 'storeCertificateDetail'])->middleware(["epiHasMainPermission:" . PermissionEnum::vaccine_certificate->value . ',' . 'add']);
    Route::get('/epi/certificate/search', [CertificateController::class, 'searchCertificate'])->middleware(["epiHasMainPermission:" . PermissionEnum::vaccine_certificate->value . ',' . 'view']);
});
