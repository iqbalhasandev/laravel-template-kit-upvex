<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'redirectToDashboard']);
Route::get('/admin', [DashboardController::class, 'redirectToDashboard']);
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::get('lang/{lang}', [LocalizationController::class, 'switchLang'])->name('lang.switch');
