<!-- BEGIN CONTAINER -->
<div class="container min-hight">
    <!-- BEGIN BLOCKQUOTE AND VIDEO -->
    <?php if ($guest_house_detail): ?>
    <?php foreach ($guest_house_detail as $row): ?>

    <div class="row-fluid">
        <!-- BEGIN SERVICE BLOCKS -->
        <div class="span7">
            <div class="row-fluid margin-bottom-20">
                <div class="span6 service-box-v1">
                    <img src="<?php echo base_url(); ?><?= $row->whall_image ?>"
                         id="lol">
                    <h2>Wedding Hall</h2>
                    <p><?= $row->wedding_hall_description ?></p>
                </div>
                <div class="span6 service-box-v1">
                    <img src="<?php echo base_url(); ?><?= $row->mhall_image ?>"
                         id="lol">
                    <h2>Conference Room</h2>
                    <p><?= $row->meeting_hall_description ?></p>
                </div>
            </div>
            <div class="row-fluid margin-bottom-20">
                <div class="span6 service-box-v1">
                    <img src="<?php echo base_url(); ?><?= $row->pool_image ?>"
                         id="lol"/>
                    <h2>Swimming Pool</h2>
                    <p><?= $row->swimming_pool_description ?></p>
                </div>
                <div class="span6 service-box-v1">
                    <img src="<?php echo base_url(); ?><?= $row->gym_image ?>"
                         id="lol">
                    <h2>Gym</h2>
                    <p><?= $row->gym_discription ?></p>
                </div>
            </div>

        </div>
        <!-- END SERVICE BLOCKS -->

        <!-- BEGIN VIDEO AND TESTIMONIALS -->
        <div class="span5">

            <h3 align="center">Send request</h3>
            <!-- BEGIN FORM-->

            <form method="post"
                  action="<?php echo base_url('index.php/guest_houses/add_contact') ?>" class="form-horizontal">


                <input type="hidden"
                       class="hidden"
                       id="company_name"
                       name="guest_house_name"
                       value="<?= $row->guest_house_name ?>">



                <input type="hidden"
                       class="hidden"
                       id="company_name"
                       name="status"
                       value="Request">
                <input type="hidden"
                       class="hidden"
                       id="guest_house_id"
                       name="guest_house_id"
                       value="<?= $row->guest_house_id ?>">


                <input type="hidden"
                       class="hidden"
                       id="guest_house_id"
                       name="guest_house_phone_mobile"
                       value="<?= $row->guest_house_phone_mobile?>">


                <input type="hidden"
                       class="hidden"
                       id="guest_house_id"
                       name="guest_house_email"
                       value="<?= $row->guest_house_email ?>">



            <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input type="text"
                               class="form-control"
                               id="format"
                               name="f_name"
                               placeholder="First Name"
                               maxlength="15"
                               required="required">

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
                               maxlength="10"
                               required="required">

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
                    <label class="control-label">Request Type</label>
                    <div class="controls">

                        <select class="form-control" name="question_type" id="format">
                            <option>Question</option>
                            <option>Conference  Room Request</option>
                            <option>Wedding Room Request</option>
                            <option>Not Listed</option>
                        </select>
                    </div>
                </div>
                <div class="controls">
                    <textarea class="medium m-wrap" rows="5"  name="content"  maxlength="1000"
                              required="required"></textarea>
                </div>





                <br/>




                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="submit" class="btn yellow"><i class="icon-ok"></i> Send Now</button>

                    </div>
                </div>
            </form>
            <!-- END FORM-->



        </div>
        <!-- END COLUMN 1 -->


    </div>
    <!-- END BEGIN VIDEO AND TESTIMONIALS -->
</div>
<!-- END BLOCKQUOTE AND VIDEO -->

<?php endforeach; ?>

<?php endif; ?>


</div>
<!-- END CONTAINER -->
