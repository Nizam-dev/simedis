@extends('template.master')
@section('css')
    <style>
        .fa-eye{
            cursor: pointer;
        }
        td i{
            cursor: pointer;
        }
        .select2{
            width: 100% !important;
        }
    </style>
@endsection
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
    <button id="tambahpasien" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Pasien</button>
</div>

<div class="row listpasien">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-md-12 pasien">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kode Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>Kontak Person</th>
                                        <th>Tangani</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    @foreach($pasiens as $pasien)
                                    <tr>
                                        <td>{{$pasien->kode}}</td>
                                        <td>{{$pasien->nama}}</td>
                                        <td>{{$pasien->no_hp}}</td>
                                        <td class="text-center"><i class="fa fa-street-view" onclick="tangani(this,{{$pasien}})"></i></td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 border-left d-none tanganicard">
                    <div class="card-body">
                        <form action="transaksi" method="post">
                            @csrf
                            <h6>Rekam Medis</h6>
                            <div class="form-group d-none">
                                <input type="text" name="pasien_id" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Keluhan</label>
                                <textarea id="fkeluhan" name="keluhan" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Diagnosa</label>
                                <textarea class="form-control" name="diagnosa"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Pilih Penanganan</label>
                                <select name="penanganan_id" class="form-control w-100">
                                    <option value="" class="fp1_">Pilih Penanganan</option>
                                    @foreach($penanganans as $penanganan)
                                        <option value="{{$penanganan->id}}" harga='{{$penanganan->harga}}'>{{$penanganan->kode.' - '.$penanganan->nama_penanganan}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Pilih Produk</label>
                                <select name="produk_id" id="" class="form-control w-100">
                                    <option value="" class="fp2_">Pilih Produk</option>
                                    @foreach($produks as $produk)
                                        <option value="{{$produk->id}}" harga='{{$produk->harga}}'>{{$produk->kode.' - '.$produk->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Total Harga</label>
                                    <input type="text" class="d-none" name="total">
                                    <h5 id="totalharga">0</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Pembayaran</label>
                                    <input type="number" name="pembayaran" calss="form-control" style="width:100%;">
                                </div>
                            </div>
                            
                            <button class="btn btn-sm btn-primary float-right mb-3" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row tambahpasien d-none">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Tambah
                <button class="btn btn-sm btn-warning float-right closetambah">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
            <div class="card-body">
                <form action="{{url('pasien')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Alamat</label>
                        <textarea   class="form-control" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki">
                            <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>

                    <button class="btn btn-sm btn-primary float-right" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    @if(session()->has('sukses'))
        swal({
            title: "Berhasil!",
            text: "{{session()->get('sukses')}}",
            icon: "success",
        });
    @elseif(session()->has('gagal'))
        swal({
            title: "Gagal!",
            text: "{{session()->get('gagal')}}",
            icon: "error",
        });
    @endif
    
    $(document).ready(function() {
        $('select[name="penanganan_id"]').select2();
        $('select[name="produk_id"]').select2();
        $("#dataTable").DataTable();
    });
    

    $("#tambahpasien").on('click',()=>{
        $(".listpasien").addClass("d-none")
        $(".tambahpasien").removeClass("d-none")
    })
    $(".closetambah").on('click',()=>{
        $(".listpasien").removeClass("d-none")
        $(".tambahpasien").addClass("d-none")
    })

    function tangani(ini,pasien){
        $(".pasien").removeClass("col-md-12")
        $(".pasien").addClass("col-md-7")
        $(".tanganicard form textarea").val("")
        $(".tanganicard input[name='pasien_id']").val(pasien.id)
        $(".tanganicard").removeClass("d-none")
        $(ini).parent().parent().parent().find(".bg-pink").removeClass("bg-pink")
        $(ini).parent().parent().addClass("bg-pink")
        $("#fkeluhan").focus()
    }

    var totalHarga = 0;

    $(".tanganicard select").on('change',()=>{
        let penanganan = $(".tanganicard select[name='penanganan_id'] option:selected").attr("harga")
        let produk = $(".tanganicard select[name='produk_id'] option:selected").attr("harga")
        produk = produk == undefined ? 0 : produk
        penanganan = penanganan == undefined ? 0 : penanganan
        totalHarga = parseInt(penanganan)+parseInt(produk)
        $("#totalharga").html(totalHarga)
        $(".tanganicard input[name='total']").val(totalHarga)
    })


</script>
@endsection