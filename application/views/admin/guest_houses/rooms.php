


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small>Wellcome to your Admin Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="Visible">Simple</li>
        </ol>
    </section>

    <?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">


                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Room Information</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover table-responsive">

                                <thead>
                                <tr>
                                    <th>Total Free Rooms</th>
                                    <th>Free Single Rooms</th>
                                    <th>Free Suit Roms</th>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $row->free_room ?> </td>
                                    <td><?= $row->free_single_rooms ?>
                                    <td><?= $row->free_suit_rooms ?></td>


                                </tr>
                                </tbody>




                                <thead>
                                <tr>
                                    <th>Free Twin Rooms</th>
                                    <th>Free Presidential Suit</th>
                                    <th>Available Room Types</th>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $row->free_twin_room ?> </td>
                                    <td><?= $row->free_presidential_suit ?></td>
                                    <td><?= $row->available_room_types ?></td>


                                </tr>
                                </tbody>


                            </table>


                            <div class="box-header">

                                <a
                                    class="btn btn-info  btn-flat pull-right" id="visit"
                                    href=<?php echo site_url('hag700021672362217nikki53600228basep12873gac/update_room_info/' . $row->guest_house_id) ?>>Update<span
                                        class="icon-chevron-right pull-left"></span></a>

                               

                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- /.content -->

        </section>

    <?php endforeach; ?>

<?php endif; ?>