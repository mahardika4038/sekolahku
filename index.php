<?php include("./layout/header.php") ?>
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
                            <img src="img/home/indximg/image.png" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">VOCATIONAL HIGH SCHOOL</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Ayo Bergabung Sekarang!</h1>
                                    <p class="mb-5 fs-5"> "Anak-anak STM adalah aset negara yang memiliki kemampuan untuk mengembangkan industri otomotif nasional. Berkaryalah dan berikan prestasi terbaikmu untuk bangsa ini."</p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/home/image.png" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">VOCATIONAL HIGH SCHOOL</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">SMK Canda bhirawa</h1>
                                    <p class="mb-5 fs-5"> "Walaupun SMK Canda Bhirawa disterotipe atau dikenal dengan kenakalan, buktikan kalian juga bisa berprestasi dengan membawa harum nama sekolah dan bangsa!"</p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/home/smk.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">VOCATIONAL HIGH SCHOOL</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Kamu Ingin Bergabung?</h1>
                                    <p class="mb-5 fs-5">"Jangan pernah minder untuk menjadi anak SMK Canda Bhirawa. Solidaritas dan kesetiakawanan Kalian tidak perlu lagi diragukan. Banggalah dan berikan yang terbaik untuk orang tua buktikan bahwa kalian bisa berprestasi."</p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
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
        
        <!-- Navbar & Hero End -->

       <?php
