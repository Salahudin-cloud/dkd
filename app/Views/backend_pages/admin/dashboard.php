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
            <?php include(APPPATH . 'Views/templates/backend/content_header.php') ?>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <!-- small box info  -->
                    <!-- Box info -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>100</h3>
                                    <p>Articles</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>30</h3>
                                    <p>Pages</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>100</h3>
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
                                    <h3>20</h3>
                                    <p>Categories</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-tags"></i>
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
                                                    <p>Admin</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="10%">Username</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p>Admin</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="10%">Hak Akses</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p>admin</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="10%">Status</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p>Active</p>
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