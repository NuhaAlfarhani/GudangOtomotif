<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeluarModel;
use App\Models\BarangModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KeluarController extends Controller
{
    //menampilkan data keluar
    public function keluartampil(){
        $perPage = session('perPage', 10);
        $keluar = KeluarModel::paginate($perPage);
        $databarang = BarangModel::all();

        return view('page/keluar', ['keluar' => $keluar, 'barang' => $databarang]);
    }

    //menambah data keluar
    public function keluartambah(Request $request){
        $request->validate([
            'PKB' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required'
        ]);

        KeluarModel::create([
            'PKB' => $request->PKB,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);

        BarangModel::where('id_barang', $request->id_barang)->decrement('stok', $request->jumlah);

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    //hapus data keluar
    public function keluarhapus($id_keluar){
        $keluar = KeluarModel::find($id_keluar);
        
        // tambah stok barang
        BarangModel::where('id_barang', $keluar->id_barang)->increment('stok', $keluar->jumlah);

        $keluar->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    //search data barang keluar
    public function keluarcari(Request $request)
    {
        $cari = $request->input('keluarcari');
        $databarang = BarangModel::all();
        $keluar = KeluarModel::whereHas('barang', function($query) use ($cari) {
                $query->where('nama', 'LIKE', "%{$cari}%")
                      ->orWhere('id_barang', 'LIKE', "%{$cari}%");
            })
            ->orWhere('PKB', 'LIKE', "%{$cari}%")
            ->paginate(10);
        // dd($keluar);

        return view('page/keluar', compact('keluar'), ['barang' => $databarang]);
    }

    // export data keluar
    public function keluarexport(Request $request)
    {
        $barangData = KeluarModel::with('barang')->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nomor');
        $sheet->setCellValue('B1', 'PKB');
        $sheet->setCellValue('C1', 'Kode Barang');
        $sheet->setCellValue('D1', 'Nama Barang');
        $sheet->setCellValue('E1', 'Jumlah');
        $sheet->setCellValue('F1', 'Jenis Kendaraan');
        $sheet->setCellValue('G1', 'Tanggal Keluar');

        $row = 2;
        foreach($barangData as $index => $brg){
            $sheet->setCellValue('A'.$row, $index + 1);
            $sheet->setCellValue('B'.$row, $brg->PKB);
            $sheet->setCellValue('C'.$row, $brg->barang->id_barang);
            $sheet->setCellValue('D'.$row, $brg->barang->nama);
            $sheet->setCellValue('E'.$row, $brg->jumlah);
            $sheet->setCellValue('F'.$row, $brg->barang->kendaraan);
            $sheet->setCellValue('G'.$row, $brg->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Barang Keluar_' . date('d-m-Y') . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($temp_file);

        return response()->download($temp_file, $filename)->deleteFileAfterSend(true);
    }
}
