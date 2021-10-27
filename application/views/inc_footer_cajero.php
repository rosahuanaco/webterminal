<!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url()?>statics/js/bootstrap/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>statics/js/bootstrap/moment.min.js"></script>
<script src="<?=base_url()?>statics/js/bootstrap/bootstrap.js"></script>
<script src="<?=base_url()?>statics/js/bootstrap/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>statics/js/bootstrap/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="<?=base_url()?>statics/js/utilcajero.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>