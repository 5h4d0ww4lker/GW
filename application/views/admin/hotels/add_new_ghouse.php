

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    
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
                                <h3 class="box-title">Add New Guest House</h3>

                            </div>
                            <div class="box-body">

                                <form method="post"
                                      action="<?php echo base_url('index.php/hag22673627bet8001niki1base5621ac/add_new_ghouse') ?>">
                                    <div class="box-body">

                                       

                                        <label>Guest House Name</label>
                                        <input class="form-control" type="text"   name="guest_house_name" maxlength="20" >


                                        <label>Phone Mobile</label>
                                        <input class="form-control" type="text" name="guest_house_phone_mobile" maxlength="20" >

                                        <label>Phone Office</label>
                                        <input class="form-control" type="text" name="guest_house_phone_office" maxlength="20" >



                                         <label>City</label>

                                            <div class="form-group">
                                                <select class="form-control" name="guest_house_city" required="required">
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
                                                <select class="form-control" name="guest_house_location" required="required">
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
                                        <input class="form-control" type="text" placeholder="Direction" name="guest_house_direction"  maxlength="150">

                                         <label>Email</label>
                                        <input class="form-control" type="text" placeholder="Email" name="guest_house_email"  maxlength="150" >

                                         <label>Website</label>
                                        <input class="form-control" type="text" placeholder="Website" name="guest_house_web_site"  maxlength="150" >
                                        <br/>

                                     
                                        <label>User Name</label>
                                        <input class="form-control" type="text" name="uname" maxlength="20" >
                                        <label>Password</label>
                                        <input class="form-control" type="text" name="password" maxlength="20" >
                                       

                                        <label>Guest House Discription</label>
                                        <input class="form-control" type="text" placeholder="Website" name="guest_house_discription" maxlength="1000" required="required">
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

   