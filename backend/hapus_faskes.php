<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $cek = mysqli_query($conn, "SELECT * FROM faskes WHERE id = '$id'");
    if (mysqli_num_rows($cek) > 0) {
        $hapus = mysqli_query($conn, "DELETE FROM faskes WHERE id = '$id'");

        if ($hapus) {
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
