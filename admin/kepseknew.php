<?php
include "koneksi.php";

// Tambah data
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $gelar = $_POST['gelar'];
    $deskripsi1 = $_POST['deskripsi1'];
    $deskripsi2 = $_POST['deskripsi2'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "new_kepalasekolah/" . $foto;

    if (!empty($foto)) {
        if (move_uploaded_file($tmp, $path)) {
            $query = "INSERT INTO new_kepalasekolah (nama, gelar, deskripsi1, deskripsi2, foto) 
                      VALUES ('$nama', '$gelar', '$deskripsi1', '$deskripsi2', '$foto')";
            $koneksi->query($query);
        }
    }
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $data = $koneksi->query("SELECT foto FROM new_kepalasekolah WHERE id='$id'")->fetch_assoc();
    if (file_exists("new_kepalasekolah/" . $data['foto'])) {
        unlink("new_kepalasekolah/" . $data['foto']);
    }
    $koneksi->query("DELETE FROM new_kepalasekolah WHERE id='$id'");
    header("Location: kepalasekolah.php");
    exit;
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $gelar = $_POST['gelar'];
    $deskripsi1 = $_POST['deskripsi1'];
    $deskripsi2 = $_POST['deskripsi2'];

    $fotoBaru = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $dataLama = $koneksi->query("SELECT * FROM new_kepalasekolah WHERE id='$id'")->fetch_assoc();
    $fotoLama = $dataLama['foto'];

    if (!empty($fotoBaru)) {
        $path = "new_kepalasekolah/" . $fotoBaru;
        move_uploaded_file($tmp, $path);
        unlink("new_kepalasekolah/" . $fotoLama);
    } else {
        $fotoBaru = $fotoLama;
    }

    $query = "UPDATE new_kepalasekolah SET 
              nama='$nama', gelar='$gelar', deskripsi1='$deskripsi1', deskripsi2='$deskripsi2', foto='$fotoBaru' 
              WHERE id='$id'";
    $koneksi->query($query);
    header("Location: kepalasekolah.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kepala Sekolah</title>
</head>
<body>

<h2><?= isset($_GET['edit']) ? "Edit" : "Tambah" ?> Kepala Sekolah</h2>
<?php
// Jika mode edit
if (isset($_GET['edit'])):
    $id = $_GET['edit'];
    $data = $koneksi->query("SELECT * FROM new_kepalasekolah WHERE id='$id'")->fetch_assoc();
?>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>

    <label>Gelar:</label><br>
    <input type="text" name="gelar" value="<?= $data['gelar'] ?>" required><br>

    <label>Deskripsi 1:</label><br>
    <textarea name="deskripsi1" required><?= $data['deskripsi1'] ?></textarea><br>

    <label>Deskripsi 2:</label><br>
    <textarea name="deskripsi2" required><?= $data['deskripsi2'] ?></textarea><br>

    <label>Foto Lama:</label><br>
    <img src="new_kepalasekolah/<?= $data['foto'] ?>" width="100"><br>
    <label>Ganti Foto (Opsional):</label><br>
    <input type="file" name="foto" accept="image/*"><br><br>

    <button type="submit" name="update">Update</button>
    <a href="kepalasekolah.php">Batal</a>
</form>

<?php else: ?>
<!-- Form tambah data -->
<form action="" method="post" enctype="multipart/form-data">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>

    <label>Gelar:</label><br>
    <input type="text" name="gelar" required><br>

    <label>Deskripsi 1:</label><br>
    <textarea name="deskripsi1" required></textarea><br>

    <label>Deskripsi 2:</label><br>
    <textarea name="deskripsi2" required></textarea><br>

    <label>Foto:</label><br>
    <input type="file" name="foto" accept="image/*" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
<?php endif; ?>

<hr>

<h2>Daftar Kepala Sekolah</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Gelar</th>
        <th>Deskripsi 1</th>
        <th>Deskripsi 2</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $result = $koneksi->query("SELECT * FROM new_kepalasekolah");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['gelar'] ?></td>
        <td><?= $row['deskripsi1'] ?></td>
        <td><?= $row['deskripsi2'] ?></td>
        <td><img src="new_kepalasekolah/<?= $row['foto'] ?>" width="100"></td>
        <td>
            <a href="?edit=<?= $row['id'] ?>">Edit</a> |
            <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
