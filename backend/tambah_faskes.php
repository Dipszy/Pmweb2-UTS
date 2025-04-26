<?php
include '../admin/helper.php';
include 'db.php';

$kabkota = mysqli_query($conn, "SELECT * FROM kabkota");
$jenis_faskes = mysqli_query($conn, "SELECT * FROM jenis_faskes");
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<?php include '../admin/partials/header.php'; ?>

<div class="content-wrapper">
  <section class="content">
    <div class="card shadow mt-4">
      <div class="card-header bg-success text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Fasilitas Kesehatan</h3>
      </div>

      <div class="card-body">
        <form action="proses_tambah_faskes.php" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><i class="fas fa-hospital"></i> Nama</label>
                <input type="text" name="nama" class="form-control" required>
              </div>

              <div class="form-group">
                <label><i class="fas fa-user-tie"></i> Nama Pengelola</label>
                <input type="text" name="nama_pengelola" class="form-control" required>
              </div>

              <div class="form-group">
                <label><i class="fas fa-map-marker-alt"></i> Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
              </div>

              <div class="form-group">
                <label><i class="fas fa-globe"></i> Website</label>
                <input type="text" name="website" class="form-control">
              </div>

              <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" class="form-control">
              </div>

              <div class="form-group">
                <label><i class="fas fa-city"></i> Kab/Kota</label>
                <select name="kabkota_id" class="form-control" required>
                  <option value="">--Pilih Kab/Kota--</option>
                  <?php while ($row = mysqli_fetch_assoc($kabkota)) : ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><i class="fas fa-star"></i> Rating</label>
                <input type="number" name="rating" step="0.1" class="form-control" required>
              </div>

              <div class="form-group">
                <label><i class="fas fa-map-pin"></i> Latitude</label>
                <input type="text" name="latitude" class="form-control">
              </div>

              <div class="form-group">
                <label><i class="fas fa-map-pin"></i> Longitude</label>
                <input type="text" name="longitude" class="form-control">
              </div>

              <div class="form-group">
                <label><i class="fas fa-stethoscope"></i> Jenis Faskes</label>
                <select name="jenis_faskes_id" class="form-control" required>
                  <option value="">--Pilih Jenis--</option>
                  <?php while ($row = mysqli_fetch_assoc($jenis_faskes)) : ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                  <?php endwhile; ?>
                </select>
              </div>

              <div class="form-group">
                <label><i class="fas fa-tags"></i> Kategori</label>
                <select name="kategori_id" class="form-control" required>
                  <option value="">--Pilih Kategori--</option>
                  <?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="text-right mt-4">
            <a href="../admin/faskes.php" class="btn btn-secondary mr-2">
              <i class="fas fa-arrow-left"></i> Batal
            </a>
            <button type="submit" class="btn btn-success">
              <i class="fas fa-save"></i> Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?php include '../admin/partials/footer.php'; ?>