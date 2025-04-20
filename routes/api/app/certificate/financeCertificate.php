<?php

use Illuminate\Support\Facades\Route;




Route::prefix('v1')->middleware(["authorized:" . 'finance:api'])->group(function () {});
