<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class resorts_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

//


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

    function update_bi($resort_id,$data){
        $this->db->where('resort_id', $resort_id);
        $this->db->update('resorts', $data);
    }

    public function get_content($owner_id, $uname, $password)
    {
        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('uname', $uname);
        $this->db->where('password', $password);
        $this->db->join('clients', 'resorts.resort_id = clients.company_id');
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


    public function load_resort_details($resort_id)
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


    public function get_list_of_resorts_inside_debre_zeit( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_city', 'Debre Zeit');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_resorts_inside_adama($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_city', 'Adama');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_resorts_inside_bahir_dar( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_city', 'Bahir Dar');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_resorts_inside_dire_dawa( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_city', 'Dire Dawa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function comming_soon($resort_location)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'bole');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


// COUNT BY PRICE RANGE
    public function count_500ETB_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('rooms_from', '500ETB');
        }
        return $this->db->count_all_results('resorts');
    }




    public function count_resorts_with_swimming_pool($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_swimming_pool', 'yes');
            $this->db->or_like('resort_swimming_pool', 'available');
            $this->db->or_like('resort_swimming_pool', 'with');
            $this->db->or_like('resort_swimming_pool', 'sec');
            $this->db->or_like('resort_swimming_pool', 'ava');
            $this->db->or_like('resort_swimming_pool', 'yes');
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_resorts_with_parking($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_parking', 'yes');
            $this->db->or_like('resort_parking', 'Available');
            $this->db->or_like('resort_parking', 'with');
            $this->db->or_like('resort_parking', 'sec');
            $this->db->or_like('resort_parking', 'ava');
            $this->db->or_like('resort_parking', 'yes');

        }
        return $this->db->count_all_results('resorts');
    }





    public function count_1000ETB_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('rooms_from', '1000ETB');
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_1500ETB_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('rooms_from', '1500ETB');
        }
        return $this->db->count_all_results('resorts');
    }


    public function count_2000ETB_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('rooms_from', '2000ETB');
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_more2000ETB_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('rooms_from', '2000ETB');
        }
        return $this->db->count_all_results('resorts');
    }


// COUNT BY CITY

    public function count_debre_Zeit_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('resort_city', 'Debre Zeit');

        }
        return $this->db->count_all_results('resorts');

    }


    public function count_adama_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('resort_city', 'Adama');
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_bahir_dar_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('resort_city', 'Bahir Dar');
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_dire_dawa_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('resort_city', 'Dire Dawa');
        }
        return $this->db->count_all_results('resorts');
    }

    // COUNT BY SATR LEVEL

    public function count_5_star_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('star_level', '5 Star');
        }
        return $this->db->count_all_results('resorts');
    }
    public function count_4_star_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('star_level', '4 Star');
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_3_star_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('star_level', '3 Star');
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_2_star_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('star_level', '2 Star');
        }
        return $this->db->count_all_results('resorts');
    }




    public function count_1_star_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('star_level', '1 Star');
        }
        return $this->db->count_all_results('resorts');
    }

