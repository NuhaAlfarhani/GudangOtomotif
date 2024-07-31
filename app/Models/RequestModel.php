<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $primaryKey = 'id_request';

    protected $fillable = [
        'id_barang',
        'nama',
        'jumlah'
    ];

    public function barang()
    {
        return $this
        ->belongsTo(BarangModel::class, 'id_barang', 'id')
        ->belongsTo(BarangModel::class, 'nama', 'nama');
    }
}
