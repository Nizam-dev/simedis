<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\riwayat_pelayanan;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $transaksi = [
            'keluhan'=>$request->keluhan,
            'diagnosa'=>$request->diagnosa,
            'pasien_id'=>$request->pasien_id,
            'produk_id'=>$request->produk_id,
            'penanganan_id'=>$request->penanganan_id,
            'total'=>$request->total,
            'pembayaran'=>$request->pembayaran,
            'user_id'=>auth()->user()->id,
            'amc'=>auth()->user()->kode_amc
        ];

        riwayat_pelayanan::create($transaksi);
        return redirect()->back()->with('sukses','Berhasil Membuat Transaksi');
    }

}
