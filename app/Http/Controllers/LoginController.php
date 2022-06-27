<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view("login");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $login = [
            "username" => $request->username,
            "password" => $request->password,
        ];

        if(!User::where("username",$request->username)->first()){
            return redirect()->back()->with('gagal','Username Tidak ditemukan');
        }
        if(Auth::attempt($login)){
            if(auth()->user()->role == "Dokter"){
                return redirect('/pasiendokter');
            }
            return redirect('/');
        }else{
            return redirect()->back()->with('gagal','Password Salah');
        }

    }
}
