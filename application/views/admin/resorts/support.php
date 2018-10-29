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
                    <li><a href="#">Support</a></li>

                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Support Request</h3>

                            </div>
                            <div class="box-body">

                                <form method="post"
                                      action="<?php echo base_url('index.php/hag70178731nikki5362045182basepath66321097reac/add_support') ?>">
                                    <div class="box-body">

                                        <input class="hidden" type="hidden" value=" <?= $row->resort_id ?> "  name="resort_id">


                                         <label>Support type</label>

                                            <div class="form-group">
                                                <select class="form-control" name="support_type">
                                                    <option>Question</option>
                                                    <option>Update</option>
                                                    <option>Payment Details</option>
                                                    <option>Error</option>
                                                    <option>Other</option>

                                                </select>
                                            </div>

                                  <label>Content</label><br/>
                                    <textarea name="content" id="supp">

                                        </textarea>

                                        <br/>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success pull-right btn-md flat"><span class="glyphicon glyphicon-save">Save</span> </button>
                                        </div>
                                </form>
                            </div>

                            <!-- /.box-body -->

                        </div></div>

                        <!-- /.box -->





                        <!-- /.box -->
                    </div>
                    <!-- /.col -->


                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <div class="row">

                </div>
            </section>
            <!-- /.content -->
        </div>

    <?php endforeach; ?>

<?php endif; ?>