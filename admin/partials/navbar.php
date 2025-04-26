<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</nav>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Faskes Admin</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?= ($activePage == 'dashboard') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="faskes.php" class="nav-link <?= ($activePage == 'faskes') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Faskes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="provinsi.php" class="nav-link <?= ($activePage == 'provinsi') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-map"></i>
                        <p>Provinsi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kabkota.php" class="nav-link <?= ($activePage == 'kabkota') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Kab/Kota</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="jenis.php" class="nav-link <?= ($activePage == 'jenis') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Jenis Faskes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kategori.php" class="nav-link <?= ($activePage == 'kategori') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Kategori Faskes</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
