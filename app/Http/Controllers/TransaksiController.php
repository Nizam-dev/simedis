<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\riwayat_pelayanan;
use App\Models\listRiwayatPenanganan;
use App\Models\listRiwayatProduk;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $transaksi = [
            'keluhan'=>$request->keluhan,
            'diagnosa'=>$request->diagnosa,
            'pasien_id'=>$request->pasien_id,
            'total'=>$request->total,
            'pembayaran'=>$request->pembayaran,
            'user_id'=>auth()->user()->role == "Dokter" ? auth()->user()->id : $request->user_id,
            'amc'=>auth()->user()->kode_amc
        ];
        
        
        $transaksi = riwayat_pelayanan::create($transaksi)->id;

        if($request->has("penanganan_id")){
            foreach($request->penanganan_id as $penanganan){
                listRiwayatPenanganan::create([
                    "riwayat_pelayanan_id"=>$transaksi,
                    "penanganan_id"=>$penanganan
                ]);
            }
        }
        if($request->has("produk_id")){
            foreach($request->produk_id as $produk){
                listRiwayatProduk::create([
                    "riwayat_pelayanan_id"=>$transaksi,
                    "produk_id"=>$produk
                ]);
            }
        }
        return redirect()->back()->with('sukses','Berhasil Membuat Transaksi');
    }

}
