<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeluarModel;
use App\Models\BarangModel;
use Carbon\Carbon;

class KeluarController extends Controller
{
    //menampilkan data keluar
    public function keluartampil(){
        $perPage = session('perPage', 10);
        $keluar = KeluarModel::paginate($perPage);
        $databarang = BarangModel::all();

        return view('page/keluar', ['keluar' => $keluar, 'barang' => $databarang]);
    }

    //menambah data keluar
    public function keluartambah(Request $request){
        $request->validate([
            'PKB' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required'
        ]);

        KeluarModel::create([
            'PKB' => $request->PKB,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);

        BarangModel::where('id_barang', $request->id_barang)->decrement('stok', $request->jumlah);

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    //hapus data keluar
    public function keluarhapus($id_keluar){
        $keluar = KeluarModel::find($id_keluar);
        
        // tambah stok barang
        BarangModel::where('id_barang', $keluar->id_barang)->increment('stok', $keluar->jumlah);

        $keluar->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    //search data barang keluar
    public function keluarcari(Request $request)
    {
        $cari = $request->input('keluarcari');
        $databarang = BarangModel::all();
        $keluar = KeluarModel::whereHas('barang', function($query) use ($cari) {
                $query->where('nama', 'LIKE', "%{$cari}%")
                      ->orWhere('id_barang', 'LIKE', "%{$cari}%");
            })
            ->orWhere('PKB', 'LIKE', "%{$cari}%")
            ->paginate(10);
        // dd($keluar);

        return view('page/keluar', compact('keluar'), ['barang' => $databarang]);
    }
}
