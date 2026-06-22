<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\LogoutController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes - chỉ guest được truy cập
Route::middleware('guest')->group(function() {
    // routes/web.php
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store'); // POST cũng có tên

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

});

// Auth routes - cần đăng nhập
Route::middleware('auth')->group(function() {
    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});


