<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Settings</a></li>
            <li class="active">Main</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <?php if ($company_list): ?>

                    <?php foreach ($company_list as $row): ?>
                    <i class="fa fa-globe"></i> General Settings Page

                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->





        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

                <address>
                  <label id="lmn">Star Level:</label> <strong><?= $row->star_level ?></strong> <li class="active"><a href=<?php echo site_url('hag700021672362217nikki53600228basep12873gac/update_star_level') ?>>Change</a></li><br/>
                    <label id="lmn">Password:</label> <strong><?= $row->password ?></strong> <li class="active"><a href=<?php echo site_url('hag700021672362217nikki53600228basep12873gac/change_password') ?>>Change</a></li><br/>
                    <label id="lmn">Activation Status:</label><strong> <?= $row->activation_status ?></strong> <li class="active"><a href=<?php echo site_url('hag700021672362217nikki53600228basep12873gac/update_activation_status') ?>>Change</a></li><br/>

                    <label id="lmn">Food Status:</label><strong> <?= $row->food_status ?></strong> <li class="active"><a href=<?php echo site_url('hag700021672362217nikki53600228basep12873gac/update_food_status') ?>>Change</a></li><br/>


                </address>
            </div><!-- /.col -->


        </div><!-- /.row -->


        <?php endforeach; ?>

        <?php endif; ?>
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
    </section><!-- /.content -->
    <div class="clearfix"></div>
</div><!-- /.content-wrapper -->