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
$avg_rating = $dashboard->getAvgRating('faskes');
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $avg_rating ?>/5</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Distribusi Faskes -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Distribusi Jenis Faskes</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="jenisFaskesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Faskes Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Faskes</th>
                                    <th>Lokasi</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_faskes as $faskes): ?>
                                <tr>
                                    <td><?= $faskes['nama'] ?></td>
                                    <td><?= $faskes['kabkota'] ?></td>
                                    <td><?= str_repeat('★', $faskes['rating']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Peta Sebaran (Opsional) -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Peta Sebaran Faskes</h6>
                </div>
                <div class="card-body">
                    <div id="map" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->