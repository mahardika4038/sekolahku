<?php
include "koneksi.php";

// Cek apakah parameter id ada
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('ID berita tidak valid!'); window.location.href='index.php';</script>";
    exit;
}

$id = (int) $_GET['id']; // konversi ke integer agar aman

// Gunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<script>alert('Berita tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($data['judul']); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .article-container {
      max-width: 800px;
      margin: 0 auto;
      background: #fff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .article-image {
      max-height: 400px;
      object-fit: cover;
    }

    .article-title {
      font-size: 2rem;
      font-weight: bold;
    }

    .article-content {
      font-size: 1.1rem;
      line-height: 1.8;
      text-align: justify;
    }

    .back-btn {
      margin-top: 2rem;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="article-container">
      <h1 class="article-title mb-4"><?php echo htmlspecialchars($data['judul']); ?></h1>
      <img src="admin/foto_berita/<?php echo htmlspecialchars($data['foto_berita']); ?>" class="img-fluid rounded article-image mb-4" alt="Gambar Berita">
      <div class="article-content">
        <?php echo nl2br(htmlspecialchars($data['isi_berita'])); ?>
      </div>
      <a href="index.php" class="btn btn-secondary back-btn">← Kembali ke Beranda</a>
    </div>
  </div>

  <!-- Bootstrap JS (opsional untuk komponen interaktif) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
