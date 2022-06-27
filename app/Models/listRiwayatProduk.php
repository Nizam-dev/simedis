<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listRiwayatProduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'riwayat_pelayanan_id',
        'produk_id'
    ];
    
}
