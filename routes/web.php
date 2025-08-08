<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminLoanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerLoanController;
use App\Http\Controllers\Auth\RegisteredUserController;


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

// Admin Protected Routes
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/regions', [DashboardController::class, 'regions'])->name('regions.index');
    Route::get('/loans', [AdminLoanController::class, 'index'])->name('loans');
    Route::get('/loans/{id}', [AdminLoanController::class, 'show'])->name('loans.show');
    Route::post('/loans/{id}/status-update', [AdminLoanController::class, 'statusUpdate'])->name('loans.statusupdate');
    Route::post('/loans/{id}/survey-update', [AdminLoanController::class, 'surveyUpdate'])->name('loans.surveyupdate');
    Route::get('/search', [DashboardController::class, 'search'])->name('dashboard.search');
});

// Nasabah Auth Routes
Route::get('/', [NasabahController::class, 'showLandingPage'])->name('nasabah.landingpage');
Route::get('/login', [LoginController::class, 'showNasabahLoginForm'])->name('nasabah.login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('nasabah.register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('nasabah.logout');

// Nasabah Protected Routes
Route::middleware(['auth:nasabah'])->group(function () {
    Route::get('/homepage', [NasabahController::class, 'showHomePage'])->name('nasabah.homepage');
    Route::get('/introduction', [NasabahController::class, 'showIntroductionPage'])->name('nasabah.introduction');
    Route::post('/introduction/select-card', [NasabahController::class, 'selectCard'])->name('nasabah.select-card');
    Route::get('/account', [NasabahController::class, 'showAccountPage'])->name('nasabah.account');
    Route::get('/account/settings', [NasabahController::class, 'showAccountSettingsPage'])->name('nasabah.accountsettings');
    Route::get('/notifications', [NasabahController::class, 'showNotificationsPage'])->name('nasabah.notifications');
    Route::get('/balance', [NasabahController::class, 'showBalancePage'])->name('nasabah.balance');
    Route::post('/notifications', [NasabahController::class, 'markSeen']);
    Route::get('/loans', [CustomerLoanController::class, 'showCustomerLoansMenu'])->name('nasabah.loans');
    Route::get('/loans/application', [CustomerLoanController::class, 'showCustomerLoanApplication'])->name('nasabah.loan.application');
    Route::post('/loans/application', [CustomerLoanController::class, 'submitLoan']);
    Route::get('/loans/sukses', [CustomerLoanController::class, 'showCustomerLoanSuccess'])->name('nasabah.custloan-sukses');
    Route::get('/loans/myloans', [CustomerLoanController::class, 'showCustomerLoans'])->name('nasabah.myloans');
    Route::get('/loans/myloans/{id}', [CustomerLoanController::class, 'showCustomerLoan'])->name('nasabah.loan');
    Route::post('/loans/myloans/{id}/cancel', [CustomerLoanController::class, 'cancelLoan'])->name('nasabah.loan.cancel');
    Route::post('/loans/myloans/{id}/survey-date-confirmation', [CustomerLoanController::class, 'surveyDateConfirmation'])->name('nasabah.surveydateconfirmation');
    Route::get('/loans/myloans/{id}/survey-result', [CustomerLoanController::class, 'showCustomerSurveyResult'])->name('nasabah.viewsurveyresult');
    Route::post('/loans/myloans/{id}/confirm-Disbursement', [CustomerLoanController::class, 'confirmDisbursement'])->name('nasabah.confirmdisbursement');
    Route::put('/nasabah/{id}', [NasabahController::class, 'update'])->name('nasabah.update');
});

// Email verification routes
Route::get('/verify-email', [RegisteredUserController::class, 'showVerificationForm'])
    ->name('nasabah.verify-email');
Route::post('/verify-email', [RegisteredUserController::class, 'verifyEmail']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
