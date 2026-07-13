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
| 1. RUTE AUTENTIKASI LANGSUNG (TANPA CONTROLLER CLASS)
|--------------------------------------------------------------------------
*/

// Menampilkan form login AdminLTE
Route::get('login', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('auth.login');
})->name('login');

// Memproses data login
Route::post('login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'Email atau password yang kamu masukkan salah.',
    ])->onlyInput('email');
});

// Memproses logout
Route::post('logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


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