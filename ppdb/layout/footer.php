
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
                    <div class="col-md-8 col-lg-8 col-xl-4">
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
                    <div class="col-md-8 col-lg-8 col-xl-4">
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
                    <div class="col-md-8 col-lg-8 col-xl-4">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>