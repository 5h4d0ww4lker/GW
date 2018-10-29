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
                                <h3 class="box-title">Special</h3>

                            </div>
                            <div class="box-body">
 <form method="post"
                                      action="<?php echo base_url('index.php/hag20637210001nikki5621001101basepath33cac/update_rserv') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->club_id ?> "  name="club_id">



                                        <label>Special Name</label>
                                        <input class="form-control" type="text" value=" <?= $row->club_special ?>" name="club_special1">

                                         <label>Special price</label>
                                        <input class="form-control" type="text" value=" <?= $row->special_price ?>" name="special_price1">


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


                                        <label>Special Chef</label>
                                        <input class="form-control" type="text" value=" <?= $row->special_cheif ?>" name="special_cheif1">

                                         <label>Ingredients</label>
                                        <input class="form-control" type="text" placeholder="Email" name="special_ingridients1" value=" <?= $row->special_ingridients ?>">

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