<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> LAZ DKD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
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
        <div class="slider-area2 border">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-20 text-center">
                                <h2>Program </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!-- Our Cases Start -->
        <div class="our-cases-area section-padding30">
            <div class="container">
                <div class="row">
                    <?php foreach ($program as $data) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-cases mb-40">
                                <div class="cases-img">
                                    <img src="<?php echo base_url() . 'assets/img/program/' . $data->program_cover ?>" alt="">
                                </div>
                                <div class="cases-caption">
                                    <h3><a href="<?php echo site_url('/detail_program' . '/' . $data->program_slug) ?>"><?php echo $data->program_judul ?></a></h3>
                                    <!-- / progress -->
                                    <div class="prices d-flex justify-content-between">
                                        <p>Terkumpul:<span>Rp. <?php echo number_format((int)$data->program_terkumpul, 0, ',', '.') ?></span></p>
                                        <p>Target:
                                            <span>
                                                Rp.
                                                <?php if ($data->program_target === '-') : ?>
                                                    <?php echo $data->program_target ?>
                                                <?php else : ?>
                                                    <?php echo number_format((int)$data->program_target, 0, ',', '.') ?>
                                                <?php endif; ?>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Our Cases End -->
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