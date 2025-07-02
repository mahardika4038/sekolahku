<?php
session_start();
include '../koneksi.php'; // Pastikan koneksi sudah benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil data user
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Cek apakah username ditemukan
    if (!$user) {
        echo "<script>alert('Username tidak ditemukan'); window.location.href='login.php';</script>";
        exit;
    }

    // Cek password (versi aman, pakai password_verify)
    if (password_verify($password, $user['password']) || $password === $user['password']) {
        // Buat sesi
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];

        // Redirect berdasarkan level
        switch ($user['level']) {
            case 'superadmin':
                header("Location: ../admin/dasbord_guru.php");
                break;
            case 'admin':
                header("Location: ../admin/dasboard_admin.php");
                break;
            case 'wali_murid':
                header("Location: ../admin/dasbord_wali.php");
                break;
            case 'calon_siswa':
                header("Location: ../registration-form/regis.php");
                break;
            case 'trial':
                header("Location: ../index2.php");
                break;
            default:
                echo "<script>alert('Level akses tidak dikenali'); window.location.href='404.html;</script>";
                break;
        }
        exit;
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
  <link href="cbpare.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>
<body>
  <div class="wrapper">
    <form action="#" method="POST">
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