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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <!-- small box info  -->
                    <!-- Box info -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $jumlah_artikel; ?></h3>
                                    <p>Artikel</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $jumlah_program; ?></h3>
                                    <p>Program</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-flag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $jumlah_pengguna; ?></h3>
                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $jumlah_kategori; ?></h3>
                                    <p>Kategori</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header  bg-dark">
                                    <h1 class="card-title">
                                        <i class="fa fa-home" style="font-size: 1.5rem;"> Dashboard</i>
                                    </h1>
                                </div>
                                <div class="card-body">
                                    <h3>Selamat Datang !</h3>
                                    <div class="table-responsive">
                                        <table class="table table-borderless ">
                                            <tr>
                                                <th width="10%">Nama</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p><?php echo session()->get('nama') ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="10%">Username</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p><?php echo session()->get('username') ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="10%">Hak Akses</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p><?php echo session()->get('role') ?></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div> <!--card body  -->
                            </div>
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