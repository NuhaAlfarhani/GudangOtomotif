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

        BarangModel::where('id_barang', $request->id_barang)->increment('stok', $request->jumlah);
        
        return redirect()->route('masuktampil')->with('success', 'Data berhasil ditambahkan');
    }

    // mengedit data masuk
    public function masukedit($id, Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        $masuk = MasukModel::find($id);
        $oldJumlah = $masuk->jumlah;

        // Update the masuk record
        $masuk->id_barang = $request->id_barang;
        $masuk->jumlah = $request->jumlah;
        $masuk->tanggal = $request->tanggal;
        $masuk->save();

        // Calculate the difference and update the stock
        $difference = $request->jumlah - $oldJumlah;
        BarangModel::where('id_barang', $request->id_barang)->increment('stok', $difference);

        return redirect()->route('masuktampil')->with('success', 'Data berhasil diubah');
    }
    // public function masukedit($id_barang, Request $request)
    // {
    //     $request->validate([
    //         'id_barang' => 'required',
    //         'jumlah' => 'required',
    //         'tanggal' => 'required'
    //     ]);

    //     $id_barang = MasukModel::find($id_barang);
    //     $id_barang->jumlah = $request->jumlah;

    //     return redirect()->route('masuktampil')->with('success', 'Data berhasil diubah');
    // }
}