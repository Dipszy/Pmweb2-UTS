<?php
class Dashboard {
    private $pdo;

    public function __construct() {
        include_once('./Config/koneksi.php');
        global $pdo; 
        $this->pdo = $pdo; // Simpan koneksi di property class
    }

    public function index() {
        // Ambil data
        $data = [
            'total_user' => $this->getCount('users'),
            'total_faskes' => $this->getCount('faskes'),
            'total_jenis' => $this->getCount('jenis_faskes'),
            'total_kabkota' => $this->getCount('kabkota'),
            'total_provinsi' => $this->getCount('provinsi'),
            'total_kategori' => $this->getCount('kategori')
        ];

        // Extract variabel untuk view
        extract($data);

        // Load template utama
        include('./Layouts/app.php');
    }

    public function getCount($table) {
        $query = $this->pdo->query("SELECT COUNT(*) as total FROM $table");
        $result = $query->fetch(); // Gunakan fetch() untuk PDO
        return $result['total'];
    }
}
