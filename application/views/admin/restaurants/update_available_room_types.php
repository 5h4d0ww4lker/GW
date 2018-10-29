<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $row->restaurant_name ?>
            <small>Wellcome to your Admin Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="Visible">Simple</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-11">


                <div class="box box-primary ">
                    <div class="box-header">
                        <h3 class="box-title">Available Seat Types</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">



                            </ul>
                        </div>
                    </div>
                     <form method="post"
                                      action="<?php echo base_url('index.php/hag38926610027834202nikki626basepath645rac/update_rav') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->restaurant_id ?> "  name="restaurant_id">

                                        <label>VIP Seat</label>
                                        <input class="form-control"
                                        type="text"
                                        value="<?= $row->vip_seat_dis ?>"
                                        name="vip_seat_dis1"
                                        required="required"
                                        maxlength="1000">

                                        <label>Class1 Seat</label>
                                        <input class="form-control"
                                        type="text"
                                         value=" <?= $row->class1_seat_dis ?>"
                                         name="class1_seat_dis1"
                                         required="required"
                                         maxlength="1000">

                                         <label>Class2 Seat</label>
                                        <input class="form-control"
                                        type="text" placeholder="City"
                                        name="class2_seat_dis1"
                                        value=" <?= $row->class2_seat_dis ?>"
                                        required="required"
                                        maxlength="1000">

                                               <label>Normal Seat</label>
                                        <input class="form-control"
                                         type="text"
                                         placeholder="Location"
                                         name="normal_seat_dis1"
                                         value=" <?= $row->normal_seat_dis ?>"
                                         required="required"
                                         maxlength="1000">
<br/>

                                        <div class="box-footer">
                                              <button type="submit" class="btn btn-success pull-right btn-md flat"><span class="glyphicon glyphicon-save">Save</span> </button>
                                        </div>
                                </form>              </div>
                    <!-- /.box-body -->

                </div>




                <!-- /.box -->
            </div>
            <!-- /.col -->


        </div>
        <!-- /.row -->


                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

    <?php endforeach; ?>

<?php endif; ?>