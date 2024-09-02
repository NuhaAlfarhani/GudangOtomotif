<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KeluarModel;

use App\Models\BarangModel;

class KeluarController extends Controller
{
    //menampilkan data keluar
    public function keluartampil(){
        $keluar = KeluarModel::paginate(10);
        $databarang = BarangModel::all();

        return view('page/keluar', ['keluar' => $keluar, 'barang' => $databarang]);
    }

    //menambah data keluar
    public function keluartambah(Request $request){
        dd($request->all());
        $request->validate( [
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        KeluarModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal
        ]);

        BarangModel::where('id', $request->id_barang)->decrement('stok', $request->jumlah);

        return redirect()->route('keluartampil')->with('success', 'Data berhasil ditambahkan');
    }
}
