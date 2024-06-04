<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BarangModel;

class BarangController extends Controller
{
    //menampilkan data barang
    public function barangtampil(){
        $databarang = BarangModel::orderBy('id_barang', 'asc')->paginate(10);

        return view('page/masuk', ['barang' => $databarang]);
    }
}
