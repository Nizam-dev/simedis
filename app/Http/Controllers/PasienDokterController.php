<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\riwayat_pelayanan;

class PasienDokterController extends Controller
{
    public function index()
    {
        $pasiens = riwayat_pelayanan::join('pasiens','pasiens.id','riwayat_pelayanans.pasien_id')
        ->join('users','users.id','riwayat_pelayanans.user_id')
        ->where("riwayat_pelayanans.user_id",auth()->user()->id)
        ->where("diagnosa",null)
        ->select('riwayat_pelayanans.*','pasiens.nama as nama_pasien','users.nama as dokter')
        ->with("Produk")
        ->with("Penanganan")
        ->get();
        return view('pages.pasiendokter',compact('pasiens'));
    }

     
    public function update(Request $request, $id)
    {
        riwayat_pelayanan::find($id)->update([
            "keluhan"=>$request->keluhan,
            "diagnosa"=>$request->diagnosa
        ]);
        return redirect()->back()->with('sukses','Pasien Berhasil Ditangani');
    }

    public function pasien_sudah_ditangani()
    {
        $pasiens = riwayat_pelayanan::join('pasiens','pasiens.id','riwayat_pelayanans.pasien_id')
        ->join('users','users.id','riwayat_pelayanans.user_id')
        ->where("riwayat_pelayanans.user_id",auth()->user()->id)
        ->where("diagnosa","!=",null)
        ->select('riwayat_pelayanans.*','pasiens.nama as nama_pasien','users.nama as dokter')
        ->with("Produk")
        ->with("Penanganan")
        ->get();
        return view('pages.pasiendokter_tertangani',compact('pasiens'));
        
    }
}
