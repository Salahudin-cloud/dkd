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
                            <div class="mt-2">
                                <a href="<?php echo site_url('kategori') ?>">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </button>
                                </a>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('kategori') ?>"> Kategori</a></li>
                                <li class="breadcrumb-item active">Update Kategori</li>
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
                                <i class="fas fa-layer-group" style="font-size: 1.5rem;"></i>
                                <strong style="font-size: 1.5rem;"> Update Kategori</strong>
                            </h1>
                        </div>
                        <div class="card-body">
                            <!-- alert notification -->
                            <?php if (session()->getFlashdata('errors')) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach (session()->getFlashdata('errors') as $errors) : ?>
                                        <?php echo $errors; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <!-- Form add new user accoiunt -->
                            <form action="<?php echo site_url('kategori_update_process/' . $kategori->kategori_id) ?>" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $kategori->kategori_nama ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success form-control">Update</button>
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