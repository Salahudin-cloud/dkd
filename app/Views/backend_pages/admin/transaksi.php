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
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item active"> Daftar Transaksi</li>
                            </ol>
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
                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img id="modalImage" class="img-fluid" src="" alt="Bukti Transaksi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Show list of category -->
                            <table class="table table-bordered table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">NO</th>
                                        <th>ID Transaksi</th>
                                        <th>Nama Pengguna</th>
                                        <th>Nama Program</th>
                                        <th>Nominal</th>
                                        <th style="width: 1%;">Metode Transaksi</th>
                                        <th>Status Pembayaran</th>
                                        <th style="width: 10%;">Bukti Transaksi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $i = 1 + (5 * ($page - 1)) ?>
                                    <?php foreach ($transaksi_data as $transaksi) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $transaksi['id_transaksi'] ?></td>
                                            <td><?php echo $transaksi['pengguna_nama'] ?></td>
                                            <td><?php echo $transaksi['program_judul'] ?></td>
                                            <td>Rp.<?php echo $transaksi['nominal_pembayaran'] ?></td>
                                            <td><?php echo strtoupper($transaksi['metode_pembayaran']) ?></td>
                                            <td>
                                                <?php if ($transaksi['status_pembayaran'] === 'menunggu_konfirmasi') : ?>
                                                    <span class="badge badge-warning"><?php echo $transaksi['status_pembayaran'] ?></span>
                                                <?php else :  ?>
                                                    <span class="badge badge-success"><?php echo $transaksi['status_pembayaran'] ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <img width="100%" class="img-responsive view-image" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url() . 'assets/img/transaksi/' . $transaksi['bukti_transaksi']; ?>" src="<?php echo base_url() . 'assets/img/transaksi/' . $transaksi['bukti_transaksi']; ?>">
                                            </td>
                                            <td>
                                                <div class="btn-group " role="group" aria-label="Action buttons">
                                                    <form action="<?php echo base_url() . 'transaksi/check/' . $transaksi['id_transaksi'] ?>" method="POST">
                                                        <button type="submit" class="btn btn-sm btn-success mr-1">
                                                            <i class="nav-icon fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                    <a href="" class="btn btn-sm btn-warning mr-1">
                                                        <i class="nav-icon fas fa-file-download"></i>
                                                    </a>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Apa kamu yakin untuk menghapus artikel ini?')">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <div class="pt-2">
                                <?php echo $pager->links('default', 'pager_admin') ?>
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

    <script>
        $(document).ready(function() {
            $('.view-image').click(function() {
                var imageUrl = $(this).data('image');
                $('#modalImage').attr('src', imageUrl);
            });
        });
    </script>
</body>

</html>