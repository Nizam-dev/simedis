@extends('template.master')
@section('css')
    <style>
        .nav-pills .nav-link{
            border-radius:20px !important;
            background :silver;
            color: white;
        }
        .nav-item{
            z-index: 2 !important;

        }

        .nav-pills .nav-link label{
            background: white;
            width: 25px;
            text-align: center;
            border-radius: 50%;
            color: black;
        }
        .pems{
            width: 60px;
            background: white;
            margin-left: -10px;
            margin-right: -10px;
            z-index: 1;
        }

        td .fa{
            cursor: pointer;
        }

        #radioBtn .notActive, #radioBtn2 .notActive{
            color: #3276b1;
            background-color: #fff;
        }
                
    </style>
@endsection
@section('content')


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link"  href="{{url('penanganan')}}" role="tab" aria-controls="pills-home" aria-selected="true">
    <label for="">1</label>
    Penanganan</a>
  </li>
  <div class="pems"></div>
  <li class="nav-item" role="presentation">
    <a class="nav-link active"  href="{{url('produk')}}" role="tab" aria-controls="pills-profile" aria-selected="false">
    <label for="">2</label>
    Produk</a>
  </li>

</ul>

<div class="card">
<div class="card-body">
<h5 class=" mb-0 text-gray-800 mr-3">Data Produk</h5>
<button class="btn btn-primary float-right" onclick="tambahkan()">Tambah Produk</button>
</div>
</div>

