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
                            <h1 class="m-0">Program</h1>
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
                                <i class=" fas fa-flag" style="font-size: 1.5rem;"></i>
                                <strong style="font-size: 1.5rem;"> Daftar Program</strong>
                            </h1>
                        </div>
                        <div class="card-body">
                            <!-- button add artikel -->
                            <a href="<?php echo site_url('programs_tambah') ?>">
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i> Tambah Program
                                </button>
                            </a>
                            <!-- Show list of artikel -->
                            <table id="ex" class="table table-bordered table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">NO</th>
                                        <th>Nama Program</th>
                                        <th>Uang Terkumpul</th>
                                        <th>Target Program</th>
                                        <th style="width: 50%;">Cover</th>
                                        <th>Status Program </th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1; ?>
                                    <?php foreach ($program as $data) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $data['program_judul'] ?></td>
                                            <td>Rp.<?php echo $data['program_terkumpul'] ?></td>
                                            <td>Rp.<?php echo $data['program_target'] ?></td>
                                            <td><img width="10%" class="img-responsive" src="<?php echo base_url() . 'assets/img/program/' . $data['program_cover']; ?>"></td>
                                            <td>
                                                <?php if ($data['program_status'] === "publikasi") : ?>
                                                    <span class="badge badge-success">Publish</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Draft</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group " role="group" aria-label="Action buttons">
                                                    <a href="<?php echo site_url('programs_update/' . $data['program_id']) ?>" class="btn btn-sm btn-warning mr-1">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    <form action="<?php echo site_url('programs_delete/' . $data['program_id']) ?>" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Apa kamu yakin untuk menghapus program ini?')">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
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