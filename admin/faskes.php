<?php
include 'helper.php';
include '../backend/db.php';

$activePage = 'faskes';

$query = "SELECT 
            faskes.*, 
            kabkota.nama AS kabkota_nama, 
            jenis_faskes.nama AS jenis_faskes_nama,
            kategori.nama AS kategori_nama
          FROM faskes
          JOIN kabkota ON faskes.kabkota_id = kabkota.id
          JOIN jenis_faskes ON faskes.jenis_faskes_id = jenis_faskes.id
          JOIN kategori ON faskes.kategori_id = kategori.id";

$result = mysqli_query($conn, $query);
?>

<?php include 'partials/header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Fasilitas Kesehatan</h1>
  </section>

  <section class="content">
    <?php if (isset($_GET['status'])) : ?>
        <?php if ($_GET['status'] == 'deleted') : ?>
        <div class="alert alert-success">Data berhasil dihapus.</div>
        <?php elseif ($_GET['status'] == 'updated') : ?>
        <div class="alert alert-success">Data berhasil diperbarui.</div>
        <?php elseif ($_GET['status'] == 'added') : ?>
        <div class="alert alert-success">Data berhasil ditambahkan.</div>
        <?php endif; ?>
    <?php endif; ?>
    
    <a href="../backend/tambah_faskes.php" class="btn btn-primary mb-2">Tambah Faskes</a>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Nama Pengelola</th>
              <th>Alamat</th>
              <th>Website</th>
              <th>Email</th>
              <th>Kab/Kota</th>
              <th>Rating</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Jenis Faskes</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['nama']) ?></td>
              <td><?= htmlspecialchars($row['nama_pengelola']) ?></td>
              <td><?= htmlspecialchars($row['alamat']) ?></td>
              <td><?= htmlspecialchars($row['website']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['kabkota_nama']) ?></td>
              <td><?= htmlspecialchars($row['rating']) ?></td>
              <td><?= htmlspecialchars($row['latitude']) ?></td>
              <td><?= htmlspecialchars($row['longitude']) ?></td>
              <td><?= htmlspecialchars($row['jenis_faskes_nama']) ?></td>
              <td><?= htmlspecialchars($row['kategori_nama']) ?></td>
              <td>
                <a href="../backend/edit_faskes.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="../backend/hapus_faskes.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<?php include 'partials/footer.php'; ?>