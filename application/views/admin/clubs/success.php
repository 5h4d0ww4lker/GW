<?php if ($company_list): ?>

    <?php foreach ($company_list as $row): ?>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $row->club_name ?>
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
                    <div class="col-md-12">


                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Success</h3>

                            </div>
                            <div class="box-body">

                            You Successfully sent a support request to 2hagerbet.com web master.
                         Support Request Will be accepted and Answered If:
                    <ol>
                        <li>The Information You Gave above is entirely true, accurate and complete.</li>
                         <li>If U do not get answer within 24 hours call @ 0920930598, 2hagerbet.com web master</li>

                        <li>Thanx For Choosing <b>2hagerbet.com</b> .</li>
                        <ol>


                </div>


                <div class="span4">
                   <b> Email</b><br/>

                   he@2hagerbet.com


                </div>



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