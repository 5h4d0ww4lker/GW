


                                <!-- BEGIN CONTAINER -->
                                <div class="container min-hight">
                                    <!-- BEGIN PRICING OPTION1 -->




                                    <div class="row-fluid margin-bottom-40">

                                        <?php if ($club_location): ?>
                                        <?php foreach ($club_location as $row): ?>
                                        <div class="span3 pricing pricing-active">
                                            <div class="pricing-head pricing-head-active">
                                                <h3><?= $row->club_name ?></h3>

                                            </div>
                                            <ul class="pricing-content unstyled">
                                                <img src="<?php echo base_url(); ?><?= $row->club_image1 ?>"
                                                     class="img-responsive" id="img_thumb"/>
                                                <li><i class=" icon-compass"></i> <?= $row->club_city ?>/<?= $row->club_location ?></li>
                                                <li><i class=" icon-star"></i> <?= $row->club_class ?></li>
                                                <li><i class=" icon-phone"></i> <?= $row->club_phone_mobile ?>/<?= $row->club_phone_office ?></li>


                                                <li><i class="icon-mail-forward"></i> <?= $row->club_email ?></li>
                                                <li><i class="icon-globe"></i> <?= $row->club_web_site ?></li>
                                            </ul>
                                            <div class="pricing-footer">


                                                <a href=<?php echo site_url('clubs/reservation/' . $row->club_id) ?> class="btn green">Reserve Now<i class="m-icon-swapright m-icon-white"></i></a>
                                                <a href=<?php echo site_url('clubs/load_club_details/' . $row->club_id) ?> class="btn purple">Visit</a>
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


