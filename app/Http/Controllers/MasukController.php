<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasukModel;
use App\Models\BarangModel;

class MasukController extends Controller
{
    //menampilkan data masuk
    public function masuktampil(){
        $perPage = session('perPage', 10);
        $datamasuk = MasukModel::paginate($perPage);
        $databarang = BarangModel::all();
        $barangList = BarangModel::all();

        return view('page/masuk', ['masuk' => $datamasuk, 'barang' => $databarang], compact('barangList'));
    }

    //menambah data masuk
    public function masuktambah(Request $request){
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
            'PKB' => 'required'
        ]);
        
        MasukModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
        ]);

        BarangModel::where('id_barang', $request->id_barang)->increment('stok', $request->jumlah);
        
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    // menghapus data masuk
    public function masukhapus($id_masuk){
        $masuk = MasukModel::find($id_masuk);
        
        // kurangi stok barang
        BarangModel::where('id_barang', $masuk->id_barang)->decrement('stok', $masuk->jumlah);
        
        $masuk->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    //search data barang masuk
    public function masukcari(Request $request)
    {
        $cari = $request->input('masukcari');
        
        $masuk = MasukModel::whereHas('barang', function($query) use ($cari) {
                $query->where('nama', 'LIKE', "%{$cari}%")
                      ->orWhere('id_barang', 'LIKE', "%{$cari}%");
            })
            ->paginate(10);

        return view('page/masuk', compact('masuk'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $masuk = MasukModel::where('name', 'like', '%' . $search . '%')
        ->get();
        return response()->json($masuk);
    }
}