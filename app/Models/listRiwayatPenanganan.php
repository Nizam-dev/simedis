<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listRiwayatPenanganan extends Model
{
    use HasFactory;
    protected $fillable = [
        'riwayat_pelayanan_id',
        'penanganan_id'
    ];
}
