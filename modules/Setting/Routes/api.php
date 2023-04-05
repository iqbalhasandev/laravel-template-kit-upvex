<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\Api\ApiSettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::prefix('guest')->group(function () {
    //System Information Route
    Route::get('/system-information', [ApiSettingController::class, 'index']);
});
