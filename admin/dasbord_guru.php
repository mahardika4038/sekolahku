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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand img {
            height: 50px;
            width: 50px;
            object-fit: contain;
        }
        .navbar-brand span {
            font-weight: bold;
            font-size: 1.5rem;
            color: white;
        }
        .list-group-item {
            font-size: 1.1rem;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .list-group-item:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="cbcb.png" alt="Logo SMK Canda Bhirawa" class="me-2">
        <span>SMK Canda Bhirawa</span>
    </a>
    <div class="ms-auto">
        <span class="text-white me-3">👤 <?= $_SESSION['username']; ?> (<?= $_SESSION['level']; ?>)</span>
        <a href="../login/logout.php" class="btn btn-outline-light">Logout</a>
    </div>
</nav>

<!-- Container -->
<div class="container mt-5">
    <h2 class="mb-4 text-primary">Menu Data</h2>

    <div class="list-group">
        <a href="kepseknew.php" class="list-group-item list-group-item-action">
            🧑 tambahkan ks terbaru
        </a>
        <a href="kepsek.php" class="list-group-item list-group-item-action">
            🧑‍🏫 Upload Kepala Sekolah
        </a>
        <a href="news.php" class="list-group-item list-group-item-action">
            📰 Upload Berita
        </a>
    </div>

    <hr class="my-5">

    <?php
    if ($action === 'absensi') {
        echo "<div class='alert alert-info'>Fitur absensi belum ditampilkan di sini.</div>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
