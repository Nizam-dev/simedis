<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\penanganan;
use App\Models\produk;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dokter = User::where('role','Dokter');
        $produk = produk::all();
        $data = [
            'dokter_bwi' => $dokter->where('kode_amc','AMC Banyuwangi')->count(),
            'dokter_kesilir' =>  $dokter->where('kode_amc','AMC Kesilir')->count(),
            'dokter_genteng' =>  $dokter->where('kode_amc','AMC Genteng')->count(),

            'produk_bwi' => $produk->where('amc','AMC Banyuwangi')->count(),
            'produk_kesilir' =>  $produk->where('amc','AMC Kesilir')->count(),
            'produk_genteng' =>  $produk->where('amc','AMC Genteng')->count(),
        ];

        return view('pages.dashboard',compact('data'));
    }
}
