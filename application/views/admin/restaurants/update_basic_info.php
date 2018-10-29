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
                                <h3 class="box-title">Contacts</h3>

                            </div>
                            <div class="box-body">

                                <form method="post"
                                      action="<?php echo base_url('index.php/hag38926610027834202nikki626basepath645rac/update_bi') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->restaurant_id ?> "  name="restaurant_id">

                                        <label>Phone Office</label>
                                        <input class="form-control" type="text" value=" <?= $row->restaurant_phone_office ?>" name="restaurant_phone_office1" maxlength="15">

                                        <label>Phone Mobile</label>
                                        <input class="form-control" type="text" value=" <?= $row->restaurant_phone_mobile ?>" name="restaurant_phone_mobile1" maxlength="15" >

                                         <label>City</label>

                                            <div class="form-group">
                                                <select class="form-control" name="restaurant_city1" required="required">
                                                    <option>Addis Ababa</option>
                                                    <option>Adama</option>
                                                    <option>Dire Dawa</option>
                                                    <option>Bahir Dar</option>
                                                    <option>Bishoftu</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>

                                               <label>Location</label>
                                        <div class="form-group">
                                                <select class="form-control" name="restaurant_location1" required="required">
                                                    <option>bole</option>
                                                    <option>cazanchis</option>
                                                    <option>piassa</option>
                                                    <option>asko</option>
                                                    <option>saris</option>
                                                    <option>sar bet</option>
                                                    <option>4 kilo</option>
                                                    <option>22 mazoria</option>
                                                     <option>Megenagna</option>
                                                </select>
                                            </div>


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

                                         <label>Direction</label>
                                        <input class="form-control" type="text" placeholder="Direction" name="restaurant_direction1" value=" <?= $row->restaurant_direction ?>" maxlength="150" >

                                         <label>Email</label>
                                        <input class="form-control" type="email" placeholder="Email" name="restaurant_email1" value=" <?= $row->restaurant_email ?>" maxlength="150">

                                         <label>Website</label>
                                        <input class="form-control" type="text" placeholder="Website" name="restaurant_web_site1" value=" <?= $row->restaurant_web_site ?>" maxlength="150">
                                        <br/>



                                         <label>Restaurant Description</label>
                                        <input class="form-control" type="text" placeholder="Website" name="restaurant_discription1" value=" <?= $row->restaurant_discription ?>" maxlength="1000">
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