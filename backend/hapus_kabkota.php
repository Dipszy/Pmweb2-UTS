<?php
include 'db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kabkota WHERE id = $id");
header("Location: ../admin/provinsi.php?status=deleted");
exit;
?>