// GET resortS BY STAR LEVEL

    public function get_5_star_resorts($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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


    public function get_4_star_resorts($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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



    public function count_some($resort_location='4 star') {

        if ($resort_location) {
            $this->db->from('resorts');
            $this->db->where('star_level', $resort_location);
            $query = $this->db->get();
            if ($query->num_rows > 0) {
                echo $resort_location;
                return $this->db->count_all_results('resorts', $resort_location);

            } else {
                return false;
            }
        }}

    public function get_3_star_resorts($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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

    public function get_2_star_resorts($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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

    public function get_1_star_resorts( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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


    public function count_adiss_resorts($link_adiss = null)
    {

        if ($link_adiss) {
            $this->db->or_like('resort_name', $link_adiss);
            $this->db->or_like('resort_location', $link_adiss);
            $this->db->or_like('star_level', $link_adiss);
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_resorts_inside_adiss($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }







    public function count_bole_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->where('resort_location', 'bole');
        }
        return $this->db->count_all_results('resorts');
    }


    public function count_cazanches_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_4_kilo_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_piassa_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_22_mazoria_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }


    public function count_megenagna_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }


    public function count_paster_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }


    public function count_saris_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_sar_bet_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }

    public function count_asko_resorts($resort_location = null)
    {

        if ($resort_location) {
            $this->db->or_like('resort_location', $resort_location);
        }
        return $this->db->count_all_results('resorts');
    }

    //END OF COUNT


    //GET resortS
    public function get_list_of_resorts_inside_adiss($limit = 200, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_city', 'Addis Ababa');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    // public function get_list_of_resorts_inside_adama($link_adiss, $limit = 200, $offset = 0) {
    //     $this->db->select('*');
    //     $this->db->from('resorts_adama');

    //     if ($link_adiss) {
    //         $this->db->or_like('resort_name', $link_adiss);
    //         $this->db->or_like('resort_location', $link_adiss);
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


// public function get_list_of_resorts_inside_debre_zeit($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('resorts');

//         if ($link_adiss) {
//             $this->db->or_like('resort_name', $link_adiss);
//             $this->db->or_like('resort_location', $link_adiss);
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


// public function get_list_of_resorts_inside_bahir_dar($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('resorts_bahir_dar');

//         if ($link_adiss) {
//             $this->db->or_like('resort_name', $link_adiss);
//             $this->db->or_like('resort_location', $link_adiss);
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


// public function get_list_of_resorts_inside_dire_dawa($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('resorts_debre_zeit');

//         if ($link_adiss) {
//             $this->db->or_like('resort_name', $link_adiss);
//             $this->db->or_like('resort_location', $link_adiss);
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


    public function get_list_of_resorts_bole($limit = 5, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'bole');
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

    public function get_list_of_resorts_cazanches($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'cazanches');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_resorts_4_kilo($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', '4 kilo');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_resorts_piassa($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'piassa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_resorts_22_mazoria( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', '22 mazoria');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_resorts_megenagna($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'megenagna');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_resorts_paster($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'paster');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_resorts_saris($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'saris');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_resorts_sar_bet($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'sar bet');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_resorts_asko($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_location', 'asko');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    //END OF GET resortS


    public function get_list_of_resorts_500ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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

    public function get_list_of_resorts_1000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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

    public function get_list_of_resorts_1500ETB( $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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

    public function get_list_of_resorts_2000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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

    public function get_list_of_resorts_more2000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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

    public function with_swimming_pool($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->or_like('resort_swimming_pool', 'yes');
        $this->db->or_like('resort_swimming_pool', 'different');
        $this->db->or_like('resort_swimming_pool', 'many');
        $this->db->or_like('resort_swimming_pool', 'available');
        $this->db->or_like('resort_swimming_pool', 'trainers');
        $this->db->or_like('resort_swimming_pool', 'with');
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
        $this->db->from('resorts');
        $this->db->or_like('resort_parking', 'Yes');
        $this->db->or_like('resort_parking', 'available');
        $this->db->or_like('resort_parking', 'cars');
        $this->db->or_like('resort_parking', 'many');
        $this->db->or_like('resort_parking', 'car');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


// public function search_resorts($resort_location, $limit = 200, $offset = 0) {

//         $this->db->select('*');
//         $this->db->from('resorts');
//         if ($resort_location) {
//             $this->db->like('resort_location', $resort_location);
//             $this->db->like('resort_city', $resort_location);
//             $this->db->like('resort_name', $resort_location);
//             $this->db->like('star_level', $resort_location);
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


//     public function get_list_of_resorts_inside_diredawa() {

//         $this->db->select('*');
//         $this->db->from('resorts');
//         $query = $this->db->get();
// //print_r($query);
//         if ($query->num_rows() > 0) {
//             return $query->result();
//         } else {
//             return false;
//         }
//     }


//  public function search_resorts_inside_adiss($resort_location) {
//
//        $this->db->select('*');
//        $this->db->from('resorts');
//
//        if($resort_location)
//        {
//        $this->db->or_like('resort_location', $resort_location);
//        }
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function search_resorts($resort_location)
    {

        $this->db->select('*');
        $this->db->from('resorts');
        if ($resort_location) {
            $this->db->or_like('resort_name', $resort_location);
            $this->db->or_like('resort_location', $resort_location);
            $this->db->or_like('resort_city', $resort_location);
            $this->db->or_like('resort_direction', $resort_location);
            $this->db->or_like('star_level', $resort_location);
        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function check_availablity($resort_location)
    {

        $this->db->select('*');
        $this->db->from('resorts');

        if ($resort_location) {
            $this->db->where('resort_city', $resort_location);
            $this->db->where('resort_location', $resort_location);
            // $this->db->where('resort_parking',,$resort_location);
            // $this->db->where('resort_parking',,$resort_location);

        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function search_resorts_inside_adiss_by_price_range($rooms_from)
    {

        $this->db->select('*');
        $this->db->from('resorts');
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


    public function get_resort_details($id = 'id')
    {

        $this->db->select('*');
        $this->db->from('resorts');
        $this->db->where('resort_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}

?>