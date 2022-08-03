@extends('template.master')
@section('css')
<style>
    .nav-pills .nav-link {
        border-radius: 20px !important;
        background: silver;
        color: white;
    }

    .nav-item {
        z-index: 2 !important;

    }

    .nav-pills .nav-link label {
        background: white;
        width: 25px;
        text-align: center;
        border-radius: 50%;
        color: black;
    }

    .pems {
        width: 60px;
        background: white;
        margin-left: -10px;
        margin-right: -10px;
        z-index: 1;
    }

    table td i {
        cursor: pointer;
    }
</style>
@endsection
@section('content')

<h5 class=" mb-0 text-gray-800 mb-3">Laporan Transaksi</h5>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Bulan</label>
                    <select name="" id="f_bulan" class="form-control">
                        <option value="">Semua Bulan</option>
                        @foreach($bulans as $bulan)
                        <option value="{{$bulan['bulan']}}">{{$bulan['nama']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Tahun</label>
                    <select name="" id="f_tahun" class="form-control">
                        @for($i=date('Y'); $i>="2021"; $i-=1)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <label for=""></label>
                <button id="btn_filter" onclick="filterTanggal()" class="btn btn-sm btn-primary w-100">Filter</button>
            </div>

        </div>
    </div>
</div>

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
                                        <th class="d-none">Bulan</th>
                                        <th class="d-none">Tahun</th>
                                        <th>Pasien</th>
                                        <th>Produk</th>
                                        <th>Penanganan</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>
                                            @if(auth()->user()->role == "Pimpinan")
                                            <div class="dropdown no-arrow">
                                                Verifikasi
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" onclick="selectAll()">Select All</a>
                                                    <a class="dropdown-item" onclick="deselectAll()">Deselect All</a>
                                                    <a class="dropdown-item" onclick="verifikasiAll()">Verifikasi</a>
                                                </div>
                                            </div>
                                            @else
                                            Status
                                            @endif

                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($laporans as $laporan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$laporan->created_at->format('d-m-Y')}}</td>
                                        <td class="d-none">{{$laporan->created_at->format('m')}}</td>
                                        <td class="d-none">{{$laporan->created_at->format('Y')}}</td>
                                        <td>{{$laporan->nama_pasien}}</td>
                                        <td>
                                            <ol>
                                                @if(!$laporan->Produk->isEmpty())
                                                @foreach($laporan->Produk as $produk)
                                                <li>{{$produk->nama_produk}}</li>
                                                @endforeach
                                                @endif
                                            </ol>
                                        </td>
                                        <td>
                                            <ol>
                                                @if(!$laporan->Penanganan->isEmpty())
                                                @foreach($laporan->Penanganan as $penanganan)
                                                <li>{{$penanganan->nama_penanganan}}</li>
                                                @endforeach
                                                @endif
                                            </ol>
                                        </td>
                                        <td>{{$laporan->total}}</td>
                                        <td>
                                            <span class="badge badge-success">Lunas</span>
                                        </td>
                                        <td>
                                            @if($laporan->verifikasi)
                                            <span class="badge badge-success">Terverivikasi</span>
                                            @else
                                            @if(auth()->user()->role == "Pimpinan")

                                            <input type="checkbox" value="{{$laporan->id}}" name="ceklis" id="">
                                            @else
                                            <span class="badge badge-danger">Belum Diverifikasi</span>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

<!-- Form Ceklist acc -->

<form action="{{url('laporan/verif')}}" method="post" class="d-none" id="checkForm">
    @csrf
    <div class="data"></div>
</form>

<!--  -->


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

    var table = $("#dataTable1").DataTable()
    

    function selectAll() {
        $("[name='ceklis']").prop('checked', true)
    }

    function deselectAll() {
        $("[name='ceklis']").prop('checked', false)
    }

    function verifikasiAll() {
        $("#checkForm .data").empty()
        $("[name='ceklis']:checked").each((s, el) => {
            $("#checkForm .data").append(`
                <input value="${$(el).val()}" name="cek[]">
            `)
        })
        $("#checkForm").submit()
    }



    $(".closetambah").on('click', () => {
        $(".lunasihutang").addClass("d-none")
        $(".datalaporan").removeClass("col-md-8")
        $(".datalaporan").addClass("col-md-12")
        $(".datalaporan").find(".bg-pink").removeClass("bg-pink")
    })



    function filterTanggal() {
        let f_bulan = $("#f_bulan").val() 
        let f_tahun = $("#f_tahun").val() 
        table.column(2).search(f_bulan).draw()
        table.column(3).search(f_tahun).draw()
    }
</script>
@endsection