
<hr class="sidebar-divider">

<!-- Heading -->
<li class="nav-item {{request()->is('pasiendokter') ? 'active':''}}">
    <a class="nav-link" href="{{url('pasiendokter')}}">
        <i class="fa fa-user-md"></i>
        <span>Tangani Pasien</span></a>
</li>

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


