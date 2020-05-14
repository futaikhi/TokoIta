    <script src="<?php echo base_url("assets/dist/js/adminlte.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/plugins/jquery/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/dist/js/adminlte.js"); ?>"></script>
    <script src="<?php echo base_url("assets/plugins/chart.js/Chart.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/dist/js/demo.js"); ?>"></script>
    <script src="<?php echo base_url("assets/dist/js/pages/dashboard3.js"); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"); ?>"></script>

    <script>
        $(function() {
            $('#dataTable').DataTable({
                "responsive": true,
                "autoWidth": true,
            });
        });
    </script>