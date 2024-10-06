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
                            <h1 class="m-0">Pengguna</h1>
                        </div><!-- /.col -->
                   <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- Main content -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h1 class="card-title ">
                                <i class="fas fa-users" style="font-size: 1.5rem;"></i>
                                <strong style="font-size: 1.5rem;"> Daftar Pengguna</strong>
                            </h1>
                        </div>
                        <div class="card-body">
                            <!-- add userr btn  -->
                            <a href="<?php echo site_url('tambah_pengguna') ?>">
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i> Tambah Pengguna
                                </button>
                            </a>
                            <!-- Show list of user -->
                            <table id="ex" class="table table-bordered table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">NO</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Nomor Whatssap</th>
                                        <th>Alamat</th>
                                        <th>Level</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    <?php foreach ($users as $pengguna) : ?>
                                        <?php if ($pengguna['role'] == "admin") : ?>
                                            <tr style="display: none;">
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $pengguna['pengguna_nama'] ?></td>
                                                <td><?php echo $pengguna['username'] ?></td>
                                                <td><?php echo $pengguna['nomor_wa'] ?></td>
                                                <td><?php echo $pengguna['alamat'] ?></td>
                                                <td><?php echo $pengguna['role'] ?></td>
                                                <td>
                                                    <div class="btn-group " role="group" aria-label="Action buttons">
                                                        <a href="" class="btn btn-sm btn-warning mr-1"><i class="nav-icon fas fa-edit"></i></a>
                                                        <a href="" onclick="alert('Apakah anda ingin menghapus pengguna ini ? ')" class="btn btn-sm btn-danger mr-1"><i class="nav-icon fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php else : ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $pengguna['pengguna_nama'] ?></td>
                                                <td><?php echo $pengguna['username'] ?></td>
                                                <td><?php echo $pengguna['nomor_wa'] ?></td>
                                                <td><?php echo $pengguna['alamat'] ?></td>
                                                <td><?php echo $pengguna['role'] ?></td>
                                                <td>
                                                    <div class="btn-group " role="group" aria-label="Action buttons">
                                                        <a href="<?php echo base_url() . 'update_pengguna/' . $pengguna['pengguna_id'] ?>" class="btn btn-sm btn-warning mr-1"><i class="nav-icon fas fa-edit"></i></a>
                                                        <form action="<?php echo site_url('delete_pengguna/' . $pengguna['pengguna_id']) ?>" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Apa kamu yakin untuk menghapus pengguna ini?')">
                                                                <i class="nav-icon fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
        $(function() {
            $('#ex').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>