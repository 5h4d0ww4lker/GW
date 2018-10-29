 <!-- Main content -->
        <section class="content">
          <div class="row">
  <div class="col-xs-2">

  </div>



            <div class="col-xs-10">
             
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hotels List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>H.Id</th>
                        <th>Hotel Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php if ($company_list): ?>

                    <?php foreach ($company_list as $row): ?>
                      <tr>
                         <h6>  <td><?= $row->hotel_id ?></td></h6>
                      <h6>  <td><?= $row->hotel_name ?></td></h6>
                        <h6><td><?= $row->hotel_phone_mobile ?></td></h6>
                        <h6><td><?= $row->hotel_location ?></td></h6>
                        <h6><td> <?= $row->hotel_email ?></td></h6>
                        <td>  <a
                                        class="btn btn-success bg-red-active btn-flat pull-right" id="visit"
                                        href=<?php echo site_url('hag22673627bet8001niki1base5621ac/delete_hotel/' . $row->hotel_id) ?>><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>

                              <a
                                        class="btn btn-success bg-olive btn-flat" id="visit"
                                        href=<?php echo site_url('hag22673627bet8001niki1base5621ac/get_more/' . $row->hotel_id) ?>><span class="glyphicon glyphicon-list"></span>&nbsp;More</a>

</td>
                      </tr>


                        <?php endforeach; ?>

                <?php endif; ?>
                  </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->