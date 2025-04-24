<?php

use App\Enums\PermissionEnum;
use App\Enums\SubPermissionEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\app\certificate\epi\CertificateController;



Route::get('/cert', [CertificateController::class, 'generateCertificate']);
Route::get('/activity/{id}', [CertificateController::class, 'activity']);

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
    Route::post('/epi/user/update/information', [CertificateController::class, 'updateInformation'])->middleware(['checkEpiAccess', "epiHasSubPermission:" . PermissionEnum::users->value . "," . SubPermissionEnum::user_information->value . ',' . 'edit']);
    // Route::get('/epi/person/information/{id}', [CertificateController::class, "updatePeopleInformation"])->middleware(["epiHasSubPermission:" . PermissionEnum::vaccine_certificate->value . "," . SubPermissionEnum::vaccine_certificate_person_info->value . ',' . 'edit']);
    Route::get('/epi/person/information/{id}', [CertificateController::class, "personalInformation"])->middleware(["epiHasSubPermission:" . PermissionEnum::vaccine_certificate->value . "," . SubPermissionEnum::vaccine_certificate_person_info->value . ',' . 'edit']);
    Route::post('/epi/certificate/detail/store', [CertificateController::class, 'storeCertificateDetail'])->middleware(["epiHasMainPermission:" . PermissionEnum::vaccine_certificate->value . ',' . 'add']);
    Route::get('/epi/certificate/search', [CertificateController::class, 'searchCertificate'])->middleware(["epiHasMainPermission:" . PermissionEnum::vaccine_certificate->value . ',' . 'view']);
    Route::get('/epi/person/vaccines', [CertificateController::class, 'personaVaccines'])->middleware(["epiHasSubPermission:" . PermissionEnum::vaccine_certificate->value . "," . SubPermissionEnum::vaccine_certificate_vaccination_info->value . ',' . 'view']);
});
