
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $home_link = "index.php";
} else {
    $home_link = "index2.php";
}
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
  <link href="img/galery/LOGO_CB-removebg-preview.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start 
         <div>
        <id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
         </di>-->
        <!-- Spinner End -->

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
                        <div class="dropdown">
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">
                        <img src="img/cb/logocb.png" alt="Travela Logo" style="height: 60px; width: auto; margin-right: 10px;">
                    SMK Canda Bhirawa</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <?php
                    
                        if (!isset($_SESSION['user_id'])) {
                            // Belum login → Home ke index.html
                            $home_link = "index.php"; // atau tetap "index.html" kalau tetap pakai yang statis
                        } else {
                            // Sudah login → Home ke index2.php
                            $home_link = "index2.php";
                        }
                        ?>
                        <a href="<?= $home_link ?>" class="nav-item nav-link">Home</a>
                        
                         <a href="services.html" class="nav-item nav-link">fasilitas</a>
                        <a href="campus.html" class="nav-item nav-link">kampus</a>
                        <a href="extra.html" class="nav-item nav-link">extrakulikuler</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">explore</a>
                            <div class="dropdown-menu m-0">
                                <a href="destination.html" class="dropdown-item">perusahaan</a>
                                <a href="tour.html" class="dropdown-item">jurusan</a>
                                <a href="gallery.html" class="dropdown-item">penunjang</a>
                                <a href="guides.php" class="dropdown-item active">teacher</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                               
                                <a href="04.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="login/login.php" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">PPDB NOW</a>
                </div>
            </nav>

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="img/cb1/IMG_0031.JPG" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">WEBSITE RESMI SMK CANDA BHIRAWA PARE</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">RAIH CITA-CITAMU SEKARANG!!!</h1>
                                    <p class="mb-5 fs-5">Dengan program keahlian unggulan, guru-guru berpengalaman, dan lingkungan belajar yang nyaman dan inspiratif, SMK Canda Bhirawa siap menjadi tempat terbaik untuk menggapai masa depanmu. 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="index2.php">login trial now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/cb1/IMG_3221.JPG" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Gaya Semangat & Percaya Diri</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Waktunya Bangkit! Waktunya Hebat!</h1>
                                    <p class="mb-5 fs-5">SMK Canda Bhirawa Pare membuka jalanmu menuju masa depan!

                                                        Mau langsung kerja, kuliah, atau buka usaha sendiri? Semua bisa kamu mulai dari sini.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="index2.php">login trial now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/home/image.png" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Tempat Belajar, Tumbuh, dan Berprestasi.</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">DISPLINE AND CREATIVE</h1>
                                    <p class="mb-5 fs-5">Kami bukan hanya sekolah, tapi tempat menyiapkan masa depanmu dengan keterampilan dan akhlak yang kuat.

Di sinilah kamu akan dibimbing oleh tenaga pendidik profesional dan terhubung langsung dengan dunia kerja. 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="login/login.php">login now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->
        
        <?php
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "database_name");

    // Cek koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // SQL Query untuk pencarian
    $sql = "SELECT * FROM your_table_name 
            WHERE title LIKE '%$query%' 
               OR description LIKE '%$query%' 
               OR category LIKE '%$query%'";

    $result = $conn->query($sql);

    // Cek hasil
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['title'] . " - " . $row['description'] . "</p>";
        }
    } else {
        echo "Tidak ada hasil ditemukan.";
    }

    $conn->close();
}
?>
<script>
    document.getElementById('searchBtn').addEventListener('click', function() {
        const query = document.getElementById('searchInput').value;

        if (query) {
            // Redirect ke halaman pencarian
            window.location.href = `search.php?query=${query}`;
        } else {
            alert('Masukkan kata kunci untuk mencari.');
        }
    });
</script>

        <!-- Navbar & Hero End -->

        <!-- About Start -->
       
         <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Get In Touch</h4>
                            <a><i class="fas fa-home me-2"></i> Jl.Pb.Surdirman No.68, Plongko, Pare, Kec.Pare, Kabupaten Kediri, Jawa Timur 64211</a>
                            <a><i class="fas fa-envelope me-2"></i> @smkcbpare.sch.id</a>
                            <a><i class="fas fa-phone me-2"></i> (0354)391187</a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="https://www.facebook.com/groups/smkcbpare/?locale=id_ID"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="https://www.youtube.com/channel/UCFKw9fQO678f5yCYIkDH0UA"><i class="fab fa-youtube fw-normal"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="https://www.instagram.com/smkcandabhirawa/"><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="https://maps.app.goo.gl/KmW26DJCtKoafNdQ7"><i class="fas fa-map-marker-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Company</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Careers</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Blog</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Press</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Gift Cards</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Magazine</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Support</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Contact</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Legal Notice</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Terms and Conditions</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Sitemap</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Cookie policy</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <div class="row gy-3 gx-2 mb-4">
                                <div class="col-xl-6">
                                    <form>
                                        <div class="form-floating">
                                            <select class="form-select bg-dark border" id="select1">
                                                <option value="1">Arabic</option>
                                                <option value="2">German</option>
                                                <option value="3">Greek</option>
                                                <option value="3">New York</option>
                                            </select>
                                            <label for="select1">English</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6">
                                    <form>
                                        <div class="form-floating">
                                            <select class="form-select bg-dark border" id="select2">
                                                <option value="1">USD</option>
                                                <option value="2">EUR</option>
                                                <option value="3">INR</option>
                                                <option value="3">GBP</option>
                                            </select>
                                            <label for="select2">$</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <h4 class="text-white mb-3">Payments</h4>
                            <div class="footer-bank-card">
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-amex fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-visa fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fas fa-credit-card fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-mastercard fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-paypal fa-2x"></i></a>
                                <a href="#" class="text-white"><i class="fab fa-cc-discover fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-end mb-md-0">
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">Canda Bhirawa Vocational High School</a>, All right reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        <!-- Template credit -->
                        Designed By <a class="text-white" href="https://htmlcodex.com">Kopjun Team</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>