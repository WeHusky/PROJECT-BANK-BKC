<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
Route::get('/loans/{id}', [LoanController::class, 'show'])->name('loans.show');
Route::get('/loans/{id}/edit', [LoanController::class, 'edit'])->name('loans.edit');
Route::put('/loans/{id}', [LoanController::class, 'update'])->name('loans.update');
Route::delete('/loans/{id}', [LoanController::class, 'destroy'])->name('loans.destroy');