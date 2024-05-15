<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KeluarModel;

use App\Models\BarangModel;

class KeluarController extends Controller
{
    //menampilkan data keluar
    public function keluartampil(){
        $datakeluar = KeluarModel::orderBy('id_keluar', 'asc')->paginate(10);
        $databarang = BarangModel::all();

        return view('keluar', ['datakeluar' => $datakeluar, 'databarang' => $databarang]);
    }

    //menambah data keluar
    public function keluartambah(Request $request){
        $this->validate($request, [
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        KeluarModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/keluar');
    }
}
