<?php if ($club_detail): ?>
<?php foreach ($club_detail as $row): ?>




<div class="row-fluid breadcrumbs margin-bottom-40">
    <div class="container">
        <div class="span4">
            <h2> <?= $row->club_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class=" icon-star"></i><?= $row->club_class ?></h2>
        </div>
        <div class="span8">
            <ul class="pull-right breadcrumb">
                <li>  <a href=<?php echo site_url('clubs/reservation/' . $row->club_id) ?> class="btn green">Reserve  Now <i class="m-icon-swapright m-icon-white"></i></a></li>
                



            </ul>
        </div>
    </div>
</div>

    <?php endforeach; ?>

<?php endif; ?>