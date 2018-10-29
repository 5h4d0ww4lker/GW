<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hotels_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

//


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

    function update_bi($hotel_id,$data){
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotels', $data);
    }

 public function get_content($owner_id, $uname, $password)
    {
        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('uname', $uname);
        $this->db->where('password', $password);
        $this->db->join('clients', 'hotels.hotel_id = clients.company_id');
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


    public function load_hotel_details($hotel_id)
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


    public function get_list_of_hotels_inside_debre_zeit( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_city', 'Debre Zeit');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_hotels_inside_adama($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_city', 'Adama');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_hotels_inside_bahir_dar( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_city', 'Bahir Dar');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_hotels_inside_dire_dawa( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_city', 'Dire Dawa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function comming_soon($hotel_location)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'bole');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


// COUNT BY PRICE RANGE
    public function count_500ETB_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('rooms_from', '500ETB');
        }
        return $this->db->count_all_results('hotels');
    }




    public function count_hotels_with_swimming_pool($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->or_like('hotel_swimming_pool', 'yes');
            $this->db->or_like('hotel_swimming_pool', 'available');
            $this->db->or_like('hotel_swimming_pool', 'with');
            $this->db->or_like('hotel_swimming_pool', 'sec');
            $this->db->or_like('hotel_swimming_pool', 'ava');
            $this->db->or_like('hotel_swimming_pool', 'yes');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_hotels_with_parking($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->or_like('hotel_parking', 'yes');
            $this->db->or_like('hotel_parking', 'available');
            $this->db->or_like('hotel_parking', 'with');
            $this->db->or_like('hotel_parking', 'sec');
            $this->db->or_like('hotel_parking', 'ava');
            $this->db->or_like('hotel_parking', 'yes');

        }
        return $this->db->count_all_results('hotels');
    }





    public function count_1000ETB_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('rooms_from', '1000ETB');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_1500ETB_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('rooms_from', '1500ETB');
        }
        return $this->db->count_all_results('hotels');
    }


    public function count_2000ETB_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('rooms_from', '2000ETB');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_more2000ETB_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('rooms_from', '2000ETB');
        }
        return $this->db->count_all_results('hotels');
    }


// COUNT BY CITY

    public function count_debre_Zeit_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_city', 'Debre Zeit');

        }
        return $this->db->count_all_results('hotels');

    }


    public function count_adama_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_city', 'Adama');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_bahir_dar_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_city', 'Bahir Dar');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_dire_dawa_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_city', 'Dire Dawa');
        }
        return $this->db->count_all_results('hotels');
    }

    // COUNT BY SATR LEVEL

    public function count_5_star_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('star_level', '5 Star');
        }
        return $this->db->count_all_results('hotels');
    }
    public function count_4_star_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('star_level', '4 Star');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_3_star_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('star_level', '3 Star');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_2_star_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('star_level', '2 Star');
        }
        return $this->db->count_all_results('hotels');
    }




    public function count_1_star_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('star_level', '1 Star');
        }
        return $this->db->count_all_results('hotels');
    }

