<?php if ($company_list): ?>

<?php foreach ($company_list as $row): ?>


<aside class="main-sidebar">


            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url(); ?>advert/me.jpg" class="img-polaroid"
                             width="400" height="300"/>
                    </div>
                    <div class="pull-left info">
                        <p>Melaku M.</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Active</a>


                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
                </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="treeview">



                        <a href="#"><span class="glyphicon glyphicon-edit">&nbsp;Hotels</span></a>
                        <ul class="treeview-menu">
                           <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/add_new/') ?>>Add New</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/view_all_hotels/') ?>>View All</a></li>
                       
                        </ul>
                    </li>
                   

                    <li class="treeview">
                        <a href="#"><span class="glyphicon glyphicon-edit">&nbsp;Restaurants</span></a>
                        <ul class="treeview-menu">
                           <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/add_new_restaurant/') ?>>Add New</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/view_all_restaurants/') ?>>View All</a></li>
                           </ul>
                    </li>




                    <li class="treeview">
                        <a href="#"><span class="glyphicon glyphicon-edit">&nbsp;Resorts</span></a>
                        <ul class="treeview-menu">
                          <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/add_new_resort/') ?>>Add New</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/view_all_resorts/') ?>>View All</a></li>
                       </ul>
                    </li>



                    <li class="treeview">
                        <a href="#"><span class="glyphicon glyphicon-edit">&nbsp;G.Houses</span></a>
                        <ul class="treeview-menu">
                          <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/add_new_guest_house/') ?>>Add New</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/view_all_guest_houses/') ?>>View All</a></li>
                         </ul>
                    </li>


<li class="treeview">
                        <a href="#"><span class="glyphicon glyphicon-edit">&nbsp;Clubs</span></a>
                        <ul class="treeview-menu">
                           <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/add_new_club/') ?>>Add New</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/view_all_clubs/') ?>>View All</a></li>
                        </ul>
                    </li>


                     <li> <a href=<?php echo site_url('hag22673627bet8001niki1base5621ac/logout') ?>><span class="glyphicon glyphicon-off">&nbsp;Logout</span></a></li>




                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>



    <?php endforeach; ?>

<?php endif; ?>