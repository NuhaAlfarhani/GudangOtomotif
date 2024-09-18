<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PinjamModel;

class PinjamController extends Controller
{
    public function pinjamtampil(){
        $datapinjam = PinjamModel::paginate(10);
        // return $datapinjam;

        return view('page/pinjam', ['pinjam' => $datapinjam]);
    }
    
    public function pinjamtambah(Request $request){
        // dd($request->all());
        $request->validate([
            'pkb' => 'required',
            'daftar_barang' => 'required',
            'alasan' => 'required'
        ]);

        PinjamModel::create([
            'pkb' => $request->pkb,
            'daftar_barang' => $request->daftar_barang,
            'alasan' => $request->alasan
        ]);

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function pinjamhapus($pkb){
        $pinjam = PinjamModel::find($pkb);
        $pinjam->delete();
        // dd($pkb);
        
        return back()->with('success', 'Data berhasil dihapus');
    }
}
