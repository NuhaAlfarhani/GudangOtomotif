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

// Route to home
Route::get('/', function() {
    return view('index');
});

// Route to barang
Route::get('/stok', [BarangController::class, 'barangtampil'])->name('barangtampil');
Route::post('/stok/tambah', [BarangController::class, 'barangtambah'])->name('barangtambah');
Route::get('/stok/cari', [BarangController::class, 'barangcari'])->name('cari');
Route::put('/stok/edit/{id}', [BarangController::class, 'barangedit'])->name('barangedit');
// Route::post('/stok/update/{id}', [BarangController::class, 'barangupdate'])->name('barangupdate');
Route::get('/stok/hapus/{id}', [BarangController::class, 'baranghapus']);


// Route to barang masuk
Route::get('/masuk', [BarangController::class, 'barangmasuk']);
Route::get('/masuk/tampil', [MasukController::class, 'masuktampil'])->name('masuktampil');
Route::post('/masuk/tambah', [MasukController::class, 'masuktambah'])->name('masuktambah');
// Route::get('/masuk/edit/{id}', [MasukController::class, 'masukedit']);
// Route::get('/masuk/hapus/{id}', [MasukController::class, 'masukhapus']);

// Route to barang keluar
Route::get('/keluar', [BarangController::class, 'barangkeluar']);
Route::get('/keluar/tampil', [KeluarController::class, 'keluartampil'])->name('keluartampil');
Route::post('/keluar/tambah', [KeluarController::class, 'keluartambah'])->name('keluartambah');
// Route::get('/keluar/edit/{id}', [KeluarController::class, 'keluaredit']);
// Route::get('/keluar/hapus/{id}', [KeluarController::class, 'keluarhapus']);

// Route to Pinjam
Route::get('/pinjam', function () { return view('page/pinjam'); });
Route::get('/pinjam/tampil', [PinjamController::class, 'pinjamtampil'])->name('pinjamtampil');
Route::post('/pinjam/tambah', [PinjamController::class, 'pinjamtambah'])->name('pinjamtambah');

// Route to Request
Route::get('/request', [BarangController::class, 'barangrequest']);
Route::get('/request/tampil', [RequestController::class, 'requesttampil'])->name('requesttampil');
Route::post('/request/tambah', [RequestController::class, 'requesttambah'])->name('requesttambah');
// Route::get('/request/edit/{id}', [RequestController::class, 'requestedit']);
// Route::get('/request/hapus/{id}', [RequestController::class, 'requesthapus']);

Auth::routes();