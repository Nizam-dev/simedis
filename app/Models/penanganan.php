<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class penanganan extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'kode',
        'nama_penanganan',
        'harga',
        'status',
        'foto',
        'amc'
    ];

    protected $dates = ['deleted_at'];

    public function riwayatpenanganan(){
    	return $this->hasMany(listRiwayatPenanganan::class);
    }
    
}
