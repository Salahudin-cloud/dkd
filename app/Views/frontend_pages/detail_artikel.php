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
                                <h2>Detail Artikel</h2>
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
                                <img class="img-fluid" src="<?php echo base_url() . 'assets/img/artikel/' . $artikel_data->artikel_cover ?>" alt="">
                            </div>
                            <div class="blog_details">
                                <h2 style="color: #2d2d2d;">
                                    <?php echo $artikel_data->artikel_judul ?>
                                </h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="<?php echo base_url() . 'artikel/' . $artikel_data->kategori_slug ?>"><i class="fa fa-tag"></i><?php echo $artikel_data->kategori_nama ?></a></li>
                                </ul>
                                <div class="text-justify">
                                    <!-- <?php echo $artikel_data->artikel_konten ?> -->
                                    <?= htmlspecialchars_decode($artikel_data->artikel_konten, ENT_QUOTES); ?>
                                </div>
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