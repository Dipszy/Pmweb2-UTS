<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  mysqli_query($conn, "INSERT INTO kategori (nama) VALUES ('$nama')");
  header("Location: ../admin/kategori.php?status=added");
  exit;
}
?>

<?php include '../admin/partials/header.php'; ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1 class="mb-3">Tambah Kategori Faskes</h1>
  </section>

  <section class="content">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0">
          <i class="fas fa-plus"></i> Tambah Kategori Faskes
        </h3>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Contoh: Pemerintah / Swasta" required>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-success mr-2">
              <i class="fas fa-save"></i> Simpan
            </button>
            <a href="../admin/kategori.php" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<?php include '../admin/partials/footer.php'; ?>