<div class="container">
    <div class="card shadow-sm border-primary">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Data Provinsi</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-plus"></i> Tambah Data
            </button>

            <!-- Modal Tambah -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h4 class="modal-title">Form Tambah Data</h4>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Provinsi</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Ibukota</label>
                                    <input type="text" name="ibukota" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" name="latitude" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" name="longitude" class="form-control" required>
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
                            <th>Nama</th>
                            <th>Ibukota</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("Controllers/Provinsi.php");
                        $row = $provinsi->index();
                        $nomor = 1;
                        foreach ($row as $item):
                        ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['ibukota'] ?></td>
                            <td><?= $item['latitude'] ?></td>
                            <td><?= $item['longitude'] ?></td>
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
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">Form Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" value="<?= $item['nama'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Ibukota</label>
                                                <input type="text" name="ibukota" class="form-control" value="<?= $item['ibukota'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input type="text" name="latitude" class="form-control" value="<?= $item['latitude'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input type="text" name="longitude" class="form-control" value="<?= $item['longitude'] ?>" required>
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
                            if ($_POST['type'] == "delete") {
                                $provinsi->delete($_POST['id']);
                                echo '<script>alert("Data berhasil dihapus")</script><meta http-equiv="refresh" content="0; url=?url=provinsi">';
                            } elseif ($_POST['type'] == "tambah") {
                                $data = [
                                    'nama' => $_POST['nama'],
                                    'ibukota' => $_POST['ibukota'],
                                    'latitude' => $_POST['latitude'],
                                    'longitude' => $_POST['longitude'],
                                ];
                                $provinsi->create($data);
                                echo '<script>alert("Data berhasil ditambahkan")</script><meta http-equiv="refresh" content="0; url=?url=provinsi">';
                            } elseif ($_POST['type'] == "update") {
                                $data = [
                                    'nama' => $_POST['nama'],
                                    'ibukota' => $_POST['ibukota'],
                                    'latitude' => $_POST['latitude'],
                                    'longitude' => $_POST['longitude'],
                                ];
                                $provinsi->update($_POST['id'], $data);
                                echo '<script>alert("Data berhasil diupdate")</script><meta http-equiv="refresh" content="0; url=?url=provinsi">';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
