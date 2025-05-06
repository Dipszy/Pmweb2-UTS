<?php
require_once 'Config/koneksi.php';

class KabKota
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM kabkota");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM kabkota WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO kabkota (nama, latitude, longitude, provinsi_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['nama'],
            $data['latitude'],
            $data['longitude'],
            $data['provinsi_id']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE kabkota SET nama = ?, latitude = ?, longitude = ?, provisi_id = ? WHERE id=?");
        return $stmt->execute([
            $data['nama'],
            $data['latitude'],
            $data['longitude'],
            $data['provinsi_id'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM kabkota WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$kabkota = new KabKota($pdo);
