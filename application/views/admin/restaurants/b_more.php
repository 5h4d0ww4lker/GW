<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Reservations</a></li>
            <li class="active">Reservation More</li>
        </ol>
    </section>

    <?php if ($book): ?>

    <?php foreach ($book as $row): ?>


    <div class="pad margin no-print">
        <div class="" style="margin-bottom: 0!important;">
            <a
                class="btn btn-success bg-light-blue-active btn-flat" id="visit"
                href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/update_reservation_status/' . $row->reservation_id) ?>><span class="glyphicon glyphicon-edit"></span>&nbsp;Change Status</a></a>

        </div>
    </div>




    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">

                    <i class="fa fa-globe"></i> Reservation Request
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
                    <strong><?= $row->restaurant_name ?></strong><br>
                    Phone: <?= $row->restaurant_phone_mobile ?><br/>
                    Email: <?= $row->restaurant_email ?><br/>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">

                <b>Enquiry ID:</b> <td><?= $row->reservation_id?></td><br/>


            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>Seat_type</th>
                        <th>Arrival Date</th>
                        <th>Arrival Time</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td><?= $row->seat_type?></td>
                        <td><?= $row->arrival_date ?></td>
                        <td><?= $row->arrival_time?></td>


                    </tr>


                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">


            </div><!-- /.col -->
          >
        </div><!-- /.row -->
            <?php endforeach; ?>

        <?php endif; ?>
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href=<?php echo site_url('hag38926610027834202nikki626basepath645rac/prints/' . $row->reservation_id) ?> target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                </div>
        </div>
    </section><!-- /.content -->
    <div class="clearfix"></div>
</div><!-- /.content-wrapper -->