<?php

use App\Http\Controllers\Account\DepositController;
use App\Http\Controllers\Account\StatementController;
use App\Http\Controllers\Account\TransferController;
use App\Http\Controllers\Account\WithdrawlController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Handle Auth Request
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Deposit Routes
    Route::get('/deposit', [DepositController::class, 'index'])->name('deposit.form');
    Route::post('/deposit', [DepositController::class, 'deposit'])->name('deposit');

    // Withdrawal Routes
    Route::get('/withdrawal', [WithdrawlController::class, 'index'])->name('withdrawal.form');
    Route::post('/withdrawal', [WithdrawlController::class, 'withdrawal'])->name('withdrawal');

    // Transfer Routes
    Route::get('/transfer', [TransferController::class, 'index'])->name('transfer.form');
    Route::post('/transfer', [TransferController::class, 'transfer'])->name('transfer');
    
    // Statements
    Route::get('/statement', [StatementController::class, 'accountStatement'])->name('statement');
    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});
