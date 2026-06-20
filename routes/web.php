<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes - chỉ guest được truy cập
Route::middleware('guest')->group(function() {
   Route::get('/register', [RegisterController::class, 'create'])->name('register');
   Route::post('/register', [RegisterController::class, 'store']);

   Route::get('login');
   Route::post('login');
});

// Auth routes - cần đăng nhập
Route::middleware('auth')->group(function() {
    Route::post('logout');
});


