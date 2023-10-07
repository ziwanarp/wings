<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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
Route::middleware('guest')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/', [LoginController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'home']);
    Route::get('/allProducts/{id}', [HomeController::class, 'allProducts']);
    Route::get('/logout', [LoginController::class, 'logout']);
});
