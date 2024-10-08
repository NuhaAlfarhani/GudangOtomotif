<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    use HasFactory;

    protected $table = 'request';

    protected $primaryKey = 'id_request';

    protected $fillable = [
        'id_barang',
        'jumlah',
        'status'
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
