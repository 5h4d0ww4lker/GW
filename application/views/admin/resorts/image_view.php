<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $row->resort_name ?>
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

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_image1 ?>" class="img-polaroid"
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
                                <h3 class="box-title">Resort Image 2</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form2/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_image2 ?>" class="img-polaroid"
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
                                <h3 class="box-title">Resort Image 3</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form3/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_image3 ?>" class="img-polaroid"
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
                                <h3 class="box-title">Resort Image 4</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form4/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_image4 ?>" class="img-polaroid"
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
                                <h3 class="box-title">Resort Image 5</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form5/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_image5 ?>" class="img-polaroid"
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

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form6/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_image6 ?>" class="img-polaroid"
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
                                <h3 class="box-title">Resort Image 7</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form7/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_image7 ?>" class="img-polaroid"
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
                                <h3 class="box-title">Single Room Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form8/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_single_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Twin Room Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form9/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_twin_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Suit Room image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">





                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form10/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>

                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_suit_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Presidential Suit Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form11/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->	resort_presidential_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Meeting Hall Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form12/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->mhall_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Swimming Pool Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form13/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


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
                                <h3 class="box-title">Country View Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form14/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->resort_country_view ?>" class="img-polaroid"
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

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form15/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


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

                                        <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/upload_form16/' . $row->resort_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


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