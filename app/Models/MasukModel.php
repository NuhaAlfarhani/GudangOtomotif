<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukModel extends Model
{
    use HasFactory;

    protected $table = 'masuk';

    protected $primaryKey = 'id_masuk';

    protected $fillable = [
        'id_barang',
        'jumlah',
        'PKB'
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
    
    public function search($query, $search)
    {
        return $query->join('barang', 'masuk.id_barang', '=', 'barang.id_barang')
            ->where('masuk.id_barang', 'like', '%' . $search . '%')
            ->orWhere('barang.nama_barang', 'like', '%' . $search . '%')
            ->select('masuk.*'); // Ensure only columns from 'masuk' are selected
    }
}
