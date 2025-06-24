<?php
// Memanggil library FPDF
require('fpdf/fpdf.php');

// Membuat objek PDF
$pdf = new FPDF();
$pdf->AddPage();

// Memasukkan logo sekolah
$pdf->Image('img/logo.png', 10, 6, 30); // Path logo, posisi (x=10, y=6), lebar 30mm

// Menambahkan teks di sebelah logo
$pdf->SetFont('Arial', '', 11);
$pdf->SetXY(60, 10); // Mengatur posisi teks setelah logo
$pdf->Cell(0, 5, 'YAYASAN PEMBINA LEMBAGA PENDIDIKAN PGRI PUSAT', 0, 1, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->SetXY(45, 15);
$pdf->Cell(0, 5, 'PERWAKILAN YAYASAN PEMBINA LEMBAGA PENDIDIKAN PGRI JAWA TIMUR', 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(48, 20);
$pdf->Cell(0, 5, 'PERWAKILAN PERSATUAN GURU REPUBLIK INDONESIA KOTA KEDIRI', 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetXY(80, 25);
$pdf->Cell(0, 5, 'SMK PGRI 4 KOTA KEDIRI', 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(55, 30);
$pdf->Cell(0, 5, 'Alamat : Jalan KH. Achmad Dahlan/ Mojoroto Gg. I  No. 6  Telp. 775660 Kediri 64112 ', 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(58, 35);
$pdf->Cell(0, 5, 'Web Site : www.smkpgri4kediri.sch.id                E-mail : smkpgri4_kdr@yahoo.co.id ', 0, 1, 'L');




// Membuat garis hitam di bawah header
$pdf->SetLineWidth(0.8); // Ketebalan garis
$pdf->SetDrawColor(0, 0, 0); // Warna hitam
$pdf->Line(10, 43, 200, 43); // Garis dari (x=10, y=30) ke (x=200, y=30)
$pdf->Ln(10); // Menambahkan spasi setelah garis

// Judul Halaman
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Data Siswa', 0, 1, 'C');
$pdf->Ln(10); // Spasi

// Mengambil data siswa dari database
include('koneksi.php');
session_start();
$username = $_SESSION['username'];
$query = "SELECT * FROM pendaftaran WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Menampilkan data siswa
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Nama: ' . $data['nama']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Alamat: ' . $data['alamat']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Asal Sekolah: ' . $data['asal_sekolah']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Jurusan: ' . $data['jurusan']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Agama: ' . $data['agama']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Nomor HP: ' . $data['no_hp']);
$pdf->Ln();

// Output PDF
$pdf->Output('D', 'Data_Siswa_' . $data['nama'] . '.pdf');
?>