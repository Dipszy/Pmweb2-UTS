<?php
session_start();

$activePage = 'dashboard';
include 'helper.php';
include '../backend/db.php';

$faskesQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM faskes");
$faskes = mysqli_fetch_assoc($faskesQuery);

$provinsiQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM provinsi");
$provinsi = mysqli_fetch_assoc($provinsiQuery);

$kabkotaQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM kabkota");
$kabkota = mysqli_fetch_assoc($kabkotaQuery);

$jenisFaskesQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM jenis_faskes");
$jenisFaskes = mysqli_fetch_assoc($jenisFaskesQuery);

include 'partials/header.php';
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Statistik Faskes -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $faskes['total'] ?></h3>
                            <p>Jumlah Faskes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hospital"></i>
                        </div>
                    </div>
                </div>
                <!-- Statistik Provinsi -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $provinsi['total'] ?></h3>
                            <p>Jumlah Provinsi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map"></i>
                        </div>
                    </div>
                </div>
                <!-- Statistik Kab/Kota -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $kabkota['total'] ?></h3>
                            <p>Jumlah Kab/Kota</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                    </div>
                </div>
                <!-- Statistik Jenis Faskes -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jenisFaskes['total'] ?></h3>
                            <p>Jumlah Jenis Faskes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include 'partials/footer.php';
?>