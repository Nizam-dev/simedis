@extends('template.master')
@section('css')
    <style>
        .fa-eye{
            cursor: pointer;
        }
        .form-check .form-check-input:checked {
            background : blue !important;
        }
        #blah{
            max-width:100%;
            max-height:100px;
        }
        table i{
            cursor: pointer;
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
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    
                                @foreach($dokters as $dokter)
                                    <tr>
                                        <td>{{$dokter->kode_dokter}}</td>
                                        <td>{{$dokter->nama}}</td>
                                        <td>{{$dokter->tgl_lahir == null ? "-":$dokter->tgl_lahir}}</td>
                                        <td>{{$dokter->alamat}}</td>
                                        <td>{{$dokter->no_hp}}</td>
                                        <td class="text-center"><i class="fa fa-user-md" onclick="tangani(this,{{$dokter}})"></i></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 border-left d-none tanganicard">
                    <div class="card-body">
                        <button class="float-right bg-secondary btn-sm btn text-white" onclick="closecard()">
                                <i class="fa fa-window-close"></i>
                        </button>
                        <form action="" method="post"  enctype="multipart/form-data">
                            @csrf
                          

                            <h6>Rekam Medis</h6>
                           

                            <div class="form-group">
                                <label for="" class="form-label">Foto Dokter</label>
                                <div class="border tex-center w-100 py-2">
                                <i class="fa fa-plus mx-auto text-center d-block mb-3 mt-3 imgUp" ></i>
                                <img id="blah" src="#"  class="d-none mx-auto">
                                <input type="file" class="d-none"  name="foto" id="fotodokter" accept="image/*">
                                </div>

                            </div>
                            <div class="form-group">
                                    <label for="">Hari Kerja</label>
                            </div>
                            <div class="row border mb-3 px-2 border-warning">
                                
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="Senin" value="true">
                                <label class="form-check-label" for="defaultCheck1">
                                    Senin
                                </label>
                            </div>

                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="Selasa" value="true">
                                <label class="form-check-label" for="defaultCheck1">
                                    Selasa
                                </label>
                            </div>

                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="Rabu" value="true">
                                <label class="form-check-label" for="defaultCheck1">
                                    Rabu
                                </label>
                            </div>

                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="Kamis" value="true">
                                <label class="form-check-label" for="defaultCheck1">
                                    Kamis
                                </label>
                            </div>

                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="Jumat" value="true">
                                <label class="form-check-label" for="defaultCheck1">
                                    Jum'at
                                </label>
                            </div>

                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="Sabtu" value="true">
                                <label class="form-check-label" for="defaultCheck1">
                                    Sabtu
                                </label>
                            </div>


                            </div>

                            
                            <button class="btn btn-sm btn-primary float-right" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row tambahpasien d-none">
    <div class="col-md-12">
        <form action="" method="post">
        <div class="card">
            <div class="card-header">
                Tambah
                <button class="btn btn-sm btn-warning float-right closetambah">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
            <div class="card-body">
                <form action="{{url('dokter')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Alamat</label>
                        <textarea  class="form-control" name="alamat"></textarea>
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
                    <div class="form-group">
                        <label for="" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                    
                </form>
            </div>
        </div>
        </form>
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
    

    $("#dataTable").DataTable();

    $("#tambahpasien").on('click',()=>{
        $(".listpasien").addClass("d-none")
        $(".tambahpasien").removeClass("d-none")
    })
    $(".closetambah").on('click',()=>{
        $(".listpasien").removeClass("d-none")
        $(".tambahpasien").addClass("d-none")
    })
    function tangani(ini,dokter){
        $(".pasien").removeClass("col-md-12")
        $(".pasien").addClass("col-md-7")
        $(".tanganicard").removeClass("d-none")
        $(".tanganicard form").attr('action',"{{url('dokter/harikerja')}}"+`/${dokter.id}`)

        $("input[name='Senin']").prop('checked',dokter.Senin?true:false)
        $("input[name='Selasa']").prop('checked',dokter.Selasa?true:false)
        $("input[name='Rabu']").prop('checked',dokter.Rabu?true:false)
        $("input[name='Kamis']").prop('checked',dokter.Kamis?true:false)
        $("input[name='Jumat']").prop('checked',dokter.Jumat?true:false)
        $("input[name='Sabtu']").prop('checked',dokter.Sabtu?true:false)
        $("#blah").removeClass("d-block").addClass("d-none")
        $(".imgUp").removeClass("d-none").addClass("d-block")
        $("#fotodokter").val("")
        if(dokter.foto != "foto.png"){
            $("#blah").attr("src",'{{asset("public/image/profil")}}'+`/${dokter.foto}`)
            $(".imgUp").removeClass("d-block").addClass("d-none")
            $("#blah").removeClass("d-none").addClass("d-block")
        }

        $(ini).parent().parent().parent().find(".bg-pink").removeClass("bg-pink")
        $(ini).parent().parent().addClass("bg-pink")
        $("#fkeluhan").focus()
    }

    function closecard(){
        $(".pasien").removeClass("col-md-7")
        $(".pasien").addClass("col-md-12")
        $(".tanganicard").addClass("d-none")
        $(".table-responsive").find(".bg-pink").removeClass("bg-pink")
    }

    $(".imgUp").on("click",()=>{
        $("#fotodokter").click()
    })
    $("#blah").on("click",()=>{
        $("#fotodokter").click()
    })

    $("#fotodokter").on("change",()=> {
        var fileku = document.getElementById("fotodokter").files[0]
        if (fileku) {
            $("#blah").attr("src",URL.createObjectURL(fileku))
            $(".imgUp").removeClass("d-block").addClass("d-none")
            $("#blah").removeClass("d-none").addClass("d-block")
        }
    })
</script>
@endsection