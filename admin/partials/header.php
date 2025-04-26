<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Link CSS AdminLTE -->
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">

    <style>
        /* Smooth sidebar transition */
        body.sidebar-collapse .main-sidebar {
            transition: margin-left 0.3s ease;
        }

        .main-sidebar {
            transition: margin-left 0.3s ease;
        }
    </style>
</head>

<?php
// Deteksi jika halaman adalah halaman form tambah/edit
$current_file = basename($_SERVER['PHP_SELF']);
$isFormPage = preg_match('/^(tambah_|edit_)/', $current_file);
?>

<body class="hold-transition sidebar-mini <?= $isFormPage ? 'sidebar-collapse' : '' ?>">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'navbar.php'; ?>
