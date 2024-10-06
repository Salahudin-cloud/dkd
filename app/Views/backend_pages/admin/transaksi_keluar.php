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
                            <h1 class="m-0">Transaksi Keluar</h1>
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
                                <i class="fas fa-money-bill-alt" style="font-size: 1.5rem;"></i>
                                <strong style="font-size: 1.5rem;">Transaksi Keluar</strong>
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
                            <form action="<?php echo site_url('transaksi_keluar/process') ?>" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="program">Nama Program</label>
                                        <select class="form-control" id="program" name="program">
                                            <option value="" selected disabled> -- pilih --</option>
                                            <?php foreach ($program as $pro) : ?>
                                                <option value="<?= $pro->program_id ?>">
                                                    <?= $pro->program_judul ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="penangung">Penangung Jawab</label>
                                        <input type="text" class="form-control" id="penangung" name="penangung" value="<?php echo session()->get('nama') ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nominal">Nominal Pembayaran</label>
                                        <input type="text" class="form-control" id="nominal" name="nominal" value="">
                                    </div>
                                    <button type="submit" class="btn btn-success form-control">cetak</button>
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
</body>

</html>