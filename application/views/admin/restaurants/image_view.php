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
                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Main Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image1 ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">restaurant Image 2</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form2/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image2 ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">restaurant Image 3</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form3/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image3 ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div>


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">restaurant Image 4</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form4/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image4 ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>                            </div>
                            <!-- /.box-body -->

                        </div>

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">restaurant Image 5</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form5/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image5 ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>                            </div>
                            <!-- /.box-body -->

                        </div>

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Parking Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form6/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image6 ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>                            </div>
                            <!-- /.box-body -->

                        </div>

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">restaurant Image 7</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form7/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image7 ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>                            </div>
                            <!-- /.box-body -->

                        </div>


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Vip Seat Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form8/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->vip_seat_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>                            </div>
                            <!-- /.box-body -->

                        </div>


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->


                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Normal Seat Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form9/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->normal_seat_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Class 1 Seat Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">





                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form10/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>

                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->class1_seat_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div>



                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Class 2 Seat Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form11/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->	class2_seat_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div><div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Specail Image Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form12/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->special_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div><div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Confference Room</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form13/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->conference_room_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div><div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Table Games Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form14/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->pool_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div><div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Gym Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form15/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->gym_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div>




                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Wedding Hall Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/upload_form16/' . $row->restaurant_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->whall_image ?>" class="img-polaroid"
                                                 width="250" height="200"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="bkc"><span class="badge bg-green">Visible</span></td>
                                    </tr>


                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div>



                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->



            </section>
            <!-- /.content -->
        </div>

    <?php endforeach; ?>

<?php endif; ?>