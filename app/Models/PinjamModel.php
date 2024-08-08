<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;

    protected $table = 'pinjam';
    protected $primaryKey = 'PKB';
    protected $fillable = [
        'PKB',
        'tanggal',
        'daftar_barang',
        'alasan'
    ];
}
