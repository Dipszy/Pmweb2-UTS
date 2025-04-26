<?php
include 'helper.php';
include '../backend/db.php';

$activePage = 'kategori';

$result = mysqli_query($conn, "SELECT * FROM kategori");
?>

<?php include 'partials/header.php'; ?>

<div class="content-wrapper">
  <section class="content-header mb-3">
    <div class="container-fluid">
      <h1>
        <i class="fas fa-tags text-primary mr-2"></i> Kategori Faskes
      </h1>
    </div>
  </section>

  <section class="content">
    <?php if (isset($_GET['status'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php if ($_GET['status'] == 'added') echo "Kategori berhasil <strong>ditambahkan</strong>.";
              elseif ($_GET['status'] == 'updated') echo "Kategori berhasil <strong>diperbarui</strong>.";
              elseif ($_GET['status'] == 'deleted') echo "Kategori berhasil <strong>dihapus</strong>."; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0">
          <i class="fas fa-list"></i> Daftar Kategori Faskes
        </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th style="width: 5%;">No</th>
                <th>Nama Kategori</th>
                <th style="width: 20%;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['nama']) ?></td>
                  <td>
                    <a href="../backend/edit_kategori.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm mr-1">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="../backend/hapus_kategori.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                      <i class="fas fa-trash-alt"></i> Hapus
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          <a href="../backend/tambah_kategori.php" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Kategori
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'partials/footer.php'; ?>