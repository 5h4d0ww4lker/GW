<?php if ($restaurant_detail): ?>
    <?php foreach ($restaurant_detail as $row): ?>

        <!-- BEGIN CONTAINER -->
        <div class="container min-hight">
            <div class="row-fluid">
                <div class="span9">
                    <h2>You Successfully send A Reservation Request to <?= $row->restaurant_name ?></h2>


                    <ul class="unstyled">
                        Reservatio Will be accepted and Valid If:
                        <li><i class="icon-ok-circle"></i> The Information You Gave above is entirely true, accurate and complete.</li>
                        <li><i class="icon-ok-circle"></i> Payment Is Delivered before 24 hours of arrival time.</li>

                        <li><i class="icon-ok-circle"></i>If Money Is Not delivered as promised  Neither <?= $row->restaurant_name ?> nor 2hagerbet.com will take responsibility for the inconvenience.</li>
                        <li><i class="icon-ok-circle"></i>Sending False enquiries will led to serious accusation and punishable by law.</li>
                        <li><i class="icon-ok-circle"></i>Thanx For Choosing   <?= $row->restaurant_name ?></li>

                    </ul>

                    For More Information Call<br/>
                    <?= $row->restaurant_name ?><br/>
                    <?= $row->restaurant_phone_mobile ?>/<?= $row->restaurant_phone_office ?>



                    <div class="space20"></div>

                </div>

                <div class="span3">
                    <h2>Contacts 2hagerbet.com</h2>
                    <address>
                        <strong>Greenware Team</strong><br>
                        0920469132/0911450088<br>
                        Addiss Ababa, Ethiopia<br>

                    </address>
                    <address>
                        <strong>Email</strong><br>
                        <a href="#">he@2hagerbet.com</a><br>
                        <a href="#">2hagerbet@gmail.com</a>
                    </address>


                </div>
            </div>
        </div>
        <!-- END CONTAINER -->
    <?php endforeach; ?>

<?php endif; ?>

