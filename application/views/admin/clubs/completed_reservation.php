<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Completed
            <small>Reservation List</small>
        </h1>
        <ol class="breadcrumb">

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <?php if ($book): ?>

                    <?php foreach ($book as $row): ?>
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Completed Reservation</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover table-responsive">

                                    <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>Arrival Date</th>
                                        <th>Arrival Time</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $row->f_name ?>&nbsp<?= $row->l_name ?> </td>
                                        <td><?= $row->arrival_date ?></td>
                                        <td><?= $row->arrival_time ?></td>


                                    </tr>
                                    </tbody>




                                    <thead>
                                    <tr>
                                        <th>Room Type</th>
                                        <th>Payment Methods</th>
                                        <th>Email</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $row->phone ?> </td>
                                        <td><?= $row->payement_mtd ?></td>
                                        <td><h6><?= $row->email ?></h6></td>


                                    </tr>
                                    </tbody>

                                </table>


                                <div class="box-header">

                                    <a
                                        class="btn btn-success bg-red-active btn-flat pull-right" id="visit"
                                        href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/delete_reservation/' . $row->reservation_id) ?>><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>

                                    <a
                                        class="btn btn-success bg-olive btn-flat" id="visit"
                                        href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/reservation_more/' . $row->reservation_id) ?>><span class="glyphicon glyphicon-list"></span>&nbsp;More</a>



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
<!-- radminLTE App -->
<script src="../../dist/js/app.min.js" type="text/javascript"></script>
<!-- radminLTE for demo purposes -->
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



























