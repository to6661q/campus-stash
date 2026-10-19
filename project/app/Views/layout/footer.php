        <script src="/plugin/jquery/jquery.min.js"></script>
        <script src="/plugin/jquery-ui/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/plugin/chart.js/Chart.min.js"></script>
        <script src="/plugin/sparklines/sparkline.js"></script>
        <script src="/plugin/jqvmap/jquery.vmap.min.js"></script>
        <script src="/plugin/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="/plugin/jquery-knob/jquery.knob.min.js"></script>
        <script src="/plugin/moment/moment.min.js"></script>
        <script src="/plugin/daterangepicker/daterangepicker.js"></script>
        <script src="/plugin/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="/plugin/summernote/summernote-bs4.min.js"></script>
        <script src="/plugin/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="/dist/js/adminlte.js"></script>
        <script src="/dist/js/pages/dashboard.js"></script>
        <script src="/plugin/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/plugin/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/plugin/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="/plugin/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/plugin/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="/plugin/jszip/jszip.min.js"></script>
        <script src="/plugin/pdfmake/pdfmake.min.js"></script>
        <script src="/plugin/pdfmake/vfs_fonts.js"></script>
        <script src="/plugin/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="/plugin/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="/plugin/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script src="/plugin/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script>
            $(function() {
                bsCustomFileInput.init();
                $("#example1").DataTable({
                    "responsive": true,
                    "fixedHeader": true,
                    "searching": false,
                    "paging": false,
                    "info": false
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#reservationdate').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
                $('#fromdt').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
                $('#todt').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
                $('#skdate').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
                $('#basdate').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
                $("[id$=btnExcel]").click(function(e) {
                    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('div[id$=divTableDataHolder]').html()));
                    e.preventDefault();
                });
            });
        </script>
        </body>

        </html>