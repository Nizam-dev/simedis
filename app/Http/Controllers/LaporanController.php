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
        $bulans = $this->getMonth();
        return view('pages.laporan',compact('laporans','bulans'));
    }

    public function verifikasi(Request $request)
    {
        if($request->has('cek')){
            $r = riwayat_pelayanan::whereIn('id',$request->cek)
            ->update(['verifikasi'=>true]);
        }
        
        return redirect()->back()->with('sukses','Berhasil diverifikasi');
    }

    public function getMonth()
    {
        $bulan=[
            0=>
            [
                "bulan" => 1,
                "nama" => "January"
            ],
            1=>
            [
                "bulan" => 2,
                "nama" => "February",
            ],
            2=>
            [
                "bulan" => 3,
                "nama" => "Maret",
            ],
            3=>
            [
                "bulan" => 4,
                "nama" => "April",
            ],
            4=>
            [
                "bulan" => 5,
                "nama" => "Mei",
            ],
            5=>
            [
                "bulan" => 6,
                "nama" => "Juni",
            ],
            6=>
            [
                "bulan" => 7,
                "nama" => "Juli",
            ],
            7=>
            [
                "bulan" => 8,
                "nama" => "Agustus",
            ],
            8=>
            [
                "bulan" => 9,
                "nama" => "September",
            ],
            9=>
            [
                "bulan" => 10,
                "nama" => "Oktober",
            ],
            11=>
            [
                "bulan" => 11,
                "nama" => "November",
            ],
            12=>
            [
                "bulan" => 12,
                "nama" => "Desember",
            ]
        ];
        return $bulan;
    }
}
