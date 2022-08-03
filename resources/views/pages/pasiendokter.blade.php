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
        
        table td i{
            cursor : pointer;
        }

        
    </style>
@endsection
@section('content')


<h5 class=" mb-0 text-gray-800 mb-3">Tangani Pasien</h5>

<div class="row listlaporan">
    <div class="col-md-12">
        <div class="card">
           <div class="row">
            <div class="col-md-12 datapenanganan">
                <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pasien</th>
                                        <th>Produk</th>
                                        <th>Penanganan</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosa</th>
                                        <th>Tangani</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($pasiens as $pasien)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pasien->created_at->format('d-m-Y')}}</td>
                                        <td>{{$pasien->nama_pasien}}</td>
                                        <td>
                                            <ol>
                                                @if(!$pasien->Produk->isEmpty())
                                                    @foreach($pasien->Produk as $produk)
                                                    <li>{{$produk->nama_produk}}</li>
                                                    @endforeach
                                                @endif
                                            </ol>
                                        </td>
                                        <td>
                                            <ol>
                                                @if(!$pasien->Penanganan->isEmpty())
                                                    @foreach($pasien->Penanganan as $penanganan)
                                                    <li>{{$penanganan->nama_penanganan}}</li>
                                                    @endforeach
                                                @endif
                                            </ol>
                                        </td>
                                        <td>{{$pasien->keluhan}}</td>
                                        <td>{{$pasien->diagnosa}}</td>
                                        <td class="text-center"><i class="fa fa-user-md" onclick="tangani(this,{{$pasien}})"></i></td>
                                        
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

            <div class="col-md-5 border-left d-none updatepenanganan">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("patch")
                            <h6>Penanganan Pasien</h6>

                            <div class="form-group">
                                <label for="" class="form-label">Keluhan</label>
                                <textarea id="fkeluhan" name="keluhan" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Diagnosa</label>
                                <textarea class="form-control" name="diagnosa"></textarea>
                            </div>


                            
                            <button type="submit" class="btn btn-sm btn-primary float-right mb-2">Simpan</button>
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
    
    $("#dataTable1").DataTable()
    
    function tangani(ini,pasien) {
        $(".datapenanganan").removeClass("col-md-12")
        $(".datapenanganan").addClass("col-md-7")
        $(".updatepenanganan").removeClass("d-none")
        $(".updatepenanganan form").attr("action","{{url('pasiendokter')}}"+`/${pasien.id}`)
        $(".updatepenanganan textarea[name='diagnosa']").val(pasien.diagnosa)
        $(".updatepenanganan textarea[name='keluhan']").val(pasien.keluhan)
        $(ini).parent().parent().parent().find(".bg-pink").removeClass("bg-pink")
        $(ini).parent().parent().addClass("bg-pink")
        $(".updatepenanganan textarea[name='diagnosa']").focus()
    }



</script>
@endsection