<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--        <h1>-->
        <!--            Reservation-->
        <!--            <small>Requests List</small>-->
        <!--        </h1>-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Messages</a></li>

        </ol>
    </section>
    <br/>

    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-md-12">

                                <?php if ($message): ?>

                                <?php foreach ($message as $row): ?>


                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- The time line -->
                                        <ul class="timeline">
                                            <!-- timeline time label -->
                                            <li class="time-label">
                  <span class="bg-red">
                  New Message
                  </span>
                                            </li>

                                            <li>
                                                <i class="fa fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i><?= $row->time ?></span>
                                                    <h3 class="timeline-header"><a href="#"><?= $row->from ?></a> sent you a <?= $row->message_type ?> Message</h3>
                                                    <div class="timeline-body">
                                                        <?= $row->content?>
                                                    </div>
                                                    <div class='timeline-footer'>

                                                        <a

                                                            href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/delete_message/' . $row->message_id) ?>><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php endforeach; ?>

                                <?php endif; ?>





                    </div>

                </div><!-- /. box -->
            </div><!- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='../../plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

</body>
</html>

























































