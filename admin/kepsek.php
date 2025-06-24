<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $masa_jabatan = $_POST['masa_jabatan'];
    $education = $_POST['education'];

    $foto = $_FILES['kepsek-img']['name'];
    $tmp = $_FILES['kepsek-img']['tmp_name'];
    $path = "kepsek-img/" . $foto;

    // Validasi upload file
    if (!empty($foto)) {
        if (move_uploaded_file($tmp, $path)) {
            // Query SQL
            $query = "INSERT INTO kepsek (nama, masa_jabatan, education, foto) VALUES ('$nama', '$masa_jabatan', '$education', '$foto')";
            if ($koneksi->query($query)) {
                echo "<script>alert('Kepsek berhasil ditambahkan!'); window.location.href='list_kepsek.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan kepsek');</script>";
            }
        } else {
            echo "<script>alert('Gagal mengunggah foto');</script>";
        }
    } else {
        echo "<script>alert('Foto tidak boleh kosong');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kepala Sekolah</title>
</head>
<body>
    <h2>Form Tambah Kepala Sekolah</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama Kepala Sekolah:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="masa_jabatan">Masa Jabatan:</label><br>
        <input type="text" id="masa_jabatan" name="masa_jabatan" required><br><br>

        <label for="education">Pendidikan Terakhir:</label><br>
        <input type="text" id="education" name="education" required><br><br>

        <label for="kepsek-img">Upload Foto:</label><br>
        <input type="file" id="kepsek-img" name="kepsek-img" accept="image/*" required><br><br>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>
