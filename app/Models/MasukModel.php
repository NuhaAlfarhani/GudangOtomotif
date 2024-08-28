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
        'tanggal'
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id');
    }
}
