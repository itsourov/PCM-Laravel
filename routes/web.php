<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'welcome'])->middleware('guest');



// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/forgot-password', [UserController::class, 'forgot_password'])->middleware('guest')->name('password.request');


Route::post('/forgot-password', [UserController::class, 'requestPassword'])->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', [UserController::class, 'resetPassword'])->middleware('guest')->name('password.reset');


Route::post('/reset-password', [UserController::class, 'setNewPassword'])->middleware('guest')->name('password.update');


Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


//show Dashboard
Route::get('/dashboard', [ContactController::class, 'dashboard'])->middleware('auth');