<?php
session_start();
include '../koneksi.php'; // koneksi harus benar

if (!$koneksi) {
    die("Koneksi database gagal.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "<script>alert('Username tidak ditemukan'); window.location.href='login.php';</script>";
        exit;
    }

    if (password_verify($password, $user['password']) || $password === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];

        switch ($user['level']) {
            case 'guru':
                header("Location: ../admin/dasbord_guru.php");
                break;
            case 'murid':
                header("Location: https://absensi.rhn.my.id");
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
                echo "<script>alert('Level akses tidak dikenali'); window.location.href='404.html';</script>";
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
  <title>Glassmorphism Login Form | CodingNepal</title>
  <link rel="stylesheet" href="login.css">
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