// GET HOTELS BY STAR LEVEL

    public function get_5_star_hotels($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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


    public function get_4_star_hotels($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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



    public function count_some($hotel_location='4 star') {

        if ($hotel_location) {
            $this->db->from('hotels');
            $this->db->where('star_level', $hotel_location);
            $query = $this->db->get();
            if ($query->num_rows > 0) {
                echo $hotel_location;
                return $this->db->count_all_results('hotels', $hotel_location);

            } else {
                return false;
            }
        }}

    public function get_3_star_hotels($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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

    public function get_2_star_hotels($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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

    public function get_1_star_hotels( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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


    public function count_adiss_hotels($link_adiss = null)
    {

        if ($link_adiss) {
            $this->db->where('hotel_city', 'Addis Ababa');

        }
        return $this->db->count_all_results('hotels');
    }

    public function count_hotels_inside_adiss($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_city', 'Addis Ababa');
        }
        return $this->db->count_all_results('hotels');
    }







    public function count_bole_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'bole');
        }
        return $this->db->count_all_results('hotels');
    }


    public function count_cazanches_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'cazanches');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_4_kilo_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', '4_kilo');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_piassa_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'piassa');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_22_mazoria_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', '22 mazoria');
        }
        return $this->db->count_all_results('hotels');
    }


    public function count_megenagna_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'megenagna');
        }
        return $this->db->count_all_results('hotels');
    }


    public function count_paster_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'paster');
        }
        return $this->db->count_all_results('hotels');
    }


    public function count_saris_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'saris');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_sar_bet_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'sar bet');
        }
        return $this->db->count_all_results('hotels');
    }

    public function count_asko_hotels($hotel_location = null)
    {

        if ($hotel_location) {
            $this->db->where('hotel_location', 'asko');
        }
        return $this->db->count_all_results('hotels');
    }

    //END OF COUNT


    //GET HOTELS
    public function get_list_of_hotels_inside_adiss($limit = 200, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('hotels');

        $this->db->where('hotel_city','Addis Ababa');

        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    // public function get_list_of_hotels_inside_adama($link_adiss, $limit = 200, $offset = 0) {
    //     $this->db->select('*');
    //     $this->db->from('hotels_adama');

    //     if ($link_adiss) {
    //         $this->db->or_like('hotel_name', $link_adiss);
    //         $this->db->or_like('hotel_location', $link_adiss);
    //         $this->db->or_like('star_level', $link_adiss);
    //     }

    //     $this->db->limit($limit);
    //     $this->db->offset($offset);
    //     $query = $this->db->get();
    //     if ($query->num_rows > 0) {
    //         return $query->result();
    //     } else {
    //         return false;
    //     }
    // }


// public function get_list_of_hotels_inside_debre_zeit($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('hotels');

//         if ($link_adiss) {
//             $this->db->or_like('hotel_name', $link_adiss);
//             $this->db->or_like('hotel_location', $link_adiss);
//             $this->db->or_like('star_level', $link_adiss);
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


// public function get_list_of_hotels_inside_bahir_dar($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('hotels_bahir_dar');

//         if ($link_adiss) {
//             $this->db->or_like('hotel_name', $link_adiss);
//             $this->db->or_like('hotel_location', $link_adiss);
//             $this->db->or_like('star_level', $link_adiss);
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


// public function get_list_of_hotels_inside_dire_dawa($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('hotels_debre_zeit');

//         if ($link_adiss) {
//             $this->db->or_like('hotel_name', $link_adiss);
//             $this->db->or_like('hotel_location', $link_adiss);
//             $this->db->or_like('star_level', $link_adiss);
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


    public function get_list_of_hotels_bole($limit = 5, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'bole');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
//            print_r($query->num_rows);
//            exit;
            return $query->result();
        } else {
            return false;
        }
    }




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

    public function get_list_of_hotels_cazanches($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'cazanchis');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_hotels_4_kilo($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', '4 kilo');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_hotels_piassa($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'piassa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_hotels_22_mazoria( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', '22 mazoria');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_hotels_megenagna($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'megenagna');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_hotels_paster($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'paster');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_hotels_saris($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'saris');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_hotels_sar_bet($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'sar bet');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_hotels_asko($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_location', 'asko');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    //END OF GET HOTELS


    public function get_list_of_hotels_500ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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

    public function get_list_of_hotels_1000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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

    public function get_list_of_hotels_1500ETB( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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

    public function get_list_of_hotels_2000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
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

    public function get_list_of_hotels_more2000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('rooms_from', 'more2000');
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

    public function with_swimming_pool($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->or_like('hotel_swimming_pool', 'yes');
        $this->db->or_like('hotel_swimming_pool', 'different');
        $this->db->or_like('hotel_swimming_pool', 'many');
        $this->db->or_like('hotel_swimming_pool', 'available');
        $this->db->or_like('hotel_swimming_pool', 'trainers');
        $this->db->or_like('hotel_swimming_pool', 'with');
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
        $this->db->from('hotels');
        $this->db->or_like('hotel_parking', 'Yes');
        $this->db->or_like('hotel_parking', 'available');
        $this->db->or_like('hotel_parking', 'cars');
        $this->db->or_like('hotel_parking', 'many');
        $this->db->or_like('hotel_parking', 'car');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


// public function search_hotels($hotel_location, $limit = 200, $offset = 0) {

//         $this->db->select('*');
//         $this->db->from('hotels');
//         if ($hotel_location) {
//             $this->db->like('hotel_location', $hotel_location);
//             $this->db->like('hotel_city', $hotel_location);
//             $this->db->like('hotel_name', $hotel_location);
//             $this->db->like('star_level', $hotel_location);
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


//     public function get_list_of_hotels_inside_diredawa() {

//         $this->db->select('*');
//         $this->db->from('hotels');
//         $query = $this->db->get();
// //print_r($query);
//         if ($query->num_rows() > 0) {
//             return $query->result();
//         } else {
//             return false;
//         }
//     }


//  public function search_hotels_inside_adiss($hotel_location) {
//
//        $this->db->select('*');
//        $this->db->from('hotels');
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


    public function search_hotels($hotel_location)
    {

        $this->db->select('*');
        $this->db->from('hotels');
        if ($hotel_location) {
            $this->db->or_like('hotel_name', $hotel_location);
            $this->db->or_like('hotel_location', $hotel_location);
            $this->db->or_like('hotel_city', $hotel_location);
            $this->db->or_like('hotel_direction', $hotel_location);
            $this->db->or_like('star_level', $hotel_location);
        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function check_availablity($hotel_city, $hotel_location, $star_level, $rooms_from, $free_room, $available_room_types)
    {

        $this->db->select('*');
        $this->db->from('hotels');

        if ($hotel_location) {
            $this->db->where('hotel_city', $hotel_city);
            $this->db->where('hotel_location', $hotel_location);
            $this->db->where('star_level', $star_level);
            $this->db->where('rooms_from', $rooms_from);
            $this->db->where('free_room', $free_room);
            $this->db->or_like('available_room_types', $available_room_types);
            

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
        $this->db->from('hotels');
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


    public function get_hotel_details($id = 'id')
    {

        $this->db->select('*');
        $this->db->from('hotels');
        $this->db->where('hotel_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}

?>