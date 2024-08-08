<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PinjamModel;

class PinjamController extends Controller
{
    public function pinjamtampil(){
        $datapinjam = PinjamModel::orderBy('id_pinjam', 'asc')->paginate(10);

        return view('pinjam', ['datapinjam' => $datapinjam]);
    }
    
    public function pinjamtambah(Request $request){
        $this->validate($request, [
            'PKB' => 'required',
            'tanggal' => 'required',
            'daftar_barang' => 'required',
            'alasan' => 'required'
        ]);

        PinjamModel::create([
            'PKB' => $request->PKB,
            'tanggal' => $request->tanggal,
            'daftar_barang' => $request->daftar_barang,
            'alasan' => $request->alasan
        ]);
        
        return redirect('/pinjam');
    }
}
