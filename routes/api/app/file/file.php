
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\app\file\FileController;



Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {
  Route::post('finance/file/upload', [FileController::class, 'financeFileUpload'])->withoutMiddleware('throttle');
});
Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {
  Route::post('epi/no/identifier/file/upload', [FileController::class, 'epiNoIdentifierFileUpload'])->withoutMiddleware('throttle');
  Route::post('epi/file/upload', [FileController::class, 'epiFileUpload'])->withoutMiddleware('throttle');
});
