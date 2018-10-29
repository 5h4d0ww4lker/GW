<?php if ($company_list): ?>

<?php foreach ($company_list as $row): ?>


<aside class="main-sidebar">


            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url(); ?><?= $row->club_image1 ?>" class="img-polaroid"
                             width="400" height="300"/>
                    </div>
                    <div class="pull-left info">
                        <p><?= $row->club_name ?></p>
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



                        <a href="#"><span class="glyphicon glyphicon-edit">&nbsp;Update</span></a>
                        <ul class="treeview-menu">
                            <li class="active"><a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/update_basic_info') ?>>Basic Info</a></li>
                            <li class="active"><a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/update_services') ?>>Services</a></li>

                            <li class="active"><a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/update_room_prices') ?>>Days</a></li>

                            <li class="active"><a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/update_available_room_types') ?>>Available Seat Types</a></li>
                            <li class="active"><a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/update_available_food_items') ?>>Food Items</a></li>
                            <li class="active"><a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/update_available_drink_items') ?>>Drink Items</a></li>


                        </ul>
                    </li>
                    <li>  <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/get_images') ?>><span class="glyphicon glyphicon-picture">&nbsp;Pictures</span></a></li>

                    <li class="treeview">
                        <a href="#"><span class="glyphicon glyphicon-bed">&nbsp;Reservations</span></a>
                        <ul class="treeview-menu">
                            <li> <a xlass="hidden" href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/reservation_enquiries/' . $row->club_id) ?>>Reservation Enquiries</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/reservation_pending/' . $row->club_id) ?>>Pending Payment</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/reservation_canceled/' . $row->club_id) ?>>Canceled</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/reservation_approved/' . $row->club_id) ?>>Approved</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/reservation_completed/' . $row->club_id) ?>>Completed</a></li>
                        </ul>
                    </li>
                    <li>  <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/events') ?>><span class="glyphicon glyphicon-calendar">&nbsp;Events</span></a></li>
                    <li>  <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/rooms') ?>><span class="glyphicon glyphicon-align-justify">&nbsp;Seats</span></a></li>

                    <li>  <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/message') ?>><span class="glyphicon glyphicon-envelope">&nbsp;Message</span></a></li>

                    <li>  <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/support') ?>><span class="glyphicon glyphicon-header">&nbsp;Support</span></a></li>

                    <li>  <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/settings') ?>><span class="glyphicon glyphicon-wrench">&nbsp;Settings</span></a></li>

                    <li>  <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/get_client_contents') ?>><span class="glyphicon glyphicon-home">&nbsp;Home</span></a></li>
                    <li>  <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/general') ?>><span class="glyphicon glyphicon-piggy-bank">&nbsp;General</span></a></li>

                    <li> <a href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/logout') ?>><span class="glyphicon glyphicon-off">&nbsp;Logout</span></a></li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>



    <?php endforeach; ?>

<?php endif; ?>