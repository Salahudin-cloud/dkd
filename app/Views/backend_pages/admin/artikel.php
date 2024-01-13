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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Artikel</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Artikel</li>
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
                                <i class="fas fa-layer-group" style="font-size: 1.5rem;"></i>
                                <strong style="font-size: 1.5rem;"> Daftar Artikel</strong>
                            </h1>
                        </div>
                        <div class="card-body">
                            <!-- button add artikel -->
                            <a href="<?php echo site_url('artikel_tambah') ?>">
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i> Tambah Artikel
                                </button>
                            </a>
                            <!-- Show list of artikel -->
                            <table class="table table-bordered table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">NO</th>
                                        <th>Tanggal</th>
                                        <th>Judul Artikel</th>
                                        <th>Kategori Artikel</th>
                                        <th style="width: 10%;">Cover</th>
                                        <th>Status</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $i = 1 + (5 * ($page - 1)) ?>
                                    <?php foreach ($artikel as $data) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo date('d/m/y', strtotime($data['artikel_tanggal'])) ?></td>
                                            <td><?php echo $data['artikel_judul'] ?></td>
                                            <td><?php echo $data['kategori_nama'] ?></td>
                                            <td><img width="100%" class="img-responsive" src="<?php echo base_url() . 'assets/img/artikel/' . $data['artikel_cover']; ?>"></td>
                                            <td>
                                                <?php if ($data['artikel_status'] === "publish") : ?>
                                                    <span class="badge badge-success">Publish</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Draft</span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <div class="btn-group " role="group" aria-label="Action buttons">
                                                    <a href="" class="btn btn-sm btn-success mr-1" target="_blank"><i class="nav-icon fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('artikel_update/' . $data['artikel_id']) ?>" class="btn btn-sm btn-warning mr-1">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    <form action="<?php echo site_url('artikel_delete/' . $data['artikel_id']) ?>" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Apa kamu yakin untuk menghapus artikel ini?')">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
</body>

</html>