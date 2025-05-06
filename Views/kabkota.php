<div class="container">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">
                Tambah Data
            </button>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Data </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
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
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>  
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
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
                                <form method="post">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                </form>
                                <a href="?url=detail&id=<?= $item['id'] ?>" class="btn btn-info btn-sm">Show</a>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-<?= $item['id'] ?>">Edit</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-edit-<?= $item['id'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Edit Data </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
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
                                            <div class="form-group">
                                                
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <input type="hidden" name="type" value="update">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <?php
                    endforeach;
                    if (isset($_POST['type'])) {
                        if ($_POST['type'] == "delete") {
                            $kabkota->delete($_POST['id']);
                            echo '<script>alert("hapus berhasil")</script><meta http-equiv="refresh" content="0; url=?url=kabkota">';
                        } elseif ($_POST['type'] == "tambah") {
                            $data = [
                                'nama' => $_POST['nama'],
                                'provinsi_id' => $_POST['provinsi_id'],
                                'latitude' => $_POST['latitude'],
                                'longitude' => $_POST['longitude'],
                            ];
                            $kabkota->create($data);
                            echo '<script>alert("tambah berhasil")</script><meta http-equiv="refresh" content="0; url=?url=kabkota">';
                        } elseif ($_POST['type'] == "update") {
                            $data = [
                                'nama' => $_POST['nama'],
                                'provinsi_id' => $_POST['provinsi_id'],
                                'latitude' => $_POST['latitude'],
                                'longitude' => $_POST['longitude'],
                            ];
                            $kabkota->update($_POST['id'], $data);
                            echo '<script>alert("update berhasil")</script><meta http-equiv="refresh" content="0; url=?url=kabkota">';
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

