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
                    <div class="card card-dark">
                        <div class="card-header">
                            <h1 class="card-title ">
                                <i class="fas fa-user" style="font-size: 1.5rem;"></i>
                                Tambah Akun Pengguna Baru
                            </h1>
                        </div>
                        <div class="card-body">
                            <!-- alert notification -->

                            <!-- Form add new user accoiunt -->
                            <form action="<?php echo site_url('account/add/new_account') ?>" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <input type="email" class="form-control" id="username" name="username" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_level">Role :</label>
                                        <select class="form-control" id="user_level" name="user_level">
                                            <option value="" selected disabled> -- Pilh Role --</option>
                                            <option value="admin">Admin</option>
                                            <option value="author">Pengguna</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success form-control">Add</button>
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