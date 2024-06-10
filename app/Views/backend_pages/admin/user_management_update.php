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
                            <h1 class="m-0">User Management</h1>
                            <a href="<?php echo site_url('users_management') ?>">
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </button>
                            </a>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('users_management') ?>">User Management</a></li>
                                <li class="breadcrumb-item active">User Management Update</li>
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
                                <i class="fas fa-user" style="font-size: 1.5rem;"></i>
                                Update Pengguna
                            </h1>
                        </div>
                        <div class="card-body">
                            <!-- alert notification -->
                            <?php
                            $session = session();
                            // jiika ada salah satu form tidak diisi
                            if ($session->getFlashdata('error') == 'failed') {
                                echo "<div class='alert alert-danger font-weight-bold text-center'>
                                tolong isi form dengan benar
                                </div>";
                            } else if ($session->getFlashdata('error') == 'invalid') {
                                echo "<div class='alert alert-danger font-weight-bold text-center'>
                                username sudah tersedia
                                </div>";
                            }
                            ?>
                            <!-- Form add new user accoiunt -->
                            <form action="<?php echo base_url() . 'update_pengguna/process/' . $user->pengguna_id ?>" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->pengguna_nama ?>" maxlength="60">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>" maxlength="20">
                                        <i class="text-danger">Kosongkan jika tidak di ubah</i>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="<?= $user->password ?>" maxlength="32" minlength="8">
                                        <i class="text-danger">Kosongkan jika tidak di ubah</i>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_wa">No. Whattsap</label>
                                        <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?= $user->nomor_wa ?>" maxlength="11">
                                        <i class="text-danger">Kosongkan jika tidak di ubah</i>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" rows="3" style="resize:none" name="alamat"><?php echo $user->alamat ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_level">Role :</label>
                                        <select class="form-control" id="user_level" name="user_level">
                                            <option value="" disabled> -- Pilih Role --</option>
                                            <option value="admin" <?= ($user->role == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                            <option value="donatur" <?= ($user->role == 'donatur') ? 'selected' : ''; ?>>Donatur</option>
                                            <option value="direktur" <?= ($user->role == 'direktur') ? 'selected' : ''; ?>>Direktur</option>
                                        </select>
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