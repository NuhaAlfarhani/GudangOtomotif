<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;

    protected $table = 'pinjam';

    public $incrementing = false;
    protected $primaryKey = 'pkb';
    protected $fillable = [
        'pkb',
        'daftar_barang',
        'alasan'
    ];
}
