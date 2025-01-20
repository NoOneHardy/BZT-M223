<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/info', function () {
    phpinfo();
});

Route::get('/welcome', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/hello', [HelloWorldController::class, 'index'])->name('hello');

Route::middleware('auth')->group(function () {
    Route::resource('cars', CarController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('rent', RentController::class);
    Route::post('/rent/{car}/rent', [RentController::class, 'rent']);
});
