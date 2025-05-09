<?php
require_once 'Config/koneksi.php';

class Faskes
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT faskes.*, kabkota.nama AS nama_kabkota, jenis_faskes.nama AS nama_jenis_faskes, kategori.nama AS nama_kategori
        FROM faskes 
        JOIN jenis_faskes ON faskes.jenis_faskes_id = jenis_faskes.id
        JOIN kategori ON faskes.kategori_id = kategori.id
        JOIN kabkota ON faskes.kabkota_id = kabkota.id");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM faskes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO faskes (nama , nama_pengelola, alamat, website, email, kabkota_id, rating, latitude, longitude, jenis_faskes_id, kategori_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nama'],
            $data['nama_pengelola'],
            $data['alamat'],
            $data['website'],
            $data['email'],
            $data['kabkota_id'],
            $data['rating'],
            $data['latitude'],
            $data['longitude'],
            $data['jenis_faskes_id'],
            $data['kategori_id'],

        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE faskes SET nama = ?, nama_pengelola = ?, alamat = ?, website = ?, email = ?, kabkota_id = ?, rating = ?, latitude = ?, longitude = ?, jenis_faskes_id = ?, kategori_id = ? WHERE id=?");
        return $stmt->execute([
            $data['nama'],
            $data['nama_pengelola'],
            $data['alamat'],
            $data['website'],
            $data['email'],
            $data['kabkota_id'],
            $data['rating'],
            $data['latitude'],
            $data['longitude'],
            $data['jenis_faskes_id'],
            $data['kategori_id'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM faskes WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$faskes = new Faskes($pdo);
