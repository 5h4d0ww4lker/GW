<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Updating Status

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

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Change Star Level</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <form method="post"
                                          action="<?php echo base_url('index.php/hag22673627bet8001niki1base5621ac/change_pass') ?>">
                                        <div class="errors">
                                            <?php echo validation_errors('<div class="error">', '</div>'); ?>
                                        </div>
                                        <p><input type="password" name="password" placeholder="Current Password: " class="form-control"></p><br />
                                        <p><input type="password" name="password1" placeholder="New Password: " class="form-control"></p><br />
                                        <input type="submit" value="change password" class="btn btn-primary" />
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



























