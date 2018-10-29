<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $row->club_name ?>
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

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->club_image1 ?>" class="img-polaroid"
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
                                <h3 class="box-title">club Image 2</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form2/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->club_image2 ?>" class="img-polaroid"
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
                                <h3 class="box-title">club Image 3</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form3/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->club_image3 ?>" class="img-polaroid"
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
                                <h3 class="box-title">club Image 4</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form4/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->club_image4 ?>" class="img-polaroid"
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
                                <h3 class="box-title">club Image 5</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form5/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->club_image5 ?>" class="img-polaroid"
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
                                <h3 class="box-title">Hotel Image 6</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form6/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->club_image6 ?>" class="img-polaroid"
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
                                <h3 class="box-title">club Image 7</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form7/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->club_image7 ?>" class="img-polaroid"
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
                                <h3 class="box-title">Vip Seat Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form8/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>



                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->vip_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Class 1 Seat Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form9/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->class1_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Class 2 Seat Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">





                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form10/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>

                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->class2_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Class 3 Seat Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form11/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->	class3_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Games Image</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form12/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->games_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Lightening</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form13/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->lightening_image ?>" class="img-polaroid"
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
                                <h3 class="box-title">Parking</h3>

                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/upload_form14/' . $row->club_id) ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</a>


                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                    <tr>


                                        <td id="bkc">
                                            <img src="<?php echo base_url(); ?><?= $row->parking_image ?>" class="img-polaroid"
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