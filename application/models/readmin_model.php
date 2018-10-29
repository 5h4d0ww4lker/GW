<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class readmin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function image_upload($resort_id, $data)
    {

        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);


        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function check_availablity($resort_location, $resort_city, $room_type, $star_level, $free_room, $room_price)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        // $this->db->where('star_level', $star_level);
        $this->db->where('resort_city', $resort_city);
        $this->db->where('resort_location', $resort_location);

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

//    public function image_upload($resort_id, $data) {
//
//        $this->db->where('resort_id', $resort_id);
//        $this->db->update('resorts', $data);
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function count_resorts_inside_adiss($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }




    public function search_resorts_inside_adiss($resort_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        if ($resort_location) {
            $this->db->like('resort_location', $resort_location);
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





//    public function count_resorts_inside_adiss($resort_location = null)
//    {
//
//        if ($resort_location) {
//            $this->db->or_like('resort_location', $resort_location);
//        }
//        return $this->db->count_all_results('resorts');
//    }

    public function count_searched_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('resort_location', 'search_term');
            $this->db->where('resort_city', 'search_term');
            $this->db->where('resort_name', 'search_term');
        }
        return $this->db->count_all_results('resorts');
        $this->db->where('resort_location', 'search_term');
        $this->db->where('resort_city', 'search_term');
        $this->db->where('resort_name', 'search_term');
    }


    public function count_pending($resort_id)
    {

        $this->db->from('booking');
        $this->db->where('room_type', 'suit');
//        $this->db->where('room_type', 'suit');
        $this->db->where('resort_id', $resort_id);
        $this->db->count_all_results();
    }















//
//function show_content($data){
//$this->db->select('*');
//$this->db->from('resorts');
//$this->db->where('resort_id', $data);
//$query = $this->db->get();
//$result = $query->result();
//return $result;
//}
//// Update Query For Selected Student
//function update_resort_content($resort_id,$data){
//$this->db->where('resort_id', $resort_id);
//$this->db->update('resorts', $data);
//}

    function update_bi($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }

    function update_ri($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
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

    function savepass($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }





















    function update_bos($booking_id, $data)
    {
        $this->db->where('booking_id', $booking_id);
        $this->db->update('booking', $data);
    }



    function update_sl($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
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






    function update_di($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }


    function update_af($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }


    function update_serv($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }


    function update_rp($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }


    function update_rav($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }


    function update_rserv($resort_id, $data)
    {
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }


    public function get_content($uname)
    {
        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('uname', $uname);
        $this->db->where('password', $uname);
//        $this->db->join('clients', 'resorts.resort_id = clients.company_id');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_events($resort_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('resort_id', $resort_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }




    public function rooms($resort_id)
    {
        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_id', $resort_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function requests($resort_id)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('resort_id', $resort_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function events($resort_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('resort_id', $resort_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function message($resort_id)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('resort_id', $resort_id);


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
//        $this->db->join('booking', 'resorts.resort_id = booking.resort_id');
//        $this->db->limit(1);
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


//    public function booking_enquiries($resort_id = 'id')
//    {
//        $this->db->select('*');
//        $this->db->from('booking');
//        $this->db->where('resort_id', $resort_id);
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function booking_enquiries($resort_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('resort_id', $resort_id);
        $this->db->where('status', 'Request');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function booking_pending($resort_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('resort_id', $resort_id);

        $this->db->where('status', 'Pending Payment');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function booking_canceled($resort_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('resort_id', $resort_id);

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




    public function booking_approved($resort_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('resort_id', $resort_id);

        $this->db->where('status', 'Approved');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function booking_completed($resort_id)
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('resort_id', $resort_id);

        $this->db->where('status', 'Completed');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }












//    public function booking_enquiries($resort_id)
//    {
//
//        $this->db->select('*');
//        $this->db->from('booking');
//        $this->db->where('resort_id', $resort_id);
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
        $this->db->select('uname', 'password', 'resort_id');
        $this->db->from('resorts');
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