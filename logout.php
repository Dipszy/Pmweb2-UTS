<?php
session_start();        // Mulai session
session_unset();        // Hapus semua variabel session
session_destroy();      // Hancurkan session

// Arahkan ke halaman login atau beranda
header("Location: index.php");
exit;