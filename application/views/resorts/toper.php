<?php if ($resort_detail): ?>
<?php foreach ($resort_detail as $row): ?>




<div class="row-fluid breadcrumbs margin-bottom-40">
    <div class="container">
        <div class="span4">
            <h2> <?= $row->resort_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class=" icon-star"></i><?= $row->star_level ?></h2>
        </div>
        <div class="span8">
            <ul class="pull-right breadcrumb">
                <li>  <a href=<?php echo site_url('resorts/booking/' . $row->resort_id) ?> class="btn green">Book Now <i class="m-icon-swapright m-icon-white"></i></a></li>
                <li>  <a href=<?php echo site_url('resorts/contact/' . $row->resort_id) ?> class="btn yellow">View Services <i class="icon-chevron-right"></i></a></li>



            </ul>
        </div>
    </div>
</div>

    <?php endforeach; ?>

<?php endif; ?>