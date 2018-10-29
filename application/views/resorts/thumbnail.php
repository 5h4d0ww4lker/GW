


                                <!-- BEGIN CONTAINER -->
                                <div class="container min-hight">
                                    <!-- BEGIN PRICING OPTION1 -->




                                    <div class="row-fluid margin-bottom-40">

                                        <?php if ($resort_location): ?>
                                        <?php foreach ($resort_location as $row): ?>
                                        <div class="span3 pricing pricing-active">
                                            <div class="pricing-head pricing-head-active">
                                                <h3><?= $row->resort_name ?></h3>

                                            </div>
                                            <ul class="pricing-content unstyled">
                                                <img src="<?php echo base_url(); ?><?= $row->resort_image1 ?>"
                                                     class="img-responsive" id="img_thumb"/>
                                                <li><i class=" icon-compass"></i> <?= $row->resort_city ?>/<?= $row->resort_location ?></li>
                                                <li><i class=" icon-star"></i> <?= $row->star_level ?></li>
                                                <li><i class=" icon-phone"></i> <?= $row->resort_phone_mobile ?>/<?= $row->resort_phone_office ?></li>


                                                <li><i class="icon-mail-forward"></i> <?= $row->resort_email ?></li>
                                                <li><i class="icon-globe"></i> <?= $row->resort_web_site ?></li>
                                            </ul>
                                            <div class="pricing-footer">


                                                <a href=<?php echo site_url('resorts/booking/' . $row->resort_id) ?> class="btn green">Book Now <i class="m-icon-swapright m-icon-white"></i></a>
                                                <a href=<?php echo site_url('resorts/load_resort_details/' . $row->resort_id) ?> class="btn purple">Visit</a>
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


