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
                    <li><a href="#">Update</a></li>
                    <li class="Visible">Update Services</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Main</h3>

                            </div>
                            <div class="box-body">
 <form method="post"
                                      action="<?php echo base_url('index.php/hag70178731nikki5362045182basepath66321097reac/update_serv') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->resort_id ?> "  name="resort_id">

                                        <label>Parking</label>
                                        <input class="form-control" type="text" value="<?= $row->resort_parking ?>"  name="resort_parking1" maxlength="100" required="required">

                                        <label>Swimming Pool</label>
                                        <input class="form-control" type="text" value=" <?= $row->swimming_pool_description ?>" name="swimming_pool_description1" maxlength="100" required="required">



 <label>Meeting Hall</label>
                                        <input class="form-control" type="text" value=" <?= $row->meeting_hall_description ?>" name="meeting_hall_description1" maxlength="100" required="required">

                                          <label>For Children</label>
                                        <input class="form-control" type="text" value=" <?= $row->resort_children_play_ground ?>" name="resort_children_play_ground1" maxlength="100" required="required">

                            </div>

                            <!-- /.box-body -->

                        </div></div>





                        <!-- /.box -->
                    </div>
                    <!-- /.col -->


                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Additional</h3>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">


                                        <label>Conference Room</label>
                                        <input class="form-control" type="text" value=" <?= $row->resort_conference_room ?>" name="resort_conference_room1" maxlength="100" required="required">

                                         <label>Wi-Fi</label>
                                        <input class="form-control" type="text" placeholder="Email" name="resort_wifi" value=" <?= $row->resort_wifi ?>" maxlength="100" required="required">



 <label>Wedding Hall</label>
                                        <input class="form-control" type="text" value=" <?= $row->wedding_hall_description ?>" name="wedding_hall_description1" maxlength="100" required="required">

 <label>Gym</label>
                                        <input class="form-control" type="text" value=" <?= $row->gym_discription ?>" name="gym_discription1" maxlength="100" required="required">




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








