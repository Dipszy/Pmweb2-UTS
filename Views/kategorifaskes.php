<div class="container">
    <div class="card shadow-sm border-primary">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Data Kategori Faskes</h5>
        </div>
        <div class="card-body">
            <!-- Tombol Tambah Data -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah">
                <i class="fas fa-plus"></i> Tambah Data
            </button>

            <!-- Modal Tambah -->
            <div class="modal fade" id="modal-tambah">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Form Tambah Kategori</h5>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <input type="hidden" name="type" value="tambah">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("Controllers/KategoriFaskes.php");
                        $kategori = $kategorifaskes->index();
                        $no = 1;
                        foreach ($kategori as $item):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="type" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-<?= $item['id'] ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modal-edit-<?= $item['id'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-dark">
                                        <h5 class="modal-title">Form Edit Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <input type="text" name="nama" class="form-control" value="<?= $item['nama'] ?>" required>
                                            </div>
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <input type="hidden" name="type" value="update">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <?php
                        if (isset($_POST['type'])) {
                            if ($_POST['type'] == "tambah") {
                                $kategorifaskes->create(['nama' => $_POST['nama']]);
                                echo '<script>alert("Data berhasil ditambahkan");location.href="?url=kategori"</script>';
                            } elseif ($_POST['type'] == "delete") {
                                $kategorifaskes->delete($_POST['id']);
                                echo '<script>alert("Data berhasil dihapus");location.href="?url=kategori"</script>';
                            } elseif ($_POST['type'] == "update") {
                                $kategorifaskes->update($_POST['id'], ['nama' => $_POST['nama']]);
                                echo '<script>alert("Data berhasil diupdate");location.href="?url=kategori"</script>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
