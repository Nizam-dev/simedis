<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penanganan;
use Illuminate\Support\Facades\File; 

class PenangananController extends Controller
{
    public function index()
    {
        $penanganans = penanganan::orderBy('id','DESC')->get();
        return view('pages.penanganan',compact('penanganans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'mimes:jpeg,jpg,png|required',
        ]);

        $file = $request->file('foto');

        $tujuan_upload = public_path('/image/penanganan');
        $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
 
        $file->move($tujuan_upload,$nama_file);
        $penanganan = [
            'kode'=>$request->kode,
            'nama_penanganan'=>$request->nama_penanganan,
            'harga'=>$request->harga,
            'status'=>$request->status,
            'foto'=>$nama_file,
            'amc' => auth()->user()->kode_amc
        ];
        penanganan::create($penanganan);
        return redirect()->back()->with('sukses','Penanganan '.$request->nama_penanganan.' Berhasil di Tambahkan');
    }

   
    public function update(Request $request, $id)
    {
        $penangananlama = penanganan::find($id);
        $penanganan = [
            'kode'=>$request->kode,
            'nama_penanganan'=>$request->nama_penanganan,
            'harga'=>$request->harga,
            'status'=>$request->status,
            'amc' => auth()->user()->kode_amc
        ];

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $tujuan_upload = public_path('/image/penanganan');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $penanganan['foto']=$nama_file;

            $foto_lama = public_path('/image/penanganan/'.$penangananlama->foto);
            if(file_exists($foto_lama)){
                File::delete($foto_lama);
            }

        }

        $penangananlama->update($penanganan);
        return redirect()->back()->with('sukses','Penanganan '.$request->nama_penanganan.' Berhasil di Edit');


    }

   
    public function destroy($id)
    {
        $penanganan = penanganan::find($id);
        $foto_lama = public_path('/image/penanganan/'.$penanganan->foto);
        if(file_exists($foto_lama)){
            File::delete($foto_lama);
        }
        $penanganan->delete();
        return redirect()->back()->with('sukses','Penanganan '.$penanganan->nama_penanganan.' Berhasil di Hapus');
    }


}