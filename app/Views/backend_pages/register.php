<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

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
                    username sudah tersedia
                    </div>";
            }
            ?>
            <div class="card-header text-center">
                <a href="<?php echo site_url('register') ?>" class="h1"><b>Registrasi</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Regstrasi Pengguna Baru</p>
                <form action="<?php echo site_url('register/process') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama" name="nama" maxlength="60" autocomplete="nope" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-file-signature"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" maxlength="29" autocomplete="nope" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" minlength="8" maxlength="32" placeholder="Password" name="password" autocomplete="nope" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4 ">
                            <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                        </div>

                        <!-- /.col -->
                    </div>
                    <p class="mb-1 mt-2">
                        <a href="<?php echo site_url('login') ?>" class="text-center">Kembali </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- IMPORT REUIRED FILE CSS -->
    <?php include(APPPATH  . 'Views/imports/backend/js.php') ?>
</body>

</html>