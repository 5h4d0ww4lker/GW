<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Updating Status

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Reservation Enquiries</a></li>
            <li class="active">Reservations</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <?php if ($event): ?>

                    <?php foreach ($event as $row): ?>
                        <div class="box box-info">

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Update Events</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <form method="post"
                                          action="<?php echo base_url('index.php/hag20637210001nikki5621001101basepath33cac/update_even') ?>">
                                        <div class="box-body">


                                            <input class="hidden" type="hidden" value=" <?= $row->event_id ?> "  name="event_id" value="<?= $row->event_id ?>">



                                            <table id="example2" class="table table-bordered table-hover table-responsive">

                                                <thead>
                                                <tr>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Location</th>



                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td> <input class="form-control" type="text" value=" <?= $row->start_date ?> "  name="start_date1">
                                                    </td>
                                                    <td> <input class="form-control" type="text" value=" <?= $row->end_date ?> "  name="end_date1">
                                                    </td>
                                                    <td> <input class="form-control" type="text" value=" <?= $row->location ?> "  name="location1">
                                                    </td>


                                                </tr>
                                                </tbody>




                                                <thead>
                                                <tr>
                                                    <th>Contact Person</th>
                                                    <th>Phone</th>
                                                    <th>Description</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><input class="form-control" type="text" value=" <?= $row->contact_person ?> "  name="contact_person1">
                                                    </td>
                                                    <td><input class="form-control" type="text" value=" <?= $row->contact_person_phone ?> "  name="contact_person_phone1">
                                                    </td>
                                                    <td><h6><input class="form-control" type="text" value=" <?= $row->description ?> "  name="description1">
                                                        </h6></td>


                                                </tr>
                                                </tbody>








                                            </table>






















                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-success pull-right btn-md flat"><span class="glyphicon glyphicon-save">Save</span> </button>
                                            </div>
                                    </form>
                                </div>

                            </div><!-- /.box -->
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



























