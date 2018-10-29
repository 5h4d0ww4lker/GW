<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>

                    <?= $row->restaurant_name ?>
                    <small> Update Basic Info</small>

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">General Elements</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Upload New Pictures</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <?php echo form_open_multipart('hag38926610027834202nikki626basepath645rac/do_upload10');?>
                            <div class="box-body">

                                <input class="hidden" type="hidden" value=" <?= $row->restaurant_id ?> "  name="restaurant_id">
                                <br/>

                                <input class="form-control" type="file"  name="userfile">
                                <br/>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info flat btn-sm"><span class="glyphicon glyphicon-upload"></span> Upload</button>
                                </div>
                                </form>
                            </div><!-- /.box -->



                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <!--/.col (right) -->
                    </div>   <!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    <?php endforeach; ?>

<?php endif; ?>