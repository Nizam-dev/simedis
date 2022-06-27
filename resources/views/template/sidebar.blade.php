<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-0">
        <img class="w-100 h-100 rounded" src="{{asset('public/image/iconamc.png')}}" alt="">
    </div>
    <div class="sidebar-brand-text mx-3">
        SkinCare
    <h6 style="font-size:10px;">Banyuwangi</h6>
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<?php $role = auth()->user()->role ?>
@switch($role)
@case("Admin")
    @include("template.role.admin")
    @break
@case("Pimpinan")
    @include("template.role.pimpinan")
    @break
@case("Dokter")
    @include("template.role.dokter")
    @break
@endswitch


<hr class="sidebar-divider">

<!-- Divider -->

<!-- Sidebar Toggler (Sidebar) -->
<!-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->



</ul>
<!-- End of Sidebar -->