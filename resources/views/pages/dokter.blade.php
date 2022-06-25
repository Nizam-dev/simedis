@extends('template.master')
@section('css')
    <style>
        .fa-eye{
            cursor: pointer;
        }
        .form-check .form-check-input:checked {
            background : blue !important;
        }
    </style>
@endsection
@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Dokter</h1>
    <button id="tambahpasien" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Dokter</button>
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
                                        <th>Kode Dokter</th>
                                        <th>Nama Dokter</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    
                                @foreach($dokters as $dokter)
                                    <tr>
                                        <td>{{$dokter->kode_dokter}}</td>
                                        <td>{{$dokter->nama}}</td>
                                        <td>12/90/1999</td>
                                        <td>{{$dokter->alamat}}</td>
                                        <td class="text-center"><i class="fas fa-eye" onclick="tangani(this)"></i></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 border-left d-none tanganicard">
                    <div class="card-body">
                        <form action="" method="post">
                            <h6>Rekam Medis</h6>

                            <div class="form-group">
                                <label for="" class="form-label">Foto Dokter</label>
                                <div class="border tex-center w-100 py-2">
                                <i class="fa fa-plus mx-auto text-center d-block mb-3 mt-3"></i>
                                <input type="file" class="d-none">
                                </div>

                            </div>

                            <div class="row">
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Senin
                                </label>
                            </div>

                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Selasa
                                </label>
                            </div>
                            </div>

                            
                            <buttun class="btn btn-sm btn-primary float-right">Simpan</buttun>
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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name=""  class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $("#dataTable").DataTable();

    $("#tambahpasien").on('click',()=>{
        $(".listpasien").addClass("d-none")
        $(".tambahpasien").removeClass("d-none")
    })
    $(".closetambah").on('click',()=>{
        $(".listpasien").removeClass("d-none")
        $(".tambahpasien").addClass("d-none")
    })
    function tangani(ini){
        $(".pasien").removeClass("col-md-12")
        $(".pasien").addClass("col-md-7")
        $(".tanganicard").removeClass("d-none")
        $(ini).parent().parent().parent().find(".bg-pink").removeClass("bg-pink")
        $(ini).parent().parent().addClass("bg-pink")
        $("#fkeluhan").focus()
    }

</script>
@endsection