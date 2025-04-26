<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('adminLogin');

use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


use App\Http\Controllers\LoanController;

// Loan Routes
Route::get('/loans', [LoanController::class, 'index'])->name('loans');
Route::get('/loans/{id}', [LoanController::class, 'show'])->name('loans.show');
