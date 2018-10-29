<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bookings</a></li>
            <li class="active">Booking More</li>
        </ol>
    </section>

    <?php if ($book): ?>

    <?php foreach ($book as $row): ?>


    <div class="pad margin no-print">
        <div class="" style="margin-bottom: 0!important;">
            <a
                class="btn btn-success bg-light-blue-active btn-flat" id="visit"
                href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/update_booking_status/' . $row->booking_id) ?>><span class="glyphicon glyphicon-edit"></span>&nbsp;Change Status</a></a>

        </div>
    </div>




    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">

                    <i class="fa fa-globe"></i> Booking Request
                    <small class="pull-right"><b>Date:</b><?= $row->time ?></small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->





        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong><?= $row->f_name ?>&nbsp;<?= $row->l_name ?></strong>
                    Phone: <?= $row->phone ?><br/>
                    Email: <?= $row->email ?>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong><?= $row->resort_name ?></strong><br>
                    Phone: <?= $row->resort_phone_mobile ?><br/>
                    Email: <?= $row->resort_email ?><br/>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">

                <b>Enquiry ID:</b> <td><?= $row->booking_id?></td><br/>
                <b>Payment Due:</b> <?= $row->payment_due?><br/>

            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No Of Rooms</th>
                        <th>Room Type</th>
                        <th>Number Of Adults</th>
                        <th>Number Of Children</th>
                        <th>Arrival Date</th>
                        <th>Leave Date</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $row->no_of_rooms ?></td>
                        <td><?= $row->room_type ?></td>
                        <td><?= $row->no_of_adults?></td>
                        <td><?= $row->no_of_children?></td>
                        <td><?= $row->arrival_date ?></td>
                        <td><?= $row->leaving_date?></td>


                    </tr>


                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Payment Methods:</p>
                <td><?= $row->payement_mtd?></td>

            </div><!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Payment Due <?= $row->payment_due?></p>
                <p class="lead">Status:<h5><?= $row->status?></h5></p>

            </div><!-- /.col -->
        </div><!-- /.row -->
            <?php endforeach; ?>

        <?php endif; ?>
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/prints/' . $row->booking_id) ?> target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                </div>
        </div>
    </section><!-- /.content -->
    <div class="clearfix"></div>
</div><!-- /.content-wrapper -->