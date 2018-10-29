<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class guest_houses_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

//




    public function get_list_of_advert()
    {

        $this->db->select('*');
        $this->db->from('side_bar_advertisement');
        $this->db->where('activation', 'active');


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }




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

    function update_bi($guest_house_id,$data){
        $this->db->where('guest_house_id', $guest_house_id);
        $this->db->update('guest_houses', $data);
    }

    public function get_content($owner_id, $uname, $password)
    {
        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('uname', $uname);
        $this->db->where('password', $password);
        $this->db->join('clients', 'guest_houses.guest_house_id = clients.company_id');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function login($uname, $password)
    {
        $this->db->select('uname', 'password');
        $this->db->from('clients');
        $this->db->where('uname', $uname);
        $this->db->where('password', $password);
        $query = $this->db->get();
        //print_r($query);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function add_book($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
    }

    public function add_contact($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
    }


    public function load_guest_house_details($guest_house_id)
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


    public function get_list_of_guest_houses_inside_debre_zeit($guest_house_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_city', 'debre_zeit');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_inside_adama($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_city', 'Adama');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_guest_houses_inside_bahir_dar($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_city', 'bahir_dar');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_guest_houses_inside_dire_dawa($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_city', 'dire_dawa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function comming_soon($guest_house_location)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'bole');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


// COUNT BY PRICE RANGE
    public function count_500ETB_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('rooms_from', '500ETB');

        }
        return $this->db->count_all_results('guest_houses');
    }


    public function count_1000ETB_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('rooms_from', '1000ETB');

        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_1500ETB_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('rooms_from', '1500ETB');
        }
        return $this->db->count_all_results('guest_houses');
    }


    public function count_2000ETB_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('rooms_from', '2000ETB');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_more2000ETB_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('rooms_from', 'More Than 2000');
        }
        return $this->db->count_all_results('guest_houses');
    }


// COUNT BY CITY

    public function count_debre_Zeit_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_city', 'Debre Zeit');

        }
        return $this->db->count_all_results('guest_houses');

    }


    public function count_adama_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_city', 'Adama');

        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_bahir_dar_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_city', 'Bahir Dar');

        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_dire_dawa_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_city', 'Dire Dawa');
        }
        return $this->db->count_all_results('guest_houses');
    }

    // COUNT BY SATR LEVEL

    public function count_5_star_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('star_level', '5 Star');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_4_star_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('star_level', '4 Star');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_3_star_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('star_level', '3 Star');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_2_star_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('star_level', '2 Star');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_1_star_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('star_level', '1 Star');
        }
        return $this->db->count_all_results('guest_houses');
    }


