<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cadmin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function image_upload($club_id, $data)
    {

        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);


        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function check_availablity($club_location, $club_city, $room_type, $star_level, $free_room, $room_price)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        // $this->db->where('star_level', $star_level);
        $this->db->where('club_city', $club_city);
        $this->db->where('club_location', $club_location);

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

//    public function image_upload($club_id, $data) {
//
//        $this->db->where('club_id', $club_id);
//        $this->db->update('clubs', $data);
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function count_clubs_inside_adiss($club_location = null)
    {

        if ($club_location) {
            $this->db->or_like('club_location', $club_location);
        }
        return $this->db->count_all_results('clubs');
    }




    public function search_clubs_inside_adiss($club_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        if ($club_location) {
            $this->db->like('club_location', $club_location);
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


    public function reservation_more($reservation_id = 'id')
    {

        $this->db->select('*');
        $this->db->from('reservation');
        $this->db->where('reservation_id', $reservation_id);
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





//    public function count_clubs_inside_adiss($club_location = null)
//    {
//
//        if ($club_location) {
//            $this->db->or_like('club_location', $club_location);
//        }
//        return $this->db->count_all_results('clubs');
//    }

    public function count_searched_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'search_term');
            $this->db->where('club_city', 'search_term');
            $this->db->where('club_name', 'search_term');
        }
        return $this->db->count_all_results('clubs');
        $this->db->where('club_location', 'search_term');
        $this->db->where('club_city', 'search_term');
        $this->db->where('club_name', 'search_term');
    }


    public function count_pending($club_id)
    {

        $this->db->from('reservation');
        $this->db->where('room_type', 'suit');
//        $this->db->where('room_type', 'suit');
        $this->db->where('club_id', $club_id);
        $this->db->count_all_results();
    }















//
//function show_content($data){
//$this->db->select('*');
//$this->db->from('clubs');
//$this->db->where('club_id', $data);
//$query = $this->db->get();
//$result = $query->result();
//return $result;
//}
//// Update Query For Selected Student
//function update_club_content($club_id,$data){
//$this->db->where('club_id', $club_id);
//$this->db->update('clubs', $data);
//}

    function update_bi($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }

    function update_ri($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
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

    function savepass($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }





















    function update_bos($reservation_id, $data)
    {
        $this->db->where('reservation_id', $reservation_id);
        $this->db->update('reservation', $data);
    }



    function update_sl($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }

    function update_fs($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }


    function update_cat($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
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






    function update_di($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }


    function update_af($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }


    function update_serv($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }


    function update_rp($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }


    function update_rav($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }


    function update_rserv($club_id, $data)
    {
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }


    public function get_content($uname)
    {
        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('uname', $uname);
        $this->db->where('password', $uname);
//        $this->db->join('clients', 'clubs.club_id = clients.company_id');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_events($club_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('club_id', $club_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }




    public function rooms($club_id)
    {
        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_id', $club_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function requests($club_id)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('club_id', $club_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function events($club_id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('club_id', $club_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function message($club_id)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('club_id', $club_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }






//
//    public function reservation_enquiries( $uname)
//    {
//        $this->db->select('*');
//        $this->db->from('reservation');
//        $this->db->where('uname', $uname);
//        $this->db->join('reservation', 'clubs.club_id = reservation.club_id');
//        $this->db->limit(1);
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


//    public function reservation_enquiries($club_id = 'id')
//    {
//        $this->db->select('*');
//        $this->db->from('reservation');
//        $this->db->where('club_id', $club_id);
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function reservation_enquiries($club_id)
    {
        $this->db->select('*');
        $this->db->from('reservation');
        $this->db->where('club_id', $club_id);
        $this->db->where('status', 'Request');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function reservation_pending($club_id)
    {
        $this->db->select('*');
        $this->db->from('reservation');
        $this->db->where('club_id', $club_id);

        $this->db->where('status', 'Pending Payment');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function reservation_canceled($club_id)
    {
        $this->db->select('*');
        $this->db->from('reservation');
        $this->db->where('club_id', $club_id);

        $this->db->where('status', 'Canceled');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function delete_reservation($reservation_id)
    {

        $q = $this->db->where('reservation_id', $reservation_id);
        $q = $this->db->delete('reservation');
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




    public function reservation_approved($club_id)
    {
        $this->db->select('*');
        $this->db->from('reservation');
        $this->db->where('club_id', $club_id);

        $this->db->where('status', 'Approved');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function reservation_completed($club_id)
    {
        $this->db->select('*');
        $this->db->from('reservation');
        $this->db->where('club_id', $club_id);

        $this->db->where('status', 'Completed');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }












//    public function reservation_enquiries($club_id)
//    {
//
//        $this->db->select('*');
//        $this->db->from('reservation');
//        $this->db->where('club_id', $club_id);
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
        $this->db->select('uname', 'password', 'club_id');
        $this->db->from('clubs');
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