<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('public/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- select2 -->
<script src="<?= base_url('public/') ?>plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('public/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('public/') ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('public/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('public/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('public/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('public/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('public/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('public/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('public/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('public/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('public/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/') ?>dist/js/adminlte.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Date range picker
    $('#reservation').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY'
      }
    })

    //Date picker
    $('#reservationdate').datetimepicker({
      defaultDate: moment(),
      format: 'DD/MM/YYYY'
    });

    //file input custom
    bsCustomFileInput.init();

    //datatables
    $("#data-tabel").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#data-tabel_wrapper .col-md-6:eq(0)');
    
  });  
</script>