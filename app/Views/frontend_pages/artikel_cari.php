<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAZ DKD</title>

    <!-- include css file -->
    <?php

    use CodeIgniter\I18n\Time;

    include(APPPATH . 'Views/imports/frontend/css.php') ?>
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
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>Artikel</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Blog Area Start-->

        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <!-- if kategori gak ada isinya  -->
                            <?php if (empty($artikel_cari)) : ?>
                                <h1 class="font-weight-bold">Artikel Tidak Ditemukan</h1>
                            <?php else : ?>

                                <?php foreach ($artikel_cari as $data) : ?>
                                    <?php $artikelTanggal = new DateTime($data['artikel_tanggal']); ?>
                                    <?php $formatDate = $artikelTanggal->format('d-m-Y H:i:s'); ?>
                                    <?php $time = Time::parse($formatDate, 'Asia/Jakarta'); ?>
                                    <article class="blog_item">
                                        <div class="blog_item_img">
                                            <img class="card-img rounded-0" src="<?php echo base_url() . 'assets/img/artikel/' . $data['artikel_cover'] ?>" alt="" />
                                            <a href="<" class="blog_item_date  text-center">
                                                <span><?php echo $time->toLocalizedString('d') ?></span>
                                                <p><?php echo $time->toLocalizedString('MMM yyyy') ?></p>
                                            </a>
                                        </div>
                                        <div class="blog_details">
                                            <a class="d-inline-block" href="<?php echo site_url('/detail_artikel' . '/' . $data['artikel_slug']) ?>">
                                                <h2 class="blog-head" style="color: #2d2d2d">
                                                    <?php echo $data['artikel_judul'] ?>
                                                </h2>
                                            </a>
                                            <p class="text-justify">
                                                <!-- // Hapus semua tag HTML -->
                                                <?php $kontenTanpaHTML = strip_tags($data['artikel_konten']); ?>
                                                <!-- pecah konten menjadi array kalimat -->
                                                <?php $kotenArray = explode('.', $kontenTanpaHTML) ?>
                                                <!-- ambil 4 kalimat utama  -->
                                                <?php $empatBaris = array_slice($kotenArray, 0, 4) ?>
                                                <!-- gabungkan kembali ke dalam satu teks -->
                                                <?php $konten = implode('.', $empatBaris) ?>

                                                <?php echo htmlspecialchars_decode($konten) ?>
                                            </p>
                                            <ul class="blog-info-link">
                                                <li>
                                                    <a href="#" style="pointer-events: none; color: gray; text-decoration: none;"><i class=" fa fa-user"></i>Author</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url() . 'artikel' . '/' . $data['kategori_id'] ?>"><i class="fa fa-tag"></i><?php echo $data['kategori_nama'] ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php echo $pager->links('default', 'pager') ?>
                        </div>
                    </div>

                    <!-- sidebar start  -->
                    <?php include(APPPATH . 'Views/templates/frontend/sidebar_blog.php')  ?>
                    <!-- sidebar end -->
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