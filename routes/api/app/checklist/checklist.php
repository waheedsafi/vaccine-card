<?php

use Illuminate\Support\Facades\Route;



Route::prefix('v1')->middleware(['api.key', "multiAuthorized:" . 'user:api'])->group(function () {});

Route::prefix('v1')->middleware(['api.key', "authorized:" . 'user:api'])->group(function () {});
