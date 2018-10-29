<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--        <h1>-->
        <!--            Booking-->
        <!--            <small>Requests List</small>-->
        <!--        </h1>-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Booking Enquiries</a></li>
            <li class="active">Bookings</li>
        </ol>
    </section>
    <br/>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <?php if ($request): ?>

                    <?php foreach ($request as $row): ?>
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">More Details</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover table-responsive">

                                    <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>Phone</th>
                                        <th>Email</th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $row->f_name ?></td>
                                        <td><?= $row->phone ?></td>
                                        <td><?= $row->email ?></td>


                                    </tr>
                                    </tbody>




                                    <thead>
                                    <tr>
                                        <th>Request Type</th>
                                        <th>Content</th>
                                        <th>Status</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $row->question_type ?> </td>
                                        <td><?= $row->content ?></td>
                                        <td><h6><?= $row->status ?></h6></td>


                                    </tr>
                                    </tbody>








                                </table>


                                <div class="box-header">

                                    <a
                                        class="btn btn-success bg-red-active btn-flat pull-right" id="visit"
                                        href=<?php echo site_url('hag22673627bet8001niki1base5621ac/delete_request/' . $row->request_id) ?>><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>

                                    <a
                                        class="btn btn-success bg-light-blue-active btn-flat" id="visit"
                                        href=<?php echo site_url('hag22673627bet8001niki1base5621ac/update_request_status/' . $row->request_id) ?>><span class="glyphicon glyphicon-edit"></span>&nbsp;Change Status</a></a>



                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->




                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Send Message</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="To:<?= $row->email ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Subject:"/>
                                    </div>
                                    <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px">

                      But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee

                    Thank you,
                    John Doe
                        <?= $row->hotel_name ?>
                    </textarea>
                                        X              </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success bg-green-active-active btn-flat">Send&nbsp;<span class="glyphicon glyphicon-send"></span></button>

                                    </div>
                                </div><!-- /.box-body -->

                            </div><!-- /. box -->
                        </div>
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



























