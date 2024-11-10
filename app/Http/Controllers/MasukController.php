<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasukModel;
use App\Models\BarangModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MasukController extends Controller
{
    //menampilkan data masuk
    public function masuktampil(){
        $perPage = session('perPage', 10);
        $datamasuk = MasukModel::paginate($perPage);
        $databarang = BarangModel::all();
        $barangList = BarangModel::all();

        return view('page/masuk', ['masuk' => $datamasuk, 'barang' => $databarang], compact('barangList'));
    }

    //menambah data masuk
    public function masuktambah(Request $request){
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required'
        ]);
        
        MasukModel::create([
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
        ]);

        BarangModel::where('id_barang', $request->id_barang)->increment('stok', $request->jumlah);
        
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    // menghapus data masuk
    public function masukhapus($id_masuk){
        $masuk = MasukModel::find($id_masuk);
        
        // kurangi stok barang
        BarangModel::where('id_barang', $masuk->id_barang)->decrement('stok', $masuk->jumlah);
        
        $masuk->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    //search data barang masuk
    public function masukcari(Request $request)
    {
        $cari = $request->input('masukcari');
        $databarang = BarangModel::all();
        $masuk = MasukModel::whereHas('barang', function($query) use ($cari) {
                $query->where('nama', 'LIKE', "%{$cari}%")
                      ->orWhere('id_barang', 'LIKE', "%{$cari}%");
            })
            ->paginate(10);

        return view('page/masuk', compact('masuk'), ['barang' => $databarang]);
    }

    // export data masuk
    public function masukexport(Request $request)
    {
        $barangData = MasukModel::with('barang')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header row
        $sheet->setCellValue('A1', 'Nomor');
        $sheet->setCellValue('B1', 'Kode Barang');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Jenis Kendaraan');
        $sheet->setCellValue('F1', 'Tanggal');

        // Populate the data rows
        $row = 2;
        foreach ($barangData as $index => $brg) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $brg->id_barang);
            $sheet->setCellValue('C' . $row, $brg->barang->nama);
            $sheet->setCellValue('D' . $row, $brg->jumlah);
            $sheet->setCellValue('E' . $row, $brg->barang->kendaraan);
            $sheet->setCellValue('F' . $row, $brg->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Barang Masuk_' . date('d-m-Y') . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}