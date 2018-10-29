<!-- BEGIN CONTAINER -->

<?php if ($resort_detail): ?>
<?php foreach ($resort_detail as $row): ?>
<div class="container min-hight">

    <!-- ROW 1 -->
    <div class="row-fluid margin-bottom-40">
        <!-- COLUMN 1 -->
        <div class="span6">
            <h3 align="center">Send Booking Enquiry</h3>
            <!-- BEGIN FORM-->
            <form method="post"
                  action="<?php echo base_url('index.php/resorts/add_book') ?>" class="form-horizontal">





                <input type="hidden"
                       class="hidden"
                       id="company_name"
                       name="resort_name"
                       value="<?= $row->resort_name ?>">

                <input type="hidden"
                       class="hidden"
                       id="company_name"
                       name="resort_location"
                       value="<?= $row->resort_location ?>">

                <input type="hidden"
                       class="hidden"
                       id="company_name"
                       name="resort_direction"
                       value="<?= $row->resort_direction ?>">

                <input type="hidden"
                       class="hidden"
                       id="company_name"
                       name="resort_phone_mobile"
                       value="<?= $row->resort_phone_mobile ?>">
                <input type="hidden"
                       class="hidden"
                       id="company_name"
                       name="resort_email"
                       value="<?= $row->resort_email ?>">



                <input type="hidden"
                       class="hidden"
                       id="company_name"
                       name="status"
                       value="Request">
                <input type="hidden"
                       class="hidden"
                       id="resort_id"
                       name="resort_id"
                       value="<?= $row->resort_id ?>">





                <div class="control-group">
                    <label class="control-label">First Name</label>
                    <div class="controls">
                        <input type="text"
                               class="form-control"
                               id="format"
                               name="f_name"
                               size="10"

                               placeholder="First Name"
                               required="required">

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
                               maxlength="15"
                               required="required">

                    </div>
                </div>





                <div class="control-group">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input type="tel"
                               maxlength="10"
                               min="10"
                               class="form-control-static"
                               id="format"
                               name="phone"
                               size="10"
                               placeholder="Phone" required="required">

                    </div>
                </div>




                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input type="email"
                               class="form-control"
                               id="format"
                               name="email"
                               placeholder="Email" required="required">

                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">No OF Rooms</label>
                    <div class="controls">
                        <input type="number"
                               class="form-control  "
                               maxlength="2"
                               id="format"
                               name="no_of_rooms"
                               placeholder="No of Rooms" required="required">

                    </div>
                </div>
 <div class="control-group">
                    <label class="control-label">Arrival Date</label>
                    <div class="controls">
                        <input type="date"
                               class="form-control  "
                               id="format"
                               name="arrival_date"
                               placeholder="Arrival Date" required="required">
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Leave Date</label>
                    <div class="controls">
                        <input type="date"
                               class="form-control  "
                               id="format"
                               name="leaving_date"
                               placeholder="Leaving Date" required="required">

                    </div>
                </div>





                <div class="control-group">
                    <label class="control-label">Room Type</label>
                    <div class="controls">
                        <select class="form-control" name="room_type" id="format" required="required">
                            <option>Single</option>
                            <option>Suit Room</option>
                            <option>Twin Room</option>
                            <option>Presidential Suit</option>
                            <option>Not Listed</option>
                        </select>
                    </div>
                </div>



                <div class="control-group">
                    <label class="control-label">Payment Method</label>
                    <div class="controls">
                        <select class="form-control" name="payement_mtd" id="format" required="required">
                            <option>Cash</option>
                            <option>Bank Transfer</option>
                            <option>Mobile Transfer</option>
                            <option>Pay By Agent</option>
                            <option>Check</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>

                I Will Deliver The Payement Till

                <div class="control-group">
                    <label class="control-label">Payment Date</label>
                    <div class="controls">
                        <input type="date"
                               class="form-control  "
                               id="format"
                               name="payment_due"
                               placeholder="Payment Due" required="required">


                    </div>
                </div>



                <label class="checkbox">
                    <input type="checkbox" required="required"> I agree To terms of use
                </label>

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
                    <img src="<?php echo base_url(); ?><?= $row->resort_single_image ?>" id="img" class="img-responsive">
                    <h3>
                        <a>Single Room</a>
                        <small>Available For Booking</small>
                    </h3>
                    <p><?=$row->resort_single_room ?></p>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Rooms:<small><?= $row->free_single_rooms ?></small></li>
                        <li><i class="icon-dollar"></i> Room Price :<small><?= $row->resort_single_room_price ?></small></li>


                    </ul>
                </li>
                <li class="span6 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->resort_twin_image ?>" id="img" class="img-responsive">
                    <h3>
                        <a>Twin Room</a>
                        <small>Available For Booking</small>
                    </h3>
                    <p><?=$row->resort_twin_room ?></p>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Rooms:<small><?= $row->free_twin_room ?></small></li>
                        <li><i class="icon-dollar"></i> Room Price :<small><?= $row->resort_twin_room_price ?></small></li>


                    </ul>
                </li>


            </ul>

            <ul class="thumbnails">
                <li class="span6 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->resort_suit_image ?>" id="img" class="img-responsive">
                    <h3>
                        <a>Suit Room</a>
                        <small>Available For Booking</small>
                    </h3>
                    <p><?=$row->resort_presidential_suit ?></p>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Rooms:<small><?= $row->free_presidential_suit ?></small></li>
                        <li><i class="icon-dollar"></i> Room Price :<small><?= $row->resort_presidential_suit_price ?></small></li>


                    </ul>
                </li>
                <li class="span6">
                    <img src="<?php echo base_url(); ?><?= $row->resort_presidential_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Presidential Suit</a>
                        <small>Available For Booking</small>
                    </h3>
                    <p><?=$row->resort_presidential_suit ?></p>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Rooms:<small><?= $row->free_presidential_suit ?></small></li>
                        <li><i class="icon-dollar"></i> Room Price :<small><?= $row->resort_presidential_suit_price ?></small></li>


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