include "koneksi.php";
$query = "SELECT * FROM new_kepalasekolah";
$sql = $koneksi->query($query);
while ($c = $sql->fetch_array()) { ?>
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="admin/new_kepalasekolah/<?php echo $c['foto']; ?>" class="img-fluid w-100 h-100" alt="Foto Kepala Sekolah">
                </div>
            </div>
            <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                <h5 class="section-about-title pe-3">Kepala Sekolah SMK Canda Bhirawa</h5>
                <h1 class="mb-4"><?= $c['nama'] ?> <span class="text-primary"><?= $c['gelar'] ?></span></h1>
                <p class="mb-4"><?= $c['deskripsi1'] ?></p>
                <p class="mb-4"><?= $c['deskripsi2'] ?></p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
        
<!-- Services Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Fasilitas</h5>
                    <h1 class="mb-0">Fasilitas-fasilitas SMK Canda Bhirawa</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">AULA</h5>
                                        <p class="mb-0">Aula sekolah merupakan salah satu fasilitas penting yang memiliki banyak fungsi dalam mendukung berbagai aktivitas akademik maupun non-akademik. Aula digunakan sebagai tempat untuk mengadakan rapat, seminar, dan sosialisasi yang melibatkan siswa, guru, serta orang tua. Selain itu, aula juga sering menjadi pusat kegiatan ekstrakurikuler seperti pentas seni, lomba, dll.
                                          </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Lab TKJ Dan Lab DPIB</h5>
                                        <p class="mb-0">Laboratorium Teknik Komputer dan Jaringan (TKJ) serta Desain Permodelan dan Informasi Bangunan (DPIB) di sekolah merupakan fasilitas penting bagi siswa yang menempuh pendidikan di bidang teknologi dan konstruksi. Kedua laboratorium ini menjadi tempat praktik bagi siswa untuk mengembangkan keterampilan yang sesuai dengan kebutuhan industri.</p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cog fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Campus (5)</h5>
                                        <p class="mb-0">SMK Canda Bhirawa memiliki 5 kampus yang digunakan sebagai tempat pembelajaran. Kampus 1 berada di Jl. Pb. Sudirman No.68, Plongko, Kec. Pare, Kabupaten Kediri. Kampus 2 berada di Jl. Gede 1 Kec.Pare. Kampus 3 berada di Jl. Mayjen Mas Isman Puhrejo, Tulungrejo, Kec. Pare. Kampus 4 berada di Jl. Cendrawasih Dsn. Dilem Ds. Ringinrejo Kec. Ringinrejo. Kampus 5 berada di Jl. Nglajo Dsn. Gogorejo Ds. Pandantoyo Kec. Ngancar.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Bengkel mesin, listrik, dan otomotif.</h5>
                                        <p class="mb-0">Bengkel listrik, mesin, dan otomotif merupakan tempat penting bagi siswa untuk mengasah keterampilan praktis dalam bidang teknik. Bengkel ini berfungsi sebagai laboratorium praktik bagi siswa yang mengambil jurusan tersebut, memungkinkan mereka untuk menerapkan teori yang telah dipelajari di kelas ke dalam dunia nyata.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cog fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Kantin</h5>
                                        <p class="mb-0">Kantin adalah tempat yang menyediakan makanan dan minuman bagi para pengunjung, baik di lingkungan sekolah, kantor, universitas, atau fasilitas umum lainnya. Biasanya, kantin memiliki berbagai pilihan hidangan, mulai dari makanan ringan hingga makanan berat, serta minuman segar untuk menemani waktu istirahat.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <img src="img/foto_cb_cb/kantin-removebg-preview.png" alt="Travela Logo" style="height: 120px; width: auto; margin-right: 10px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <img src="img/foto_cb_cb/uks-removebg-preview.png" alt="Travela Logo" style="height: 100px; width: auto; margin-right: 10px;">
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">UKS</h5>
                                        <p class="mb-0">Unit Kesehatan Sekolah (UKS) adalah fasilitas penting di sekolah yang berfungsi sebagai pusat layanan kesehatan bagi siswa, guru, dan seluruh warga sekolah. UKS menjadi tempat pertama yang dikunjungi ketika ada siswa yang merasa kurang sehat, mengalami cedera ringan, atau membutuhkan pertolongan pertama sebelum dirujuk ke fasilitas kesehatan yang lebih besar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <img src="img/foto_cb_cb/mushola-removebg-preview.png" alt="Travela Logo" style="height: 120px; width: auto; margin-right: 10px;">
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Mushola</h5>
                                        <p class="mb-0">Mushola sekolah adalah tempat yang disediakan untuk siswa, guru, dan seluruh warga sekolah dalam melaksanakan ibadah, terutama salat. Selain berfungsi sebagai tempat beribadah, mushola juga menjadi pusat pembinaan karakter dan kegiatan keagamaan yang mendukung pembentukan akhlak mulia bagi siswa.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <img src="img/foto_cb_cb/wifi-removebg-preview.png" alt="Travela Logo" style="height: 80px; width: auto; margin-right: 10px;">
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Wifi</h5>
                                        <p class="mb-0">Fasilitas WiFi di sekolah menjadi salah satu sarana penting dalam mendukung proses pembelajaran di era digital. Dengan akses internet yang stabil, siswa dan guru dapat mencari informasi, mengakses materi pembelajaran daring, serta menggunakan berbagai platform edukasi yang memperkaya pengalaman belajar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <img src="img/foto_cb_cb/market-removebg-preview.png" alt="Travela Logo" style="height: 90px; width: auto; margin-right: 10px;">
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Kopsis</h5>
                                        <p class="mb-0">Koperasi Siswa (Kopsis) sekolah adalah wadah bagi para siswa untuk belajar berwirausaha dan mengelola usaha secara mandiri. Kopsis biasanya dikelola oleh siswa dengan bimbingan guru dan bertujuan untuk memenuhi kebutuhan warga sekolah, seperti alat tulis, buku pelajaran, seragam, hingga makanan ringan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <img src="img/foto_cb_cb/perpus-removebg-preview.png" alt="Travela Logo" style="height: 95px; width: auto; margin-right: 10px;">
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Perpustakaan</h5>
                                        <p class="mb-0">Perpustakaan sekolah adalah tempat yang penuh dengan ilmu pengetahuan dan menjadi pusat belajar bagi siswa. Di dalamnya terdapat berbagai koleksi buku, mulai dari buku pelajaran, ensiklopedia, novel, hingga majalah yang dapat memperluas wawasan. Suasana perpustakaan biasanya tenang, memberikan kenyamanan bagi siswa yang ingin membaca, mengerjakan tugas, atau mencari referensi.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Service More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->

        <!-- Gallery Start -->
        <div class="container-fluid gallery py-5 my-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">foto foto</h5>
                <h1 class="mb-4">Siswa/Siswi SMK Canda Bhirawa.</h1>
                <p class="mb-0">Kumpulan Foto-Foto Siswa/Siswi CB</p>
            </div>
            <div class="tab-class text-center">
                <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#GalleryTab-1">
                            <span class="text-dark" style="width: 150px;">Semua</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-2">
                            <span class="text-dark" style="width: 150px;">Teman-teman</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-3">
                            <span class="text-dark" style="width: 150px;">KTS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-4">
                            <span class="text-dark" style="width: 150px;">P5</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-5">
                            <span class="text-dark" style="width: 150px;">Jalan Santai</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="GalleryTab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/foto_cb_cb/IMG_7321.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/foto_cb_cb/IMG_7321.JPG" data-lightbox="gallery-1" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/foto_cb_cb/IMG_6189.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/foto_cb_cb/IMG_6189.JPG" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="cb/bintalsik2.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="cb/bintalsik2.JPG" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/foto_cb_cb/IMG_0094.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/foto_cb_cb/IMG_0094.JPG" data-lightbox="gallery-4" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/galery/IMG_0111.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/galery/IMG_0111.JPG" data-lightbox="gallery-5" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/foto_cb_cb/IMG_6287.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/foto_cb_cb/IMG_6287.JPG" data-lightbox="gallery-6" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="cb/bintalsik.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="cb/bintalsik.JPG" data-lightbox="gallery-7" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/foto_cb_cb/IMG_0159.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/foto_cb_cb/IMG_0159.JPG" data-lightbox="gallery-8" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/foto_cb_cb/IMG_0031.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/foto_cb_cb/IMG_0031.JPG" data-lightbox="gallery-9" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/cb/IMG-20250205-WA0011.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/cb/IMG-20250205-WA0011.jpg" data-lightbox="gallery-10" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GalleryTab-2" class="tab-pane fade show p-0">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/cb/IMG-20250205-WA0011.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/cb/IMG-20250205-WA0011.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="Iki gambar/IMG-20250205-WA0005.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="Iki gambar/IMG-20250205-WA0005.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GalleryTab-3" class="tab-pane fade show p-0">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/foto_cb_cb/IMG_6287.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/foto_cb_cb/IMG_6189.JPG" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-3.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GalleryTab-4" class="tab-pane fade show p-0">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-3.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GalleryTab-5" class="tab-pane fade show p-0">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-2.jpg" data-lightbox="gallery-2" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                    <img src="img/gallery-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">World Tour</h5>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="img/gallery-3.jpg" data-lightbox="gallery-3" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery End -->

      <div class="container-fluid guide py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Kepala Sekolah</h5>
            <h1 class="mb-0">Dari Masa ke Masa</h1>
        </div>
        <div class="row g-4">
            <?php
            include "koneksi.php";
            $query = "SELECT * FROM kepsek";
            $sql = $koneksi->query($query);
            while ($c = $sql->fetch_array()) { ?>
                <div class="col-md-6 col-lg-3">
                    <div class="guide-item h-100">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img class="img-fluid w-100 rounded-top" src="admin/kepsek-img/<?php echo $c['foto']; ?>" alt="Image" style="object-fit: cover; height: 250px;">
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3"><?php echo $c['nama']; ?></h4>
                                <p class="mb-0"><?php echo $c['masa_jabatan']; ?></p>
                                <p class="mb-0"><?php echo $c['education']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Blog Start -->
       <div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">News</h5>
            <h1 class="mb-4">Popular News</h1>
            <p class="mb-0">Berita-berita terupdate dari Candabhirawa.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            include "koneksi.php";
            $query = "SELECT * FROM news";
            $sql = $koneksi->query($query);
            while ($c = $sql->fetch_array()) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item h-100">
                        <div class="blog-img">
                            <div class="blog-img-inner position-relative">
                                <img class="img-fluid w-100 rounded-top" src="admin/foto_berita/<?php echo $c['foto_berita']; ?>" alt="Image" style="height: 250px; object-fit: cover;">
                                <div class="blog-icon position-absolute top-50 start-50 translate-middle">
                                    <a href="detail_berita.php?id=<?php echo $c['id']; ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content border border-top-0 rounded-bottom p-4">
                            <a class="h4 d-block mb-2"><?php echo $c['judul']; ?></a>
                            <p class="my-3 sinopsis-short"><?php echo substr($c['sinopsis'], 0, 100); ?>...</p>
                            <p class="my-3 sinopsis-full d-none"><?php echo nl2br($c['sinopsis']); ?></p>
                            <a href="detail_berita.php?id=<?php echo $c['id']; ?>" class="btn btn-primary rounded-pill py-2 px-4 btn-toggle">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Toggle Sinopsis -->
<script>
document.querySelectorAll('.btn-toggle').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const content = btn.closest('.blog-content');
        const shortText = content.querySelector('.sinopsis-short');
        const fullText = content.querySelector('.sinopsis-full');

        // Toggle visibilitas
        shortText.classList.toggle('d-none');
        fullText.classList.toggle('d-none');

        // Ganti teks tombol
        btn.textContent = btn.textContent === 'Read More' ? 'Tampilkan Ringkasan' : 'Read More';
    });
});
</script>

<?php include("./layout/footer.php") ?>