<?php
include "koneksi.php";

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
            if ($koneksi->query($query)) {
                echo "<script>alert('Data kepala sekolah berhasil ditambahkan!');</script>";
                // redirect kalau mau
                // header("Location: list_kepsek.php");
                // exit;
            } else {
                echo "<script>alert('Gagal menambahkan data ke database: " . $koneksi->error . "');</script>";
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
 <form action="" method="post" enctype="multipart/form-data">
    <label>Nama:</label>
    <input type="text" name="nama" required><br>

    <label>Gelar:</label>
    <input type="text" name="gelar" required><br>

    <label>Deskripsi 1:</label>
    <textarea name="deskripsi1" required></textarea><br>

    <label>Deskripsi 2:</label>
    <textarea name="deskripsi2" required></textarea><br>

    <label>Foto:</label>
    <input type="file" name="foto" accept="image/*" required><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

</html>>