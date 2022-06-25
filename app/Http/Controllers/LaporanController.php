<?php

namespace App\Http\Controllers;
use App\Models\riwayat_pelayanan;


use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = riwayat_pelayanan::join('pasiens','pasiens.id','riwayat_pelayanans.pasien_id')
        ->join('produks','produks.id','riwayat_pelayanans.produk_id')
        ->join('penanganans','penanganans.id','riwayat_pelayanans.penanganan_id')
        ->join('users','users.id','riwayat_pelayanans.user_id')
        ->select('riwayat_pelayanans.*','pasiens.nama as nama_pasien','produks.nama_produk','penanganans.nama_penanganan','users.nama as dokter')
        ->get();
        return view('pages.laporan',compact('laporans'));
    }
}
