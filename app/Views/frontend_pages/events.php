<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>LAZ DKD</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() . 'assets/img/dkd/logo/laz.png' ?>" />

    <!-- include css file -->
    <?php include(APPPATH . 'Views/imports/frontend/css.php') ?>

</head>

<body>
    <!-- ? Preloader Start -->
    <?php include(APPPATH . 'Views/templates/frontend/pre.php') ?>
    <!-- Preloader Start -->
    <!-- Header start  -->
    <?php include(APPPATH . 'Views/templates/frontend/nav.php') ?>
    <!-- header end -->
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-20 text-center">
                                <h2>social events </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Featured_job_start -->
        <section class="featured-job-area section-padding30 section-bg2" data-background="<?php echo base_url() . 'assets/frontend/img/gallery/section_bg03.png' ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9 col-md-10 col-sm-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2>Kami Mengatur Banyak Acara Sosial Untuk Donasi Amal</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-12">
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="<?php echo site_url('/detail_event') ?>"><img src="<?php echo base_url() . 'assets/frontend/img/dkd/event/doa_bersama.jpg' ?>" alt="" height="178" width="174"></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="<?php echo site_url('/detail_event') ?>">
                                        <h4>Doa Bersama 500 Anak Yatim</h4>
                                    </a>
                                    <ul>
                                        <li><i class="far fa-clock"></i>8:30 - 9:30am</li>
                                        <li><i class="fas fa-sort-amount-down"></i>19 Dec 2022</li>
                                        <li><i class="fas fa-map-marker-alt"></i>Kota Magelang</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="#"><img src="<?php echo base_url() . 'assets/frontend/img/dkd/event/paket_puasa.jpg' ?>" height="178" width="174" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>Berbagi 450 Paket Buka Puasa</h4>
                                    </a>
                                    <ul>
                                        <li><i class="far fa-clock"></i>8:30 - 9:30am</li>
                                        <li><i class="fas fa-sort-amount-down"></i>12 Apr 2022</li>
                                        <li><i class="fas fa-map-marker-alt"></i>Kota Magelang</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="#"><img src="<?php echo base_url() . 'assets/frontend/img/dkd/event/beasiswa.jpg' ?>" height="178" width="174" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>Sharing Class, Beasiswa Senyum Sahabat</h4>
                                    </a>
                                    <ul>
                                        <li><i class="far fa-clock"></i>8:30 - 9:30am</li>
                                        <li><i class="fas fa-sort-amount-down"></i>06 Feb 2023</li>
                                        <li><i class="fas fa-map-marker-alt"></i>Masjid Al Muttaqin</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
    </main>

    <!-- footer  start  -->
    <?php include(APPPATH . 'Views/templates/frontend/foot.php') ?>
    <!-- footer end -->


    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>


    <!-- JS here -->
    <?php include(APPPATH . 'Views/imports/frontend/js.php')  ?>



</body>

</html>