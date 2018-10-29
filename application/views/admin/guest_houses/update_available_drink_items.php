<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $row->guest_house_name ?>
                    <small>Wellcome to your Admin Page</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Update</a></li>
                    <li class="Visible">Update Available Drink Items</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Drink Items</h3>

                            </div>
                            <div class="box-body">

                               <form method="post"
                                      action="<?php echo base_url('index.php/hag700021672362217nikki53600228basep12873gac/update_di') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->guest_house_id ?> "  name="guest_house_id">

                                        <label>Beer And Alcohol</label>
                                        <input class="form-control" type="text" value="<?= $row->guest_house_beer_and_alcohol ?>"  name="guest_house_beer_and_alcohol1" maxlength="100" required="required">

                                        <label>Hot Drinks</label>
                                        <input class="form-control" type="text" value=" <?= $row->guest_house_hot_drinks ?>" name="guest_house_hot_drinks1" maxlength="100" required="required">


                            </div>

                            <!-- /.box-body -->

                        </div></div>





                        <!-- /.box -->
                    </div>
                    <!-- /.col -->


                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"></h3>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">

                                        <label>Local Drinks</label>
                                        <input class="form-control" type="text" placeholder="City" name="guest_house_local_drinks1" value=" <?= $row->guest_house_local_drinks ?>" maxlength="100" required="required">

                                        <label>Soft Drinks</label>
                                        <input class="form-control" type="text" placeholder="Location" name="guest_house_soft_drinks1" value=" <?= $row->guest_house_soft_drinks ?>" maxlength="100" required="required">

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