<div class="tab-content mb-4" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="card">
        <div class="row">
            <div class="col-md-12 pasien">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Stok</th>
                                    <th>Aktifitas</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($produks as $produk)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$produk->kode}}</td>
                                    <td>{{$produk->nama_produk}}</td>
                                    <td>{{$produk->harga}}</td>
                                    <td> @if($produk->status == 'Aktif') 
                                        <span class="badge badge-success">Aktif</span>
                                        @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>{{$produk->stok}}</td>
                                    <td>
                                        <i class="fa fa-trash text-danger" onclick="hapusproduk('{{$produk->id}}')"></i>
                                        <i class="fa fa-edit text-warning" onclick="editproduk(this,{{$produk}})"></i>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Hapus Produk -->
            <div class="modal fade" id="hapusproduk" tabindex="-1" role="dialog" aria-labelledby="hapusprodukLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fa fa-exclamation-triangle text-center text-warning d-block" style="font-size:30px;" aria-hidden="true"></i>
                        <h5 class="modal-title d-block text-center">Apakah anda yakin ingin menghapus produk ?</h5>
                        
                        <form action="" method="post">
                            @csrf
                            @method("delete")
                        </form>

                        <div class="contaianer mt-3">
                            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Batal</button>
                            <button type="button" id="confirmhapus" class="btn btn-danger float-right">Hapus</button>
                        </div>

                    </div>
                </div>
            </div>
            </div>

            <!-- Ubah Produk -->

            <div class="col-md-5 border-left d-none ubahcard">
                    <div class="card-body">
                        <button class="float-right bg-secondary btn-sm btn text-white" onclick="closecard()">
                            <i class="fa fa-window-close"></i>
                        </button>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <h6>Edit Produk</h6>
                            
                            <div class="form-group">
                                <label for="">Kode Produk</label>
                                <input type="text" class="form form-control" name="kode">
                            </div>

                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form form-control" name="nama_produk">
                            </div>

                            <div class="form-group">
                                <label for="">Harga Produk</label>
                                <input type="number" class="form form-control" name="harga">
                            </div>

                            <div class="form-group">
                                <label for="">Status Produk</label>
                                <div class="col-sm-7 col-md-7">
                                    <div class="input-group">
                                        <div id="radioBtn2" class="btn-group">
                                            <a class="btn btn-primary btn-sm active" data-toggle="status2" data-title="Aktif">Aktif</a>
                                            <a class="btn btn-primary btn-sm notActive" data-toggle="status2" data-title="Tidak Aktif">Tidak Aktif</a>
                                        </div>
                                        <input type="hidden" name="status" id="status2">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form form-control" name="stok">
                            </div>

                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form form-control" name="foto">
                            </div>
                            

                            
                            <button type="submit" class="btn btn-sm btn-primary float-right mb-2">Simpan</button>
                        </form>
                    </div>
            </div>

            <!-- Tambah Produk -->

            <div class="col-md-5 border-left d-none tambahkancard">
                    <div class="card-body">
                        <button class="float-right bg-secondary btn-sm btn text-white" onclick="closecard()">
                            <i class="fa fa-window-close"></i>
                        </button>
                        <form action="{{url('produk')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h6>Tambah Produk</h6>
                            
                            <div class="form-group">
                                <label for="">Kode Produk</label>
                                <input type="text" class="form form-control" name="kode" required>
                            </div>

                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form form-control" name="nama_produk" required>
                            </div>

                            <div class="form-group">
                                <label for="">Harga Produk</label>
                                <input type="number" class="form form-control" name="harga" required>
                            </div>

                            <div class="form-group">
                                <label for="">Status Produk</label>
                                <div class="col-sm-7 col-md-7">
                                <div class="input-group">
                                    <div id="radioBtn" class="btn-group">
                                        <a class="btn btn-primary btn-sm active" data-toggle="status" data-title="Aktif">Aktif</a>
                                        <a class="btn btn-primary btn-sm notActive" data-toggle="status" data-title="Tidak Aktif">Tidak Aktif</a>
                                    </div>
                                    <input type="hidden" name="status" id="status">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form form-control" name="stok" required>
                            </div>

                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form form-control" name="foto" required>
                            </div>
                            

                            
                            <button type="submit" class="btn btn-sm btn-primary float-right mb-2">Tambah</button>
                        </form>
                    </div>
            </div>

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

    $("#dataTable").DataTable();

    $("#tambahpasien").on('click',()=>{
        $(".listpasien").addClass("d-none")
        $(".tambahpasien").removeClass("d-none")
    })
    $(".closetambah").on('click',()=>{
        $(".listpasien").removeClass("d-none")
        $(".tambahpasien").addClass("d-none")
    })
    function editproduk(ini,produk){
        let id = `/${produk.id}`
        $(".ubahcard form").attr('action',"{{url('produk')}}"+id)
        $(".ubahcard input[name='kode']").val(produk.kode)
        $(".ubahcard input[name='nama_produk']").val(produk.nama_produk)
        $(".ubahcard input[name='harga']").val(produk.harga)
        $(".ubahcard input[name='stok']").val(produk.stok)
        $(".ubahcard input[name='status']").val(produk.status)
        if(produk.status == "Aktif"){
            $("#radioBtn2 a:nth-child(1)").removeClass('notActive').addClass('active');
            $("#radioBtn2 a:nth-child(2)").removeClass('active').addClass('notActive');
        }else{
            $("#radioBtn2 a:nth-child(1)").removeClass('active').addClass('notActive');
            $("#radioBtn2 a:nth-child(2)").removeClass('notActive').addClass('active');
        }

        $(".pasien").removeClass("col-md-12")
        $(".pasien").addClass("col-md-7")
        $(".ubahcard").removeClass("d-none")
        $(".tambahkancard").addClass("d-none")
        $(ini).parent().parent().parent().find(".bg-pink").removeClass("bg-pink")
        $(ini).parent().parent().addClass("bg-pink")
        $(".ubahcard input[name='kode']").focus()
    }

    function closecard(){
        $(".pasien").removeClass("col-md-7")
        $(".pasien").addClass("col-md-12")
        $(".ubahcard").addClass("d-none")
        $(".tambahkancard").addClass("d-none")
        $(".table-responsive").find(".bg-pink").removeClass("bg-pink")
    }

    function tambahkan(){
        $(".pasien").removeClass("col-md-12")
        $(".pasien").addClass("col-md-7")
        $(".tambahkancard").removeClass("d-none")
        $(".ubahcard").addClass("d-none")
        $(".table-responsive").find(".bg-pink").removeClass("bg-pink")
        $("#fkeluhan").focus()

        $('#status').prop('value', 'Aktif');
    }

    function hapusproduk(id) {
        $("#hapusproduk form").attr('action',"{{url('produk')}}"+`/${id}`)
        $("#hapusproduk").modal("show")
    }

    $("#confirmhapus").on('click',()=> {
        $("#hapusproduk form").submit()
    })



    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#status').prop('value', sel);
        
        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })

    $('#radioBtn2 a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#status2').prop('value', sel);
        
        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })

</script>
@endsection