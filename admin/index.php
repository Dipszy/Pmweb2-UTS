<?php
session_start();

$activePage = 'dashboard';
include 'helper.php';
include '../backend/db.php';

$faskes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM faskes"));
$provinsi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM provinsi"));
$kabkota = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM kabkota"));
$jenisFaskes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM jenis_faskes"));
$kategori = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM kategori"));

include 'partials/header.php';
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                $cards = [
                    ['total' => $faskes['total'], 'label' => 'Jumlah Faskes', 'icon' => 'hospital', 'bg' => 'info'],
                    ['total' => $provinsi['total'], 'label' => 'Jumlah Provinsi', 'icon' => 'map', 'bg' => 'success'],
                    ['total' => $kabkota['total'], 'label' => 'Jumlah Kab/Kota', 'icon' => 'city', 'bg' => 'warning'],
                    ['total' => $jenisFaskes['total'], 'label' => 'Jumlah Jenis Faskes', 'icon' => 'cogs', 'bg' => 'danger'],
                    ['total' => $kategori['total'], 'label' => 'Jumlah Kategori', 'icon' => 'tags', 'bg' => 'primary']
                ];

                foreach ($cards as $card): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="small-box bg-<?= $card['bg'] ?> shadow-sm">
                            <div class="inner">
                                <h3><?= $card['total'] ?></h3>
                                <p><?= $card['label'] ?></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-<?= $card['icon'] ?>"></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<?php include 'partials/footer.php'; ?>