


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
                            <h3 class="box-title">Seat Information</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover table-responsive">

                                <thead>
                                <tr>
                                    <th>Total Free Seats</th>
                                    <th>Free VIP Seats</th>
                                    <th>Free Class 1 Roms</th>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $row->free_seats ?> </td>
                                    <td><?= $row->free_vip_seats ?>
                                    <td><?= $row->free_c1_seats ?></td>


                                </tr>
                                </tbody>




                                <thead>
                                <tr>
                                    <th>Free Class 2 Seats</th>
                                    <th>Free Normal Seats</th>
                                    <th>Available Seat Types</th>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $row->free_c2_seats ?> </td>
                                    <td><?= $row->free_c3_seats ?></td>
                                    <td><?= $row->seat_type ?></td>


                                </tr>
                                </tbody>


                            </table>


                            <div class="box-header">

                                <a
                                    class="btn btn-info  btn-flat pull-right" id="visit"
                                    href=<?php echo site_url('hag20637210001nikki5621001101basepath33cac/update_room_info/' . $row->club_id) ?>>Update<span
                                        class="icon-chevron-right pull-left"></span></a>

                               

                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- /.content -->

        </section>

    <?php endforeach; ?>

<?php endif; ?>