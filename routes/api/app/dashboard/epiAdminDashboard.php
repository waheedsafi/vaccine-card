
<?php

use Illuminate\Support\Facades\Route;


Route::prefix('v1')->middleware(['api.key', "authorized:" . 'epi:api'])->group(function () {});
