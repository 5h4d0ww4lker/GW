


                                <!-- BEGIN CONTAINER -->
                                <div class="container min-hight">
                                    <!-- BEGIN PRICING OPTION1 -->




                                    <div class="row-fluid margin-bottom-40">

                                        <?php if ($guest_house_location): ?>
                                        <?php foreach ($guest_house_location as $row): ?>
                                        <div class="span3 pricing pricing-active">
                                            <div class="pricing-head pricing-head-active">
                                                <h3><?= $row->guest_house_name ?></h3>

                                            </div>
                                            <ul class="pricing-content unstyled">
                                                <img src="<?php echo base_url(); ?><?= $row->guest_house_image1 ?>"
                                                     class="img-responsive" id="img_thumb"/>
                                                <li><i class=" icon-compass"></i> <?= $row->guest_house_city ?>/<?= $row->guest_house_location ?></li>
                                                <li><i class=" icon-star"></i> <?= $row->star_level ?></li>
                                                <li><i class=" icon-phone"></i> <?= $row->guest_house_phone_mobile ?>/<?= $row->guest_house_phone_office ?></li>


                                                <li><i class="icon-mail-forward"></i> <?= $row->guest_house_email ?></li>
                                                <li><i class="icon-globe"></i> <?= $row->guest_house_web_site ?></li>
                                            </ul>
                                            <div class="pricing-footer">


                                                <a href=<?php echo site_url('guest_houses/booking/' . $row->guest_house_id) ?> class="btn green">Book Now <i class="m-icon-swapright m-icon-white"></i></a>
                                                <a href=<?php echo site_url('guest_houses/load_guest_house_details/' . $row->guest_house_id) ?> class="btn purple">Visit</a>
                                            </div>
                                        </div>
                                            <?php endforeach; ?>

                                        <?php endif; ?>
                                    </div>
                                    <!-- END PRICING OPTION1 -->




                                    <div class="clearfix margin-bottom-10"></div>


                                </div>
                                <!-- END CONTAINER -->







<div class="pagination pagination-centered">
    <ul>
        <li><?php echo $this->pagination->create_links(); ?></li>
    </ul>
</div>


