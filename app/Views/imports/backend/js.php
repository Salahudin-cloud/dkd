<!-- jQuery -->
<script src="<?php echo base_url() . 'assets/backend/plugins/jquery/jquery.min.js' ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() . 'assets/backend/plugins/jquery-ui/jquery-ui.min.js' ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . 'assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

<!-- JQVMap -->
<script src="<?php echo base_url() . 'assets/backend/plugins/jqvmap/jquery.vmap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js' ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() . 'assets/backend/plugins/jquery-knob/jquery.knob.min.js' ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() . 'assets/backend/plugins/moment/moment.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/backend/plugins/daterangepicker/daterangepicker.js' ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() . 'assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url() . 'assets/backend/plugins/summernote/summernote-bs4.min.js' ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() . 'assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/backend/dist/js/adminlte.js' ?>"></script>
<script>
    document.getElementById("waktu").innerHTML = new Date().getFullYear();
</script>