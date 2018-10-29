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
                    <li><a href="#">Tables</a></li>
                    <li class="Visible">Simple</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Normal Foods</h3>

                            </div>
                            <div class="box-body">


                                <form method="post"
                                      action="<?php echo base_url('index.php/hag38926610027834202nikki626basepath645rac/update_rp') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->restaurant_id ?> "  name="restaurant_id">


                                        <label>Food Item 1</label>
                                        <input class="form-control" type="text" value="<?= $row->fi1?>" name="fi11" maxlength="20">



                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi1p?>" name="fi1p1" maxlength="20">





                                          <label>Food Item 2</label>
                                        <input class="form-control" type="text" value="<?= $row->fi2?>" name="fi21" maxlength="20">


                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi2p?>" name="fi2p1" maxlength="20">


                                          <label>Food Item 3</label>
                                        <input class="form-control" type="text" value="<?= $row->fi3?>" name="fi31" maxlength="20">

                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi3p?>" name="fi3p1" maxlength="20">


                                          <label>Food Item 4</label>
                                        <input class="form-control" type="text" value="<?= $row->fi4?>" name="fi41" maxlength="20">


                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi4p?>" name="fi4p1" maxlength="20">

                                          <label>Food Item 5</label>
                                        <input class="form-control" type="text" value="<?= $row->fi5?>"  name="fi51" maxlength="20">

                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi5p?>" name="fi5p1" maxlength="20">

                            </div>

                            <!-- /.box-body -->

                        </div></div>





                        <!-- /.box -->
                    </div>
                    <!-- /.col -->


                    <div class="col-md-6">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Additional Foods</h3>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                <table class="table table-bordered table-striped">


                                        <label>Food Item 6</label>
                                        <input class="form-control" type="text" value="<?= $row->fi6?>" name="fi61" maxlength="20">

                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi6p?>" name="fi6p1" maxlength="20">


  <label>Food Item 7</label>
                                        <input class="form-control" type="text" value="<?= $row->fi7?>"  name="fi71" maxlength="20">

                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi7p?>" name="fi7p1" maxlength="20">



  <label>Food Item 8</label>
                                        <input class="form-control" type="text" value="<?= $row->fi8?>" name="fi81" maxlength="20">

                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi8p?>" name="fi8p1" maxlength="20">



  <label>Food Item 9</label>
                                        <input class="form-control" type="text" value="<?= $row->fi9?>" name="fi91" maxlength="20">

                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi9p?>" name="fi9p1" maxlength="20">


  <label>Food Item 10</label>
                                        <input class="form-control" type="text" value="<?= $row->fi10?>" name="fi101" maxlength="20">

                                          <label>Price</label>
                                        <input class="form-control" type="text" value="<?= $row->fi10p?>" name="fi10p1" maxlength="20">


                                        <br/>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success pull-right btn-md flat"><span class="glyphicon glyphicon-save">Save</span> </button>

                                        </div>


                                </table>
                                </form>
                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->




                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>

    <?php endforeach; ?>

<?php endif; ?>





















