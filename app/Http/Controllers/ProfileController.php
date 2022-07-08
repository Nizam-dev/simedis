<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File; 

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile');
    }
    public function updateprofil(Request $request)
    {
        $data = $request->except(['password']);
        if($request->password != ""){
            $data["password"] = bcrypt($request->password);
        }
        User::find(auth()->user()->id)->update($data);
        return redirect()->back()->with("sukses","Profil Berhasil diubah");
    }
    public function updatefoto(Request $request)
    {
        $user =  User::find(auth()->user()->id);
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $tujuan_upload = public_path('/image/profil');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $namafoto = $nama_file;
            $foto_lama = public_path('/image/profil/'.$user->foto);
            if(file_exists($foto_lama) && $user->foto != "foto.png"){
                File::delete($foto_lama);
            }
            $user->update(["foto"=>$namafoto]);
            return redirect()->back()->with('sukses','Foto Berhasil di Edit');
        }

        return redirect()->back()->with('gagal','Foto Gagal di Edit');
    }
}
