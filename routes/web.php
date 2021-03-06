<?php

namespace Xandrman\BookingSdk;

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

Route::prefix('booking-sdk')->middleware('web')->group(function () {
    Route::resource('', BookingController::class)->only(['index', 'create', 'store']);
    Route::resource('customer', CustomerController::class)->only(['index', 'create', 'store']);
    Route::patch('server', [SettingsController::class, 'changeServer'])->name('changeServer');
    Route::post('server', [SettingsController::class, 'addServer'])->name('addServer');
    Route::delete('server', [SettingsController::class, 'destroyServer'])->name('destroyServer');
    Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
});