<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- IMPORT REUIRED FILE CSS -->
    <?php include(APPPATH  . 'Views/imports/backend/css.php') ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <?php
            $session = session();
            // jiika ada salah satu form tidak diisi
            if ($session->getFlashdata('error') == 'failed') {
                echo "<div class='alert alert-danger font-weight-bold text-center'>
                    tolong isi form dengan benar
                    </div>";
            } else if ($session->getFlashdata('error') == 'invalid') {
                echo "<div class='alert alert-danger font-weight-bold text-center'>
                    tolong cek akun anda
                    </div>";
            }

            ?>
            <div class="card-header text-center">
                <a href="<?php echo site_url('login') ?>" class="h1"><b>Login</b></a>
            </div>
            <div class="card-body">

                <p class="login-box-msg">Masuk Untuk memulai</p>
                <form action="<?php echo site_url('auth') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="nope" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="nope" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4 ">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1 mt-2">
                    <a href="<?php echo site_url('register') ?>" class="text-center">Daftar Akun Baru</a>
                </p>
                <p class="mb-1 mt-2">
                    <a href="<?php echo site_url('/') ?>" class="text-center">Ke Halaman Utama</a>
                </p>
            </div>
        </div>
    </div>

    <!-- IMPORT REUIRED FILE CSS -->
    <?php include(APPPATH  . 'Views/imports/backend/js.php') ?>
</body>

</html>