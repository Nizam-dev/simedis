<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'nama',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'amc',
    ];
}
