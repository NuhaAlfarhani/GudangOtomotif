<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function(){
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route to masuk
Route::get('/masuk', function(){
    return view('masuk');
});

// Route to keluar
Route::get('/keluar', function(){
    return view('keluar');
});
