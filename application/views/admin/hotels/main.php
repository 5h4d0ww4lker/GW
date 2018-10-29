<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $row->hotel_name ?>
            <small>Wellcome to your Admin Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">


                  <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Baic Info</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">


                                <a href=<?php echo site_url('hag22673627bet8001niki1base5621ac/update_basic_info') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>

                            </ul>
                        </div>
                    </div>
                    <div class="box-body">


                        <table class="table table-bordered table-striped">
                            <tr>

                                <th>Service Type</th>
                                <th>Content</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                            <tr>

                                <td id="bkb">Phone</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_phone_mobile ?>/<?= $row->hotel_phone_mobile ?>



                                    </h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>


                            <tr>

                                <td id="bkb">City</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_city ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Location</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_location ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Direction</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_direction ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                             <tr>

                                <td id="bkb">Email</td>
                                <td id="bkc">
                                    <h5>   <h6><?= $row->hotel_email ?></h6></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                           <!--   <tr>

                                <td id="bkc"><span class="label label-primary">Website</span></td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_web_siie ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr> -->

                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                  <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Room Services</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag22673627bet8001niki1base5621ac/update_room_services') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>



                            </ul>
                        </div>
                    </div>
                    <div class="box-body">


                        <table class="table table-bordered table-striped">
                            <tr>

                                <th>Service Type</th>
                                <th>Content</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                            <tr>

                                <td id="bkb">Wi-Fi</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_wifi ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Satelite Tv</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_satelite_tv ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Hair Drier</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_hair_drier ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Air Conditioner</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_ac ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>

                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->

                  <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Available Room Types</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag22673627bet8001niki1base5621ac/update_available_room_types') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>


                            </ul>
                        </div>
                    </div>
                    <div class="box-body">


                        <table class="table table-bordered table-striped">
                            <tr>

                                <th>Room Type</th>
                                <th>Content</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                            <tr>

                                <td id="bkb">Suit Room</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_suit_room ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Single Room</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_single_room ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Twin Room</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_twin_room ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Presidential Suit</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_presidential_suit ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                        </table>

                    </div>
                    <!-- /.box-body -->

                </div>





                <!-- /.box -->
            </div>
            <!-- /.col -->


            <div class="col-md-6">


                  <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Services</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag22673627bet8001niki1base5621ac/update_services') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>


                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered table-striped">
                            <tr>

                                <th>Service Type</th>
                                <th>Content</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                            <tr>

                                <td id="bkb">Parking</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_parking ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Swimming Pool</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_swimming_pool ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">For Children</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_children_play_ground ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Conference Room</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_conference_room ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
                  <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Room Prices</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag22673627bet8001niki1base5621ac/update_room_prices') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>

                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered table-striped">
                            <tr>

                                <th>Room Type</th>
                                <th>Price</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                            <tr>

                                <td id="bkb">Suit Room</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_suit_room_price ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Twin Room</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_twin_room_price ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Single Room</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_single_room_price ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Presidential Suit</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_presidential_suit_price ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                        </table>

                    </div>
                    <!-- /.box-body -->

                </div>


                  <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Available Food Items</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag22673627bet8001niki1base5621ac/update_available_food_items') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>


                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered table-striped">
                            <tr>

                                <th>Food Item</th>
                                <th>Content</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                            <tr>

                                <td id="bkb">Fast Food</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_fast_food ?></span></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Local Food</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_local_food ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Burger & Pizza</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_burger_and_pizza ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Modern Food</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_modern_food ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Available Drink Items</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag22673627bet8001niki1base5621ac/update_available_drink_items') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>


                            </ul>
                        </div>
                    </div>
                    <div class="box-body">


                        <table class="table table-bordered table-striped">
                            <tr>

                                <th>Drink Item</th>
                                <th>Content</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                            <tr>

                                <td id="bkb">Beer and Alcohol</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_beer_and_alcohol ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Hot Drinks</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_hot_drinks ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Local Drinks</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_local_drinks ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Soft Drinks</td>
                                <td id="bkc">
                                    <h5>   <?= $row->hotel_soft_drinks ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>



                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->



    </section>
    <!-- /.content -->
</div>

    <?php endforeach; ?>

<?php endif; ?>