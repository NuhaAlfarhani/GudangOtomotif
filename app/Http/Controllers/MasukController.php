<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MasukModel;

use App\Models\BarangModel;

class MasukController extends Controller
{
    //menampilkan data masuk
    public function masuktampil(){
        $datamasuk = MasukModel::orderBy('id_masuk', 'asc')->paginate(10);
        $databarang = BarangModel::all();

        return view('masuk', ['datamasuk' => $datamasuk, 'databarang' => $databarang]);
    }

    //menambah data masuk
    public function masuktambah(Request $request){
        $this->validate($request, [
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        MasukModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/masuk');
    }
}