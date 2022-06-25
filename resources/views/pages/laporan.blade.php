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


<h5 class=" mb-0 text-gray-800 mb-3">Laporan Transaksi</h5>

<div class="row listlaporan">
    <div class="col-md-12">
        <div class="card">
           <div class="row">
            <div class="col-md-12 datalaporan">
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
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($laporans as $laporan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$laporan->created_at->format('d-m-Y')}}</td>
                                        <td>{{$laporan->nama_pasien}}</td>
                                        <td>{{$laporan->nama_produk}}</td>
                                        <td>{{$laporan->nama_penanganan}}</td>
                                        <td>{{$laporan->total}}</td>
                                        <td>
                                            @if($laporan->pembayaran < $laporan->total)
                                                <span class="badge badge-warning">{{$laporan->pembayaran - $laporan->total}}</span>
                                                <i class="fa fa-edit" onclick="lunasi(this,{{$laporan}})"></i>
                                            @else
                                                <span class="badge badge-success">Lunas</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

                <div class="col-md-4 border-left d-none lunasihutang">
                        <div class="card-header">
                            Tambah
                            <button class="btn btn-sm btn-warning float-right closetambah">
                                <i class="fas fa-window-close"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="{{url('lunasi')}}" method="post">
                                @csrf
                                <h6>Lunasi Pembayaran</h6>

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="">Pembayaran</label>
                                        <input type="number" name="pembayaran" class="form-control bayarkan" style="width:100%;" required>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Lunas</h6>
                                        <input type="checkbox"  id="lunasisemua">
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


    function lunasi(ini,laporan){
        $(".datalaporan").removeClass("col-md-12")
        $(".datalaporan").addClass("col-md-8")
        $(".lunasihutang").removeClass("d-none")
        $(".lunasihutang form").attr("action","{{url('lunasi')}}"+"/"+laporan.id)
        
        $(ini).parent().parent().parent().find(".bg-pink").removeClass("bg-pink")
        $(ini).parent().parent().addClass("bg-pink")
        $(".lunasihutang ").focus()

        $("#lunasisemua").on('click',()=>{
            if($("#lunasisemua").is(":checked")){
                $(".bayarkan").val(laporan.total - laporan.pembayaran)
                $(".bayarkan").prop('readonly', true);
            }else{
                $(".bayarkan").val("")
                $(".bayarkan").prop('readonly', false)
            }
        })
    }

    $(".closetambah").on('click',()=>{
        $(".lunasihutang").addClass("d-none")
        $(".datalaporan").removeClass("col-md-8")
        $(".datalaporan").addClass("col-md-12")
        $(".datalaporan").find(".bg-pink").removeClass("bg-pink")
    })
</script>
@endsection