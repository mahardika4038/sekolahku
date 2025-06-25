<?php
include "koneksi.php";

// Tambah
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $masa_jabatan = $_POST['masa_jabatan'];
    $education = $_POST['education'];

    $foto = $_FILES['kepsek-img']['name'];
    $tmp = $_FILES['kepsek-img']['tmp_name'];
    $path = "kepsek-img/" . $foto;

    if (!empty($foto)) {
        if (move_uploaded_file($tmp, $path)) {
            $query = "INSERT INTO kepsek (nama, masa_jabatan, education, foto) VALUES ('$nama', '$masa_jabatan', '$education', '$foto')";
            $koneksi->query($query);
        }
    }
    header("Location: kepsek.php");
    exit;
}

// Hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $data = $koneksi->query("SELECT foto FROM kepsek WHERE id='$id'")->fetch_assoc();
    if (file_exists("kepsek-img/" . $data['foto'])) {
        unlink("kepsek-img/" . $data['foto']);
    }
    $koneksi->query("DELETE FROM kepsek WHERE id='$id'");
    header("Location: kepsek.php");
    exit;
}

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $masa_jabatan = $_POST['masa_jabatan'];
    $education = $_POST['education'];

    $fotoBaru = $_FILES['kepsek-img']['name'];
    $tmp = $_FILES['kepsek-img']['tmp_name'];

    $dataLama = $koneksi->query("SELECT * FROM kepsek WHERE id='$id'")->fetch_assoc();
    $fotoLama = $dataLama['foto'];

    if (!empty($fotoBaru)) {
        $path = "kepsek-img/" . $fotoBaru;
        if (move_uploaded_file($tmp, $path)) {
            if (file_exists("kepsek-img/" . $fotoLama)) {
                unlink("kepsek-img/" . $fotoLama);
            }
        } else {
            $fotoBaru = $fotoLama;
        }
    } else {
        $fotoBaru = $fotoLama;
    }

    $query = "UPDATE kepsek SET nama='$nama', masa_jabatan='$masa_jabatan', education='$education', foto='$fotoBaru' WHERE id='$id'";
    $koneksi->query($query);
    header("Location: kepsek.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kepala Sekolah</title>
</head>
<body>
    <h2><?= isset($_GET['edit']) ? "Edit" : "Tambah" ?> Kepala Sekolah</h2>

<?php
if (isset($_GET['edit'])):
    $id = $_GET['edit'];
    $data = $koneksi->query("SELECT * FROM kepsek WHERE id='$id'")->fetch_assoc();
?>
    <!-- Form Edit -->
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

        <label>Masa Jabatan:</label><br>
        <input type="text" name="masa_jabatan" value="<?= $data['masa_jabatan'] ?>" required><br><br>

        <label>Pendidikan Terakhir:</label><br>
        <input type="text" name="education" value="<?= $data['education'] ?>" required><br><br>

        <label>Foto Saat Ini:</label><br>
        <img src="kepsek-img/<?= $data['foto'] ?>" width="100"><br><br>
        <label>Ganti Foto (Opsional):</label><br>
        <input type="file" name="kepsek-img"><br><br>

        <button type="submit" name="update">Update</button>
        <a href="kepsek.php">Batal</a>
    </form>
<?php else: ?>
    <!-- Form Tambah -->
    <form method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Masa Jabatan:</label><br>
        <input type="text" name="masa_jabatan" required><br><br>

        <label>Pendidikan Terakhir:</label><br>
        <input type="text" name="education" required><br><br>

        <label>Upload Foto:</label><br>
        <input type="file" name="kepsek-img" accept="image/*" required><br><br>

        <button type="submit" name="simpan">Simpan</button>
    </form>
<?php endif; ?>

<hr>
<h2>Daftar Kepala Sekolah</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Masa Jabatan</th>
        <th>Pendidikan</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
<?php
$no = 1;
$data = $koneksi->query("SELECT * FROM kepsek ORDER BY id DESC");
while ($row = $data->fetch_assoc()):
?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['masa_jabatan'] ?></td>
        <td><?= $row['education'] ?></td>
        <td><img src="kepsek-img/<?= $row['foto'] ?>" width="100"></td>
        <td>
            <a href="?edit=<?= $row['id'] ?>">Edit</a> |
            <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>

</body>
</html>
