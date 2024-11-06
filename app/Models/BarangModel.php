<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'id_barang',
        'nama',
        'stok',
        'deskripsi',
        'kendaraan'
    ];

    public function masuk()
    {
        return $this->hasMany(MasukModel::class, 'id_barang', 'id_barang');
    }                           
}
