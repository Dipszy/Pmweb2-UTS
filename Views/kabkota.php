<div class="container">
    <div class="card shadow-sm border-primary">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Data Kabupaten/Kota</h5>
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
                            <h5 class="modal-title">Form Tambah Kabupaten/Kota</h5>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama Kabupaten/Kota</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" name="latitude" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" name="longitude" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi_id">Provinsi</label>
                                    <select name="provinsi_id" class="form-control" required>
                                        <option value="">Pilih Provinsi</option>
                                        <?php
                                        require_once("Controllers/Provinsi.php");
                                        $provinsi = $provinsi->index();
                                        foreach ($provinsi as $item) {
                                            echo '<option value="' . $item['id'] . '">' . $item['nama'] . '</option>';
                                        }
                                        ?>
                                    </select>
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
                            <th>Provinsi</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("Controllers/KabKota.php");
                        $row = $kabkota->index();
                        $nomor = 1;
                        foreach ($row as $item):
                        ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['provinsi_id'] ?></td>
                            <td><?= $item['latitude'] ?></td>
                            <td><?= $item['longitude'] ?></td>
                            <td>
                                <!-- Hapus Button -->
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="type" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                
                                <!-- Edit Button -->
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
                                        <h5 class="modal-title">Form Edit Kabupaten/Kota</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nama">Nama Kabupaten/Kota</label>
                                                <input type="text" name="nama" class="form-control" value="<?= $item['nama'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="latitude">Latitude</label>
                                                <input type="text" name="latitude" class="form-control" value="<?= $item['latitude'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="longitude">Longitude</label>
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
                            if ($_POST['type'] == "tambah") {
                                $data = [
                                    'nama' => $_POST['nama'],
                                    'provinsi_id' => $_POST['provinsi_id'],
                                    'latitude' => $_POST['latitude'],
                                    'longitude' => $_POST['longitude'],
                                ];
                                $kabkota->create($data);
                                echo '<script>alert("Data berhasil ditambahkan");location.href="?url=kabkota"</script>';
                            } elseif ($_POST['type'] == "delete") {
                                $kabkota->delete($_POST['id']);
                                echo '<script>alert("Data berhasil dihapus");location.href="?url=kabkota"</script>';
                            } elseif ($_POST['type'] == "update") {
                                $data = [
                                    'nama' => $_POST['nama'],
                                    'provinsi_id' => $_POST['provinsi_id'],
                                    'latitude' => $_POST['latitude'],
                                    'longitude' => $_POST['longitude'],
                                ];
                                $kabkota->update($_POST['id'], $data);
                                echo '<script>alert("Data berhasil diupdate");location.href="?url=kabkota"</script>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
