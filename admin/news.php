<?php
include "koneksi.php";

// Tambah berita
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi_berita'];
    $sinopsis = $_POST['sinopsis'];

    $foto = $_FILES['foto_berita']['name'];
    $tmp = $_FILES['foto_berita']['tmp_name'];
    $path = "foto_berita/" . $foto;

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO news (judul, isi_berita, sinopsis, foto_berita) 
                  VALUES ('$judul', '$isi', '$sinopsis', '$foto')";
        $koneksi->query($query);
    }
}

// Hapus berita
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $data = $koneksi->query("SELECT foto_berita FROM news WHERE id='$id'")->fetch_assoc();
    if (file_exists("foto_berita/" . $data['foto_berita'])) {
        unlink("foto_berita/" . $data['foto_berita']);
    }
    $koneksi->query("DELETE FROM news WHERE id='$id'");
    header("Location: news.php");
    exit;
}

// Edit berita
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi_berita'];
    $sinopsis = $_POST['sinopsis'];

    $fotoBaru = $_FILES['foto_berita']['name'];
    $tmp = $_FILES['foto_berita']['tmp_name'];

    $dataLama = $koneksi->query("SELECT * FROM news WHERE id='$id'")->fetch_assoc();
    $fotoLama = $dataLama['foto_berita'];

    if (!empty($fotoBaru)) {
        $path = "foto_berita/" . $fotoBaru;
        move_uploaded_file($tmp, $path);
        unlink("foto_berita/" . $fotoLama);
    } else {
        $fotoBaru = $fotoLama;
    }

    $query = "UPDATE news SET judul='$judul', isi_berita='$isi', sinopsis='$sinopsis', foto_berita='$fotoBaru' 
              WHERE id='$id'";
    $koneksi->query($query);
    header("Location: news.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2><?= isset($_GET['edit']) ? "Edit" : "Tambah" ?> Berita</h2>

    <?php
    if (isset($_GET['edit'])):
        $id = $_GET['edit'];
        $data = $koneksi->query("SELECT * FROM news WHERE id='$id'")->fetch_assoc();
    ?>
    <!-- Form Edit -->
    <form method="POST" enctype="multipart/form-data" class="mb-5">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="mb-3">
            <label>Judul Berita</label>
            <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi_berita" class="form-control" required><?= $data['isi_berita'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Sinopsis</label>
            <input type="text" name="sinopsis" class="form-control" value="<?= $data['sinopsis'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Foto Sebelumnya:</label><br>
            <img src="foto_berita/<?= $data['foto_berita'] ?>" width="150"><br>
            <label>Ganti Foto (opsional)</label>
            <input type="file" name="foto_berita" class="form-control">
        </div>
        <button type="submit" name="update" class="btn btn-warning">Update</button>
        <a href="berita.php" class="btn btn-secondary">Batal</a>
    </form>

    <?php else: ?>
    <!-- Form Tambah -->
    <form method="POST" enctype="multipart/form-data" class="mb-5">
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
    <?php endif; ?>

    <h3>Daftar Berita</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Sinopsis</th>
                <th>Isi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $result = $koneksi->query("SELECT * FROM news ORDER BY id DESC");
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['sinopsis'] ?></td>
                <td><?= $row['isi_berita'] ?></td>
                <td><img src="foto_berita/<?= $row['foto_berita'] ?>" width="100"></td>
                <td>
                    <a href="?edit=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
