<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index(){
        $databarang = BarangModel::orderBy('id', 'asc')->paginate(10);

        return view('index', ['barang' => $databarang]);
    }

    public function barangtambah(Request $request){
        $request->validate( [
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'kendaraan' => 'required',
        ]);
        // dd($request->all());
        
        BarangModel::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'kendaraan' => $request->kendaraan,
        ]);

        return redirect()->route('index')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function barangmasuk(){
        $databarang = BarangModel::orderBy('id', 'asc')->paginate(10);

        return view('page/masuk', ['barang' => $databarang]);
    }

    public function barangkeluar(){
        $databarang = BarangModel::orderBy('id', 'asc')->paginate(10);

        return view('page/keluar', ['barang' => $databarang]);
    }

    public function barangrequest(){
        $databarang = BarangModel::orderBy('id', 'asc')->paginate(10);

        return view('page/request', ['barang' => $databarang]);
    }
}
