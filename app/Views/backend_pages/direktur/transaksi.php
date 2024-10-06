<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAZ DKD</title>

    <!-- IMPORT REUIRED FILE CSS -->
    <?php include(APPPATH  . 'Views/imports/backend/css.php') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- preloader -->
        <?php include(APPPATH . 'Views/templates/backend/pre.php') ?>

        <!-- navbar -->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo site_url('direktur/dashboard') ?>" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- sidebar -->

        <!-- sidebar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url() . 'assets/backend/dist/img/user2-160x160.png' ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Keuangan</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item ">
                            <a href="<?php echo site_url('keuangan/dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <!-- Transaksi -->
                        <li class="nav-item ">
                            <a href="<?php echo site_url('keuangan/transaksi') ?>" class="nav-link">
                                <i class="nav-icon fas fa-hand-holding-usd"></i>
                                <p>
                                    Transaksi
                                </p>
                            </a>
                        </li>
                        <!-- Log out  -->
                        <li class="nav-item ">
                            <a href="<?php echo site_url('logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Log out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- end sidebar -->


        <div class="content-wrapper">
            <!-- navbar -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Transaksi</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h1 class="card-title ">
                                <i class="fas fa-hand-holding-usd" style="font-size: 1.5rem;"></i>
                                <strong style="font-size: 1.5rem;"> Daftar Transaksi</strong>
                            </h1>
                        </div>
                        <div class="card-body">
                            <div class="btn-group">
                                <a href="<?php echo site_url('cetak_laporan') ?>">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-file-download"></i> cetak laporan transaksi
                                    </button>
                                </a>
                            </div>
                            <!-- Show list of category -->
                            <table id="ex" class="table table-bordered table-hover mt-2">
                                <?php $i = 1; ?>
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">NO</th>
                                        <th>ID Transaksi</th>
                                        <th>Tanggal Donasi</th>
                                        <th>Metode Pembayaran </th>
                                        <th>Nama Donatur</th>
                                        <th>Nama Program</th>
                                        <th>Nominal</th>
                                        <th>Informasi Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all_transaksi as $data) : ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $data['id_transaksi'] ?></td>
                                            <td><?php echo $data['tanggal_transaksi'] ?></td>
                                            <td><?php echo strtoupper($data['metode_pembayaran']) ?></td>
                                            <td><?php echo $data['pengguna_nama'] ?></td>
                                            <td><?php echo $data['program_judul'] ?></td>
                                            <td>Rp <?php echo number_format($data['nominal_pembayaran'], 0, ',', '.')  ?></td>
                                            <td><?php echo $data['info_transaksi'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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


    <script>
        $(function() {
            $('#ex').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>