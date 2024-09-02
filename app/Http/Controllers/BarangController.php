<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BarangModel;

class BarangController extends Controller
{
    public function barangtampil(){
        $databarang = BarangModel::paginate(10);

        return view('index', ['barang' => $databarang]);
    }

    public function barangtambah(Request $request){
        $request->validate( [
            'nama' => 'required',
            'stok' => 'nullable|integer',
            'deskripsi' => 'required',
            'kendaraan' => 'required',
        ]);
        
        $stok = $request->stok ?? 0;
        // dd($request->all());
        
        BarangModel::create([
            'nama' => $request->nama,
            'stok' => $stok,
            'deskripsi' => $request->deskripsi,
            'kendaraan' => $request->kendaraan,
        ]);

        return redirect()->route('barangtampil')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function barangcari(Request $request){
        $cari = $request->get('cari');
        $databarang = BarangModel::where('nama', 'like', "%{$cari}%")
        ->orWhere('id', 'like', "%{$cari}%")
        ->get(['id', 'nama', 'stok', 'deskripsi', 'kendaraan']);

        return response()->json($databarang);
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
