<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DigitalReceiptController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserKwitansiController; // ← TAMBAHKAN INI

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[SessionController::class,'index']);
Route::get('sesi',[SessionController::class,'index']);
Route::post('/sesi/login',[SessionController::class,'login']);
Route::get('/sesi/logout',[SessionController::class,'logout']);

// Route untuk user (dengan middleware auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserKwitansiController::class, 'index'])->name('user.index');
    Route::get('/user/{receipt}', [UserKwitansiController::class, 'show'])->name('user.show');
});

// Route untuk admin (resource routes)
Route::resource('receipts', DigitalReceiptController::class);