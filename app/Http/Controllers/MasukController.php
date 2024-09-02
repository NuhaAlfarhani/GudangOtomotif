<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MasukModel;

use App\Models\BarangModel;

class MasukController extends Controller
{
    //menampilkan data masuk
    public function masuktampil(){
        $datamasuk = MasukModel::paginate(10);
        $databarang = BarangModel::all();

        return view('page/masuk', ['masuk' => $datamasuk, 'barang' => $databarang]);
    }

    //menambah data masuk
    public function masuktambah(Request $request){
        // dd($request->all());
        $request->validate( [
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);
        
        MasukModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal
        ]);

        BarangModel::where('id', $request->id_barang)->increment('stok', $request->jumlah);
        
        return redirect()->route('masuktampil')->with('success', 'Data berhasil ditambahkan');
    }
}