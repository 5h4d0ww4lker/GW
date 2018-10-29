<div class="container">
    <!-- PAGE HEADER -->
    <section>


        <div id="header" class="breadcrumb">
            <table id="example1" class="table table-bordered table-striped">
                <form method="post" action="<?php echo base_url('index.php/admin_controller/check_availablity') ?>">
                    <ul>
                        <li>
                            <label id="lmn">Check Availablity With</label>

                            <select class="form-control" name="hotel_city" id="liststr">
                                <option id="sel">Select City</option>
                                <option id="sel" value="Addis Ababa">Addis Ababa</option>
                                <option id="sel" value="Adama">Adama</option>
                                <option id="sel" value="Debre zeit">D/Zeit</option>
                                <option id="sel" value="diredawa">Diredawa</option>
                                <option id="sel" value="bahir dar">Bahir Dar</option>
                            </select>


                            <select class="form-control" name="hotel_location" id="liststr">
                                <option id="sel"> <label id="lmn">Select Location</label></option>
                                <option id="sel">Bole</option>
                                <option id="sel">Cazanchis</option>
                                <option id="sel">4 Kilo</option>
                                <option id="sel">Piassa</option>
                                <option id="sel">Asko</option>
                                <option id="sel">Sar Bet</option>
                                <option id="sel">Saris</option>
                                <option id="sel">22 Mazoria</option>
                            </select>


                        </li>


                        <li>


                            <select class="form-control" name="star_level" id="liststr">
                                <option id="sel">Star Level</option>
                                <option id="sel" value="five star">5 star</option>
                                <option id="sel" value="Adama">Adama</option>
                                <option id="sel" value="Debre zeit">D/Zeit</option>
                                <option id="sel" value="diredawa">Diredawa</option>
                                <option id="sel" value="bahir dar">Bahir Dar</option>
                            </select>




                            <select class="form-control" name="room_price" id="liststr">
                                <option id="sel">Max  Price</option>
                                <option id="sel"> >2000</option>
                                <option id="sel">1500</option>
                                <option id="sel">1000-1500</option>
                                <option id="sel">500-1000</option>
                                <option id="sel"><500</option>
                            </select>


                        </li>
                        <li>

                            <select class="form-control" name="free_room" id="liststr">
                                <option id="sel"> No Of Rooms</option>
                                <option id="sel">1</option>
                                <option id="sel">2</option>
                                <option id="sel">3</option>
                                <option id="sel">4</option>
                                <option id="sel">5</option>

                            </select>




                            <select class="form-control" name="room_type" id="liststr" value=$room_type>
                                <option id="liststr">Room Type</option>
                                <option id="sel">Suit Room</option>
                                <option id="sel">Single Room</option>
                                <option id="sel">Twin Room</option>
                                <option id="sel">Presidential</option>
                                <option id="sel">Special</option>
                            </select>


                        </li>
                        <input type="submit" class="btn btn-info btn-flat" value="Check Availablity">



                    </ul>

                </form>


            </table>

            <label id="lmn">Search Here</label>

            <form method="post"
                  action="<?php echo base_url('index.php/hotels_controller/search_hotels') ?>">


                <input type="text"
                       class="form-control"
                       id="format"
                       name="search_term"

                       placeholder="By Name, location, star level" required="required">
                <button type="submit" class="btn btn-success  btn-md flat" bg-olive-active><span class="glyphicon glyphicon-save"></span> Go!</button>

            </form>

            <ul id="topnav" class="breadcrumb">

                <li><label class="label" id="idm"><a href="#" id="a">Cities</a></label>
                    <ul id="bgadv">
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_inside_adiss') ?>  class="list-group-item"
                               id="left_sider">Addiss<span class="badge pull-right" id="counter">129</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_inside_adama') ?>  class="list-group-item"
                               id="left_sider">Adama<span class="badge pull-right" id="counter">85</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_inside_debre_zeit') ?>  class="list-group-item"
                               id="left_sider">Bishoftu<span class="badge pull-right" id="counter">85</span></a></li>

                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_inside_dire_dawa') ?>  class="list-group-item"
                               id="left_sider">Dire Dawa<span class="badge pull-right" id="counter">50</span></a></li>
                        <li class="last"><a
                                href=<?php echo site_url('hotels_controller/get_list_of_hotels_inside_bahir_dar') ?>  class="list-group-item"
                                id="left_sider">Bahir Dar<span class="badge pull-right" id="counter">19</span></a></li>

                    </ul>
                </li>
                &nbsp;&nbsp;||&nbsp;&nbsp;

                <li><label class="label" id="idm"><a href="#" id="a">Inside Addis</a></label>
                    <ul>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_bole') ?>  class="list-group-item"
                               id="left_sider">Bole<span class="badge pull-right" id="counter">19</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_cazanches') ?>  class="list-group-item"
                               id="left_sider">Cazanchis<span class="badge pull-right" id="counter">23</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_4_kilo') ?>  class="list-group-item"
                               id="left_sider">4 Kilo<span class="badge pull-right" id="counter">43</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_piassa') ?>  class="list-group-item"
                               id="left_sider">Piassa<span class="badge pull-right" id="counter">32</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_22_mazoria') ?>  class="list-group-item"
                               id="left_sider">22 Mazoria<span class="badge pull-right" id="counter">31</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_megenagna') ?>  class="list-group-item"
                               id="left_sider">Megenagna<span class="badge pull-right" id="counter">11</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_sar_bet') ?>  class="list-group-item"
                               id="left_sider">Sar Bet<span class="badge pull-right" id="counter">12</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_saris') ?>  class="list-group-item"
                               id="left_sider">Saris<span class="badge pull-right" id="counter">10</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_asko') ?>  class="list-group-item"
                               id="left_sider">Asko<span class="badge pull-right" id="counter">4</span></a></li>
                    </ul>
                </li>
                &nbsp;&nbsp;||&nbsp;&nbsp;

                <li><label class="label" id="idm"><a href="#" id="a">By Star Level</a></label>
                    <ul>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_5_star') ?>  class="list-group-item"
                               id="left_sider">5 Star<span class="badge pull-right"
                                                           id="counter">19</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_4_star') ?>  class="list-group-item"
                               id="left_sider">4 Star<span class="badge pull-right"
                                                           id="counter">19</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_3_star') ?>  class="list-group-item"
                               id="left_sider">3 Star<span class="badge pull-right"
                                                           id="counter">19</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_2_star') ?>  class="list-group-item"
                               id="left_sider">2 Star<span class="badge pull-right"
                                                           id="counter">19</span></a></li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_1_star') ?>  class="list-group-item"
                               id="left_sider">1 Star<span class="badge pull-right"
                                                           id="counter">19</span></a></li>

                    </ul>
                </li>
                &nbsp;&nbsp;||&nbsp;&nbsp;


                <li><label class="label" id="idm"><a href="#" id="a">By Room Price</a></label>
                    <ul>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_500ETB') ?>  class="list-group-item"
                               id="left_sider">Up to 500 ETB<span class="badge pull-right" id="counter">19</span></a>
                        </li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_1000ETB') ?>  class="list-group-item"
                               id="left_sider">Up to 1000 ETB<span class="badge pull-right" id="counter">23</span></a>
                        </li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_1500ETB') ?>  class="list-group-item"
                               id="left_sider">Up to 1500 ETB<span class="badge pull-right" id="counter">43</span></a>
                        </li>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_2000ETB') ?>  class="list-group-item"
                               id="left_sider">Up to 2000 ETB<span class="badge pull-right" id="counter">32</span></a>
                        </li>

                        <li>
                            <a href=<?php echo site_url('hotels_controller/get_list_of_hotels_more2000ETB') ?>  class="list-group-item"
                               id="left_sider">> 2000 ETB<span class="badge pull-right" id="counter">31</span></a>
                        </li>
                    </ul>
                </li>
                &nbsp;&nbsp;||&nbsp;&nbsp;

                <li><label class="label" id="idm"><a href="#" id="a">With</a></label>
                    <ul>
                        <li>
                            <a href=<?php echo site_url('hotels_controller/with_swimming_pool') ?>  class="list-group-item"
                               id="left_sider">Swimming Pool<span class="badge pull-right" id="counter">12</span></a>
                        </li>
                        <li><a href=<?php echo site_url('hotels_controller/with_parking') ?>  class="list-group-item"
                               id="left_sider">Parking<span
                                    class="badge pull-right" id="counter">112</span></a></li>

                    </ul>
                </li>




            </ul>
            <br class="clear"/>
        </div>


        </ul>

    </section>