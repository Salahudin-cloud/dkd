<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAZ DKD</title>

    <!-- include css file -->
    <?php include(APPPATH . 'Views/imports/frontend/css.php') ?>
    <style>
        /* Adjust button size */

        .modal-body .form-control {
            font-size: 14px;
            /* Adjust font size as needed */
            padding: 10px 20px;
            /* Adjust padding as needed */
        }
    </style>
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
        <div class="slider-area2 border">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-20 text-center">
                                <h2>Detail Program</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <section class="blog-wrapper sect-pt4" id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <?php foreach ($program as $data) :  ?>
                            <div class="post-box ">
                                <div class="post-thumb text-center">
                                    <img src="<?php echo base_url() . 'assets/img/program/' . $data->program_cover ?>" class="img-fluid  mt-5" alt="">
                                </div>
                                <div class="post-meta">
                                    <h1 class=" content font-weight-bold"><?php echo $data->program_judul ?></h1>
                                </div>
                                <div class="content text-justify">
                                    <?php echo $data->program_detail ?>
                                    <div class="mt-3">
                                        <?php if ((session()->get('role') === 'donatur') && (session()->get('isLogin'))) : ?>
                                            <!-- modal button -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#transaksiButton">
                                                Donasi
                                            </button>
                                        <?php else : ?>
                                            <a href="<?php echo site_url('/login') ?>" class="btn btn-success">
                                                Donasi
                                            </a>
                                        <?php endif; ?>
                                        <!-- Modal -->
                                        <div class="modal fade " id="transaksiButton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title" id="transaksiButton">Pembayaran Donasi</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="">
                                                            <div class="form-group">
                                                                <label for="name">Nama Donatur</label>
                                                                <input class="form-control form-control-lg" type="text" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Nama Program</label>
                                                                <input class="form-control form-control-lg" type="text" placeholder="" value="<?php echo $data->program_judul ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Nominal</label>
                                                                <input class="form-control form-control-lg" type="number" placeholder="Rp.">
                                                            </div>
                                                            <p>Transfer Ke : </p>
                                                            <div class="form-group row">
                                                                <label for="bni" class="col-form-label col-lg-2">BNI</label>
                                                                <div class="col-lg-10">
                                                                    <input class="form-control form-control-lg" type="text" placeholder="Nomor Rekening BNI" value="4811219005142317" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="bri" class="col-form-label col-lg-2">BRI:</label>
                                                                <div class="col-lg-10">
                                                                    <input class="form-control form-control-lg" type="text" placeholder="Nomor Rekening BRI" value="4534780708675768" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="file" class="col-form-label">Bukti Transfer</label>
                                                                <div class="col-lg-10">
                                                                    <input type="file" class="form-control-file">
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-secondary btn-lg btn-block">Donasi</button>
                                                        </form>
                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary btn-lg btn-block" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Services Area End -->
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
    <!-- Script -->
    <script>
        $(document).ready(function() {
            // Loop through each button
            $('button[data-bs-toggle="modal"]').click(function() {
                // Get the target modal ID
                var targetModalId = $(this).attr('data-bs-target');
                // Show the modal associated with the clicked button
                $(targetModalId).modal('show');
            });
        });
    </script>
</body>

</html>