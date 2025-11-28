<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DigitalReceiptController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserKwitansiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route Login (untuk tamu/belum login)
Route::middleware(['iniTamu'])->group(function () {
    Route::get('/login', [SessionController::class, 'index'])->name('login'); // ← TAMBAHKAN ->name('login')
    Route::get('sesi', [SessionController::class, 'index']);
    Route::post('/sesi/login', [SessionController::class, 'login']);
});

// Route Logout
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout');

// Route Dashboard (hanya untuk user yang sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
});

// Route untuk User biasa (bukan admin)
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserKwitansiController::class, 'index'])->name('index');
    Route::get('/{receipt}', [UserKwitansiController::class, 'show'])->name('show');
});

// Route untuk Admin (CRUD Kuitansi)
Route::middleware(['auth'])->group(function () {
    Route::resource('receipts', DigitalReceiptController::class);
});