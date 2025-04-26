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
  <section class="content">
    <!-- Notifikasi -->
    <?php if (isset($_GET['status'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?php if ($_GET['status'] == 'deleted') : ?>
              Data berhasil <strong>dihapus</strong>.
            <?php elseif ($_GET['status'] == 'updated') : ?>
              Data berhasil <strong>diperbarui</strong>.
            <?php elseif ($_GET['status'] == 'added') : ?>
              Data berhasil <strong>ditambahkan</strong>.
            <?php endif; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Tabel -->
    <div class="card shadow mt-4">
      <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-hospital"></i> Daftar Fasilitas Kesehatan</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Pengelola</th>
                <th>Alamat</th>
                <th>Website</th>
                <th>Email</th>
                <th>Kab/Kota</th>
                <th>Rating</th>
                <th>Lat</th>
                <th>Lng</th>
                <th>Jenis</th>
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
                <td><a href="<?= htmlspecialchars($row['website']) ?>" target="_blank"><?= htmlspecialchars($row['website']) ?></a></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['kabkota_nama']) ?></td>
                <td><?= htmlspecialchars($row['rating']) ?></td>
                <td><?= htmlspecialchars($row['latitude']) ?></td>
                <td><?= htmlspecialchars($row['longitude']) ?></td>
                <td><?= htmlspecialchars($row['jenis_faskes_nama']) ?></td>
                <td><?= htmlspecialchars($row['kategori_nama']) ?></td>
                <td>
                  <a href="../backend/edit_faskes.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mb-1">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="../backend/hapus_faskes.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Yakin ingin menghapus data ini?')">
                    <i class="fas fa-trash-alt"></i> Hapus
                  </a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>

        <!-- Tombol Tambah di Bawah -->
        <div class="mt-3">
          <a href="../backend/tambah_faskes.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Faskes
          </a>
        </div>

      </div>
    </div>
  </section>
</div>

<?php include 'partials/footer.php'; ?>