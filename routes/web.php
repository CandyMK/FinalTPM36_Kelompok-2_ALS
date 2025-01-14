<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


//Register
Route::get('/register', [AuthController::class, 'ShowRegisterForm'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'Register'])->name('RegisterStore')->middleware('guest');

//login
Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'Login'])->name('loginStore')->middleware('guest');

//logout
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

