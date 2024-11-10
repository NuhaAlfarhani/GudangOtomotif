<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\BarangModel;

class BarangController extends Controller
{
    public function barangtampil()
    {
        $perPage = session('perPage', 10);
        $databarang = BarangModel::paginate($perPage);

        return view('/page/stok', ['barang' => $databarang]);
    }

    public function paginate(Request $request)
    {
        $request->validate([
            'perPage' => 'required|integer|min:1',
        ]);

        $request->session()->put('perPage', $request->input('perPage'));

        return back();
    }

    public function barangtambah(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama' => 'required',
            'stok' => 'nullable|integer',
            'deskripsi' => 'required',
            'kendaraan' => 'required',
        ]);

        $stok = $request->stok ?? 0;
        // dd($request->all());

        // duplikasi data
        if (BarangModel::where('id_barang', $request->id_barang)->exists()) {
            return redirect()->back()->withErrors(['id_barang' => 'Barang sudah ada.']);
        }
        
        BarangModel::create([
            'id_barang' => $request->id_barang,
            'nama' => $request->nama,
            'stok' => $stok,
            'deskripsi' => $request->deskripsi,
            'kendaraan' => $request->kendaraan,
        ]);


        return redirect()->route('barangtampil')->with('success', 'Data berhasil ditambahkan');
    }

    public function barangcari(Request $request)
    {
        $cari = $request->input('cari');
        $barang = BarangModel::where('nama', 'LIKE', "%{$cari}%")
        ->orWhere('id_barang', 'LIKE', "%{$cari}%")
        ->orWhere('kendaraan', 'LIKE', "%{$cari}%")
        ->paginate(10);

        return view('/page/stok', compact('barang'));
    }

    //Barang Edit
    public function barangedit($id_barang, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'nullable|integer',
            'deskripsi' => 'required',
            'kendaraan' => 'required',
        ]);

        $id_barang = BarangModel::find($id_barang);
        $id_barang->nama = $request->nama;
        $id_barang->stok = $request->stok ?? 0;
        $id_barang->deskripsi = $request->deskripsi;
        $id_barang->kendaraan = $request->kendaraan;

        $id_barang->save();

        return redirect()->route('barangtampil')->with('success', 'Data berhasil diubah');
    }

    //Barang Hapus
    public function baranghapus($id_barang)
    {
        $barang = BarangModel::find($id_barang);
        $barang->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    // export data barang
    public function barangexport(Request $request)
    {
        $barangData = BarangModel::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header row
        $sheet->setCellValue('A1', 'Nomor');
        $sheet->setCellValue('B1', 'Kode Barang');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Stock');
        $sheet->setCellValue('E1', 'Deskripsi lokasi');
        $sheet->setCellValue('F1', 'Jenis Kendaraan');

        // Populate the data rows
        $row = 2;
        foreach ($barangData as $index => $brg) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $brg['id_barang']);
            $sheet->setCellValue('C' . $row, $brg['nama']);
            $sheet->setCellValue('D' . $row, $brg['stok']);
            $sheet->setCellValue('E' . $row, $brg['deskripsi']);
            $sheet->setCellValue('F' . $row, $brg['kendaraan']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Stok_' . date('d-m-Y') . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($temp_file);

        return response()->download($temp_file, $filename)->deleteFileAfterSend(true);
    }
}
