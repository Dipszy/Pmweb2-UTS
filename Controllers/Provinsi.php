<?php
require_once 'Config/koneksi.php';

class Provinsi
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM provinsi");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM provinsi WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO provinsi (nama, ibukota, latitude, longitude) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['nama'],
            $data['ibukota'],
            $data['latitude'],
            $data['longitude']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE provinsi SET nama = ?, ibukota = ?, latitude = ?, longitude = ? WHERE id=?");
        return $stmt->execute([
            $data['nama'],
            $data['ibukota'],
            $data['latitude'],
            $data['longitude'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM provinsi WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$provinsi = new Provinsi($pdo);
