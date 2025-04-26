<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $query = "INSERT INTO faskes (
                nama, nama_pengelola, alamat, website, email,
                kabkota_id, rating, latitude, longitude,
                jenis_faskes_id, kategori_id
              ) VALUES (
                '$nama', '$nama_pengelola', '$alamat', '$website', '$email',
                '$kabkota_id', '$rating', '$latitude', '$longitude',
                '$jenis_faskes_id', '$kategori_id'
              )";

    if (mysqli_query($conn, $query)) {
        header('Location: ../admin/faskes.php?status=added');
        exit();
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
} else {
    echo "Akses tidak valid.";
}
