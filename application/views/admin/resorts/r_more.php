<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">requests</a></li>
            <li class="active">request More</li>
        </ol>
    </section>

    <?php if ($request): ?>

    <?php foreach ($request as $row): ?>


    <div class="pad margin no-print">
        <div class="" style="margin-bottom: 0!important;">
            <a
                class="btn btn-success bg-light-blue-active btn-flat" id="visit"
                href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/update_request_status/' . $row->request_id) ?>><span class="glyphicon glyphicon-edit"></span>&nbsp;Change Status</a></a>

        </div>
    </div>




    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">

                    <i class="fa fa-globe"></i>Request
                    <small class="pull-right"><b>Date:</b><?= $row->time ?></small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->





        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong><?= $row->f_name ?></strong><br/>
                    <strong>Phone: </strong><?= $row->phone ?><br/>
                        <strong>Email: </strong><?= $row->email ?>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong><?= $row->resort_name ?></strong><br>
                    <strong> Phone:</strong> <?= $row->resort_phone_mobile ?><br/>
                        <strong>Email: </strong><?= $row->resort_email ?><br/>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">

                <b>Request ID:</b> <td><?= $row->request_id?></td><br/>


            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <strong>Request Type:</strong><?= $row->question_type?><br/>
                        <strong>Content:</strong><?= $row->content?>


                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->

            <div class="col-xs-6">

                <p class="lead">Status:<h5><?= $row->status?></h5></p>

            </div><!-- /.col -->
        </div><!-- /.row -->
        <?php endforeach; ?>

        <?php endif; ?>
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/printrs/' . $row->request_id) ?> target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
    </section><!-- /.content -->
    <div class="clearfix"></div>
</div><!-- /.content-wrapper -->