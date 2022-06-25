<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_pelayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'keluhan',
        'diagnosa',
        'pasien_id',
        'produk_id',
        'penanganan_id',
        'user_id',
        'total',
        'pembayaran',
        'amc'
    ];
}
