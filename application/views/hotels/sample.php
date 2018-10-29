<?php if ($hotel_location): ?>
<section>
    <div class="row c-product-showcase">
        <?php foreach ($hotel_location as $row): ?>



        <div class="span3">

            <div class="thumbnail"
            <a href="#"><img src="<?php echo base_url(); ?><?= $row->hotel_image1 ?>" class="img-res"
                             width="400" height="300"/></a>

            <h4><a href="#" id="a"><?= $row->hotel_name ?></a></h4>

            <p>The Best hotel In Adiss Ababa with a varaety of Services and small accomodation prices.</p>


            <p><img src="<?php echo base_url(); ?>img/phone.jpg" alt="Big Boat" width="15"
                    height="20"/> <?= $row->hotel_city ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="<?php echo base_url(); ?>img/star.jpg" alt="Big Boat" width="15"
                     height="20"/> <?= $row->star_level ?>
            </p>


            <p><img src="<?php echo base_url(); ?>img/phone.jpg" alt="Big Boat" width="15"
                    height="20"/> <?= $row->hotel_phone_office ?>

                <img src="<?php echo base_url(); ?>img/mobile.jpg" alt="Big Boat" width="10"
                     height="10"/> <?= $row->hotel_phone_mobile ?>


            </p>

            <div id="small">

                <p id="smaill"><img src="<?php echo base_url(); ?>img/web.jpg" alt="Big Boat" width="15"
                                    height="20"/> <?= $row->hotel_web_site ?>

                    <img src="<?php echo base_url(); ?>img/email.jpg" alt="Big Boat"/> <?= $row->hotel_email ?>


                </p>


            </div>


            <a
                class="btn btn-success btn-flat" id="book"
                href=<?php echo site_url('hotels/booking/' . $row->hotel_id) ?>>Book Now</a>

            <a
                class="btn btn-default btn-flat" id="visit"
                href=<?php echo site_url('hotels/load_hotel_details/' . $row->hotel_id) ?>>Visit<span
                    class=""></span></a>
        </div>
        <br/>
    </div>


    <?php endforeach; ?>

    <?php endif; ?>

    <br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
    <section>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" class="pagination" id="font2" align="center">
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </section>
</section>
