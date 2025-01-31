<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// register
Route::get('/register/page1', [RegistrationController::class, 'showPage1'])->name('register.page1');
Route::post('/register/page1', [RegistrationController::class, 'submitPage1']);

Route::get('/register/page2', [RegistrationController::class, 'showPage2'])->name('register.page2');
Route::post('/register/page2', [RegistrationController::class, 'submitPage2'])->name('register.page2.submit');;

//login
Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'Login'])->name('loginStore');

//logout
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

//user dashboard
Route::get('/user/dashboard', [UserDashboardController::class, 'showUserDashboard'])->name('userDashboard');

