<?php
require_once 'Config/koneksi.php';

class KategoriFaskes
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query("SELECT * FROM kategori");
        return $stmt->fetchALL();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM kategori WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO kategori (nama) VALUES (?)");
        return $stmt->execute([
            $data['nama']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE kategori SET nama = ? WHERE id=?");
        return $stmt->execute([
            $data['nama'],
            $id 
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM kategori WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$kategorifaskes = new KategoriFaskes($pdo);
