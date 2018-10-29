
<form method="post"
      action="<?php echo base_url('index.php/hotels/add_book') ?>">


    <input type="hidden"
           class="hidden"
           id="company_name"
           name="hotel_name"
           value="<?= $row->hotel_name ?>">

    <input type="hidden"
           class="hidden"
           id="company_name"
           name="hotel_location"
           value="<?= $row->hotel_location ?>">

    <input type="hidden"
           class="hidden"
           id="company_name"
           name="hotel_direction"
           value="<?= $row->hotel_direction ?>">

    <input type="hidden"
           class="hidden"
           id="company_name"
           name="hotel_phone_mobile"
           value="<?= $row->hotel_phone_mobile ?>">
    <input type="hidden"
           class="hidden"
           id="company_name"
           name="hotel_email"
           value="<?= $row->hotel_email ?>">



    <input type="hidden"
           class="hidden"
           id="company_name"
           name="status"
           value="Request">
    <input type="hidden"
           class="hidden"
           id="hotel_id"
           name="hotel_id"
           value="<?= $row->hotel_id ?>">


    <label id="lmn">First
        Name</label>
    <input type="text"
           class="form-control"
           id="format"
           name="f_name"
           size="10"
           required="required"
    placeholder="First Name">
    <label id="lmn">Last Name</label>
    <input type="text"
           class="form-control input-lg"
           id="format"
           name="l_name"
           placeholder="Last Name"
           maxlength="15"
           required="required">
    <label id="lmn">Phone</label>
    <input type="tel"
           maxlength="10"
           min="10"
           class="form-control"
           id="format"
           name="phone"
           size="10"
           placeholder="phone" required="required">
    <label id="lmn">Email</label>
    <input type="email"
           class="form-control input-sm"
           id="format"
           name="email"
           placeholder="Email" required="required">
    <label id="lmn">Arrival
        Date</label>
    <input type="date"
           class="form-control input-sm"
           id="format"
           name="arrival_date"
           placeholder="Arrival Date" required="required">
    <label id="lmn">Leaving
        Date</label>
    <input type="date"
           class="form-control input-sm"
           id="format"
           name="leaving_date"
           placeholder="Leaving Date" required="required">
    <label id="lmn">Room Type</label>
    <div class="form-group">

        <select class="form-control" name="room_type" id="format" required="required">
            <option>Single</option>
            <option>Suit Room</option>
            <option>Twin Room</option>
            <option>Presidential Suit</option>
            <option>Not Listed</option>
        </select>
    </div>


    <label id="lmn">No of
        Rooms</label>
    <input type="number"
           class="form-control input-sm"
           maxlength="2"
           id="format"
           name="no_of_rooms"
           placeholder="No of Rooms" required="required">

    <label id="lmn">Payment
        Method</label>
    <div class="form-group">

        <select class="form-control" name="payement_mtd" id="format" required="required">
            <option>Cash</option>
            <option>Bank Transfer</option>
            <option>Mobile Transfer</option>
            <option>Pay By Agent</option>
            <option>Check</option>
            <option>Other</option>
        </select>
    </div>

    * Payment Must be delivered before 24 hours of arrival.

    <label id="lmn">I will Deliver Payment Till</label>
    <input type="date"
           class="form-control input-sm"
           id="format"
           name="payment_due"
           placeholder="Payment Due" required="required">



    <br/>




    <button type="submit" class="btn btn-success  btn-md flat" bg-olive-active><span class="glyphicon glyphicon-save"></span> Book Now</button>
</form>