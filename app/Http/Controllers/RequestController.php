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

        return view('page/request', ['request' => $datarequest, 'barang' => $databarang]);
    }

    // menambah data request
    public function requesttambah(Request $request){
        // dd($request->all());
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required|integer',
            'status' => 'nullable|in:diminta,selesai'
        ]);

        $status = $request->status ?? 'diminta';

        RequestModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'status' => $status
        ]);
        
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    // mengubah status request
    public function requestStatusChange($id_request, Request $request){
        // dd($request->all());
        $request->validate([
            'status' => 'required|in:diminta,selesai'
        ]);

        $id_request = RequestModel::find($id_request);
        $id_request->status = $request->status;
        $id_request->save();

        return back()->with('success', 'Status berhasil diubah');
    }
}
