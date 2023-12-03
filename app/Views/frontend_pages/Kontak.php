<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAZ DKD</title>


    <!-- include css file -->
    <?php include(APPPATH . 'Views/imports/frontend/css.php') ?>
</head>

<body>
    <!-- ? Preloader Start -->
    <?php include(APPPATH . 'Views/templates/frontend/pre.php') ?>
    <!-- Preloader Start -->
    <!-- Header Start -->
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
                                <h2>Hubungi Kami</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--?  Contact Area start  -->
        <section class="contact-section">
            <div class="container">
                <div class="mb-5 pb-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15824.331456334901!2d110.2247859!3d-7.456085!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a85e63eb39487%3A0x2d73adfaa5022bb1!2sLAZ%20DKD!5e0!3m2!1sen!2sid!4v1690427759461!5m2!1sen!2sid" class="embed-responsive-item" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 ">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-home"></i></span>
                            <div class="media-body">
                                <h3>Jl. Serayu Tim., Kedungsari, Kec. Magelang Utara, Kota Magelang, Jawa Tengah 59155</h3>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-phone-volume"></i></i></span>
                            <div class="media-body">
                                <h3>+62 253 565 2365</h3>

                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fab fa-instagram"></i></span>
                            <div class="media-body">
                                <a href="">
                                    <h3>@laz_dkd</h3>
                                </a>

                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fab fa-facebook-square"></i></span>
                            <div class="media-body">
                                <a href="">
                                    <h3>LAZ DKD</h3>
                                </a>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="far fa-envelope"></i></span>
                            <div class="media-body">
                                <a href="">
                                    <h3>Laz_DKD@gmail.com</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Area End -->
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