<!-- Nav Item - Dashboard -->
<li class="nav-item {{request()->is('/') ? 'active':''}}">
    <a class="nav-link" href="{{url('/')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<li class="nav-item {{request()->is('pasien') ? 'active':''}}">
    <a class="nav-link" href="{{url('pasien')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>Data Pasien</span></a>
</li>

<li class="nav-item {{request()->is('dokter') ? 'active':''}}">
    <a class="nav-link" href="{{url('dokter')}}">   
        <i class="fa fa-user-md"></i>
        <span>Data Dokter</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{request()->is('produk') || request()->is('penanganan') ? 'active':''}}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Data Pelayanan</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Pelayanan:</h6>
            <a class="collapse-item" href="{{url('penanganan')}}">Edit Penanganan</a>
            <a class="collapse-item" href="{{url('produk')}}">Edit Skin Care</a>
        </div>
    </div>
</li>

<li class="nav-item {{request()->is('laporan') ? 'active':''}}">
    <a class="nav-link" href="{{url('laporan')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>Laporan Transaksi</span></a>
</li>