// GET guest_houseS BY STAR LEVEL

    public function get_5_star_guest_houses($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('star_level', '5 star');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_4_star_guest_houses($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('star_level', '4 star');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }



    public function count_some($guest_house_location='4 star') {

        if ($guest_house_location) {
            $this->db->from('guest_houses');
            $this->db->where('star_level', $guest_house_location);
            $query = $this->db->get();
            if ($query->num_rows > 0) {
                echo $guest_house_location;
                return $this->db->count_all_results('guest_houses', $guest_house_location);

            } else {
                return false;
            }
        }}

    public function get_3_star_guest_houses($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('star_level', '3 star');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_2_star_guest_houses($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('star_level', '2 star');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_1_star_guest_houses($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('star_level', '1 star');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function count_adiss_guest_houses($link_adiss = null)
    {

        if ($link_adiss) {
            $this->db->or_like('guest_house_city', 'Addis Ababa');

        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_guest_houses_inside_adiss($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_city', 'Addis Ababa');
        }
        return $this->db->count_all_results('guest_houses');
    }


    public function count_bole_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', 'bole');
        }
        return $this->db->count_all_results('guest_houses');
    }


    public function count_with_parking($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->or_like('guest_house_parking', 'yes');
            $this->db->or_like('guest_house_parking', 'available');
            $this->db->or_like('guest_house_parking', 'cars');
            $this->db->or_like('guest_house_parking', 'many');
            $this->db->or_like('guest_house_parking', 'car');
        }
        return $this->db->count_all_results('guest_houses');
    }


    public function count_with_food($guest_house_location = null)
    {

        if ($guest_house_location) {

            $this->db->where('food_status', 'Available');

        }
        return $this->db->count_all_results('guest_houses');
    }



    public function count_with_swimming_pool($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->or_like('guest_house_swimming_pool', 'yes');
            $this->db->or_like('guest_house_swimming_pool', 'available');
            $this->db->or_like('guest_house_swimming_pool', 'trained');
            $this->db->or_like('guest_house_swimming_pool', 'many');
            $this->db->or_like('guest_house_swimming_pool','kids');
        }
        return $this->db->count_all_results('guest_houses');
    }





    public function count_cazanches_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', 'cazanches');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_4_kilo_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', '4_kilo');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_piassa_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', 'piassa');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_22_mazoria_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', '22_mazoria');
        }
        return $this->db->count_all_results('guest_houses');
    }


    public function count_megenagna_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', 'megenagna');
        }
        return $this->db->count_all_results('guest_houses');
    }


    public function count_paster_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', 'paster');
        }
        return $this->db->count_all_results('guest_houses');
    }


    public function count_saris_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location','saris');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_sar_bet_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', 'saris');
        }
        return $this->db->count_all_results('guest_houses');
    }

    public function count_asko_guest_houses($guest_house_location = null)
    {

        if ($guest_house_location) {
            $this->db->where('guest_house_location', 'saris');
        }
        return $this->db->count_all_results('guest_houses');
    }

    //END OF COUNT


    //GET guest_houseS
    public function get_list_of_guest_houses_inside_adiss($limit = 200, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_city', 'Addis Ababa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }





    public function get_list_of_guest_houses_bole($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'bole');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_cazanches($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'cazanches');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_guest_houses_4_kilo($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', '4 kilo');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_piassa($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'piassa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_guest_houses_22_mazoria($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', '22 mazoria');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_megenagna($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'megenagna');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_paster($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'paster');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_guest_houses_saris($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'saris');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_sar_bet($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'sar bet');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_asko($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_location', 'asko');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    //END OF GET guest_houseS


    public function get_list_of_guest_houses_500ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('rooms_from', '500ETB');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_1000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('rooms_from', '1000ETB');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_1500ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('rooms_from', '1500ETB');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_2000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('rooms_from', '2000ETB');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_guest_houses_more2000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('rooms_from', 'More Than 2000');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
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

    public function with_swimming_pool($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->or_like('guest_house_swimming_pool', 'yes');
        $this->db->or_like('guest_house_swimming_pool', 'different');
        $this->db->or_like('guest_house_swimming_pool', 'many');
        $this->db->or_like('guest_house_swimming_pool', 'available');
        $this->db->or_like('guest_house_swimming_pool', 'trainers');
        $this->db->or_like('guest_house_swimming_pool', 'with');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function with_food_availablity($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('food_status', 'Available');



        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function with_parking($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->or_like('guest_house_parking', 'Yes');
        $this->db->or_like('guest_house_parking', 'available');
        $this->db->or_like('guest_house_parking', 'cars');
        $this->db->or_like('guest_house_parking', 'many');
        $this->db->or_like('guest_house_parking', 'car');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


// public function search_guest_houses($guest_house_location, $limit = 200, $offset = 0) {

//         $this->db->select('*');
//         $this->db->from('guest_houses');
//         if ($guest_house_location) {
//             $this->db->like('guest_house_location', $guest_house_location);
//             $this->db->like('guest_house_city', $guest_house_location);
//             $this->db->like('guest_house_name', $guest_house_location);
//             $this->db->like('star_level', $guest_house_location);
//         }
//         $this->db->limit($limit);
//         $this->db->offset($offset);
//         $query = $this->db->get();
//         if ($query->num_rows > 0) {
//             return $query->result();
//         } else {
//             return false;
//         }
//     }


//     public function get_list_of_guest_houses_inside_diredawa() {

//         $this->db->select('*');
//         $this->db->from('guest_houses');
//         $query = $this->db->get();
// //print_r($query);
//         if ($query->num_rows() > 0) {
//             return $query->result();
//         } else {
//             return false;
//         }
//     }


//  public function search_guest_houses_inside_adiss($guest_house_location) {
//
//        $this->db->select('*');
//        $this->db->from('guest_houses');
//
//        if($guest_house_location)
//        {
//        $this->db->or_like('guest_house_location', $guest_house_location);
//        }
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function search_guest_houses($guest_house_location)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        if ($guest_house_location) {
            $this->db->or_like('guest_house_location', $guest_house_location);
            $this->db->or_like('guest_house_city', $guest_house_location);
            $this->db->or_like('guest_house_name', $guest_house_location);
            $this->db->or_like('guest_house_direction', $guest_house_location);
            $this->db->or_like('star_level', $guest_house_location);
        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function check_availablity($guest_house_location)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');

        if ($guest_house_location) {
            $this->db->where('guest_house_city', $guest_house_location);
            $this->db->where('guest_house_location', $guest_house_location);
            // $this->db->where('guest_house_parking',,$guest_house_location);
            // $this->db->where('guest_house_parking',,$guest_house_location);

        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function search_guest_houses_inside_adiss_by_price_range($rooms_from)
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
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


    public function get_guest_house_details($id = 'id')
    {

        $this->db->select('*');
        $this->db->from('guest_houses');
        $this->db->where('guest_house_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}

?>