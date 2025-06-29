<?php
session_start(); // Tambahkan session start
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $full_name = htmlspecialchars($_POST['full_name']);
    $nisn = htmlspecialchars($_POST['nisn']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $gender = htmlspecialchars($_POST['gender']);

    if (!empty($email) && !empty($full_name) && !empty($nisn) && !empty($phone_number) && !empty($password) && !empty($gender)) {
        // Cek apakah email sudah ada
        $check_email = $koneksi->prepare("SELECT * FROM regis WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            echo "Email sudah digunakan. Silakan gunakan email lain.";
        } else {
            // Jika email belum ada, lanjutkan registrasi
            $sql = $koneksi->prepare("INSERT INTO regis (full_name, email, nisn, phone_number, password, gender) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssss", $full_name, $email, $nisn, $phone_number, $password, $gender);

            if ($sql->execute()) {
                // Simpan data user ke session
                $_SESSION['user_id'] = $koneksi->insert_id; // Simpan ID user yang baru terdaftar
                $_SESSION['user_name'] = $full_name; // Simpan nama user

                echo "Data berhasil disimpan. Akan dialihkan ke loginbaru.php...";
                header("Location: loginbaru.php");
                exit();
            } else {
                echo "Error: " . $sql->error;
            }
        }
    } else {
        echo "Semua field harus diisi!";
    }
} else {
    echo "";
}

$koneksi->close();
?>




<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Registration Form | CodingLab</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="container">
      <div class="title">
          <img src="bhirawa-removebg-preview.png" alt="Bhirawa Logo" class="logo">
          <span class="registration-title">Bhirawa Registration</span>
      </div>
      <?php if (isset($_SESSION['user_name'])): ?>
        <p>Selamat datang, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
      <?php endif; ?>
    </div>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nama lengkap</span>
            <input type="text" name="full_name" placeholder="Masukan Nama lengkap" required>
          </div>
          <div class="input-box">
            <span class="details">NISN</span>
            <input type="text" name="nisn" placeholder="Masukan NISN" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Masukan Email" required>
          </div>
          <div class="input-box">
            <span class="details">NO.tlp</span>
            <input type="text" name="phone_number" placeholder="Masukan NO.tlp" required>
          </div>
          <div class="input-box">
            <span class="details">Kata sandi</span>
            <input type="password" name="password" placeholder="Masukan Kata sandi" required>
          </div>
          <div class="input-box">
            <span class="details">Konfirmasi sandi</span>
            <input type="password" name="confirm_password" placeholder="Masukan kembali sandi" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Laki-laki">
          <input type="radio" name="gender" id="dot-2" value="Perempuan">
          <span class="gender-title">Jenis kelamin</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Laki-laki</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Perempuan</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
