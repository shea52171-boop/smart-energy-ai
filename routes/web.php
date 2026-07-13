<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\EnergyLogController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SmartAlertController;

/*
|--------------------------------------------------------------------------
| 1. RUTE AUTENTIKASI (MENGGUNAKAN STRING NAMESPACE)
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| 2. RUTE PROJEK SMART ENERGY AI (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Halaman Utama / Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Mesin & Log Energi
    Route::resource('machines', MachineController::class);
    Route::resource('energy-logs', EnergyLogController::class);

    // Prediksi AI
    Route::get('/prediction', [PredictionController::class, 'index'])->name('prediction');
    
    // Notifikasi & Smart Alert
    Route::resource('notification', NotificationController::class);
    Route::resource('smart-alert', SmartAlertController::class);
    
    // Cek Token Fonnte
    Route::get('/cek-token', function () {
        return config('services.fonnte.token');
    });

});