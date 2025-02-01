<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditTeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ViewTeamController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// register
Route::get('/register/page1', [RegistrationController::class, 'showPage1'])->name('register.page1');
Route::post('/register/page1', [RegistrationController::class, 'submitPage1']);

Route::get('/register/page2', [RegistrationController::class, 'showPage2'])->name('register.page2');
Route::post('/register/page2', [RegistrationController::class, 'submitPage2'])->name('register.page2.submit');;

//login
Route::get('/login', action: [AuthController::class, 'ShowLoginForm'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'Login'])->name('loginStore')->middleware('guest');

//logout
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

//user dashboard
Route::get('/user/dashboard', [UserDashboardController::class, 'showUserDashboard'])->name('userDashboard');

// Admin Panel ==============================

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->group(function () {
    // Groups Dashboard
    Route::get('/admin/dashboard', [AdminPanelController::class, 'index'])->name('admin.dashboard');

    // View Team
    Route::get('/admin/team/{id}', [ViewTeamController::class, 'index']);

    // Edit Team
    Route::get('/admin/edit-team/{id}', [EditTeamController::class, 'index'])->name('team.edit');
    Route::put('/admin/update-team/{id}', [EditTeamController::class, 'update'])->name('team.update');

    // Delete Team
    Route::delete('/admin/delete-team/{id}', [AdminPanelController::class, 'deleteGroup'])->name('admin.deleteGroup');
});
