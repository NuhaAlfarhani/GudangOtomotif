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
        // dd($request->all());
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

    // edit data keluar
    public function keluaredit($id_keluar, Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        $id_keluar = KeluarModel::find($id_keluar);
        $id_keluar->id_barang = $request->id_barang;
        $id_keluar->jumlah = $request->jumlah;
        $id_keluar->tanggal = $request->tanggal;
        
        // KeluarModel::where('id', $id)->update([
        //     'id_barang' => $request->id_barang,
        //     'jumlah' => $request->jumlah,
        //     'tanggal' => $request->tanggal
        // ]);

        return redirect()->route('keluartampil')->with('success', 'Data berhasil diubah');
    }

    //hapus data keluar
    public function keluarhapus($id_keluar){
        $keluar = KeluarModel::find($id_keluar);
        $keluar->delete();

        return redirect()->route('keluartampil')->with('success', 'Data berhasil dihapus');
    }
}
