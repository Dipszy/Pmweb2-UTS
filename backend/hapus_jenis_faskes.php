<?php
include 'db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM jenis_faskes WHERE id=$id");
header("Location: ../admin/jenis.php?status=deleted");
exit;
?>