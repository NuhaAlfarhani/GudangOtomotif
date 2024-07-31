<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index(){
        $databarang = BarangModel::orderBy('id_barang', 'asc')->paginate(10);

        return view('index', ['barang' => $databarang]);
    }
    
    public function barangmasuk(){
        $databarang = BarangModel::orderBy('id_barang', 'asc')->paginate(10);

        return view('page/masuk', ['barang' => $databarang]);
    }

    public function barangkeluar(){
        $databarang = BarangModel::orderBy('id_barang', 'asc')->paginate(10);

        return view('page/keluar', ['barang' => $databarang]);
    }

    public function barangrequest(){
        $databarang = BarangModel::orderBy('id_barang', 'asc')->paginate(10);

        return view('page/request', ['barang' => $databarang]);
    }
}
