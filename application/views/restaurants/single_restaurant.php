<?php if ($restaurant_detail): ?>
<?php foreach ($restaurant_detail as $row): ?>


  <!-- BEGIN CONTAINER -->
    <div class="container min-hight">
        <!-- BEGIN ABOUT INFO -->   
        <div class="row-fluid margin-bottom-30">
            <!-- BEGIN INFO BLOCK -->               
            <div class="span7 space-mobile">

                <p><?= $row->restaurant_discription ?>.</p>
                <p>Enjoy Ethiopian Hospitality at 2hagerbet.com.</p>
                <!-- BEGIN LISTS -->
                <div class="row-fluid front-lists-v1">
                    <div class="span6">
                        <ul class="unstyled margin-bottom-20">
                            <li><i class="icon-compass"></i> <?= $row->restaurant_city ?>/<?= $row->restaurant_location ?></li>
                            <li><i class="icon-road"></i> <?= $row->restaurant_direction ?> </li>
                            <li><i class="icon-phone"></i> <?= $row->restaurant_phone_office ?></li>
                        </ul>
                    </div>
                    <div class="span6">
                        <ul class="unstyled">
                            <li><i class="icon-phone"></i> <?= $row->restaurant_phone_mobile ?></li>
                            <li><i class="icon-mail-forward"></i> <?= $row->restaurant_email ?> </li>
                            <li><i class="icon-globe"></i> <?= $row->restaurant_web_site ?></li>
                            
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
                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image1 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->restaurant_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image2 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p<?= $row->restaurant_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image3 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->restaurant_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image4 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->restaurant_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image5 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->restaurant_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image6 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->restaurant_name ?></p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->restaurant_image7 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->restaurant_name ?></p>
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


        <h2>These are Services available at <?=$row->restaurant_name ?></h2>
        <div class="row-fluid front-team">
            <ul class="thumbnails">
                <li class="span3 space-mobile">

                    <h3>
                        <a>Available Food Items</a>
                        <small>Some of available food items at <?=$row->restaurant_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok"></i> Fast Food</li> <small><?= $row->restaurant_fast_food ?></small>
                        <li><i class="icon-ok"></i> Modern Food </li><small><?= $row->restaurant_modern_food ?></small>
                        <li><i class="icon-ok"></i> Local Food </li><small><?= $row->restaurant_local_food ?></small>
                        <li><i class="icon-ok"></i> Burger and Pizza: </li><small><?= $row->restaurant_burger_and_pizza ?></small>

                    </ul>
                </li>
                <li class="span3 space-mobile">

                    <h3>
                        <a>Available Drink Items</a>
                        <small>Some of available drinks items at <?=$row->restaurant_name ?></small>
                    </h3>
                     <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-glass"></i> Hot Drinks</li> <small><?= $row->restaurant_hot_drinks ?></small>
                        <li><i class="icon-glass"></i> Soft Drinks</li><small><?= $row->restaurant_soft_drinks ?></small>
                        <li><i class="icon-glass"></i> Local Drinks </li><small><?= $row->restaurant_local_drinks ?></small>
                        <li><i class="icon-glass"></i> Beer and Alcohol: </li><small><?= $row->restaurant_beer_and_alcohol ?></small>

                    </ul>
                </li>
                <li class="span3 space-mobile">

                    <h3>
                        <a>Other Services</a>
                        <small>Some of different services available at <?=$row->restaurant_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-truck"></i> Parking</li> <small><?= $row->parking_discription ?></small>
                        <li><i class="icon-user"></i> For Children: </li><small><?= $row->children_play_ground ?></small>
                        <li><i class="icon-ok-circle"></i> Swimming Pool: </li><small><?= $row->pool_discription ?></small>
                        <li><i class="icon-ok-circle"></i> conference Room: </li><small><?= $row->conference_room_description ?></small>

                    </ul>
                </li>
                <li class="span3">

                    <h3>
                        <a>Restaurant Menu</a>
                        <small>Some of room services available at <?=$row->restaurant_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                      


 <i class="icon-ok-circle"></i><lable id="lmn" id="big"><?= $row->fi1 ?></lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->fi1p ?></span></h5><br/>
                              <i class="icon-ok-circle"></i>  <lable id="lmn" id="big"><?= $row->fi2 ?></lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->fi2p ?></span></h5><br/>
                               <i class="icon-ok-circle"></i> <lable id="lmn" id="big"><?= $row->fi3 ?></lable> <span
                                        class="badge bg-purple pull-right"><?= $row->fi3p ?></span></h5><br/>
                               <i class="icon-ok-circle"></i> <lable id="lmn" id="big"><?= $row->fi4 ?></lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->fi4p ?></span></h5><br/>
                               <i class="icon-ok-circle"></i> <lable id="lmn" id="big"><?= $row->fi5 ?></lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->fi5p ?></span></h5><br/>
                               <i class="icon-ok-circle"></i> <lable id="lmn" id="big"><?= $row->fi6 ?></lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->fi6p ?></span></h5><br/>
                                <i class="icon-ok-circle"></i><lable id="lmn" id="big"><?= $row->fi7 ?></lable> <span
                                        class="badge bg-purple pull-right"><?= $row->fi7p ?></span></h5><br/>
                                <i class="icon-ok-circle"></i><lable id="lmn" id="big"><?= $row->fi8 ?></lable> <span
                                    class="badge bg-purple pull-right"><?= $row->fi8p ?></span></h5><br/>
                                <i class="icon-ok-circle"></i><lable id="lmn" id="big"><?= $row->fi9 ?></lable> <span
                                    class="badge bg-purple pull-right"><?= $row->fi9p ?></span></h5><br/>
                              <i class="icon-ok-circle"></i>  <lable id="lmn" id="big"><?= $row->fi10 ?></lable> <span
                                    class="badge bg-purple pull-right"><?= $row->fi10p ?></span></h5><br/>

































                    </ul>
                </li>
            </ul>
        </div>

        <h2>Some Of Available Seat Types  At <?=$row->restaurant_name ?></h2>

        <!-- BEGIN OUR TEAM -->
        <div class="row-fluid front-team">
            <ul class="thumbnails">
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->vip_seat_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>VIP Seat</a>
                        <small>Reserve Now and Enjoy</small>
                    </h3>
                    
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?= $row->free_vip_seat ?></small></li>
                        


            </ul>
                </li>
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->class1_seat_image?>" id="img" class="img-responsive">

                    <h3>
                        <a>Class 1 Seat</a>
                        <small>Reserve Now and Enjoy</small>
                    </h3>
                    
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?= $row->free_class1_seat ?></small></li>
                       

                    </ul>
                </li>
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->class2_seat_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Class 2 Seat</a>
                        <small>Reserve Now and Enjoy</small>
                    </h3>
                    
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?= $row->free_class2_seat ?></small></li>
                        

                    </ul>
                </li>
                <li class="span3">
                    <img src="<?php echo base_url(); ?><?= $row->normal_seat_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Normal Seat</a>
                        <small>Reserve Now and Enjoy</small>
                    </h3>
                   
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?= $row->free_normal_seat ?></small></li>
                        

                    </ul>
                </li>
            </ul>            
        </div>
        <!-- END OUR TEAM -->
    <?php endforeach; ?>

<?php endif; ?>

</div>