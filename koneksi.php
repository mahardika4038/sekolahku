<?php
$host = "100.91.139.68"; // Host database
$username = "pkk"; // Username database
$password = "h6C4mbti3tACLkWk"; // Password database
$database = "pkk"; // Nama database

// Membuat koneksi
$koneksi = new mysqli("100.91.139.68", "pkk", "h6C4mbti3tACLkWk", "pkk");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

?>