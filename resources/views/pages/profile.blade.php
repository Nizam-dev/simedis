@extends('template.master')
@section('css')

@endsection
@section('content')


<div class="row">
    <div class="col-md-6">
        <div class="card py-3 px-3">
            <h5>Data Pribadi</h5>
            <form action="{{url('profile')}}" method="post" class="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{auth()->user()->nama}}" >
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" value="{{auth()->user()->username}}">
                </div>

                <div class="form-group">
                    <label for="">No Hp</label>
                    <input type="text" name="no_hp" class="form-control" value="{{auth()->user()->no_hp}}">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                

                <button class="btn btn-sm btn-primary float-right">Simpan</button>

            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card py-3 px-3">
            <h5>Foto Profil</h5>
            <form method="post" action="{{url('profilefoto')}}" class="post" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <img id="fotoimage" src="{{asset('public/image/profil/'.auth()->user()->foto)}}" alt="" class="rounded circle mx-auto" style="height:250px;">
                    <span class="btn btn-warning mb-3" onclick="fotoClick()"  style="width:70px; margin-top:-50px; margin-left:auto; margin-right:30px;"><i class="fa fa-edit"></i></span>
                    <input accept="image/*"  type="file" name="foto" onchange="gantiFoto()" class="d-none" id="foto" name="foto">

                </div>

                <button class="btn btn-sm btn-primary float-right mt-3">Simpan</button>
                
            </form>
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

    function fotoClick() {
        $("#foto").click()
    }

    function gantiFoto() {
        var fileku = document.getElementById("foto").files[0]
        if (fileku) {
            $("#fotoimage").attr("src",URL.createObjectURL(fileku))
        }
    }

</script>
@endsection