<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerLoanController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomepageController;


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
    return view('auth.landing');
});

// Auth Routes
//Admin Auth Routes
Route::get('admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::post('admin/logout', [LoginController::class, 'logout'])->name('logout');
//Nasabah Auth Routes
Route::get('/', [NasabahController::class, 'showLandingPage'])->name('nasabah.landingpage');
Route::get('/login', [LoginController::class, 'showNasabahLoginForm'])->name('nasabah.login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('nasabah.register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('nasabah.logout');

Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('admin/regions', [DashboardController::class, 'regions'])->name('regions.index');

// Loan Routes
Route::get('admin/loans', [LoanController::class, 'index'])->name('loans');
Route::get('admin/loans/{id}', [LoanController::class, 'show'])->name('loans.show');

// Nasabah Routes
    Route::get('/homepage', [NasabahController::class, 'showHomePage'])->name('nasabah.homepage');
    Route::get('/account', [NasabahController::class, 'showAccountPage'])->name('nasabah.account');
    Route::get('/account/settings', [NasabahController::class, 'showAccountSettingsPage'])->name('nasabah.accountsettings');
    Route::get('/notifications', [NasabahController::class, 'showNotificationsPage'])->name('nasabah.notifications');
    Route::get('/loan', [CustomerLoanController::class, 'showCustomerLoansMenu'])->name('nasabah.loans');
    Route::get('/loan/application', [CustomerLoanController::class, 'showCustomerLoanApplication'])->name('nasabah.loan.application');
    Route::get('/loan/application/2', [CustomerLoanController::class, 'showCustomerLoanApplication2'])->name('nasabah.loan.application2');
    Route::get('/loan/sukses', [CustomerLoanController::class, 'showCustomerLoanSuccess'])->name('nasabah.custloan-sukses');
    Route::get('/loans/myloans', [CustomerLoanController::class, 'showCustomerLoans'])->name('nasabah.myloans');
    Route::get('/loans/myloans/1', [CustomerLoanController::class, 'showCustomerLoan'])->name('nasabah.loan');
    Route::get('/loans/myloans/2', [CustomerLoanController::class, 'showCustomerLoan2'])->name('nasabah.loan2');
    Route::get('/loans/myloans/3', [CustomerLoanController::class, 'showCustomerLoan3'])->name('nasabah.loan3');
    Route::get('/loans/myloans/4', [CustomerLoanController::class, 'showCustomerLoan4'])->name('nasabah.loan4');
    Route::get('/loans/myloans/3/surveyresult/', [CustomerLoanController::class, 'showCustomerSurveyResult'])->name('nasabah.viewsurveyresult');
    Route::put('/nasabah/{id}', [NasabahController::class, 'update'])->name('nasabah.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


