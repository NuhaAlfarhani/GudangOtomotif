<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

class OpnameController extends Controller
{
    public function opnametampil()
    {
        $perPage = session('perPage', 10);

        $databarang = BarangModel::all();
        $databarang = BarangModel::paginate($perPage);

        foreach ($databarang as $barang) {
            DB::table('opname')->updateOrInsert(
                ['id_barang' => $barang->id_barang],
                [
                    'nama' => $barang->nama,
                    'stok' => $barang->stok,
                    'deskripsi' => $barang->deskripsi,
                    'kendaraan' => $barang->kendaraan,
                    'updated_at' => now()
                ]
            );
        }

        return view('page/opname', ['barang' => $databarang]);
    }

    public function opnameCalculate(Request $request)
    {
        $stokSistem = $request->input('stok_sistem', []);
        $barang = BarangModel::all();

        foreach ($barang as $brg) {
            if (isset($stokSistem[$brg->id_barang])) {
                $brg->stok_sistem = $stokSistem[$brg->id_barang];
                $brg->selisih = $brg->stok - $brg->stok_sistem;
                $brg->save();
            }
        }

        return redirect()->route('opnametampil');
    }

    public function paginate(Request $request)
    {
        $request->validate([
            'perPage' => 'required|integer|min:1',
        ]);

        $request->session()->put('perPage', $request->input('perPage'));

        return back();
    }
    
    public function export(Request $request)
    {
        $data = $request->input('data');
        if (!$data) {
            return back()->withErrors(['data' => 'No data provided for export.']);
        }

        $barang = json_decode($data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['data' => 'Invalid data format.']);
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the column headings
        $sheet->setCellValue('A1', 'Nomor');
        $sheet->setCellValue('B1', 'Kode Barang');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Quantity Stock');
        $sheet->setCellValue('E1', 'Deskripsi Lokasi');
        $sheet->setCellValue('F1', 'Jenis Kendaraan');

        // Populate the data
        $row = 2;
        foreach ($barang as $index => $brg) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $brg['id_barang']);
            $sheet->setCellValue('C' . $row, $brg['nama']);
            $sheet->setCellValue('D' . $row, $brg['stok']);
            $sheet->setCellValue('E' . $row, $brg['deskripsi']);
            $sheet->setCellValue('F' . $row, $brg['kendaraan']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Opname_' . date('Y-m-d') . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        // Delete the data after downloading the file
        $request->session()->forget('data');

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}