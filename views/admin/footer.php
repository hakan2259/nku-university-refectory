<!-- footer content -->
<footer>
    <div class="pull-right">
        Copyright &copy; <a href="http://www.nku.edu.tr/" target="_blank">Tekirdağ Namık Kemal Üniversitesi</a> - Tüm
        hakları saklıdır.
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?php echo URL; ?>/views/admin/vendors/jquery/dist/jquery.min.js"></script>


<!-- Bootstrap -->
<script src="<?php echo URL; ?>/views/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL; ?>/views/admin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo URL; ?>/views/admin/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo URL; ?>/views/admin/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo URL; ?>/views/admin/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo URL; ?>/views/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo URL; ?>/views/admin/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo URL; ?>/views/admin/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo URL; ?>/views/admin/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo URL; ?>/views/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo URL; ?>/views/admin/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo URL; ?>/views/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo URL; ?>/views/admin/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<!-- Datatables -->
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo URL; ?>/views/admin/docs/js/our.js"></script>



<!-- Custom Theme Scripts -->
<script src="<?php echo URL; ?>/views/admin/build/js/custom.min.js"></script>


<script src="https://kit.fontawesome.com/a076d05399.js"></script>




<!--Sweert Alert-->

<script src="<?php echo URL; ?>/views/admin/docs/js/sweetalert.js"></script>
<script src="<?php echo URL; ?>/views/admin/docs/js/jscolor.js"></script>


<!--SummerNote JS-->
<script src="<?php echo URL; ?>/views/admin/lib/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo URL; ?>/views/admin/lib/medium-editor/medium-editor.js"></script>
<script>
    $(function () {
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
            height: 150,
            tooltip: false
        })
    });
</script>
<script>
    jQuery.fn.extend({
        printElem: function() {
            var cloned = this.clone();
            var printSection = $('#printSection');
            if (printSection.length == 0) {
                printSection = $('<div id="printSection"></div>')
                $('body').append(printSection);
            }
            printSection.append(cloned);
            var toggleBody = $('body *:visible');
            toggleBody.hide();
            $('#printSection, #printSection *').show();
            window.print();
            printSection.remove();
            toggleBody.show();
        }
    });

    $(document).ready(function(){
        $(document).on('click', '#btnPrint', function(){

            $('#printPage').printElem();
        });
    });
</script>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>








</body>
</html>
