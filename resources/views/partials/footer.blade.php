<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; Feb,09 2023 <a href="#">IoT Project</a>.</strong>
    Make with love to Mi Amor Septi
    <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('myAssets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('myAssets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('myAssets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('myAssets/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('myAssets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('myAssets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('myAssets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('myAssets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('myAssets/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('myAssets/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('myAssets/dist/js/pages/dashboard2.js') }}"></script>
<script src="https://kit.fontawesome.com/78aacd8366.js" crossorigin="anonymous"></script>
<script src="{{ asset('myAssets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('myAssets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": false,
        "order": [
          [1, "desc"]
        ],
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
