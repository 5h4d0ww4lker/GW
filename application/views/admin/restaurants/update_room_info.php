


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small>Wellcome to your Admin Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="Visible">Simple</li>
        </ol>
    </section>

    <?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">


                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Update Seat Information</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form method="post"
                                  action="<?php echo base_url('index.php/hag38926610027834202nikki626basepath645rac/update_ri') ?>">
                            <table id="example2" class="table table-bordered table-hover table-responsive">

                                <thead>
                                <tr>
                                    <th>Total Free Seats</th>
                                    <th>Free VIP Seats</th>
                                    <th>Free Class 1 Seats</th>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <input class="hidden" type="hidden" value=" <?= $row->restaurant_id ?> "  name="restaurant_id">
                                    <td> <input class="form-control" type="text"  name="free_seats1" value=" <?= $row->free_seats ?>" maxlength="5"> </td>
                                    <td> <input class="form-control" type="text" value=" <?= $row->free_vip_seat ?> " name="free_vip_seat1" maxlength="5"> </td>
                                    <td> <input class="form-control" type="text" value="  <?= $row->free_class1_seat ?> " name="free_class1_seat1" maxlength="5" ></td>


                                </tr>
                                </tbody>




                                <thead>
                                <tr>
                                    <th>Free Class 2 Seats</th>
                                    <th>Free Normal Seats</th>
                                    <th>Available Seat Types</th>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> <input class="form-control" type="text" value=" <?= $row->free_class2_seat ?> " name="free_class2_seat1" maxlength="5"> </td>
                                    <td> <input class="form-control" type="text" value=" <?= $row->free_normal_seat ?>  "  name="free_normal_seat1" maxlength="5"></td>
                                    <td> <input class="form-control" type="text" value=" <?= $row->seat_type ?> "  name="seat_type1" maxlength="100" required="required"> </td>


                                </tr>
                                </tbody>


                            </table>




                            <div class="box-header">

                                <button type="submit" class="btn btn-success pull-right btn-md flat"><span class="glyphicon glyphicon-save">Save</span> </button>




                            </div>
                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- /.content -->

        </section>

    <?php endforeach; ?>

<?php endif; ?>