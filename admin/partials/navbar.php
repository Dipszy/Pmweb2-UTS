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
    <a href="index.php" class="brand-link text-center w-100">
        <span class="brand-text font-weight-light">Faskes Admin</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= $base_url ?>/index.php" class="nav-link <?= ($activePage == 'dashboard') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/faskes.php" class="nav-link <?= ($activePage == 'faskes') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Faskes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/provinsi.php" class="nav-link <?= ($activePage == 'provinsi') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-map"></i>
                        <p>Provinsi & Kab/kota</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/jenis.php" class="nav-link <?= ($activePage == 'jenis') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Jenis</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/kategori.php" class="nav-link <?= ($activePage == 'kategori') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Kategori</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
