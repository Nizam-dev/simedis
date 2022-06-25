<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penanganan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama_penanganan',
        'harga',
        'status',
        'foto',
        'amc'
    ];

    
}
