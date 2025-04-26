<?php
include '../admin/helper.php';
include 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM faskes WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

$kabkota = mysqli_query($conn, "SELECT * FROM kabkota");
$jenis_faskes = mysqli_query($conn, "SELECT * FROM jenis_faskes");
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<?php include '../admin/partials/header.php'; ?>

<div class="content-wrapper">
  <section class="content">
    <div class="card shadow mt-4">
      <div class="card-header bg-warning text-white">
        <h3 class="card-title"><i class="fas fa-edit"></i> Edit Data Faskes</h3>
      </div>

      <div class="card-body">
        <form action="proses_edit_faskes.php" method="POST">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><i class="fas fa-hospital"></i> Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
              </div>

              <div class="form-group">
                <label><i class="fas fa-user-tie"></i> Nama Pengelola</label>
                <input type="text" name="nama_pengelola" class="form-control" value="<?= htmlspecialchars($data['nama_pengelola']) ?>" required>
              </div>

              <div class="form-group">
                <label><i class="fas fa-map-marker-alt"></i> Alamat</label>
                <textarea name="alamat" class="form-control" required><?= htmlspecialchars($data['alamat']) ?></textarea>
              </div>

              <div class="form-group">
                <label><i class="fas fa-globe"></i> Website</label>
                <input type="text" name="website" class="form-control" value="<?= htmlspecialchars($data['website']) ?>">
              </div>

              <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($data['email']) ?>">
              </div>

              <div class="form-group">
                <label><i class="fas fa-city"></i> Kab/Kota</label>
                <select name="kabkota_id" class="form-control" required>
                  <?php while ($row = mysqli_fetch_assoc($kabkota)) : ?>
                    <option value="<?= $row['id'] ?>" <?= $row['id'] == $data['kabkota_id'] ? 'selected' : '' ?>>
                      <?= $row['nama'] ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><i class="fas fa-star"></i> Rating</label>
                <input type="number" name="rating" class="form-control" value="<?= $data['rating'] ?>" required>
              </div>

              <div class="form-group">
                <label><i class="fas fa-map-pin"></i> Latitude</label>
                <input type="text" name="latitude" class="form-control" value="<?= $data['latitude'] ?>">
              </div>

              <div class="form-group">
                <label><i class="fas fa-map-pin"></i> Longitude</label>
                <input type="text" name="longitude" class="form-control" value="<?= $data['longitude'] ?>">
              </div>

              <div class="form-group">
                <label><i class="fas fa-stethoscope"></i> Jenis Faskes</label>
                <select name="jenis_faskes_id" class="form-control" required>
                  <?php while ($row = mysqli_fetch_assoc($jenis_faskes)) : ?>
                    <option value="<?= $row['id'] ?>" <?= $row['id'] == $data['jenis_faskes_id'] ? 'selected' : '' ?>>
                      <?= $row['nama'] ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>

              <div class="form-group">
                <label><i class="fas fa-tags"></i> Kategori</label>
                <select name="kategori_id" class="form-control" required>
                  <?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
                    <option value="<?= $row['id'] ?>" <?= $row['id'] == $data['kategori_id'] ? 'selected' : '' ?>>
                      <?= $row['nama'] ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="text-right mt-4">
            <a href="../admin/faskes.php" class="btn btn-secondary mr-2">
              <i class="fas fa-arrow-left"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?php include '../admin/partials/footer.php'; ?>