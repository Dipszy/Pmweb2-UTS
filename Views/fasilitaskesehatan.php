<div class="container">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">
                Tambah Data
            </button>
            <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Fasilitas Kesehatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Faskes*</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Pengelola</label>
                                <input type="text" name="namapengelola" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat*</label>
                                <textarea name="alamat" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Website</label>
                                <input type="url" name="website" class="form-control" placeholder="https://">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        
                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi*</label>
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
                            <div class="form-group">
                                <label>Kabupaten/Kota*</label>
                                <select name="kabkota_id" class="form-control" required>
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        <?php
                                        require_once("Controllers/KabKota.php");
                                        $kabkota = $kabkota->index();
                                        foreach ($kabkota as $item) {
                                            echo '<option value="' . $item['id'] . '">' . $item['nama'] . '</option>';
                                        }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Faskes*</label>
                                <select name="jenis_faskes_id" class="form-control" required>
                                        <option value="">Pilih Jenis Faskes</option>
                                        <?php require_once("Controllers/JenisFaskes.php");
                                        $jenisfaskes = new JenisFaskes($pdo);
                                        $datajenisfaskes = $jenisfaskes->index();
                                        foreach ($datajenisfaskes as $jenis) {
                                            echo '<option value="'.$jenis['id'].'">'.$jenis['nama'].'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori*</label>
                                <select name="kategori_id" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php
                                    require_once("Controllers/KategoriFaskes.php");
                                    $kategorifaskes = new KategoriFaskes($pdo);
                                    $datakategorifaskes = $kategorifaskes->index();
                                    foreach ($datakategorifaskes as $kategori) {
                                        echo '<option value="'.$kategori['id'].'">'.$kategori['nama'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rating (1-5)</label>
                                <input type="number" name="rating" class="form-control" min="1" max="5">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Latitude*</label>
                                    <input type="number" step="0.000001" name="latitude" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label>Longitude*</label>
                                    <input type="number" step="0.000001" name="longitude" class="form-control" required>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="button" class="btn btn-sm btn-secondary" id="btn-get-location">
                                        <i class="fas fa-map-marker-alt"></i> Ambil Lokasi Saya
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="type" value="tambah">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Pengelola</th>
                        <th>Alamat</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>KabKota</th>
                        <th>Rating</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Jenis Faskes</th>
                        <th>Kategori Faskes</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("Controllers/FasilitasKesehatan.php");
                    $row = $faskes->index();
                    $nomor = 1;
                    foreach ($row as $item):
                    ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['nama_pengelola'] ?></td>
                            <td><?= $item['alamat'] ?></td>
                            <td><?= $item['website'] ?></td>
                            <td><?= $item['email'] ?></td>
                            <td><?= $item['kabkota_id'] ?></td>
                            <td><?= $item['rating'] ?></td>
                            <td><?= $item['latitude'] ?></td>
                            <td><?= $item['longitude'] ?></td>
                            <td><?= $item['jenis_faskes_id'] ?></td>
                            <td><?= $item['kategori_id'] ?></td>
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
                            $faskes->delete($_POST['id']);
                            echo '<script>alert("hapus berhasil")</script><meta http-equiv="refresh" content="0; url=?url=fasilitaskesehatan">';
                        } elseif ($_POST['type'] == "tambah") {
                            $data = [
                                'nama' => $_POST['nama'],
                                'nama_pengelola' => $_POST['namapengelola'],
                                'alamat' => $_POST['alamat'],
                                'website' => $_POST['website'],
                                'email' => $_POST['email'],
                                'kabkota_id' => $_POST['kabkota'],
                                'rating' => $_POST['rating'],
                                'latitude' => $_POST['latitude'],
                                'longitude' => $_POST['longitude'],
                                'jenis_faskes_id' => $_POST['jenisfaskes'],
                                'kategori_id' => $_POST['kategorifaskes'],
                            ];
                            $faskes->create($data);
                            echo '<script>alert("tambah berhasil")</script><meta http-equiv="refresh" content="0; url=?url=fasilitaskesehatan">';
                        } elseif ($_POST['type'] == "update") {
                            $data = [
                                'nama' => $_POST['nama'],
                                'nama_pengelola' => $_POST['namapengelola'],
                                'alamat' => $_POST['alamat'],
                                'website' => $_POST['website'],
                                'email' => $_POST['email'],
                                'kabkota_id' => $_POST['kabkota'],
                                'rating' => $_POST['rating'],
                                'latitude' => $_POST['latitude'],
                                'longitude' => $_POST['longitude'],
                                'jenis_faskes_id' => $_POST['jenisfaskes'],
                                'kategori_id' => $_POST['kategorifaskes'],
                            ];
                            $faskes->update($_POST['id'], $data);
                            echo '<script>alert("update berhasil")</script><meta http-equiv="refresh" content="0; url=?url=fasilitaskesehatan">';
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

