<?php
include 'helper.php';
include '../backend/db.php';

$activePage = 'provinsi';

// Ambil data provinsi
$queryProvinsi = "SELECT * FROM provinsi";
$resultProv = mysqli_query($conn, $queryProvinsi);

// Ambil data kabkota dengan join ke provinsi
$queryKabkota = "SELECT kabkota.*, provinsi.nama AS provinsi_nama 
                 FROM kabkota 
                 JOIN provinsi ON kabkota.provinsi_id = provinsi.id";
$resultKabkota = mysqli_query($conn, $queryKabkota);
?>

<?php include 'partials/header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><i class="fas fa-map-marked-alt"></i> Data Wilayah</h1>
    </div>
  </section>

  <section class="content">
    <!-- Tabel Provinsi -->
    <div class="card shadow mb-4">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-flag"></i> Data Provinsi</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Nama Provinsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; while ($row = mysqli_fetch_assoc($resultProv)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td>
                  <a href="../backend/edit_provinsi.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="../backend/hapus_provinsi.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus provinsi ini?')">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <a href="../backend/tambah_provinsi.php" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Provinsi
          </a>
        </div>
      </div>
    </div>

    <!-- Tabel Kab/Kota -->
    <div class="card shadow">
      <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-city"></i> Data Kabupaten/Kota</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Nama Kab/Kota</th>
                <th>Provinsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; while ($row = mysqli_fetch_assoc($resultKabkota)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['provinsi_nama']) ?></td>
                <td>
                  <a href="../backend/edit_kabkota.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="../backend/hapus_kabkota.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kab/kota ini?')">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <a href="../backend/tambah_kabkota.php" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Kab/Kota
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'partials/footer.php'; ?>