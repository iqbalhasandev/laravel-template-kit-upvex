<?php

use Modules\Backup\Http\Controllers\BackupController;

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

Route::prefix('admin/backup')->as('admin.backup.')->group(function () {
    Route::get('/', [BackupController::class, 'index'])->name('index');
    Route::post('/create-backup', [BackupController::class, 'createBackup'])->name('create-backup');
    Route::get('/download', [BackupController::class, 'download'])->name('download');
    Route::delete('/delete', [BackupController::class, 'destroy'])->name('delete');
    Route::delete('/delete-all', [BackupController::class, 'destroyAll'])->name('delete.all');
});
