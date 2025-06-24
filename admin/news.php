<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi_berita'];
    $sinopsis = $_POST['sinopsis'];

    $foto = $_FILES['foto_berita']['name'];
    $tmp = $_FILES['foto_berita']['tmp_name'];
    $path = "foto_berita/" . $foto;

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO news (judul, isi_berita, sinopsis, foto_berita) VALUES ('$judul', '$isi', '$sinopsis', '$foto')";
        if ($koneksi->query($query)) {
            echo "<script>alert('Berita berhasil ditambahkan!');</script>";
        } else {
            echo "<script>alert('Gagal menambahkan berita!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Berita</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Judul Berita</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Isi Berita</label>
                <textarea name="isi_berita" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label>Sinopsis</label>
                <input type="text" name="sinopsis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Foto Berita</label>
                <input type="file" name="foto_berita" class="form-control" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>
</html>
