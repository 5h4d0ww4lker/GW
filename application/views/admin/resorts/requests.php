<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer
            <small>Requests List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Booking Enquiries</a></li>
            <li class="active">Bookings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <?php if ($company_list): ?>

                    <?php foreach ($company_list as $row): ?>
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Customer Request</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover table-responsive">

                                    <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>Phone</th>
                                        <th>Question Type</th>
                                        <th>Status</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $row->f_name ?> </td>
                                        <td><?= $row->phone ?></td>
                                        <td><?= $row->question_type?></td>
                                        <td><?= $row->status?></td>



                                    </tr>
                                    </tbody>





                                </table>


                                <div class="box-header">

                                    <a
                                        class="btn btn-success bg-red-active btn-flat pull-right" id="visit"
                                        href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/delete_request/' . $row->request_id) ?>><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>

                                    <a
                                        class="btn btn-success bg-olive btn-flat" id="visit"
                                        href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/request_more/' . $row->request_id) ?>><span class="glyphicon glyphicon-list"></span>&nbsp;More</a>


                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    <?php endforeach; ?>

                <?php endif; ?>





            </div><!-- /.col -->
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



























