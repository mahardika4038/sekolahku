<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();

    if (!$data) {
        echo "<script>alert('Username tidak ditemukan'); location.href='login.php';</script>";
        exit;
    }

    // Ganti password_verify jika pakai hash
    if ($password === $data['password']) {
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];

        switch ($data['level']) {
            case 'superadmin':
                header("Location: ../admin/dasbord_guru.php"); break;
            case 'admin':
                header("Location: admin/dashboard.php"); break;
            case 'wali_murid':
                header("Location: wali/dashboard.php"); break;
            case 'calon_siswa':
                header("Location: siswa/dashboard.php"); break;
            default:
                echo "<script>alert('Level tidak dikenali');</script>";
        }
        exit;
    } else {
        echo "<script>alert('Password salah'); location.href='login.php';</script>";
        exit;
    }
}
?>

<!-- HTML Login Form -->
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
    <form action="" method="POST">
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
      <button type="submit">Login</button>
      <div class="register">
        <p>Siswa baru harap register!<a href="../registration-form/regis.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>


