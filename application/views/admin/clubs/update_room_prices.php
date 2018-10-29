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
                                <h3 class="box-title">Update Event Days</h3>

                            </div>
                            <div class="box-body">


                                <form method="post"
                                      action="<?php echo base_url('index.php/hag20637210001nikki5621001101basepath33cac/update_rp') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->club_id ?> "  name="club_id">


                                        <label>Monday Artist</label>
                                        <input class="form-control" type="text" value="<?= $row->monday?>" name="monday1" maxlength="20">



                                          <label>Description</label>
                                        <input class="form-control" type="text" value="<?= $row->monday_dis?>" name="monday_dis1" maxlength="300">





                                          <label>Tuesday Artist</label>
                                        <input class="form-control" type="text" value="<?= $row->tuesday?>" name="tuesday1" maxlength="20">


                                          <label>Description</label>
                                        <input class="form-control" type="text" value="<?= $row->tuesday_dis?>" name="tuesday_dis1" maxlength="300"


                                          <label>Wednesday Artist</label>
                                        <input class="form-control" type="text" value="<?= $row->wednesday?>" name="wednesday1" maxlength="20">

                                          <label>Description</label>
                                        <input class="form-control" type="text" value="<?= $row->wednesday_dis?>" name="wednesday_dis1" maxlength="300">



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



 <label>Thursday Artist</label>
                                        <input class="form-control" type="text" value="<?= $row->thursday?>" name="thursday1" maxlength="20">


                                          <label>Description</label>
                                        <input class="form-control" type="text" value="<?= $row->thursday_dis?>" name="thursday_dis1" maxlength="300">

                                          <label>Friday Artist</label>
                                        <input class="form-control" type="text" value="<?= $row->friday?>"  name="friday1" maxlength="20">

                                          <label>Description</label>
                                        <input class="form-control" type="text" value="<?= $row->friday_dis?>" name="friday_dis1" maxlength="300">


                                        <label>Saturday Artist</label>
                                        <input class="form-control" type="text" value="<?= $row->saturday?>" name="saturday1" maxlength="20">

                                          <label>Description</label>
                                        <input class="form-control" type="text" value="<?= $row->saturday_dis?>" name="saturday_dis1" maxlength="300">


  <label>Sunday Artist</label>
                                        <input class="form-control" type="text" value="<?= $row->sunday?>"  name="sunday1" maxlength="20">

                                          <label>Description</label>
                                        <input class="form-control" type="text" value="<?= $row->sunday_dis?>" name="sunday_dis1" maxlength="300">

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





















