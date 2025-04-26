<?php
include 'db.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM provinsi WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  mysqli_query($conn, "UPDATE provinsi SET nama='$nama' WHERE id = $id");
  header("Location: ../admin/provinsi.php?status=updated");
  exit;
}
?>

<?php include '../admin/partials/header.php'; ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><i class="fas fa-edit"></i> Edit Provinsi</h1>
    </div>
  </section>

  <section class="content">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0"><i class="fas fa-flag"></i> Edit Data Provinsi</h3>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="nama">Nama Provinsi</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="<?= htmlspecialchars($data['nama']) ?>">
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Simpan Perubahan
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
