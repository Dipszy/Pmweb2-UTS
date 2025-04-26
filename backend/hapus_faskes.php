<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah data dengan ID tersebut ada
    $cek = mysqli_query($conn, "SELECT * FROM faskes WHERE id = '$id'");
    if (mysqli_num_rows($cek) > 0) {
        $hapus = mysqli_query($conn, "DELETE FROM faskes WHERE id = '$id'");

        if ($hapus) {
            // Redirect ke halaman utama dengan notifikasi
            header('Location: ../admin/faskes.php?status=deleted');
            exit();
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak diberikan.";
}
