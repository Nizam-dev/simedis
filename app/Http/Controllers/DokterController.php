<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\jadwalDokter;
use Illuminate\Support\Facades\File; 


class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dokters = User::leftJoin('jadwal_dokters','jadwal_dokters.user_id','users.id')
        ->where('users.role','dokter')
        ->select('users.*','jadwal_dokters.Senin','jadwal_dokters.Selasa','jadwal_dokters.Rabu','jadwal_dokters.Kamis','jadwal_dokters.Jumat','jadwal_dokters.Sabtu')
        ->get();
        return view('pages.dokter',compact('dokters'));
    }

    public function store(Request $request)
    {
        $dokter = [
            'nama'=>$request->nama,
            'username'=>$request->username,
            'alamat'=>$request->alamat,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'no_hp'=>$request->no_hp,
            'kode_amc'=>auth()->user()->kode_amc,
            'role'=>'Dokter',
            'kode_dokter'=>$this->generateKodeDokter(),
            'password'=>bcrypt($request->password),
            'tgl_lahir'=>$request->tgl_lahir,
        ]; 

        User::create($dokter);
        return redirect()->back()->with('sukses','Dokter '.$request->nama .' Berhasil ditambahkan');
        
    }

    public function harikerja($id,Request $request)
    {
        $harikerja = [
            'Senin'=>$request->Senin ? true:false,
            'Selasa'=>$request->Selasa ? true:false,
            'Rabu'=>$request->Rabu ? true:false,
            'Kamis'=>$request->Kamis ? true:false,
            'Jumat'=>$request->Jumat ? true:false,
            'Sabtu'=>$request->Sabtu ? true:false,
            'user_id'=>$id,
        ];


        if($request->hasFile('foto')){
            $dokter = User::find($id);
            $file = $request->file('foto');
            $tujuan_upload = public_path('image/profil');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $user['foto']=$nama_file;

            $foto_lama = public_path('image/profil/'.$dokter->foto);
            if(file_exists($foto_lama) && $dokter->foto !="foto.png"){
                File::delete($foto_lama);
            }
            $dokter->update($user);

        }


        jadwalDokter::updateOrCreate(['user_id'=>$id],$harikerja);
        return redirect()->back()->with('sukses','Jadwal Kerja Berhasil diubah');


    }



    public function generateKodeDokter()
    {
        do {
            $code = "DMC". random_int(111111, 999999);
        } while (User::where("kode_dokter", "=", $code)->first());
  
        return $code;
    }
}
