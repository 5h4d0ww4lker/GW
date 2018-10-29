<?php if ($club_detail): ?>
<?php foreach ($club_detail as $row): ?>


  <!-- BEGIN CONTAINER -->
    <div class="container min-hight">
        <!-- BEGIN ABOUT INFO -->   
        <div class="row-fluid margin-bottom-30">
            <!-- BEGIN INFO BLOCK -->               
            <div class="span7 space-mobile">

                <p><?= $row->club_discription ?>.</p>
                <p>Enjoy Ethiopian Hospitality at 2hagerbet.com.</p>
                <!-- BEGIN LISTS -->
                <div class="row-fluid front-lists-v1">
                    <div class="span6">
                        <ul class="unstyled margin-bottom-20">
                            <li><i class="icon-compass"></i> <?= $row->club_city ?>/<?= $row->club_location ?></li>
                            <li><i class="icon-road"></i> <?= $row->club_direction ?> </li>
                            <li><i class="icon-phone"></i> <?= $row->club_phone_office ?></li>
                        </ul>
                    </div>
                    <div class="span6">
                        <ul class="unstyled">
                            <li><i class="icon-phone"></i> <?= $row->club_phone_mobile ?></li>
                            <li><i class="icon-mail-forward"></i> <?= $row->club_email ?> </li>
                            <li><i class="icon-globe"></i> <?= $row->club_web_site ?></li>
                             <li><i class="icon-dollar"></i> <?= $row->entrance_fee?></li>
                            
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
                            <img src="<?php echo base_url(); ?><?= $row->club_image1 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->club_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->club_image2 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p<?= $row->club_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->club_image3 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->club_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->club_image4 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->club_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->club_image5 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->club_name ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->club_image6 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->club_name ?></p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="<?php echo base_url(); ?><?= $row->club_image7 ?>" class="img-responsive" id="img_slider">
                            <div class="carousel-caption">
                                <p><?= $row->club_name ?></p>
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


        <h2>These are Services available at <?=$row->club_name ?></h2>
        <div class="row-fluid front-team">
            <ul class="thumbnails">
                <li class="span3 space-mobile">

                    <h3>
                        <a>Available Food Items</a>
                        <small>Some of available food items at <?=$row->club_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok"></i> Fast Food</li> <small><?= $row->club_fast_food ?></small>
                        <li><i class="icon-ok"></i> Modern Food </li><small><?= $row->club_modern_food ?></small>
                        <li><i class="icon-ok"></i> Local Food </li><small><?= $row->club_local_food ?></small>
                        <li><i class="icon-ok"></i> Burger and Pizza: </li><small><?= $row->club_burger_and_pizza ?></small>

                    </ul>
                </li>
                <li class="span3 space-mobile">

                    <h3>
                        <a>Available Drink Items</a>
                        <small>Some of available drinks items at <?=$row->club_name ?></small>
                    </h3>
                     <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-glass"></i> Hot Drinks</li> <small><?= $row->club_hot_drinks ?></small>
                        <li><i class="icon-glass"></i> Soft Drinks</li><small><?= $row->club_soft_drinks ?></small>
                        <li><i class="icon-glass"></i> Local Drinks </li><small><?= $row->club_local_drinks ?></small>
                        <li><i class="icon-glass"></i> Beer and Alcohol: </li><small><?= $row->club_beer_and_alcohol ?></small>

                    </ul>
                </li>
                <li class="span3 space-mobile">

                    <h3>
                        <a>Other Services</a>
                        <small>Some of different services available at <?=$row->club_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-truck"></i> Parking</li> <small><?= $row->club_fast_food ?></small>
                        <li><i class="icon-user"></i> For Children: </li><small><?= $row->club_modern_food ?></small>
                        <li><i class="icon-ok-circle"></i> Swimming Pool: </li><small><?= $row->club_local_food ?></small>
                        <li><i class="icon-ok-circle"></i> conference Room: </li><small><?= $row->club_burger_and_pizza ?></small>

                    </ul>
                </li>
                <li class="span3">

                    <h3>
                        <a>Club Days</a>
                        <small>Days and Events at <?=$row->club_name ?></small>
                    </h3>
                    <ul class="unstyled margin-bottom-20">
                      


 <i class="icon-calendar"></i><lable id="lmn" id="big">Monday</lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->monday ?></span></h5><br/>
                              <i class="icon-calendar"></i>  <lable id="lmn" id="big">Tuesday</lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->tuesday ?></span></h5><br/>
                               <i class="icon-calendar"></i> <lable id="lmn" id="big">Wednesday</lable> <span
                                        class="badge bg-purple pull-right"><?= $row->wednesday ?></span></h5><br/>
                               <i class="icon-calendar"></i> <lable id="lmn" id="big">Thursday</lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->thursday ?></span></h5><br/>
                               <i class="icon-calendar"></i> <lable id="lmn" id="big">Friday</lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->friday ?></span></h5><br/>
                               <i class="icon-calendar"></i> <lable id="lmn" id="big">Saturday</lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->saturday ?></span></h5><br/>

                                        <i class="icon-calendar"></i> <lable id="lmn" id="big">Sunday</lable>  <span
                                        class="badge bg-purple pull-right"><?= $row->sunday ?></span></h5><br/>

































                    </ul>
                </li>
            </ul>
        </div>

        <h2>Some Of Available Seat Types  At <?=$row->club_name ?></h2>

        <!-- BEGIN OUR TEAM -->
        <div class="row-fluid front-team">
            <ul class="thumbnails">
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->vip_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>VIP Seat</a>
                        <small>Reserve Now and Enjoy</small>
                    </h3>
                    
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?=$row->free_vip_seats ?></small></li>
                        


            </ul>
                </li>
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->class1_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Class 1 Seat</a>
                        <small>Reserve Now and Enjoy</small>
                    </h3>
                    
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?=$row->free_c1_seats ?></small></li>
                       

                    </ul>
                </li>
                <li class="span3 space-mobile">
                    <img src="<?php echo base_url(); ?><?= $row->class2_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Class 2 Seat</a>
                        <small>Reserve Now and Enjoy</small>
                    </h3>
                    
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?=$row->free_c2_seats ?></small></li>
                        

                    </ul>
                </li>
                <li class="span3">
                    <img src="<?php echo base_url(); ?><?= $row->class3_image ?>" id="img" class="img-responsive">

                    <h3>
                        <a>Normal Seat</a>
                        <small>Reserve Now and Enjoy</small>
                    </h3>
                   
                    <ul class="unstyled margin-bottom-20">
                        <li><i class="icon-ok-circle"></i>Free Seats:<small><?=$row->free_c3_seats ?></small></li>
                        

                    </ul>
                </li>
            </ul>            
        </div>
        <!-- END OUR TEAM -->
    <?php endforeach; ?>

<?php endif; ?>

</div>