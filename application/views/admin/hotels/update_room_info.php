


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
                            <h3 class="box-title">Update Room Information</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form method="post"
                                  action="<?php echo base_url('index.php/hag22673627bet8001niki1base5621ac/update_ri') ?>">
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
                                    <input class="hidden" type="hidden" value=" <?= $row->hotel_id ?> "  name="hotel_id">
                                    <td> <input class="form-control" type="text"  name="free_room1" value=" <?= $row->free_room ?>" maxlength="2"> </td>
                                    <td> <input class="form-control" type="text" value=" <?= $row->free_single_rooms ?> " name="free_single_rooms1" maxlength="2"> </td>
                                    <td> <input class="form-control" type="text" value="  <?= $row->free_suit_rooms ?> " name="free_suit_rooms1" maxlength="2" ></td>


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
                                    <td> <input class="form-control" type="text" value=" <?= $row->free_twin_room ?> " name="free_twin_room1" maxlength=""> </td>
                                    <td> <input class="form-control" type="text" value=" <?= $row->free_presidential_suit ?>  "  name="free_presidential_suit1" placeholder="<?= $row->free_presidential_suit ?>" maxlength="2"></td>
                                    <td> <input class="form-control" type="text" value=" <?= $row->available_room_types ?> "  name="available_room_types1" maxlength="100" required="required"> </td>


                                </tr>
                                </tbody>


                            </table>




                            <div class="box-header">

                                <button type="submit" class="btn btn-success pull-right btn-md flat"><span class="glyphicon glyphicon-save">Save</span> </button>




                            </div>
                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- /.content -->

        </section>

    <?php endforeach; ?>

<?php endif; ?>