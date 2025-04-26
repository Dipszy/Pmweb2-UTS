<?php
include '../admin/helper.php';
include 'db.php';

$kabkota = mysqli_query($conn, "SELECT * FROM kabkota");
$jenis_faskes = mysqli_query($conn, "SELECT * FROM jenis_faskes");
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<?php include '../admin/partials/header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Fasilitas Kesehatan</h1>
  </section>

  <section class="content">
    <form action="proses_tambah_faskes.php" method="POST">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Nama Pengelola</label>
        <input type="text" name="nama_pengelola" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
      </div>

      <div class="form-group">
        <label>Website</label>
        <input type="text" name="website" class="form-control">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
      </div>

      <div class="form-group">
        <label>Kab/Kota</label>
        <select name="kabkota_id" class="form-control" required>
          <?php while ($row = mysqli_fetch_assoc($kabkota)) : ?>
            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Rating</label>
        <input type="number" name="rating" class="form-control" step="0.1" required>
      </div>

      <div class="form-group">
        <label>Latitude</label>
        <input type="text" name="latitude" class="form-control">
      </div>

      <div class="form-group">
        <label>Longitude</label>
        <input type="text" name="longitude" class="form-control">
      </div>

      <div class="form-group">
        <label>Jenis Faskes</label>
        <select name="jenis_faskes_id" class="form-control" required>
          <?php while ($row = mysqli_fetch_assoc($jenis_faskes)) : ?>
            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>
          <?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </section>
</div>

<?php include '../admin/partials/footer.php'; ?>
