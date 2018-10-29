<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $row->hotel_name ?>
                    <small>Wellcome to your Admin Page</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Update</a></li>
                    <li class="Visible">Update Room Services</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Contacts</h3>

                            </div>
                            <div class="box-body">
 <form method="post"
                                      action="<?php echo base_url('index.php/hag22673627bet8001niki1base5621ac/update_rserv') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->hotel_id ?> "  name="hotel_id">



                                        <label>Satelite Tv</label>
                                        <input class="form-control" type="text" value=" <?= $row->hotel_satelite_tv ?>" name="hotel_satelite_tv1">

                                         <label>Air Conditional</label>
                                        <input class="form-control" type="text" value=" <?= $row->hotel_ac ?>" name="hotel_ac1">


                            </div>

                            <!-- /.box-body -->

                        </div></div>





                        <!-- /.box -->
                    </div>
                    <!-- /.col -->


                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Extras</h3>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">


                                        <label>Hair Drier</label>
                                        <input class="form-control" type="text" value=" <?= $row->hotel_hair_drier ?>" name="hotel_hair_drier1">

                                         <label>Wi-Fi</label>
                                        <input class="form-control" type="text" placeholder="Email" name="hotel_wifi1" value=" <?= $row->hotel_wifi ?>">

                                        <br/>
                                        <div class="box-footer">
                                               <button type="submit" class="btn btn-success pull-right btn-md flat"><span class="glyphicon glyphicon-save">Save</span> </button>

                                        </div>

                                </table>
                                </form>
                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->




                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>

    <?php endforeach; ?>

<?php endif; ?>