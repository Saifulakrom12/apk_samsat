<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'gudang',
        'ruangan',
        'nama_barang',
        'jenis_barang',
        'kode_barang',
        'register',
        'kondisi_barang',
        'lokasi',
        'harga_barang',
        'image',
        'qr',

    ];
}
