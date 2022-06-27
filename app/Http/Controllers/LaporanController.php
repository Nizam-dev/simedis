<?php

namespace App\Http\Controllers;
use App\Models\riwayat_pelayanan;


use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = riwayat_pelayanan::join('pasiens','pasiens.id','riwayat_pelayanans.pasien_id')
        ->join('users','users.id','riwayat_pelayanans.user_id')
        ->select('riwayat_pelayanans.*','pasiens.nama as nama_pasien','users.nama as dokter')
        ->with("Produk")
        ->with("Penanganan")
        ->get();
        return view('pages.laporan',compact('laporans'));
    }
}
