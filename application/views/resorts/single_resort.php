<?php if ($resort_detail): ?>
<?php foreach ($resort_detail as $row): ?>


  <!-- BEGIN CONTAINER -->
    <div class="container min-hight">
        <!-- BEGIN ABOUT INFO -->   
        <div class="row-fluid margin-bottom-30">
            <!-- BEGIN INFO BLOCK -->               
            <div class="span7 space-mobile">

                <p><?= $row->resort_discription ?>.</p>
                <p>Enjoy Ethiopian Hospitality at 2hagerbet.com.</p>
                <!-- BEGIN LISTS -->
                <div class="row-fluid front-lists-v1">
                    <div class="span6">
                        <ul class="unstyled margin-bottom-20">
                            <li><i class="icon-compass"></i> <?= $row->resort_city ?>/<?= $row->resort_location ?></li>
                            <li><i class="icon-road"></i> <?= $row->resort_direction ?> </li>
                            <li><i class="icon-phone"></i> <?= $row->resort_phone_office ?></li>
                        </ul>
                    </div>
                    <div class="span6">
                        <ul class="unstyled">
                            <li><i class="icon-phone"></i> <?= $row->resort_phone_mobile ?></li>
                            <li><i class="icon-mail-forward"></i> <?= $row->resort_email ?> </li>
                            <li><i class="icon-globe"></i> <?= $row->resort_web_site ?></li>
                            <li><i class="icon-dollar"></i>Rooms From <?= $row->rooms_from ?></li>
                        </ul>
                    </div>
                </div>
                <!-- END LISTS -->
            </div>
            <!-- END INFO BLOCK -->   

            <!-- BEGIN CAROUSEL -->            
            <div class="span5 front-carousel">
                <div id="myCarousel" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <img src="<?php echo base_url(); ?><?= $row->resort_image1 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->resort_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->resort_image2 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p<?= $row->resort_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->resort_image3 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->resort_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->resort_image4 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->resort_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->resort_image5 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->resort_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->resort_image6 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->resort_name ?></p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->resort_image7 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->resort_name ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <i class="icon-angle-left"></i>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <i class="icon-angle-right"></i>
                    </a>
                </div>                
            </div>
            <!-- END CAROUSEL -->             
        </div>
        <!-- END ABOUT INFO -->   

        <!-- BEGIN TESTIMONIALS AND PROGRESS BAR -->


        <h2>These are Services available at <?=$row->resort_name ?></h2>
        <div class="row-fluid front-team">
            <ul class="thumbnails">
                <li class="span3 space-mobile">

                    <h3>
                        <a>Available Food Items</a>
                        <small>Some of available food items at <?=$row->resort_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok"></i> Fast Food</li> <small><?= $row->resort_fast_food ?></small>
                        <li><i class="icon-ok"></i> Modern Food </li><small><?= $row->resort_modern_food ?></small>
                        <li><i class="icon-ok"></i> Local Food </li><small><?= $row->resort_local_food ?></small>
                        <li><i class="icon-ok"></i> Burger and Pizza: </li><small><?= $row->resort_burger_and_pizza ?></small>

                    </ul>
                </li>
                <li class="span3 space-mobile">

                    <h3>
                        <a>Available Drink Items</a>
                        <small>Some of available drinks items at <?=$row->resort_name ?></small>
                    </h3>
                     <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-glass"></i> Hot Drinks</li> <small><?= $row->resort_hot_drinks ?></small>
                        <li><i class="icon-glass"></i> Soft Drinks</li><small><?= $row->resort_soft_drinks ?></small>
                        <li><i class="icon-glass"></i> Local Drinks </li><small><?= $row->resort_local_drinks ?></small>
                        <li><i class="icon-glass"></i> Beer and Alcohol: </li><small><?= $row->resort_beer_and_alcohol ?></small>

                    </ul>
                </li>
                <li class="span3 space-mobile">

                    <h3>
                        <a>Other Services</a>
                        <small>Some of different services available at <?=$row->resort_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-truck"></i> Parking</li> <small><?= $row->resort_fast_food ?></small>
                        <li><i class="icon-user"></i> For Children: </li><small><?= $row->resort_modern_food ?></small>
                        <li><i class="icon-ok-circle"></i> Swimming Pool: </li><small><?= $row->resort_local_food ?></small>
                        <li><i class="icon-ok-circle"></i> conference Room: </li><small><?= $row->resort_burger_and_pizza ?></small>

                    </ul>
                </li>
                <li class="span3">

                    <h3>
                        <a>Room Services</a>
                        <small>Some of room services available at <?=$row->resort_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-signal"></i> Wi-Fi</li> <small><?= $row->resort_wifi ?></small>
                        <li><i class="icon-tablet"></i> Satelite Tv: </li><small><?= $row->resort_satelite_tv ?></small>
                        <li><i class="icon-ok-circle"></i> Air Conditioner: </li><small><?= $row->resort_ac ?></small>
                        <li><i class="icon-ok-circle"></i> Hair Drier: </li><small><?= $row->resort_hair_drier?></small>

                    </ul>
                </li>
            </ul>
        </div>

        <h2>Some Of Available Room Types  At <?=$row->resort_name ?></h2>

        <!-- BEGIN OUR TEAM -->
        <div class="row-fluid front-team">
            <ul class="thumbnails">
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->resort_single_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Single Room</a>
                        <small>Book Now and Enjoy</small>
                    </h3>
                    <p><?=$row->resort_single_room ?></p>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Rooms:<small><?= $row->free_single_rooms ?></small></li>
                        <li><i class="icon-dollar"></i>  Room Price Per Night :<small><?= $row->resort_single_room_price ?></small></li>


            </ul>
                </li>
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->resort_suit_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Suit Room</a>
                        <small>Book Now and Enjoy</small>
                    </h3>
                    <p><?=$row->resort_suit_room ?></p>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Rooms:<small><?= $row->free_suit_rooms ?></small></li>
                        <li><i class="icon-dollar"></i>  Room Price Per Night :<small><?= $row->resort_suit_room_price ?></small></li>


                    </ul>
                </li>
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->resort_twin_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Twin Room</a>
                        <small>Book Now and Enjoy</small>
                    </h3>
                    <p><?=$row->resort_twin_room ?></p>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Rooms:<small><?= $row->free_twin_room ?></small></li>
                        <li><i class="icon-dollar"></i>  Room Price Per Night :<small><?= $row->resort_twin_room_price ?></small></li>


                    </ul>
                </li>
                <li class="span3">
                    <img src="<?php echo base_url(); ?><?= $row->resort_presidential_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Presidential Suit</a>
                        <small>Book Now and Enjoy</small>
                    </h3>
                    <p><?=$row->resort_presidential_suit ?></p>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Rooms:<small><?= $row->free_presidential_suit ?></small></li>
                        <li><i class="icon-dollar"></i>  Room Price Per Night :<small><?= $row->resort_presidential_suit_price ?></small></li>


                    </ul>
                </li>
            </ul>            
        </div>
        <!-- END OUR TEAM -->
    <?php endforeach; ?>

<?php endif; ?>

</div>