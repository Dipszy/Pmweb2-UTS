<?php
require_once 'Controllers/Dashboard.php';
require_once 'Controllers/JenisFaskes.php';
require_once 'Controllers/KategoriFaskes.php';
require_once 'Controllers/Provinsi.php';
require_once 'Controllers/KabKota.php';

// Bagian ini akan di-include di dalam Layouts/app.php yang sudah memiliki sidebar/topbar
$total_faskes = $dashboard->getCount('faskes');
$total_provinsi = $dashboard->getCount('provinsi');
$total_kabkota = $dashboard->getCount('kabkota');
$total_jenis = $dashboard->getCount('jenis_faskes');
$total_kategori = $dashboard->getCount('kategori');
$avg_rating_int = round($avg_rating);
$recent_faskes = $dashboard->getRecentFaskes(5); // Ambil 5 faskes terbaru
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard Faskes</h1>

    <!-- Ringkasan Statistik (Cards) -->
    <div class="row">
        <!-- Total Faskes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Faskes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_faskes ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Provinsi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Provinsi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_provinsi ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Kab/Kota -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Kabupaten/Kota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kabkota ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-city fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rating Rata-rata -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Rating Rata-rata</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $avg_rating_int ?>/5</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->