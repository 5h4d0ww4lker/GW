<?php if ($request): ?>

    <?php foreach ($request as $row): ?>


        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>2hagerbet.com | Print </title>
            <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <!-- Bootstrap 3.3.2 -->
            <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <!-- Font Awesome Icons -->
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <!-- Ionicons -->
            <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
            <!-- Theme style -->
            <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
        </head>
        <body onload="window.print();">
        <div class="wrapper">
            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> Customer Request.
                            <small class="pull-right">Date: <?= $row->time ?></small>
                        </h2>
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong><?= $row->f_name ?></strong>
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

                        <b>Enquiry ID:</b> <td><?= $row->request_id?></td><br/>

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
            </section><!-- /.content -->
        </div><!-- ./wrapper -->
        <!-- AdminLTE App -->
        <script src="../../dist/js/app.min.js" type="text/javascript"></script>
        </body>
        </html>

    <?php endforeach; ?>

<?php endif; ?>