
<?php

use App\Enums\PermissionEnum;
use App\Enums\SubPermissionEnum;
use App\Http\Controllers\api\app\payment\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
    Route::post('/finance/job/store', [PaymentController::class, "store"])->middleware(["financeHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_job->value . ',' . 'add']);
    Route::get('/finance/payments', [PaymentController::class, "payments"])->middleware(["financeHasSubPermission:" . PermissionEnum::configurations->value . "," . SubPermissionEnum::configuration_payment->value . ',' . 'view']);
});
