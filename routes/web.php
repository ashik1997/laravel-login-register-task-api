<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function () {
    Route::post('/login', App\Http\Controllers\Auth\LoginController::class)->middleware('guest');
    Route::post('/logout', App\Http\Controllers\Auth\LogoutController::class)->middleware('auth');
    Route::post('/register', App\Http\Controllers\Auth\RegisterController::class)->middleware('guest');
});


Route::get('/', function () {
    return view('welcome');
});
