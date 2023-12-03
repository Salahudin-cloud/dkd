<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


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
                                <h2>Detail Blog</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Blog Area Start -->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="<?php echo base_url() . 'assets/frontend/img/blog/1.jpg' ?>" alt="">
                            </div>
                            <div class="blog_details">
                                <h2 style="color: #2d2d2d;">Agar Hafalan Tidak Cepat Pudar
                                </h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-tag"></i>Tips</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                                <p class="excert">
                                    Alquran merupakan kitab suci yang paling banyak dihafal oleh umat manusia.
                                    Menghafal Alquran dapat menimbulkan dampak positif bagi orang yang melakukannya.
                                    Beberapa orang diberikan kemudahan dalam Alquran,
                                    meskipun begitu hafalan Alquran mudah hilang atau rusak jika kita tidak menjaga hafalan dengan baik dan benar.
                                    Rusaknya atau pudarnya hafalan seseorang disebabkan oleh beberapa hal antara lain:
                                <ul class="ordered-list">
                                    <li>
                                        <p>
                                            <strong>Maksiat kepada Allah SWT</strong>
                                            Maksiat kepada Allah bagi umat Rosulullah SAW tentu harus dihindari, terutama bagi penjaga ayat-ayat Alllah SWT.
                                            Maksiat kepada Allah akan mengurangi keberkahan dalam menghafal alqur’an.
                                            Keberkahan menghafal qur’an tentu hal yang sangat susah didapatkan
                                            apabila Allah sudah murka kepada hamba-Nya apabila hambanya tidak langsung bertaubat dengan sungguh-sungguh.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <strong> Mengkonsumi makanna atau minuman yang tidak halal dan tidak baik</strong>
                                            Sebagai penghafal alqur’an tentunya sudah menjadi kewajiban bagi dirinya
                                            dalam menyaring apa yang akan masuk kedalam perutnya, terutama hal yang
                                            tidak baik bagi daya ingat dan bagi tubuh seorang penghafal alqur’an.
                                            Salah satu makanna yang dihindari doleh penghafal alqur’an adalah makanan
                                            yang mempunyai rasa asam yang berlebihan.
                                            Rasa asam yang berlebihan akan melemahkan daya ingat.
                                            Tentu saja lemahnya daya ingat akan mengurangi kualitas hafalan.
                                            Beberapa ulama menganjurkan suplemen khusus bagi penghafal alquran
                                            diantaranya adalah madu dan kurma.
                                            Madu dan kurma yang mempunyai ciri khas rasa manis akan membuat kualitas daya ingat yang lebih baik.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <strong>Tidak Menghormati asatidz</strong>
                                            “Adab sebelum ilmu.” Begitulah kalimat Imam Malik Rohimahullah yang sampai
                                            sekarang harus diingat oleh
                                            penunutut ilmu atau penghafal qur’an dizaman sekarang.
                                            Lunturnya adab dimasyarakat zaman sekarang
                                        </p>
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar start  -->
                    <?php include(APPPATH . 'Views/templates/frontend/sidebar_blog.php') ?>
                    <!-- sidebar end  -->
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
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