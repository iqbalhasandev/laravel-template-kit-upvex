<?php

use Illuminate\Support\Facades\Route;
use Modules\Language\Http\Controllers\LanguageController;

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

Route::prefix('admin/language')->as('admin.language.')->group(function () {
    Route::get('/', [LanguageController::class, 'index'])->name('index');
    Route::post('/', [LanguageController::class, 'store'])->name('store');
    Route::get('/build/{language}', [LanguageController::class, 'build'])->name('build');
    Route::post('/update/{slug}', [LanguageController::class, 'update'])->name('update');
});
