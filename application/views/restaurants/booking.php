<!-- BEGIN CONTAINER -->

<?php if ($restaurant_detail): ?>
<?php foreach ($restaurant_detail as $row): ?>
<div class="container min-hight">

    <!-- ROW 1 -->
    <div class="row-fluid margin-bottom-40">
        <!-- COLUMN 1 -->
        <div class="span6">
            <h3 align="center">Send Reservation Request</h3>
            <!-- BEGIN FORM-->
            <form method="post"
                  action="<?php echo base_url('index.php/restaurants/add_reservation') ?>" class="form-horizontal">




<input type="hidden"
                                           class="hidden"
                                           id="company_name"
                                           name="restaurant_name"
                                           value="<?= $row->restaurant_name ?>">



                                    <input type="hidden"
                                           class="hidden"
                                           id="company_name"
                                           name="status"
                                           value="Request">
                                    <input type="hidden"
                                           class="hidden"
                                           id="restaurant_id"
                                           name="restaurant_id"
                                           value="<?= $row->restaurant_id ?>">

                                    <input type="hidden"
                                           class="hidden"
                                           id="restaurant_phone_mobile"
                                           name="restaurant_phone_mobile"
                                           value="<?= $row->restaurant_phone_mobile ?>">

                                    <input type="hidden"
                                           class="hidden"
                                           id="restaurant_email"
                                           name="restaurant_email"
                                           value="<?= $row->restaurant_email ?>">



                <div class="control-group">
                    <label class="control-label">First Name</label>
                    <div class="controls">
                         <input type="text"
                                           class="form-control"
                                           id="format"
                                           name="f_name"
                                           placeholder="First Name"
                                           required="required"
                                           maxlength="15">
                </div>
</div>

                <div class="control-group">
                    <label class="control-label">Last Name</label>
                    <div class="controls">
                       <input type="text"
                                           class="form-control input-lg"
                                           id="format"
                                           name="l_name"
                                           placeholder="Last Name"
                                           required="required"
                                           maxlength="15">

                    </div>
                </div>





                <div class="control-group">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input type="text"
                                           class="form-control"
                                           id="format"
                                           name="phone"
                                           placeholder="phone"
                                           required="required"
                                           maxlength="10">

                    </div>
                </div>




                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input type="email"
                                           class="form-control input-sm"
                                           id="format"
                                           name="email"
                                           placeholder="Email">

                    </div>
                </div>


 <div class="control-group">
                    <label class="control-label">Arrival Date</label>
                    <div class="controls">
                        <input type="date"
                                           class="form-control input-sm"
                                           id="format"
                                           name="arrival_date"
                                           placeholder="Arrival Date"
                                           required="required"
                                           >
                                           
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Arrival Time</label>
                    <div class="controls">
                       <input type="time"
                                           class="form-control input-sm"
                                           id="format"
                                           name="arrival_time"
                                           placeholder="Arrival Date"
                                           required="required">
                                        

                    </div>
                </div>





                <div class="control-group">
                    <label class="control-label">Seat Type</label>
                    <div class="controls">
                         <select class="form-control" name="seat_type" id="format" required="required">
                                            <option>Normal</option>
                                            <option>Class 1</option>
                                            <option>Class 2</option>
                                            <option>VIP</option>

                                        </select>

                    </div>
                </div>



                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Book Now</button>

                    </div>
                </div>
            </form>
            <!-- END FORM-->



        </div>
        <!-- END COLUMN 1 -->
        <!-- COLUMN 2 -->
        <div class="span6 pull-right">
            <ul class="thumbnails">
                <li class="span6 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->vip_seat_image ?>" id="img" class="img-responsive">
                    <h3>
                        <a>Vip Seat</a>
                        <small>Available For Reservation</small>
                    </h3>
                    
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?= $row->free_vip_seat ?></small></li>
                        

                    </ul>
                </li>
                <li class="span6 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->class1_seat_image?>" id="img" class="img-responsive">
                    <h3>
                        <a>Class 1 Seat</a>
                        <small>Available For Reservation</small>
                    </h3>
                   
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?= $row->free_class1_seat ?></small></li>
                       

                    </ul>
                </li>


            </ul>

            <ul class="thumbnails">
                <li class="span6 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->class2_seat_image ?>" id="img" class="img-responsive">
                    <h3>
                        <a>Class 2 Seat</a>
                        <small>Available For Reservation</small>
                    </h3>
                   
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?= $row->free_class2_seat ?></small></li>
                       

                    </ul>
                </li>
                <li class="span6">
                    <img src="<?php echo base_url(); ?><?= $row->normal_seat_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Normal Seat</a>
                        <small>Available For Reservation</small>
                    </h3>
                    <
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?= $row->free_normal_seat ?></small></li>
                       

                    </ul>
                </li>
            </ul>
        </div>
        <!-- END COLUMN 2 -->
    </div>
    <!-- END ROW 1 -->

</div>
<!-- END CONTAINER -->


    <?php endforeach; ?>

<?php endif; ?>
</div>