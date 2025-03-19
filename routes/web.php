<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Auth Routes
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

// Admin Routes (Only accessible when logged in)
Route::middleware('auth')->group(function () {
    Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
});