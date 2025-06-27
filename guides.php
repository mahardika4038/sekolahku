<?php include("./layout/header.php") ?>

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;"></div>
                <h1 class="text-white display-3 mb-4"style="text-align: center;">profesional thecher</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Travel Guide Start -->
        <div class="container-fluid guide py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">profesional thecher</h5>
                    <h1 class="mb-0">teacher for smk Canda Bhirawa</h1>
                </div>
                <div class="row g-4">
                <?php 
		include "koneksi.php";
		$query = "SELECT * FROM admin_profile ";
		$sql = $koneksi->query($query);
		while ($c = $sql->fetch_array()) { ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="guide-item">
                            <div class="guide-img">
                                <div class="guide-img-efects">
            
                                    <img src="admin/foto_foto/<?php echo $c['image'];?>" class="img-fluid w-100 rounded-top" alt="Image">
                                </div>
                                <div class="guide-icon rounded-pill p-2">
                                   
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href="https://www.instagram.com/<?php echo $c['instagram']; ?>" target="_blank">
    <i class="fab fa-instagram"></i>
</a>

                                </div>
                            </div>
                            <div class="guide-title text-center rounded-bottom p-4">
                                <div class="guide-title-inner">
                                    <h4 class="mt-3"><?php echo $c['Nama']; ?></h4>
                                    <p class="mb-0"><?php echo $c['education']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                 
                </div>
            </div>
        </div>
        <!-- Travel Guide End -->

        <!-- Subscribe Start -->
        <div class="container-fluid subscribe py-5">
            <div class="container text-center py-5">
                <div class="mx-auto text-center" style="max-width: 900px;">
                    <h5 class="subscribe-title px-3">canda bhirawa vocational height scholl</h5>
                    <h1 class="text-white mb-4">terakreditasi A</h1>
                    <p class="text-white mb-5">mempersiapkan generasi muda memiliki skill dan mental tangguh untuk dijadikan bekal masa depan mereka.
                    </p>
                    <div class="position-relative mx-auto">
                        <input class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe End -->

        <?php include("./layout/footer.php") ?>