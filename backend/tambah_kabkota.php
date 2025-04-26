<?php
include 'db.php';

$provinsi = mysqli_query($conn, "SELECT * FROM provinsi");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $provinsi_id = (int) $_POST['provinsi_id'];
  mysqli_query($conn, "INSERT INTO kabkota (nama, provinsi_id) VALUES ('$nama', $provinsi_id)");
  header("Location: ../admin/provinsi.php?status=added");
  exit;
}
?>

<?php include '../admin/partials/header.php'; ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><i class="fas fa-plus-circle"></i> Tambah Kabupaten/Kota</h1>
    </div>
  </section>

  <section class="content">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0"><i class="fas fa-city"></i> Form Tambah Kab/Kota</h3>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="nama">Nama Kab/Kota</label>
            <input type="text" name="nama" id="nama" class="form-control" required placeholder="Masukkan nama kabupaten/kota">
          </div>
          <div class="form-group">
            <label for="provinsi">Pilih Provinsi</label>
            <select name="provinsi_id" id="provinsi" class="form-control" required>
              <option value="">-- Pilih Provinsi --</option>
              <?php while ($row = mysqli_fetch_assoc($provinsi)) : ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Simpan
            </button>
            <a href="../admin/provinsi.php" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<?php include '../admin/partials/footer.php'; ?>