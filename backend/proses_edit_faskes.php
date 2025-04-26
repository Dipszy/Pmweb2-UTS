<?php
include 'db.php';
session_start(); // biar bisa pakai $_SESSION kalau mau kasih notifikasi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    if (!$id) {
        echo "ID tidak ditemukan.";
        exit();
    }

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nama_pengelola = mysqli_real_escape_string($conn, $_POST['nama_pengelola']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $kabkota_id = $_POST['kabkota_id'];
    $rating = $_POST['rating'];
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
    $jenis_faskes_id = $_POST['jenis_faskes_id'];
    $kategori_id = $_POST['kategori_id'];

    $query = "UPDATE faskes SET 
                nama = '$nama',
                nama_pengelola = '$nama_pengelola',
                alamat = '$alamat',
                website = '$website',
                email = '$email',
                kabkota_id = '$kabkota_id',
                rating = '$rating',
                latitude = '$latitude',
                longitude = '$longitude',
                jenis_faskes_id = '$jenis_faskes_id',
                kategori_id = '$kategori_id'
              WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        // Boleh pakai session kalau mau tampilin notifikasi di halaman faskes.php
        // $_SESSION['success'] = 'Data berhasil diupdate!';
        header('Location: ../admin/faskes.php?status=updated');
        exit();
    } else {
        echo "Gagal update data: " . mysqli_error($conn);
    }
} else {
    // Misal orang buka langsung file ini
    header('Location: ../admin/faskes.php');    
    exit();
}
?>