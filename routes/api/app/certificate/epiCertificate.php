<?php

use Illuminate\Support\Facades\Route;




Route::prefix('v1')->middleware(["authorized:" . 'epi:api'])->group(function () {});
