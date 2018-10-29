<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function image_upload($hotel_id, $data)
    {

        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);


        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function check_availablity($hotel_location, $hotel_city, $room_type, $star_level, $free_room, $room_price)
    {

        $this->db->select('*');
        $this->db->from('hotels');
       // $this->db->where('star_level', $star_level);
        $this->db->where('hotel_city', $hotel_city);
        $this->db->where('hotel_location', $hotel_location);

        $this->db->where('rooms_from <<', $room_price);
        $this->db->or_like('available_room_types', $room_type);
        $this->db->where('free_room >>', $free_room);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }








//

//    public function image_upload($hotel_id, $data) {
//
//        $this->db->where('hotel_id', $hotel_id);
//        $this->db->update('hotels', $data);
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function count_hotels_inside_adiss($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->or_like('hotel_location', $hotel_location);
        }
        return $this->db->count_all_results('hotels');
    }




    public function search_hotels_inside_adiss($hotel_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        if ($hotel_location) {
            $this->db->like('hotel_location', $hotel_location);
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function booking_more($booking_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('booking_id', $booking_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }




     public function get_more($hotel_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


       public function get_more_rest($restaurant_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_id', $restaurant_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_more_club($club_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_id', $club_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


     public function get_more_resort($resort_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_id', $resort_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

         public function get_more_guest_house($guest_house_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_id', $guest_house_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }






    public function requests_more($request_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('request_id', $request_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function event_more($event_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }





//    public function count_hotels_inside_adiss($hotel_location = null)
//    {
//
//        if ($hotel_location) {
//            $this->db->or_like('hotel_location', $hotel_location);
//        }
//        return $this->db->count_all_results('hotels');
//    }

    public function count_searched_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'search_term');
            $this->db->where('hotel_city', 'search_term');
            $this->db->where('hotel_name', 'search_term');
        }
        return $this->db->count_all_results('hotels');
        $this->db->where('hotel_location', 'search_term');
        $this->db->where('hotel_city', 'search_term');
        $this->db->where('hotel_name', 'search_term');
    }


    public function count_pending($hotel_id)
    {

        $this->db->from('booking');
        $this->db->where('room_type', 'suit');
//        $this->db->where('room_type', 'suit');
        $this->db->where('hotel_id', $hotel_id);
        $this->db->count_all_results();
    }















//
//function show_content($data){
//$this->db->select('*');
//$this->db->from('hotels');
//$this->db->where('hotel_id', $data);
//$query = $this->db->get();
//$result = $query->result();
//return $result;
//}
//// Update Query For Selected Student
//function update_hotel_content($hotel_id,$data){
//$this->db->where('hotel_id', $hotel_id);
//$this->db->update('hotels', $data);
//}

    function update_bi($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }

    function update_ri($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }



    public function checkpass($password,$uname){
        $this->db->select('*');

        $this->db->where('password', $password);
        $this->db->where('uname', $uname);
        $query = $this->db->get('users');

       if($query->num_rows > 0){
            $row = $query->row();
            if($password == $row->password){
                return true;
            }else{
                return false;
            }
        }
    }

    function savepass($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }





















    function update_bos($booking_id, $data)
    {
        $this->db->where('booking_id', $booking_id);
        $this->db->update('booking', $data);
    }



    function update_sl($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }


    public function add_support($table, $data) {
        $this->db->insert($table, $data);

        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

public function add_client($table, $data) {
       $this->db->insert($table, $data);
       if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }



    public function add_new_hotel($table, $data) {
       $this->db->insert($table, $data);
       if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function add_new_restaurant($table, $data) {
       $this->db->insert($table, $data);
       if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
     public function add_new_resort($table, $data) {
       $this->db->insert($table, $data);
       if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }


 public function add_new_club($table, $data) {
       $this->db->insert($table, $data);
       if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }



 public function add_new_guest_house($table, $data) {
       $this->db->insert($table, $data);
       if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
    function update_rqs($request_id, $data)
    {
        $this->db->where('request_id', $request_id);
        $this->db->update('request', $data);
    }

    function update_even($event_id, $data)
    {
        $this->db->where('event_id', $event_id);
        $this->db->update('events', $data);
    }






    function update_di($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }


    function update_af($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }


    function update_serv($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }


    function update_rp($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }


    function update_rav($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }


    function update_rserv($hotel_id, $data)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }


    public function get_content($uname)
    {
       $this->db->select('*');
        $this->db->from('hotels');
       


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }







    public function get_events($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('hotel_id', $hotel_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }




    public function rooms($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_id', $hotel_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function requests($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('hotel_id', $hotel_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function events($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('hotel_id', $hotel_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function message($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('hotel_id', $hotel_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }






//
//    public function booking_enquiries( $uname)
//    {
//        $this->db->select('*');
//        $this->db->from('booking');
//        $this->db->where('uname', $uname);
//        $this->db->join('booking', 'hotels.hotel_id = booking.hotel_id');
//        $this->db->limit(1);
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


//    public function booking_enquiries($hotel_id = 'id')
//    {
//        $this->db->select('*');
//        $this->db->from('booking');
//        $this->db->where('hotel_id', $hotel_id);
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function booking_enquiries($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('status', 'Request');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function booking_pending($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('hotel_id', $hotel_id);

        $this->db->where('status', 'Pending Payment');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function booking_canceled($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('hotel_id', $hotel_id);

        $this->db->where('status', 'Canceled');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function delete_booking($booking_id)
    {

        $q = $this->db->where('booking_id', $booking_id);
        $q = $this->db->delete('booking');
        if ($q) {
            return true;
        } else {
            return false;
        }
    }



    public function add_new()
    {

       
        $q = $this->db->insert('hotels');
        if ($q) {
            return true;
        } else {
            return false;
        }
    }


    public function delete_hotel($hotel_id)
    {

        $q = $this->db->where('hotel_id', $hotel_id);
        $q = $this->db->delete('hotels');
        if ($q) {
            return true;
        } else {
            return false;
        }
    }


    public function delete_request($request_id)
    {

        $q = $this->db->where('request_id', $request_id);
        $q = $this->db->delete('request');
        if ($q) {
            return true;
        } else {
            return false;
        }
    }


    public function delete_event($event_id)
    {

        $q = $this->db->where('event_id', $event_id);
        $q = $this->db->delete('events');
        if ($q) {
            return true;
        } else {
            return false;
        }
    }



    public function delete_message($message_id)
    {

        $q = $this->db->where('message_id', $message_id);
        $q = $this->db->delete('message');
        if ($q) {
            return true;
        } else {
            return false;
        }
    }




    public function booking_approved($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('hotel_id', $hotel_id);

        $this->db->where('status', 'Approved');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function booking_completed($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('hotel_id', $hotel_id);

        $this->db->where('status', 'Completed');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


public function view_all_hotels()
    {
        $this->db->select('*');
        $this->db->from('hotels');
        


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


public function view_all_restaurants()
    {
        $this->db->select('*');
        $this->db->from('restaurants');
        


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function view_all_resorts()
    {
        $this->db->select('*');
        $this->db->from('resorts');
        


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


 public function view_all_guest_houses()
    {
        $this->db->select('*');
        $this->db->from('guest_houses');
        


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


 public function view_all_clubs()
    {
        $this->db->select('*');
        $this->db->from('clubs');
        


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }












//    public function booking_enquiries($hotel_id)
//    {
//
//        $this->db->select('*');
//        $this->db->from('booking');
//        $this->db->where('hotel_id', $hotel_id);
////        $this->db->limit($limit);
////        $this->db->offset($offset);
//
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }



    public function login($uname, $password)
    {
        $this->db->select('uname', 'password');
        $this->db->from('admin');
        $this->db->where('uname', $uname);
        $this->db->where('password', $password);
        $query = $this->db->get();
        $this->db->limit(1);
        //print_r($query);
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        } else {
            return false;
        }
    }
}