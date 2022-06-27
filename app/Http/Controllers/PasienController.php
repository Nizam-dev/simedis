<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pasien;
use App\Models\penanganan;
use App\Models\produk;
use App\Models\User;

class PasienController extends Controller
{
    public function index()
    {
        $dokters = User::where("role","Dokter")->where("kode_amc",auth()->user()->kode_amc)->get();
        $pasiens =  pasien::all();
        $penanganans =  penanganan::where('amc',auth()->user()->kode_amc)
                                    ->where('status','Aktif')
                                    ->get();
        $produks =  produk::where('amc',auth()->user()->kode_amc)
                            ->where('status','Aktif')
                            ->get();
        return view('pages.datapasien',compact('pasiens','penanganans','produks','dokters'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        $pasien = [
            'kode'=>$this->generateKodePasien(),
            'nama'=>$request->nama,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'no_hp'=>$request->no_hp,
            'amc' => auth()->user()->kode_amc
        ];

        pasien::create($pasien);
        return redirect()->back()->with('sukses','Berhasil');
    }

    public function update(Request $request, $id)
    {


    }
   
    public function destroy($id)
    {

    }

    public function generateKodePasien()
    {
        do {
            $code = "AMCB". random_int(111111, 999999);
        } while (pasien::where("kode", "=", $code)->first());
  
        return $code;
    }


}

