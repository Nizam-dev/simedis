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
        'user_id',
        'total',
        'amc',
        'verifikasi',
    ];

    public function Penanganan(){
    	return $this->hasMany(listRiwayatPenanganan::class)
        ->join("penanganans","list_riwayat_penanganans.penanganan_id","penanganans.id")
        ->select("penanganans.nama_penanganan", "list_riwayat_penanganans.*");
    }

    public function Produk(){
    	return $this->hasMany(listRiwayatProduk::class)
        ->join("produks","list_riwayat_produks.produk_id","produks.id")
        ->select("produks.nama_produk", "list_riwayat_produks.*");
    }
}
