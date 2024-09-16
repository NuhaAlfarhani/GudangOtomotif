<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BarangModel;

class BarangController extends Controller
{
    public function barangtampil()
    {
        $perPage = session('perPage', 10);
        $databarang = BarangModel::paginate($perPage);

        return view('/page/stok', ['barang' => $databarang]);
    }

    public function paginate(Request $request)
    {
        $request->validate([
            'perPage' => 'required|integer|min:1',
        ]);

        $request->session()->put('perPage', $request->input('perPage'));

        return back();
    }

    public function barangtambah(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama' => 'required',
            'stok' => 'nullable|integer',
            'deskripsi' => 'required',
            'kendaraan' => 'required',
        ]);

        $stok = $request->stok ?? 0;
        // dd($request->all());

        // duplikasi data
        if (BarangModel::where('id_barang', $request->id_barang)->exists()) {
            return redirect()->back()->withErrors(['id_barang' => 'Barang sudah ada.']);
        }
        
        BarangModel::create([
            'id_barang' => $request->id_barang,
            'nama' => $request->nama,
            'stok' => $stok,
            'deskripsi' => $request->deskripsi,
            'kendaraan' => $request->kendaraan,
        ]);


        return redirect()->route('barangtampil')->with('success', 'Data berhasil ditambahkan');
    }

    public function barangcari(Request $request)
    {
        $cari = $request->input('cari');
        $barang = BarangModel::where('nama', 'LIKE', "%{$cari}%")
        ->orWhere('id_barang', 'LIKE', "%{$cari}%")
        ->orWhere('kendaraan', 'LIKE', "%{$cari}%")
        ->paginate(10);

        return view('/page/stok', compact('barang'));
    }

    //Barang Edit
    public function barangedit($id_barang, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'nullable|integer',
            'deskripsi' => 'required',
            'kendaraan' => 'required',
        ]);

        $id_barang = BarangModel::find($id_barang);
        $id_barang->nama = $request->nama;
        $id_barang->stok = $request->stok ?? 0;
        $id_barang->deskripsi = $request->deskripsi;
        $id_barang->kendaraan = $request->kendaraan;

        $id_barang->save();

        return redirect()->route('barangtampil')->with('success', 'Data berhasil diubah');
    }

    //Barang Hapus
    public function baranghapus($id_barang)
    {
        $barang = BarangModel::find($id_barang);
        $barang->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
