<!DOCTYPE html>
<html>
    <!-- DataTables -->
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>


    <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    


    <!-- Data Tables Select -->
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />


    <!-- Data Tables Date Picker -->
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/admin/assets/js/modernizr.min.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69506598-1', 'auto');
          ga('send', 'pageview');
        </script>
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <footer class="footer">
            © 2021. UMKM Kabupaten Nganjuk.
        </footer>
   
<!-- END wrapper --> 

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/detect.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets//js/waves.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.scrollTo.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>


<!-- jQuery Select -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>

<!-- jQuery Picker -->
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.core.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.app.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/pages/jquery.form-pickers.init.js"></script>



<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "assets/admin/assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();

</script>
</html>