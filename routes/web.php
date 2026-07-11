<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\EnergyLogController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SmartAlertController;

Route::get('/', [DashboardController::class, 'index']);

Route::resource('machines', MachineController::class);

Route::resource('energy-logs', EnergyLogController::class);

Route::get('/prediction', [PredictionController::class, 'index'])
    ->name('prediction');
    Route::resource('notification', NotificationController::class);
    Route::resource('smart-alert', SmartAlertController::class);
    Route::get('/cek-token', function () {
    return config('services.fonnte.token');
});