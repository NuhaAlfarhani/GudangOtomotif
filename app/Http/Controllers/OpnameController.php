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
        $barangData = json_decode($request->input('opnameexport'), true);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header row
        $sheet->setCellValue('A1', 'Nomor');
        $sheet->setCellValue('B1', 'Kode Barang');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Stock Fisik');
        $sheet->setCellValue('E1', 'Stock Sistem');
        $sheet->setCellValue('F1', 'Deskripsi Lokasi');
        $sheet->setCellValue('G1', 'Jenis Kendaraan');
        $sheet->setCellValue('H1', 'Selisih');

        // Populate the data rows
        $row = 2;
        foreach ($barangData as $index => $brg) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $brg['id_barang']);
            $sheet->setCellValue('C' . $row, $brg['nama']);
            $sheet->setCellValue('D' . $row, $brg['stok']);
            $sheet->setCellValue('E' . $row, $brg['stok_sistem']);
            $sheet->setCellValue('F' . $row, $brg['deskripsi']);
            $sheet->setCellValue('G' . $row, $brg['kendaraan']);
            $sheet->setCellValue('H' . $row, $brg['stok'] - $brg['stok_sistem']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Opname_' . date('d-m-Y') . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}