
<?php

use App\Http\Controllers\api\app\dashboard\epi\EpiDashboardController;
use Illuminate\Support\Facades\Route;




Route::get('/epi/dashboard/data', [EpiDashboardController::class, 'dashboard']);
Route::prefix('v1')->middleware(['api.key', "authorized:" . 'epi:api'])->group(function () {});
