<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [BarangController::class, 'index']);

// Route to login
Route::get('/login', function() {
    return view('login');
});

// Route to barang masuk
Route::get('/masuk', [BarangController::class, 'barangmasuk']);
Route::get('/masuk/tampil', [MasukController::class, 'masuktampil'])->name('masuk');
Route::post('/masuk/tambah', [MasukController::class, 'masuktambah']);
Route::get('/masuk/edit/{id}', [MasukController::class, 'masukedit']);
Route::get('/masuk/hapus/{id}', [MasukController::class, 'masukhapus']);

// Route to barang keluar
Route::get('/keluar', [BarangController::class, 'barangkeluar']);
Route::get('/keluar/tampil', [KeluarController::class, 'keluartampil'])->name('keluar');
Route::post('/keluar/tambah', [KeluarController::class, 'keluartambah']);
Route::get('/keluar/edit/{id}', [KeluarController::class, 'keluaredit']);
Route::get('/keluar/hapus/{id}', [KeluarController::class, 'keluarhapus']);

Auth::routes();