<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Monolog\Registry;

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


Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('alreadyLogin');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'register'])->name('register.index')->middleware('alreadyLogin');
Route::post('/register', [LoginController::class, 'save'])->name('register.store');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('isLogin');


Route::get('send-mail', [LoginController::class, 'getmail'])->name('get.mail');
Route::post('send-mail', [LoginController::class, 'sendmail'])->name('send.mail');
Route::get('/get-password', [LoginController::class, 'getpassword'])->name('get.password');
Route::post('/update-password', [LoginController::class, 'updatepassword'])->name('update.password');