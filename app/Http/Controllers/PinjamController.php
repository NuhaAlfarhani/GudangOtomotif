<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PinjamModel;

class PinjamController extends Controller
{
    public function pinjamtampil(){
        $datapinjam = PinjamModel::paginate(10);

        return view('page/pinjam', ['pinjam' => $datapinjam]);
    }
    
    public function pinjamtambah(Request $request){
        $request->validate([
            'PKB' => 'required',
            'tanggal' => 'required',
            'daftar_barang' => 'required',
            'alasan' => 'required'
        ]);
        
        // $this->validate($request, [
        //     'PKB' => 'required',
        //     'tanggal' => 'required',
        //     'daftar_barang' => 'required',
        //     'alasan' => 'required'
        // ]);

        PinjamModel::create([
            'PKB' => $request->PKB,
            'tanggal' => $request->tanggal,
            'daftar_barang' => $request->daftar_barang,
            'alasan' => $request->alasan
        ]);

        return redirect()->route('pinjamtampil')->with('success', 'Data berhasil ditambahkan');
    }
}
