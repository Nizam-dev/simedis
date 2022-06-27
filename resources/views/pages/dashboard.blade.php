@extends('template.master')
@section('content')


<div class="row">
    <h4 class="col-md-12">AMC Banyuwangi</h4>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-pink border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['transaksi_bwi']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-credit-card fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Dokter</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['dokter_bwi']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['produk_bwi']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Pasien</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['pasien_bwi']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4 class="col-md-12">AMC Genteng</h4>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-pink border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['transaksi_genteng']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-credit-card fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Dokter</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['dokter_genteng']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['produk_genteng']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Pasien</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['pasien_genteng']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4 class="col-md-12">AMC Kesilir</h4>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-pink border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['transaksi_kesilir']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-credit-card fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Dokter</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['dokter_kesilir']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['produk_kesilir']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Pasien</div>
                        <div class="h5 mb-0 font-weight-bold text-primary">{{$data['pasien_kesilir']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')

@endsection