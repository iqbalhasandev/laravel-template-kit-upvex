<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\MailSettingController;
use Modules\Setting\Http\Controllers\ModuleSettingController;
use Modules\Setting\Http\Controllers\OpenAiSettingController;
use Modules\Setting\Http\Controllers\RecaptchaSettingController;
use Modules\Setting\Http\Controllers\SettingController;

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

Route::prefix('admin/setting')->as('admin.setting.')->middleware(['auth'])->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('index');
    Route::get('/create', [SettingController::class, 'create'])->name('create');
    Route::post('/file-upload', [SettingController::class, 'uploadFile'])->name('file-upload');
    Route::get('/{setting}/move-up', [SettingController::class, 'move_up'])->name('moveUp');
    Route::get('/{setting}/move-down', [SettingController::class, 'move_down'])->name('moveDown');
    Route::post('/', [SettingController::class, 'store'])->name('store');
    Route::put('/', [SettingController::class, 'update'])->name('update');
    Route::delete('/{setting}/delete', [SettingController::class, 'destroy'])->name('delete');
    Route::get('/{setting}/unset-value', [SettingController::class, 'unsetValue'])->name('unsetValue');

    Route::prefix('/mail')->as('mail.')->group(function () {
        Route::get('/', [MailSettingController::class, 'index'])->name('index');
        Route::post('/', [MailSettingController::class, 'update'])->name('update');
    }
    );

    Route::prefix('/recaptcha')->as('recaptcha.')->group(function () {
        Route::get('/', [RecaptchaSettingController::class, 'index'])->name('index');
        Route::post('/', [RecaptchaSettingController::class, 'update'])->name('update');
    }
    );
    Route::prefix('/openai')->as('openai.')->group(function () {
        Route::get('/', [OpenAiSettingController::class, 'index'])->name('index');
        Route::post('/', [OpenAiSettingController::class, 'update'])->name('update');
    }
    );

    Route::prefix('/module')->as('module.')->group(function () {
        Route::get('/', [ModuleSettingController::class, 'index'])->name('index');
        Route::post('/', [ModuleSettingController::class, 'update'])->name('update');
    }
    );
    Route::prefix('/print-setup')->as('print-setup.')->group(function () {
        Route::get('/', [ModuleSettingController::class, 'index'])->name('index');
        Route::post('/', [ModuleSettingController::class, 'update'])->name('update');
    }
    );
});
