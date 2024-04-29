<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #cccccc">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"
        style="background-color: #ff9933">
        <div class="sidebar-brand-icon mr-2">
            <img src="{{ asset('/img/real logo polkam.png') }}" alt="" height="40" width="130">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Profile -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/profile-direksi" style="color: black">
            <i class="fas fa-fw fa-tachometer-alt mr-2" style="color: black"></i>
            <span class="font-weight-bold">Dashboard</span>
        </a>
    </li>
   
    <li class="nav-item">
        <a class="nav-link collapsed" href="/data-dosen-direksi" style="color: black">
            <i class="fas fa-fw fa-search mr-2" style="color: black"></i>
            <span class="font-weight-bold">Data Dosen</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="modal" data-target="#logoutModal" style="color: black">
            <i class="fas fa-sign-out-alt mr-2 fa-fw" style="color: black"></i>
            <span class="font-weight-bold">Log Out</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
