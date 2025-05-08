<div class="container">
    <div class="card shadow-sm border-primary">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Data Fasilitas Kesehatan</h5>
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
                            <h5 class="modal-title">Form Tambah Fasilitas Kesehatan</h5>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama Fasilitas Kesehatan</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pengelola">Nama Pengelola</label>
                                    <input type="text" name="nama_pengelola" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" name="website" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="kabkota_id">Kabupaten/Kota</label>
                                    <select name="kabkota_id" class="form-control" required>
                                        <?php
                                        require_once("Controllers/KabKota.php");
                                        $kabkota = new KabKota($pdo);
                                        $kabkotaList = $kabkota->index();
                                        foreach ($kabkotaList as $item):
                                        ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input type="number" name="rating" class="form-control" min="1" max="5" required>
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
                                    <label for="jenis_faskes_id">Jenis Fasilitas Kesehatan</label>
                                    <select name="jenis_faskes_id" class="form-control" required>
                                        <option value="">Pilih Jenis Fasilitas Kesehatan</option>
                                        <?php
                                        require_once("Controllers/JenisFaskes.php");
                                        $jenisfaskes = new JenisFaskes($pdo);
                                        $jenisfaskesList = $jenisfaskes->index();
                                        foreach ($jenisfaskesList as $jenis):
                                        ?>
                                        <option value="<?= $jenis['id'] ?>"><?= $jenis['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select name="kategori_id" class="form-control" required>
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        require_once("Controllers/KategoriFaskes.php");
                                        $kategorifaskes = new KategoriFaskes($pdo);
                                        $kategorifaskesList = $kategorifaskes->index();
                                        foreach ($kategorifaskesList as $kategori):
                                        ?>
                                        <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    
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
                            <th>Nama Pengelola</th>
                            <th>Alamat</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Kabupaten/Kota</th>
                            <th>Rating</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Jenis Faskes</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("Controllers/Faskes.php");
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
                            <td><?= str_repeat('★', $item['rating']) ?></td>
                            <td><?= $item['latitude'] ?></td>
                            <td><?= $item['longitude'] ?></td>
                            <td><?= $item['jenis_faskes'] ?></td>
                            <td><?= $item['kategori'] ?></td>
                            <!-- Aksi Edit dan Hapus -->
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
                                                <label for="nama">Nama Fasilitas Kesehatan</label>
                                                <input type="text" name="nama" class="form-control" value="<?= $item['nama'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pengelola">Nama Pengelola</label>
                                                <input type="text" name="nama_pengelola" class="form-control" value="<?= $item['nama_pengelola'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="<?= $item['alamat'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" name="website" class="form-control" value="<?= $item['website'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" value="<?= $item['email'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="kabkota_id">Kabupaten/Kota</label>
                                                <select name="kabkota_id" class="form-control" required>
                                                    <?php
                                                    require_once("Controllers/KabKota.php");
                                                    $kabkota = new KabKota($pdo);
                                                    $kabkotaList = $kabkota->index();
                                                    foreach ($kabkotaList as $item):
                                                    ?>
                                                    <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="rating">Rating</label>
                                                <input type="number" name="rating" class="form-control" min="1" max="5" value="<?= $item['rating'] ?>" required>
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
                                                <label for="jenis_faskes_id">Jenis Fasilitas Kesehatan</label>
                                                <select name="jenis_faskes_id" class="form-control" required>
                                                    <?php
                                                    require_once("Controllers/JenisFaskes.php");
                                                    $jenisfaskes = new JenisFaskes($pdo);
                                                    $jenisfaskesList = $jenisfaskes->index();
                                                    foreach ($jenisfaskesList as $jenis):
                                                    ?>
                                                    <option value="<?= $jenis['id'] ?>"><?= $jenis['nama'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="kategori_id">Kategori</label>
                                                <select name="kategori_id" class="form-control" required>
                                                    <?php
                                                    require_once("Controllers/KategoriFaskes.php");
                                                    $kategorifaskes = new KategoriFaskes($pdo);
                                                    $kategorifaskesList = $kategorifaskes->index();
                                                    foreach ($kategorifaskesList as $kategori):
                                                    ?>
                                                    <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
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
                                    'nama_pengelola' => $_POST['nama_pengelola'],
                                    'alamat' => $_POST['alamat'],
                                    'website' => $_POST['website'],
                                    'email' => $_POST['email'],
                                    'kabkota_id' => $_POST['kabkota_id'],
                                    'rating' => $_POST['rating'],
                                    'latitude' => $_POST['latitude'],
                                    'longitude' => $_POST['longitude'],
                                    'jenis_faskes_id' => $_POST['jenis_faskes_id'],
                                    'kategori_id' => $_POST['kategori_id'],
                                ];
                                $faskes->create($data);
                                echo '<script>alert("Data berhasil ditambahkan");location.href="?url=faskes"</script>';
                            } elseif ($_POST['type'] == "delete") {
                                $faskes->delete($_POST['id']);
                                echo '<script>alert("Data berhasil dihapus");location.href="?url=faskes"</script>';
                            } elseif ($_POST['type'] == "update") {
                                $data = [
                                    'nama' => $_POST['nama'],
                                    'nama_pengelola' => $_POST['nama_pengelola'],
                                    'alamat' => $_POST['alamat'],
                                    'website' => $_POST['website'],
                                    'email' => $_POST['email'],
                                    'kabkota_id' => $_POST['kabkota_id'],
                                    'rating' => $_POST['rating'],
                                    'latitude' => $_POST['latitude'],
                                    'longitude' => $_POST['longitude'],
                                    'jenis_faskes_id' => $_POST['jenis_faskes_id'],
                                    'kategori_id' => $_POST['kategori_id'],
                                    'id' => $_POST['id'],
                                ];
                                $faskes->update($_POST['id'], $data);
                                echo '<script>alert("Data berhasil diupdate");location.href="?url=faskes"</script>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
