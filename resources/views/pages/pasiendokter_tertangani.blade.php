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


<h5 class=" mb-0 text-gray-800 mb-3">Laporan Data Pasien</h5>

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




@endsection

@section('js')
<script>
   

    $("#dataTable1").DataTable()

   
</script>
@endsection