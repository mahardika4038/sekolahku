<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $home_link = "../index.php";
} else {
    $home_link = "../index2.php";
}

$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMK Canda Bhirawa - VOCATIONAL HIGH SCHOOL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="../img/galery/LOGO_CB-removebg-preview.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .nav-link.active {
            background-color: #0d6efd;
            color: #fff !important;
            border-radius: 8px; /* <-- Tambahkan baris ini */
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.youtube.com/channel/UCFKw9fQO678f5yCYIkDH0UA"><i class="fab fa-youtube fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/groups/smkcbpare/?locale=id_ID"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/smkcandabhirawa/"><i class="fab fa-instagram fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="registration-form/regis.php"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                    <a href="login/login.php"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="<?= $home_link ?>" class="navbar-brand p-0">
                <img src="../img/cb/logocb.png" alt="Logo CB" style="height: 60px; width: auto; margin-right: 10px;">
                <h1 class="m-0 d-none d-lg-inline ms-auto">
                    SMK Canda Bhirawa
                </h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?= $home_link ?>" class="nav-item nav-link <?php if ($current_page == '../index.php' || $current_page == '../index2.php') echo 'active'; ?>">Home</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if (in_array($current_page, ['./pengumuman.php', 'jadwal.php', 'alur_pendaftaran.php', 'syarat_pendaftaran.php', 'testimonial.php', '04.php'])) echo 'active'; ?>" data-bs-toggle="dropdown">PPDB</a>
                        <div class="dropdown-menu m-0">
                            <a href="pengumuman.php" class="dropdown-item <?php if ($current_page == './pengumuman.php') echo 'active'; ?>">Pengumuman</a>
                            <a href="jadwal.php" class="dropdown-item <?php if ($current_page == 'jadwal.php') echo 'active'; ?>">Jadwal</a>
                            <a href="alur_pendaftaran.php" class="dropdown-item <?php if ($current_page == 'alur_pendaftaran.php') echo 'active'; ?>">Alur Pendaftaran</a>
                            <a href="syarat_pendaftaran.php" class="dropdown-item <?php if ($current_page == 'syarat_pendaftaran.php') echo 'active'; ?>">Syarat Pendaftaran</a>
                        </div>
                    </div>

                    <a href="../services.php" class="nav-item nav-link <?php if ($current_page == '../services.php') echo 'active'; ?>">Fasilitas</a>
                    <a href="../campus.php" class="nav-item nav-link <?php if ($current_page == '../campus.php') echo 'active'; ?>">Kampus</a>
                    <a href="../extra.php" class="nav-item nav-link <?php if ($current_page == '../extra.php') echo 'active'; ?>">Extrakulikuler</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if (in_array($current_page, ['../destination.php', '../tour.php', '../gallery.php', '../guides.php', '../testimonial.php', '../04.php'])) echo 'active'; ?>" data-bs-toggle="dropdown">Explore</a>
                        <div class="dropdown-menu m-0">
                            <a href="../destination.php" class="dropdown-item <?php if ($current_page == '../destination.php') echo 'active'; ?>">Perusahaan</a>
                            <a href="../tour.php" class="dropdown-item <?php if ($current_page == '../tour.php') echo 'active'; ?>">Jurusan</a>
                            <a href="../gallery.php" class="dropdown-item <?php if ($current_page == '../gallery.php') echo 'active'; ?>">Penunjang</a>
                            <a href="../guides.php" class="dropdown-item <?php if ($current_page == '../guides.php') echo 'active'; ?>">Teacher</a>

                        </div>
                    </div>
                    
                    <a href="../contact.php" class="nav-item nav-link <?php if ($current_page == '../contact.php') echo 'active'; ?>">Contact</a>
                </div>
                <a href="../login/login.php" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">PPDB NOW</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Konten halaman lain di sini -->
