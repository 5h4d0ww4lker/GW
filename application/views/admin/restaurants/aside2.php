<?php if ($book): ?>

    <?php foreach ($book as $row): ?>


        <aside class="main-sidebar">


            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url(); ?><?= $row->hotel_name ?>" class="img-polaroid"
                             width="400" height="300"/>
                    </div>
                    <div class="pull-left info">
                        <p><?= $row->hotel_name ?></p>
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
                            <li class="active"><a href=<?php echo site_url('admin_controller/update_basic_info') ?>>Basic Info</a></li>
                            <li class="active"><a href=<?php echo site_url('admin_controller/update_services') ?>>Services</a></li>
                            <li class="active"><a href=<?php echo site_url('admin_controller/update_room_services') ?>>Room Services</a></li>
                            <li class="active"><a href=<?php echo site_url('admin_controller/update_room_prices') ?>>Room Prices</a></li>
                            <li class="active"><a href=<?php echo site_url('admin_controller/update_available_room_types') ?>>Available room Types</a></li>
                            <li class="active"><a href=<?php echo site_url('admin_controller/update_available_food_items') ?>>Food Items</a></li>
                            <li class="active"><a href=<?php echo site_url('admin_controller/update_available_drink_items') ?>>Drink Items</a></li>

                            <li><a href="#"><span class="fa-downloadP"></span>Pictures</a></li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#"><span class="glyphicon glyphicon-bed">&nbsp;Reservations</span></a>
                        <ul class="treeview-menu">
                            <li> <a xlass="hidden" href=<?php echo site_url('admin_controller/booking_enquiries/' . $row->hotel_id) ?>>Reservation Enquiries</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('admin_controller/booking_enquiries/' . $row->hotel_id) ?>>Pending Payment</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('admin_controller/booking_enquiries/' . $row->hotel_id) ?>>Canceled</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('admin_controller/booking_enquiries/' . $row->hotel_id) ?>>Approved</a></li>
                            <li> <a xlass="hidden" href=<?php echo site_url('admin_controller/booking_enquiries/' . $row->hotel_id) ?>>Completed</a></li>
                        </ul>
                    </li>


                    <li><a href="#"><span class="glyphicon glyphicon-question-sign">&nbsp;Customer Requests</span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-header">&nbsp;Support</span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-wrench">&nbsp;Settings</span></a></li>
                    <li> <a href=<?php echo site_url('admin_controller/logout') ?>><span class="glyphicon glyphicon-off">&nbsp;Logout</span></a></li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>



    <?php endforeach; ?>

<?php endif; ?>