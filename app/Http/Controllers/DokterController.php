<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dokters = User::where('role','dokter')->get();
        return view('pages.dokter',compact('dokters'));
    }

    public function tambah(Request $request)
    {
        $dokter = [
            'username'=>$request->username,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
            'role'=>"Dokter",
            'kode_dokter'=>"Dokter",
        ];
        return view('pages.dokter',compact('dokters'));
    }
}
