<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $row->restaurant_name ?>
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


                                <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/update_basic_info') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>

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
                                    <h5>   <?= $row->restaurant_phone_mobile ?>/<?= $row->restaurant_phone_mobile ?>



                                    </h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>


                            <tr>

                                <td id="bkb">City</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_city ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Location</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_location ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Direction</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_direction ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                             <tr>

                                <td id="bkb">Email</td>
                                <td id="bkc">
                                    <h5>   <h6><?= $row->restaurant_email ?></h6></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                           <!--   <tr>

                                <td id="bkc"><span class="label label-primary">Website</span></td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_web_siie ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr> -->

                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                  <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Services</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/update_room_services') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>



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
                                    <h5>   <?= $row->wifi ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">DSTV</td>
                                <td id="bkc">
                                    <h5>   <?= $row->dstv ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Parking</td>
                                <td id="bkc">
                                    <h5>   <?= $row->parking ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Pool</td>
                                <td id="bkc">
                                    <h5>   <?= $row->pool ?></h5>
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
                        <h3 class="box-title">Available Seat Types</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/update_available_room_types') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>


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

                                <td id="bkb">VIP Seat</td>
                                <td id="bkc">
                                    <h5>   <?= $row->vip_seat_dis ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Class 1 Seat</td>
                                <td id="bkc">
                                    <h5>   <?= $row->class1_seat_dis ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Class 2 Seat</td>
                                <td id="bkc">
                                    <h5>   <?= $row->class2_seat_dis ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Normal Seat</td>
                                <td id="bkc">
                                    <h5>   <?= $row->normal_seat_dis ?></h5>
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



                <!-- /.box -->
                  <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Menu</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">

                                <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/update_room_prices') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>

                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered table-striped">
                            <tr>

                                <th>Food Item</th>
                                <th>Price</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                            <tr>

                                <td id="bkb"><?= $row->fi1 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi1p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi2 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi2p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi3 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi3p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi4 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi4p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi5 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi5p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi6 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi6p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi7 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi7p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi8 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi8p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi9 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi9p ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>
                                <td id="bkb"><?= $row->fi10 ?></td>
                                <td id="bkc">
                                    <h5>   <?= $row->fi10p ?></h5>
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

                                <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/update_available_food_items') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>


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
                                    <h5>   <?= $row->restaurant_fast_food ?></span></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Local Food</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_local_food ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Burger & Pizza</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_burger_and_pizza ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Modern Food</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_modern_food ?></h5>
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

                                <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/update_available_drink_items') ?> class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Update</a>


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
                                    <h5>   <?= $row->restaurant_beer_and_alcohol ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Hot Drinks</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_hot_drinks ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Local Drinks</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_local_drinks ?></h5>
                                </td>
                                <td id="bkc"><span class="badge bg-green">Visible</span></td>
                            </tr>
                            <tr>

                                <td id="bkb">Soft Drinks</td>
                                <td id="bkc">
                                    <h5>   <?= $row->restaurant_soft_drinks ?></h5>
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