<?php
ob_start(); // Menjaga agar header() tidak error
session_start();
include '../admin/koneksi.php'; // Pastikan koneksi benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Cek username
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "<script>alert('Username tidak ditemukan'); window.location.href='login.php';</script>";
        exit;
    }

    // Cek password (hash atau langsung, untuk sementara fleksibel)
    if (password_verify($password, $user['password']) || $password === $user['password']) {
        // Simpan sesi
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];

        // Redirect sesuai level
        switch ($user['level']) {
            case 'superadmin':
                header("Location: ../admin/dasbord_guru.php");
                exit;
            case 'admin':
                header("Location: ../admin/absensi.php");
                exit;
            case 'wali_murid':
                header("Location: ../admin/dasbord_wali.php");
                exit;
            case 'calon_siswa':
                header("Location: ../registration-form/regis.php");
                exit;
            case 'trial':
                header("Location: ../index2.php");
                exit;
            default:
                echo "<script>alert('Level akses tidak dikenali'); window.location.href='404.html';</script>";
                exit;
        }
    } else {
        echo "<script>alert('Password salah'); window.location.href='login.php';</script>";
        exit;
    }
}
?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login now</title>
  <link rel="stylesheet" href="login.css">
  <link href="img/galery/cbpare.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>
<body>
  <div class="wrapper">
    <form action="login.php" method="POST">
      <h2><img src="bhirawa-removebg-preview.png" height="120px" width="120px"></h2>
        <div class="input-field">
        <input type="text" name="username" required>
        <label>username </label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Siswa baru harap register!<a href="../registration-form/regis.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>