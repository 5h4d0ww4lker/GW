<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $row->resort_name ?>
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
                                      action="<?php echo base_url('index.php/hag70178731nikki5362045182basepath66321097reac/update_rav') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->resort_id ?> "  name="resort_id">

                                        <label>Suit Room</label>
                                        <input class="form-control"
                                        type="text"
                                        value="<?= $row->resort_suit_room ?>"
                                        name="resort_suit_room1"
                                        required="required"
                                        maxlength="1000">

                                        <label>Single Room</label>
                                        <input class="form-control"
                                        type="text"
                                         value=" <?= $row->resort_single_room ?>"
                                         name="resort_single_room1"
                                         required="required"
                                         maxlength="1000">

                                         <label>Twin Room</label>
                                        <input class="form-control"
                                        type="text" placeholder="City"
                                        name="resort_twin_room1"
                                        value=" <?= $row->resort_twin_room ?>"
                                        required="required"
                                        maxlength="1000">

                                               <label>Presidential Suit</label>
                                        <input class="form-control"
                                         type="text"
                                         placeholder="Location"
                                         name="resort_presidential_suit1"
                                         value=" <?= $row->resort_presidential_suit ?>"
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