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
                            <h1 class="m-0">Program</h1>
                            <div class="mt-2">
                                <a href="<?php echo site_url('programs') ?>">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </button>
                                </a>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('programs') ?>">Program</a></li>
                                <li class="breadcrumb-item active">Update Program</li>
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
                            <!-- title  -->
                            <h1 class="card-title ">
                                <i class="fas fa-flag" style="font-size: 1.5rem;"></i>
                                <strong style="font-size: 1.5rem;">Update Program</strong>
                            </h1>
                        </div>
                        <div class="card-body">
                            <?php if (session()->has('errors')) : ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <!-- it will show error for every field -->
                                        <?php foreach (session('errors') as $error) : ?>
                                            <li> <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo site_url('programs_update/' . $program->program_id) ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="program_judul ">Program Judul</label>
                                            <input type="text" class="form-control" id="program_judul " name="program_judul" placeholder="Masukan Judul" value="<?php echo $program->program_judul ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="program_detail">Detail Program</label>
                                            <div id="_content" name="_content"></div>
                                            <input type="hidden" id="program_detail" name="program_detail">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="program_target ">Target Program</label>
                                            <input type="text" class="form-control" id="program_target " name="program_target" placeholder="Rp." value="<?php echo $program->program_target ?>">
                                            <small class="text-danger"><i>Kosongkan jika tidak diisi, akan di beri nilai default</i></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="program_terkumpul ">Uang Terkumpul</label>
                                            <input type="text" class="form-control" id="program_terkumpul " name="program_terkumpul" placeholder="Rp." value="<?php echo $program->program_terkumpul ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="program_cover">Cover</label>
                                            <input type="file" class="form-control-file" id="program_cover" name="program_cover">
                                        </div>
                                        <div class="d-flex justify-content-end flex-column">
                                            <button class="btn btn-primary mb-2" type="submit" name="program_status" value="draft">
                                                Draft
                                            </button>
                                            <button class="btn btn-success" type="submit" name="program_status" value="publikasi">
                                                Publish
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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


    <script>
        $(document).ready(function() {
            var initialValue = <?php echo json_encode($program->program_detail); ?>;
            $('#_content').summernote({
                height: 300,
                fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48', '64', '82', '150'],

                callbacks: {
                    onChange: function(contents) {
                        // Update nilai input tersembunyi dengan isi editor Summernote
                        $('#program_detail').val(contents);
                    }
                }
            });
            // Set initial value
            $('#_content').summernote('code', initialValue);
        });
    </script>
</body>

</html>