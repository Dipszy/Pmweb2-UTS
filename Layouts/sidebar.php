<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hospital-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI FASKES</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo ($file == 'home') ? 'active' : ''; ?>">
        <a class="nav-link" href="?page=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Faskes
    </div>

    <!-- Nav Items -->
    <li class="nav-item <?php echo ($file == 'faskes') ? 'active' : ''; ?>">
        <a class="nav-link" href="?url=faskes">
            <i class="fas fa-fw fa-hospital"></i>
            <span>Fasilitas Kesehatan</span>
        </a>
    </li>

    <li class="nav-item <?php echo ($file == 'provinsi') ? 'active' : ''; ?>">
        <a class="nav-link" href="?url=provinsi">
            <i class="fas fa-fw fa-map-marked-alt"></i>
            <span>Provinsi</span>
        </a>
    </li>

    <li class="nav-item <?php echo ($file == 'kabkota') ? 'active' : ''; ?>">
        <a class="nav-link" href="?url=kabkota">
            <i class="fas fa-fw fa-city"></i>
            <span>KabKota</span>
        </a>
    </li>

    <li class="nav-item <?php echo ($file == 'jenisfaskes') ? 'active' : ''; ?>">
        <a class="nav-link" href="?url=jenisfaskes">
            <i class="fas fa-fw fa-notes-medical"></i>
            <span>Jenis Faskes</span>
        </a>
    </li>

    <li class="nav-item <?php echo ($file == 'kategorifaskes') ? 'active' : ''; ?>">
        <a class="nav-link" href="?url=kategorifaskes">
            <i class="fas fa-fw fa-th-list"></i>
            <span>Kategori Faskes</span>
        </a>
    </li>

    <!-- Sidebar Toggler -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
