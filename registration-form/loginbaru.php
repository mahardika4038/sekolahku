<?php
session_start(); // Memulai session
include 'koneksi.php'; // File koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil input NISN dan amankan
    $username = htmlspecialchars(trim($_POST['nisn']));

    // Query untuk mencari user berdasarkan NISN
    $query = "SELECT * FROM regis WHERE nisn = ?";
    $stmt = $koneksi->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Set session jika NISN ditemukan
            $_SESSION['user_id'] = $user['id']; // ID user dari database
            $_SESSION['user_name'] = $user['full_name']; // Nama lengkap user
            $_SESSION['nisn'] = $user['nisn']; // NISN user

            // Redirect ke halaman daftar
            header("Location: daftar.php");
            exit();
        } else {
            // Pesan error jika NISN tidak ditemukan
            $error_message = "Login gagal. Periksa kembali NISN Anda.";
        }
    } else {
        // Pesan error jika query gagal
        $error_message = "Terjadi kesalahan saat memproses data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glassmorphism Login Form</title>
  <link rel="stylesheet" href="sigin.css">
</head>
<body>
  <div class="wrapper">
    <form action="" method="POST">
      <h2><img src="bhirawa-removebg-preview.png" height="120px" width="120px"></h2>

      <!-- Menampilkan pesan error jika login gagal -->
      <?php if (isset($error_message)): ?>
        <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error_message); ?></p>
      <?php endif; ?>

      <div class="input-field">
        <input type="text" name="nisn" required>
        <label>NISN</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
    </form>
  </div>
</body>
</html>
