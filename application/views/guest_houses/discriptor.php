<div class="row-fluid breadcrumbs margin-bottom-40">
    <div class="container">
        <div class="span6">
            <h1>Guest Houses
                <form method="post"
                      action="<?php echo base_url('index.php/guest_houses/search_guest_houses') ?>">

                <input type="text"
                       class="form-control"
                       id="bar"
                       name="search_term"

                       placeholder="By Name, location, star level" required="required">
                <button type="submit"class="btn green" id="bar2"><i class=" icon-search"></i> Go!</button></h1>
            </form>
            
         <a href=<?php echo site_url('guest_houses/check') ?> class="btn green"><i class=" icon-check"></i> Chech Room Availablity&nbsp;<small>using 2hagerbet.com</small></a>


        </div>

        <div class="span6">
            <ul class="pull-right breadcrumb">
               
 <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                                    Cities
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                      <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_inside_adiss') ?>  class="list-group-item"
                                       id="left_sider">Addiss<span class="badge pull-right" id="counter">129</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_inside_adama') ?>  class="list-group-item"
                                       id="left_sider">Adama<span class="badge pull-right" id="counter">85</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_inside_debre_zeit') ?>  class="list-group-item"
                                       id="left_sider">Bishoftu<span class="badge pull-right" id="counter">85</span></a></li>

                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_inside_dire_dawa') ?>  class="list-group-item"
                                       id="left_sider">Dire Dawa<span class="badge pull-right" id="counter">50</span></a></li>
                                <li class="last"><a
                                        href=<?php echo site_url('guest_houses/get_list_of_guest_houses_inside_bahir_dar') ?>  class="list-group-item"
                                        id="left_sider">Bahir Dar<span class="badge pull-right" id="counter">19</span></a></li>
                                </ul>
                              </li> <span class="divider">|</span>

                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                                    Inside Addis
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_bole') ?>  class="list-group-item"
                                       id="left_sider">Bole<span class="badge pull-right" id="counter">19</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_cazanches') ?>  class="list-group-item"
                                       id="left_sider">Cazanchis<span class="badge pull-right" id="counter">23</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_4_kilo') ?>  class="list-group-item"
                                       id="left_sider">4 Kilo<span class="badge pull-right" id="counter">43</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_piassa') ?>  class="list-group-item"
                                       id="left_sider">Piassa<span class="badge pull-right" id="counter">32</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_22_mazoria') ?>  class="list-group-item"
                                       id="left_sider">22 Mazoria<span class="badge pull-right" id="counter">31</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_megenagna') ?>  class="list-group-item"
                                       id="left_sider">Megenagna<span class="badge pull-right" id="counter">11</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_sar_bet') ?>  class="list-group-item"
                                       id="left_sider">Sar Bet<span class="badge pull-right" id="counter">12</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_saris') ?>  class="list-group-item"
                                       id="left_sider">Saris<span class="badge pull-right" id="counter">10</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_asko') ?>  class="list-group-item"
                                       id="left_sider">Asko<span class="badge pull-right" id="counter">4</span></a></li>

                                </ul>
                              </li> <span class="divider">|</span>
               <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                                    By Star Level
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                   <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_5_star') ?>  class="list-group-item"
                                       id="left_sider">5 Star<span class="badge pull-right"
                                                                   id="counter">19</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_4_star') ?>  class="list-group-item"
                                       id="left_sider">4 Star<span class="badge pull-right"
                                                                   id="counter">19</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_3_star') ?>  class="list-group-item"
                                       id="left_sider">3 Star<span class="badge pull-right"
                                                                   id="counter">19</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_2_star') ?>  class="list-group-item"
                                       id="left_sider">2 Star<span class="badge pull-right"
                                                                   id="counter">19</span></a></li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_1_star') ?>  class="list-group-item"
                                       id="left_sider">1 Star<span class="badge pull-right"
                                                                   id="counter">19</span></a></li>
                                </ul>
                              </li> <span class="divider">|</span>
                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                                    By Room Prices
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_500ETB') ?>  class="list-group-item"
                                       id="left_sider">Up to 500 ETB<span class="badge pull-right" id="counter">19</span></a>
                                </li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_1000ETB') ?>  class="list-group-item"
                                       id="left_sider">Up to 1000 ETB<span class="badge pull-right" id="counter">23</span></a>
                                </li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_1500ETB') ?>  class="list-group-item"
                                       id="left_sider">Up to 1500 ETB<span class="badge pull-right" id="counter">43</span></a>
                                </li>
                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_2000ETB') ?>  class="list-group-item"
                                       id="left_sider">Up to 2000 ETB<span class="badge pull-right" id="counter">32</span></a>
                                </li>

                                <li>
                                    <a href=<?php echo site_url('guest_houses/get_list_of_guest_houses_more2000ETB') ?>  class="list-group-item"
                                       id="left_sider">> 2000 ETB<span class="badge pull-right" id="counter">31</span></a>
                                </li>
                                </ul>
                              </li>


   </li> <span class="divider">|</span>
                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                                    With
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                   <li>
                                    <a href=<?php echo site_url('guest_houses/with_swimming_pool') ?>  class="list-group-item"
                                       id="left_sider">Swimming Pool<span class="badge pull-right" id="counter">12</span></a>
                                </li>
                                <li><a href=<?php echo site_url('guest_houses/with_parking') ?>  class="list-group-item"
                                       id="left_sider">Parking<span
                                            class="badge pull-right" id="counter">112</span></a></li>
                                </ul>
                              </li>

            </ul>
        </div>
    </div>
</div>
