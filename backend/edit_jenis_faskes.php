<?php
include 'db.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM jenis_faskes WHERE id = $id"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  mysqli_query($conn, "UPDATE jenis_faskes SET nama='$nama' WHERE id=$id");
  header("Location: ../admin/jenis.php?status=updated");
  exit;
}
?>

<?php include '../admin/partials/header.php'; ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1 class="mb-3">Edit Jenis Faskes</h1>
  </section>

  <section class="content">
    <div class="card shadow">
      <div class="card-header bg-warning text-white">
        <h3 class="card-title mb-0"><i class="fas fa-edit"></i> Edit Jenis Faskes</h3>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="nama">Nama Jenis Faskes</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
          </div>

          <div class="mt-4">
            <button type="submit" class="btn btn-success mr-2">
              <i class="fas fa-save"></i> Simpan
            </button>
            <a href="../admin/jenis.php" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<?php include '../admin/partials/footer.php'; ?>