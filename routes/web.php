<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Route to login
Route::get('/login', function() {
    return view('login');
});

// Route to barang
Route::get('/', [BarangController::class, 'index'])->name('index');
Route::post('/tambah', [BarangController::class, 'barangtambah'])->name('tambah');


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

// Route to Pinjam
Route::get('/pinjam/tampil', [PinjamController::class, 'pinjamtampil']);
Route::post('/pinjam/tambah', [PinjamController::class, 'pinjamtambah']);

// Route to Request
Route::get('/request', [BarangController::class, 'barangrequest']);
Route::get('/request/tampil', [RequestController::class, 'requesttampil'])->name('request');
Route::post('/request/tambah', [RequestController::class, 'requesttambah']);
Route::get('/request/edit/{id}', [RequestController::class, 'requestedit']);
Route::get('/request/hapus/{id}', [RequestController::class, 'requesthapus']);

// Route to Pinjam
Route::get('/pinjam', function() {
    return view('page/pinjam');
});

Auth::routes();