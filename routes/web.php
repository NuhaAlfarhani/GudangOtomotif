<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route to index
Route::get('/', function () {
    return view('index');
});

// Route to Login
Route::get('/login', function () {
    return view('auth/login');
})->name('login');

// Group routes that require authentication
Route::group(['middleware'=>'auth'],function () {
    // Route to home
    Route::get('/home', function() {
        return view('home');
    });
    // Route to barang
    Route::prefix('stok')->group(function () {
        Route::get('/', [BarangController::class, 'barangtampil'])->name('barangtampil');
        Route::post('/tambah', [BarangController::class, 'barangtambah'])->name('barangtambah');
        Route::get('/cari', [BarangController::class, 'barangcari'])->name('cari');
        Route::put('/edit/{id}', [BarangController::class, 'barangedit'])->name('barangedit');
        Route::delete('/hapus/{id}', [BarangController::class, 'baranghapus'])->name('baranghapus');
        Route::post('/paginate', [BarangController::class, 'paginate'])->name('paginate');
        Route::post('/barangexport', [BarangController::class, 'barangexport'])->name('barangexport');
    });

    // Route to opname
    Route::prefix('opname')->group(function () {
        Route::get('/', [OpnameController::class, 'opnametampil'])->name('opnametampil');
        Route::post('/opnameexport', [OpnameController::class, 'export'])->name('opnameexport');
    });

    // Route to barang masuk
    Route::prefix('masuk')->group(function () {
        Route::get('/', [BarangController::class, 'barangmasuk']);
        Route::get('/tampil', [MasukController::class, 'masuktampil'])->name('masuktampil');
        Route::post('/tambah', [MasukController::class, 'masuktambah'])->name('masuktambah');
        Route::delete('/hapus/{id_masuk}', [MasukController::class, 'masukhapus'])->name('masukhapus');
        Route::get('/cari', [MasukController::class, 'masukcari'])->name('masukcari');
        Route::post('/masukexport', [MasukController::class, 'masukexport'])->name('masukexport');
    });

    // Route to barang keluar
    Route::prefix('keluar')->group(function () {
        Route::get('/', [BarangController::class, 'barangkeluar']);
        Route::get('/tampil', [KeluarController::class, 'keluartampil'])->name('keluartampil');
        Route::post('/tambah', [KeluarController::class, 'keluartambah'])->name('keluartambah');
        Route::delete('/hapus/{id_keluar}', [KeluarController::class, 'keluarhapus'])->name('keluarhapus');
        Route::get('/cari', [KeluarController::class, 'keluarcari'])->name('keluarcari');
        Route::post('/keluarexport', [KeluarController::class, 'keluarexport'])->name('keluarexport');
    });

    // Route to Pinjam
    Route::prefix('pinjam')->group(function () {
        Route::get('/', function () { return view('page/pinjam'); });
        Route::get('/tampil', [PinjamController::class, 'pinjamtampil'])->name('pinjamtampil');
        Route::post('/tambah', [PinjamController::class, 'pinjamtambah'])->name('pinjamtambah');
        Route::delete('/hapus/{pkb}', [PinjamController::class, 'pinjamhapus'])->name('pinjamhapus');
    });

    // Route to Request
    Route::prefix('request')->group(function () {
        Route::get('/', [RequestController::class, 'requesttampil']);
        Route::get('/tampil', [RequestController::class, 'requesttampil'])->name('requesttampil');
        Route::post('/tambah', [RequestController::class, 'requesttambah'])->name('requesttambah');
        Route::put('/status/{id}', [RequestController::class, 'requestStatusChange'])->name('requestStatusChange');
    });

    // Route to help
    Route::get('/help', function () {
        return view('page/help');
    });

    // Route to about
    Route::get('/about', function () {
        return view('page/about');
    });
});

Auth::routes();
