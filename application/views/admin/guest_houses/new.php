<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--        <h1>-->
        <!--            Booking-->
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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Messages From Webmaster</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">

                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>

                                <thead>
                                <tr>
                                    <th>From</th>
                                    <th>Type</th>
                                    <th>Content</th>
                                    <th>Time</th>




                                </tr>
                                </thead>
                                <?php if ($message): ?>

                                    <?php foreach ($message as $row): ?>



                                        <tr>
                                            <td class="mailbox-name"><a href="read-mail.html"><?= $row->from?> </a></td>
                                            <td class="mailbox-attachment"><?= $row->message_type ?></td>
                                            <td class="mailbox-subject"><?= $row->content ?> </td>
                                            <td class="mailbox-date"><?= $row->time ?> </td>
                                        </tr>

                                        <tr>  <td><a
                                                    class="btn btn-success bg-red-active btn-flat pull-right" id="visit"
                                                    href=<?php echo site_url('admin_controller/delete_message/' . $row->message_id) ?>><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                <?php endif; ?>

                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer no-padding">




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

























































