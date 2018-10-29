<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $row->guest_house_name ?>
            <small>Wellcome to your Admin Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="Visible">Simple</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-11">


                <div class="box box-primary ">
                    <div class="box-header">
                        <h3 class="box-title">Available Room Types</h3>

                        <div class="box-tools">
                            <ul class="pagination pagination-sm no-margin pull-right">



                            </ul>
                        </div>
                    </div>
                     <form method="post"
                                      action="<?php echo base_url('index.php/hag700021672362217nikki53600228basep12873gac/update_rav') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->guest_house_id ?> "  name="guest_house_id">

                                        <label>Suit Room</label>
                                        <input class="form-control"
                                        type="text"
                                        value="<?= $row->guest_house_suit_room ?>"
                                        name="guest_house_suit_room1"
                                        required="required"
                                        maxlength="1000">

                                        <label>Single Room</label>
                                        <input class="form-control"
                                        type="text"
                                         value=" <?= $row->guest_house_single_room ?>"
                                         name="guest_house_single_room1"
                                         required="required"
                                         maxlength="1000">

                                         <label>Twin Room</label>
                                        <input class="form-control"
                                        type="text" placeholder="City"
                                        name="guest_house_twin_room1"
                                        value=" <?= $row->guest_house_twin_room ?>"
                                        required="required"
                                        maxlength="1000">

                                               <label>Presidential Suit</label>
                                        <input class="form-control"
                                         type="text"
                                         placeholder="Location"
                                         name="guest_house_presidential_suit1"
                                         value=" <?= $row->guest_house_presidential_suit ?>"
                                         required="required"
                                         maxlength="1000">
<br/>

                                        <div class="box-footer">
                                              <button type="submit" class="btn btn-success pull-right btn-md flat"><span class="glyphicon glyphicon-save">Save</span> </button>
                                        </div>
                                </form>              </div>
                    <!-- /.box-body -->

                </div>




                <!-- /.box -->
            </div>
            <!-- /.col -->


        </div>
        <!-- /.row -->


                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

    <?php endforeach; ?>

<?php endif; ?>