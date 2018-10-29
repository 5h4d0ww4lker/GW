<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function count_adiss_hotels($link_adiss = null)
    {

        if ($link_adiss) {
            $this->db->or_like('hotel_name', $link_adiss);
            $this->db->or_like('hotel_location', $link_adiss);
            $this->db->or_like('star_level', $link_adiss);
        }
        return $this->db->count_all_results('hotels_adiss');
    }

    public function count_hotels_inside_adiss($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->or_like('hotel_location', $hotel_location);
        }
        return $this->db->count_all_results('hotels_adiss');
    }


    public function count_bole_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->or_like('hotel_location', $hotel_location);
        }
        return $this->db->count_all_results('hotels_adiss');
    }

    public function get_list_of_hotels_inside_adiss($link_adiss, $limit = 200, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('hotels_adiss');

        if ($link_adiss) {
            $this->db->or_like('hotel_name', $link_adiss);
            $this->db->or_like('hotel_location', $link_adiss);
            $this->db->or_like('star_level', $link_adiss);
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


    public function get_list_of_hotels_bole($hotel_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels_adiss');
        $this->db->where('hotel_location', 'bole');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function search_hotels_inside_adiss($hotel_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels_adiss');
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

    public function get_list_of_hotels_inside_adama($bole = 'default')
    {

        $this->db->select('*');
        $this->db->from('hotels_adiss');
        $this->db->where('hotel_location', $bole);
        $query = $this->db->get();
//print_r($query);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_hotels_inside_diredawa()
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $query = $this->db->get();
//print_r($query);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_hotels_inside_bahir_dar()
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('location', $user_email);
        $query = $this->db->get();
//print_r($query);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//  public function search_hotels_inside_adiss($hotel_location) {
//
//        $this->db->select('*');
//        $this->db->from('hotels_adiss');
//
//        if($hotel_location)
//        {
//        $this->db->or_like('hotel_location', $hotel_location);
//        }
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function search_hotels_inside_adiss_by_star_level($star_level)
    {

        $this->db->select('*');
        $this->db->from('hotels_adiss');
        if ($star_level) {
            $this->db->or_like('star_level', $star_level);
        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function search_hotels_inside_adiss_by_price_range($rooms_from)
    {

        $this->db->select('*');
        $this->db->from('hotels_adiss');
        if ($rooms_from) {
            $this->db->or_like('rooms_from', $rooms_from);
        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}

?>