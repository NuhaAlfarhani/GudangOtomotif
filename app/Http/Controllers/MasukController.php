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

        return view('masuk', ['masuk' => $datamasuk, 'databarang' => $databarang]);
    }

    //menambah data masuk
    public function masuktambah(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        MasukModel::create([
            'id' => $request->id,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal
        ]);

        BarangModel::where('id', $request->id)->increment('stok', $request->jumlah);
        
        return redirect('/masuk');
    }
}