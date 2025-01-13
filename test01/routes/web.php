<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/info', function () {
    phpinfo();
});

Route::get('/hello', function () {
    return view('hello-world');
});

Route::get('/welcome', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
