
<hr class="sidebar-divider">

<!-- Heading -->
<li class="nav-item {{request()->is('pasiendokter') ? 'active':''}}">
    <a class="nav-link" href="{{url('pasiendokter')}}">
        <i class="fa fa-user-md"></i>
        <span>Tangani Pasien</span></a>
</li>

<li class="nav-item {{request()->is('pasiensudahditangani') ? 'active':''}}">
    <a class="nav-link" href="{{url('pasiensudahditangani')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>Data Pasien</span></a>
</li>




