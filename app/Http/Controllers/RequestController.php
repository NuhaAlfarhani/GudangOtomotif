<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RequestModel;

use App\Models\BarangModel;

class RequestController extends Controller
{
    // menampilkan data request
    public function requesttampil(){
        $datarequest = RequestModel::paginate(10);
        $databarang = BarangModel::all();

        return view('page/request', ['req' => $datarequest, 'barang' => $databarang]);
    }

    // menambah data request
    public function requesttambah(Request $request){
        $this->validate($request, [
            'id_barang' => 'required',
            'jumlah' => 'required'
        ]);

        RequestModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);
        
        return redirect()->route('requesttampil')->with('success', 'Data berhasil ditambahkan');
    }
}
