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
                            <h1 class="m-0">Kategori</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Kategori</li>
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
                                <strong style="font-size: 1.5rem;"> Daftar Kategori</strong>
                            </h1>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo site_url('kategori_tambah') ?>">
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i> Tambah Kategori
                                </button>
                            </a>
                            <!-- Show list of category -->
                            <table class="table table-bordered table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">NO</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug Kategori</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $i = 1 + (10 * ($page - 1)) ?>
                                    <?php foreach ($kategori as $data) : ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $data['kategori_nama'] ?></td>
                                            <td><?php echo $data['kategori_slug'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Action buttons">
                                                    <a href="<?php echo site_url('/kategori_update' . '/' . $data['kategori_id']) ?>" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                                                    <form action="<?php echo site_url('kategori_delete/' . $data['kategori_id']) ?>" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                            <i class="nav-icon fas fa-trash-alt"></i>
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