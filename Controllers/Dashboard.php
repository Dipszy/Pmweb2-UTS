<?php
   require_once 'Config/koneksi.php';

   class Dashboard {
       private $pdo;

       public function __construct($pdo) {
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
         public function getAvgRating($table) {
              $query = $this->pdo->query("SELECT AVG(rating) as avg_rating FROM $table");
              $result = $query->fetch(); // Gunakan fetch() untuk PDO
              return $result['avg_rating'];
         }

         public function getRecentFaskes($limit = 5) {
            $query = $this->pdo->prepare("SELECT * FROM faskes ORDER BY id DESC LIMIT :limit");
            $query->bindValue(':limit', $limit, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll();
        }

   }

   // Buat instance Dashboard dengan koneksi PDO
   $dashboard = new Dashboard($pdo);

?>