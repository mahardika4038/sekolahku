<?php
session_start();
include 'koneksi.php'; // File koneksi ke database

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


// Ambil data user dari session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['nisn']; // Gunakan NISN jika ingin menampilkan nama atau data lainnya


$sql = "SELECT * FROM regis WHERE id = $user_id";
$result = $koneksi->query(query: $sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $address = mysqli_real_escape_string($koneksi, $_POST['address']);
    $parent_name = mysqli_real_escape_string($koneksi, $_POST['parent_name']);
    $school_origin = mysqli_real_escape_string($koneksi, $_POST['school_origin']);
    $major = mysqli_real_escape_string($koneksi, $_POST['major']);
    $birth_place = mysqli_real_escape_string($koneksi, $_POST['birth_place']);
    $birth_date = mysqli_real_escape_string($koneksi, $_POST['birth_date']);

    // Query untuk menyimpan data ke tabel pendaftaran
    $sql = "INSERT INTO pendaftaran (user_id,  address, parent_name, school_origin, major, birth_place, birth_date) 
            VALUES ('$user_id', '$address', '$parent_name', '$school_origin', '$major', '$birth_place', '$birth_date')";

    if ($koneksi->query($sql) === TRUE) {
        require('fpdf/fpdf.php');

// Buat PDF baru
$pdf = new FPDF();
$pdf->AddPage();

// Memasukkan logo sekolah
$pdf->Image('guru.png', 10, 6, 30); // Path logo, posisi (x=10, y=6), lebar 30mm

// Menambahkan teks di sebelah logo
$pdf->SetFont('Arial', '', 11);
$pdf->SetXY(60, 10);
$pdf->Cell(0, 5, 'YAYASAN PEMBINA LEMBAGA PENDIDIKAN CB PARE', 0, 1, 'L');
$pdf->SetXY(45, 15);
$pdf->Cell(0, 5, 'PERWAKILAN YAYASAN PEMBINA LEMBAGA PENDIDIKAN  JAWA TIMUR', 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(48, 20);
$pdf->Cell(0, 5, 'PENERIMAAN PESERTA DIDIDK BARU', 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetXY(80, 25);
$pdf->Cell(0, 5, 'SMK Canda Bhirawa Pare', 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(55, 30);
$pdf->Cell(0, 5, 'Alamat: Jl. Pb. Sudirman No.68, Plongko, Pare, Kec. Pare, Kabupaten Kediri, Jawa Timur 64211 ', 0, 1, 'L');
$pdf->SetXY(58, 35);

// Garis bawah sebagai pemisah header
$pdf->Line(10, 42, 200, 42);
$pdf->Ln(12);

// Judul / Kop Surat
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'BUKTI PENDAFTARAN', 0, 1, 'C');
$pdf->Ln(10);

// Isi Data
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'NISN', 0, 0); $pdf->Cell(5, 10, ':', 0, 0); $pdf->Cell(100, 10, $user_name, 0, 1);
$pdf->Cell(50, 10, 'Alamat', 0, 0); $pdf->Cell(5, 10, ':', 0, 0); $pdf->Cell(100, 10, $address, 0, 1);
$pdf->Cell(50, 10, 'Nama Orang Tua', 0, 0); $pdf->Cell(5, 10, ':', 0, 0); $pdf->Cell(100, 10, $parent_name, 0, 1);
$pdf->Cell(50, 10, 'Asal Sekolah', 0, 0); $pdf->Cell(5, 10, ':', 0, 0); $pdf->Cell(100, 10, $school_origin, 0, 1);
$pdf->Cell(50, 10, 'Jurusan', 0, 0); $pdf->Cell(5, 10, ':', 0, 0); $pdf->Cell(100, 10, $major, 0, 1);
$pdf->Cell(50, 10, 'Tempat, Tanggal Lahir', 0, 0); $pdf->Cell(5, 10, ':', 0, 0); $pdf->Cell(100, 10, "$birth_place, $birth_date", 0, 1);

$pdf->Ln(20);

// Posisi awal X dan Y
$startX = 30;
$startY = $pdf->GetY();

// Foto Peserta
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 6, 'Foto Peserta:', 0, 1);
$foto_path = "uploads/foto/$user_id.jpg";
if (file_exists($foto_path)) {
    $pdf->Image($foto_path, $startX, $pdf->GetY(), 40); // lebar 40mm
} else {
    $pdf->Cell(50, 10, '[Foto tidak tersedia]', 0, 1);
}

$pdf->Ln(45); // Jeda vertikal setelah foto

// Tanda Tangan
$pdf->Cell(130); // Posisi ke kanan
$pdf->Cell(60, 6, 'Tanda Tangan Peserta:', 0, 1, 'R');

$ttd_path = "uploads/ttd/$user_id.png";
if (file_exists($ttd_path)) {
    $pdf->Image($ttd_path, 150, $pdf->GetY(), 40); // sesuaikan posisi dan lebar
    $pdf->Ln(25);
    $pdf->Cell(130);
    $pdf->Cell(60, 6, $user_name, 0, 1, 'R');
} else {
    $pdf->Cell(130);
    $pdf->Cell(60, 6, '[Tanda tangan tidak tersedia]', 0, 1, 'R');
}


// Outputkan PDF ke browser
$pdf->Output('I', 'bukti_pendaftaran.pdf');
exit;

        echo "<script>alert('Data berhasil disimpan!'); window.location.href = 'daftar.php';</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "\n" . $koneksi->error . "'); window.history.back();</script>";
    }
}

// Tutup koneksi
$koneksi->close();
?>




<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        input[type="email"],
        select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Pendaftaran</h2>
    <form method="POST">
        <label>Nama Lengkap:</label>
        <input type="text" name="full_name" required value="<?php echo htmlspecialchars($row['full_name']); ?>">

        <label>Email:</label>
        <input type="email" name="email" required value="<?php echo htmlspecialchars($row['email']); ?>">

        <label>NISN:</label>
        <input type="text" name="nisn" required value="<?php echo htmlspecialchars($row['nisn']); ?>">

        <label>No. Telp:</label>
        <input type="text" name="phone_number" required value="<?php echo htmlspecialchars($row['phone_number']); ?>">

        <label>Jenis Kelamin:</label>
        <select name="gender" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki" <?= $row['gender'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?= $row['gender'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
        </select>

        <label>Alamat:</label>
        <input type="text" name="address" required>

        <label>Nama Orang Tua:</label>
        <input type="text" name="parent_name" required>

        <label>Pekerjaan Orang Tua:</label>
        <input type="text" name="parent_job" required>

        <label>Asal Sekolah:</label>
        <input type="text" name="school_origin" required>

        <label>Jurusan:</label>
        <select name="major" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="tkj">TKJ</option>
            <option value="dpib">DPIB</option>
            <option value="titl">TITL</option>
            <option value="toi">TOI</option>
            <option value="tpm">TPM</option>
            <option value="tkr">TKR</option>
        </select>

        <label>Tempat Lahir:</label>
        <input type="text" name="birth_place" required>

        <label>Tanggal Lahir:</label>
        <input type="date" name="birth_date" required>

        <button type="submit">Simpan</button>
        <form action="simpan_pdf.php" method="post">
    <button type="submit" class="btn btn-primary">Simpan Data Sebagai PDF</button>
    </form>
    </form>
</div>
</body>
</html>
