<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';       // Sesuaikan dengan username database Anda
$pass = '';           // Sesuaikan dengan password database Anda
$dbname = 'db_faskes'; // Nama database yang digunakan

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
