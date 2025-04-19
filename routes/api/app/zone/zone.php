<?php

use Illuminate\Support\Facades\Route;



Route::prefix('v1')->middleware(['api.key', "multiAuthorized:" . 'epi:api,finance:api'])->group(function () {});
