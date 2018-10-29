<?php if ($company_list): ?>

<?php foreach ($company_list as $row): ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <?= $row->guest_house_name ?>
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
                        <h3 class="box-title">Enter New Info</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="post"
                          action="<?php echo base_url('index.php/hag700021672362217nikki53600228basep12873gac/update_bi') ?>">
                        <div class="box-body">

                            <input class="hidden" type="hidden" value=" <?= $row->guest_house_id ?> "  name="guest_house_id">
                            <br/>

                            <input class="form-control" type="text" value=" <?= $row->guest_house_phone_mobile ?> /  <?= $row->guest_house_phone_office ?>" placeholder=" <?= $row->guest_house_name ?>" name="guest_house_phone_mobile1">
                            <br/>
                            <input class="form-control" type="text" placeholder="City" name="guest_house_city1" value=" <?= $row->guest_house_city ?>">
                            <br/>
                            <input class="form-control" type="text" placeholder="Location" name="guest_house_location1" value=" <?= $row->guest_house_location ?>">
                            <br/>
                            <input class="form-control" type="text" placeholder="Direction" name="guest_house_direction1" value=" <?= $row->guest_house_direction ?>">
                            <br/>
                            <input class="form-control" type="text" placeholder="Email" name="guest_house_email1" value=" <?= $row->guest_house_email ?>">
                            <br/>
                            <input class="form-control" type="text" placeholder="Website" name="guest_house_web_site1" value=" <?= $row->guest_house_web_site ?>">
                            <br/>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Done</button>
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