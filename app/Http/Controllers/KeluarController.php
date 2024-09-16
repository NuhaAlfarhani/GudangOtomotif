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
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required|date_format:d / m / Y H:i'
        ]);

        // Convert the date format
        $tanggal = Carbon::createFromFormat('d / m / Y H:i', $request->tanggal, 'Asia/Jakarta')->setTimezone('UTC')->format('Y-m-d H:i:s');

        KeluarModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'tanggal' => $tanggal
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
}
