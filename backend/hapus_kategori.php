<?php
include 'db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");
header("Location: ../admin/kategori.php?status=deleted");
exit;