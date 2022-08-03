<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        if(Auth::check()){
            return redirect('/');
        }
    }

    public function index()
    {
        return view("register");
    }
    
    public function register(Request $request)
    {
        $validated = $request->validate([
            'kode_amc' => 'required',
            'role' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
        ]);
        $data = [
            "kode_amc" => $request->kode_amc,
            "username" => $request->username,
            "nama" => $request->nama,
            "role" => $request->role,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "password" => bcrypt($request->password),
            "kode_dokter" => $request->role == "Dokter" ? $this->generateKodeDokter() : null,
        ];

        User::create($data);
        return redirect('/login')->with("sukses","Akun Berhasil di Buat Silahkan Login");
    }

    public function generateKodeDokter()
    {
        do {
            $code = "DMC". random_int(111111, 999999);
        } while (User::where("kode_dokter", "=", $code)->first());
  
        return $code;
    }
}
