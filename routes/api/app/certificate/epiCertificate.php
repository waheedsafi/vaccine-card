<?php

use App\Http\Controllers\api\app\certificate\epi\CertificateController;
use Illuminate\Support\Facades\Route;



Route::get('/cert', [CertificateController::class, 'certificate']);

Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {});
