<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- IMPORT REUIRED FILE CSS -->
    <?php include(APPPATH  . 'Views/imports/backend/css.php') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- preloader -->
        <?php include(APPPATH . 'Views/templates/backend/pre.php') ?>

        <!-- navbar -->
        <?php include(APPPATH . 'Views/templates/backend/nav.php') ?>


        <!-- sidebar -->
        <?php include(APPPATH . 'Views/templates/backend/sidebar.php') ?>

        <div class="content-wrapper">
            <!-- navbar -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Transaksi</h1>
                            <div class="mt-2">
                                <a href="<?php echo site_url('transaksi') ?>">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </button>
                                </a>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('kategori') ?>"> Transaksi</a></li>
                                <li class="breadcrumb-item active">Tambah Transaksi</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h1 class="card-title ">
                                <i class="fas fa-hand-holding-usd" style="font-size: 1.5rem;"></i>
                                <strong style="font-size: 1.5rem;"> Tambah Transaksi</strong>
                            </h1>
                        </div>
                        <div class="card-body">
                            <?php if (session()->has('errors')) : ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <!-- it will show error for every field -->
                                        <?php foreach (session('errors') as $error) : ?>
                                            <li> <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo site_url('transaksi_tambah_process') ?>" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Donatur</label>
                                        <select class="select2 form-control " style="width: 100%;">
                                            <option value="" selected disabled></option>
                                            <?php foreach ($pengguna as $donat) : ?>
                                                <option value="<?= $donat->pengguna_id ?>">
                                                    <?= $donat->pengguna_nama ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label for="metode">Metode Pembayaran</label>
                                        <select class="form-control" id="metode" name="metode">
                                            <option value="" selected disabled> -- pilih metode --</option>
                                            <option value="bni">
                                                BNI
                                            </option>
                                            <option value="bri">
                                                BRI
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nominal">Nominal Pembayaran</label>
                                        <input type="text" class="form-control" id="nominal" name="nominal" value="">
                                    </div>
                                    <button type="submit" class="btn btn-success form-control">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer -->
        <?php include(APPPATH  . 'Views/templates/backend/footer.php') ?>

        <!-- control siidebar -->
        <?php include(APPPATH  . 'Views/templates/backend/control_sidebar.php') ?>

    </div>
    <!-- reuired file js  -->
    <?php include(APPPATH  . 'Views/imports/backend/js.php') ?>


    <!-- Include Select2 CSS and JS -->

  
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                width: 'resolve'
            })

        });
    </script>
</body>

</html>