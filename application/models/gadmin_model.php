<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class gadmin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function image_upload($guest_house_id, $data)
    {

        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);


        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function check_availablity($guest_house_location, $guest_house_city, $room_type, $star_level, $free_room, $room_price)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        // $this->db->where('star_level', $star_level);
        $this->db->where('guest_house_city', $guest_house_city);
        $this->db->where('guest_house_location', $guest_house_location);

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

//    public function image_upload($guest_house_id, $data) {
//
//        $this->db->where('guest_house_id', $guest_house_id);
//        $this->db->update('guest_houses', $data);
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function count_guest_houses_inside_adiss($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->or_like('guest_house_location', $guest_house_location);
        }
        return $this->db->count_all_results('guest_houses');
    }




    public function search_guest_houses_inside_adiss($guest_house_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        if ($guest_house_location) {
            $this->db->like('guest_house_location', $guest_house_location);
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





//    public function count_guest_houses_inside_adiss($guest_house_location = null)
//    {
//
//        if ($guest_house_location) {
//            $this->db->or_like('guest_house_location', $guest_house_location);
//        }
//        return $this->db->count_all_results('guest_houses');
//    }

    public function count_searched_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', 'search_term');
            $this->db->where('guest_house_city', 'search_term');
            $this->db->where('guest_house_name', 'search_term');
        }
        return $this->db->count_all_results('guest_houses');
        $this->db->where('guest_house_location', 'search_term');
        $this->db->where('guest_house_city', 'search_term');
        $this->db->where('guest_house_name', 'search_term');
    }


    public function count_pending($guest_house_id)
    {

        $this->db->from('booking');
        $this->db->where('room_type', 'suit');
//        $this->db->where('room_type', 'suit');
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->count_all_results();
    }















//
//function show_content($data){
//$this->db->select('*');
//$this->db->from('guest_houses');
//$this->db->where('guest_house_id', $data);
//$query = $this->db->get();
//$result = $query->result();
//return $result;
//}
//// Update Query For Selected Student
//function update_guest_house_content($guest_house_id,$data){
//$this->db->where('guest_house_id', $guest_house_id);
//$this->db->update('guest_houses', $data);
//}

    function update_bi($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }

    function update_ri($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
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

    function savepass($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }





















    function update_bos($booking_id, $data)
    {
        $this->db->where('booking_id', $booking_id);
        $this->db->update('booking', $data);
    }



    function update_sl($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
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






    function update_di($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }


    function update_af($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }


    function update_serv($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }


    function update_rp($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }


    function update_rav($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }


    function update_rserv($guest_house_id, $data)
    {
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }


    public function get_content($uname)
    {
        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('uname', $uname);
        $this->db->where('password', $uname);
//        $this->db->join('clients', 'guest_houses.guest_house_id = clients.company_id');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_events($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('guest_house_id', $guest_house_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }




    public function rooms($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_id', $guest_house_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function requests($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('guest_house_id', $guest_house_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function events($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('guest_house_id', $guest_house_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function message($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('guest_house_id', $guest_house_id);


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
//        $this->db->join('booking', 'guest_houses.guest_house_id = booking.guest_house_id');
//        $this->db->limit(1);
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


//    public function booking_enquiries($guest_house_id = 'id')
//    {
//        $this->db->select('*');
//        $this->db->from('booking');
//        $this->db->where('guest_house_id', $guest_house_id);
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function booking_enquiries($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->where('status', 'Request');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function booking_pending($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('guest_house_id', $guest_house_id);

        $this->db->where('status', 'Pending Payment');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function booking_canceled($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('guest_house_id', $guest_house_id);

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




    public function booking_approved($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('guest_house_id', $guest_house_id);

        $this->db->where('status', 'Approved');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function booking_completed($guest_house_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('guest_house_id', $guest_house_id);

        $this->db->where('status', 'Completed');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }












//    public function booking_enquiries($guest_house_id)
//    {
//
//        $this->db->select('*');
//        $this->db->from('booking');
//        $this->db->where('guest_house_id', $guest_house_id);
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
        $this->db->select('uname', 'password', 'guest_house_id');
        $this->db->from('guest_houses');
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