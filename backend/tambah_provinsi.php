<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);

  $query = "INSERT INTO provinsi (nama) VALUES ('$nama')";
  mysqli_query($conn, $query);

  header("Location: ../admin/provinsi.php?status=added");
  exit;
}
?>

<?php include '../admin/partials/header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><i class="fas fa-flag"></i> Tambah Provinsi</h1>
    </div>
  </section>

  <section class="content">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus-circle"></i> Tambah Data Provinsi</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <label for="nama">Nama Provinsi</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama provinsi" required>
          </div>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan
          </button>
          <a href="../admin/provinsi.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </form>
      </div>
    </div>
  </section>
</div>

<?php include '../admin/partials/footer.php'; ?>