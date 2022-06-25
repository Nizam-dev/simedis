<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\File; 

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produks = produk::orderBy('id','DESC')->get();
        return view('pages.produk',compact('produks'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'mimes:jpeg,jpg,png|required',
        ]);

        $file = $request->file('foto');

        $tujuan_upload = public_path('/image/produk');
        $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
 
        $file->move($tujuan_upload,$nama_file);
        $produk = [
            'kode'=>$request->kode,
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga,
            'status'=>$request->status,
            'stok'=>$request->stok,
            'foto'=>$nama_file,
            'amc' => auth()->user()->kode_amc
        ];
        produk::create($produk);
        return redirect()->back()->with('sukses','Produk '.$request->nama_produk.' Berhasil di Tambahkan');
    }

   
    public function update(Request $request, $id)
    {
        $produklama = produk::find($id);
        $produk = [
            'kode'=>$request->kode,
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga,
            'status'=>$request->status,
            'stok'=>$request->stok,
            'amc' => auth()->user()->kode_amc
        ];

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $tujuan_upload = public_path('/image/produk');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $produk['foto']=$nama_file;

            $foto_lama = public_path('/image/produk/'.$produklama->foto);
            if(file_exists($foto_lama)){
                File::delete($foto_lama);
            }

        }

        $produklama->update($produk);
        return redirect()->back()->with('sukses','Produk '.$request->nama_produk.' Berhasil di Edit');


    }

   
    public function destroy($id)
    {
        $produk = produk::find($id);
        $foto_lama = public_path('/image/produk/'.$produk->foto);
        if(file_exists($foto_lama)){
            File::delete($foto_lama);
        }
        $produk->delete();
        return redirect()->back()->with('sukses','Produk '.$produk->nama_produk.' Berhasil di Hapus');
    }
}
