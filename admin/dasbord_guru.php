<?php
session_start();
include "../koneksi.php";

// Cek apakah pengguna sudah login dan merupakan guru
if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'guru') {
    header("Location: ../login/login.php");
    exit();
}

$guru_id = $_SESSION['user_id'];
$action = $_GET['action'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Sekolah</title>
    <link rel="stylesheet" href="css.admin/dashboard.css">
</head>
<body>
    <a href="#" class="navbar-brand p-0">
    <img src="cbcb.png" alt="Logo SMK Canda Bhirawa">
    <h1>SMK Canda Bhirawa</h1>
</a>
    <h2>Menu Data</h2>
    <ul>
        <li><a href="kepseknew.php">Kelola Absensi</a></li>
        <li><a href="kepsek.php">Upload Kepala Sekolah</a></li>
        <li><a href="news.php">Upload Berita</a></li>
    </ul>
    <hr>

    <?php
    // Opsi menampilkan konten sesuai action
    if ($action === 'absensi') {
        echo "<p>Fitur absensi belum ditampilkan di sini.</p>";
        // Atau: include 'absensi.php'; jika ada file tersebut
    }
    ?>
</body>
</html>
