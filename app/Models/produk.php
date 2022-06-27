<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class produk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'kode',
        'nama_produk',
        'harga',
        'status',
        'stok',
        'foto',
        'amc'
    ];

    protected $dates = ['deleted_at'];

    public function riwayatproduk(){
    	return $this->hasMany(listRiwayatProduk::class);
    }
}
