<?php

use Modules\FirebaseFcmNotification\Http\Controllers\FirebaseFcmNotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('firebase-fcm-notification')->group(function () {
    Route::get('/via-topic', [FirebaseFcmNotificationController::class, 'viaTopic']);
});
