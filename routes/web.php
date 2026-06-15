<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication routes
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('kamar', KamarController::class);
    Route::resource('penyewa', PenyewaController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::post('pembayaran/{pembayaran}/status', [PembayaranController::class, 'updateStatus'])->name('pembayaran.updateStatus');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/penyewa', [LaporanController::class, 'penyewa'])->name('laporan.penyewa');
    Route::get('/laporan/pembayaran', [LaporanController::class, 'pembayaran'])->name('laporan.pembayaran');
    Route::get('/laporan/kamar', [LaporanController::class, 'kamar'])->name('laporan.kamar');
});
