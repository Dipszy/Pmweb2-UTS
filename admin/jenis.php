<?php
include 'helper.php';
include '../backend/db.php';

$activePage = 'jenis';
$query = mysqli_query($conn, "SELECT * FROM jenis_faskes");
?>

<?php include 'partials/header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><i class="fas fa-hospital"></i> Jenis Faskes</h1>
    </div>
  </section>

  <section class="content">
    <div class="card shadow mb-4">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-list"></i> Jenis Fasilitas Kesehatan</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Nama Jenis Faskes</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; while ($row = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td>
                  <a href="../backend/edit_jenis_faskes.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="../backend/hapus_jenis_faskes.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <a href="../backend/tambah_jenis_faskes.php" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Jenis Faskes
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'partials/footer.php'; ?>