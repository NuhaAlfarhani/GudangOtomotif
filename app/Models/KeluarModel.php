<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluarModel extends Model
{
    use HasFactory;

    protected $table = 'keluar';

    protected $primaryKey = 'id_keluar';

    protected $fillable = [
        'PKB',
        'id_barang',
        'jumlah'
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
