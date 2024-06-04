<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KeluarModel;

use App\Models\BarangModel;

class KeluarController extends Controller
{
    //menampilkan data keluar
    public function keluartampil(){
        $keluar = KeluarModel::orderBy('id_keluar', 'asc')->paginate(10);

        return view('page/keluar', ['keluar' => $keluar]);
    }

    //menambah data keluar
    public function keluartambah(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        KeluarModel::create([
            'id' => $request->id,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal
        ]);

        BarangModel::where('id', $request->id)->decrement('stok', $request->jumlah);

        return redirect('/keluar');
    }
}
