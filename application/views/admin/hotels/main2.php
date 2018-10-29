<?php if ($company_list): ?>

<?php foreach ($company_list as $row): ?>






<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $row->hotel_name ?>
            <small>Wellcome to your Admin Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">





<div class="row">
    <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3>150</h3>
                <p>Booking Enquiries</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a class="small-box-footer" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/booking_enquiries/' . $row->hotel_id) ?>>More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Customer Requests</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a class="small-box-footer" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/events') ?>>More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-light-blue">
            <div class="inner">
                <h3>44</h3>
                <p>Messages</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a class="small-box-footer" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/message') ?>>More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-lime">
            <div class="inner">
                <h3>65</h3>
                <p>Events</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a class="small-box-footer" href=<?php echo site_url('hag22673627bet8001niki1base5621ac/events') ?>>More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

             </section>
    </div>
    <?php endforeach; ?>

<?php endif; ?>