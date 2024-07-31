<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RequestModel;

use App\Models\BarangModel;

class RequestController extends Controller
{
    // menampilkan data request
    public function requesttampil(){
        $datarequest = RequestModel::orderBy('id_request', 'asc')->paginate(10);
        $databarang = BarangModel::all();

        return view('request', ['datarequest' => $datarequest, 'databarang' => $databarang]);
    }

    // menambah data request
    public function requesttambah(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'jumlah' => 'required'
        ]);

        RequestModel::create([
            'id' => $request->id,
            'jumlah' => $request->jumlah
        ]);

        BarangModel::where('id', $request->id)->decrement('stok', $request->jumlah);
        
        return redirect('/request');
    }
}
