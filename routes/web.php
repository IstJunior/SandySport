<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

//Router Auth

Route::get('/login', [ConnectController::class, 'getLogin'])->name('login');
Route::post('/login', [ConnectController::class, 'postLogin'])->name('login');
Route::get('/register', [RegisterController ::class, 'getRegister'])->name('register');
Route::post('/register', [RegisterController ::class, 'postRegister'])->name('register');
Route::get('/logout', [ConnectController::class, 'getLogout'])->name('logout');


