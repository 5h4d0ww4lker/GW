<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class clubs_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

//


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

    function update_bi($club_id,$data){
        $this->db->where('club_id', $club_id);
        $this->db->update('clubs', $data);
    }

    public function get_content($owner_id, $uname, $password)
    {
        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('uname', $uname);
        $this->db->where('password', $password);
        $this->db->join('clients', 'clubs.club_id = clients.company_id');
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



public function add_reservation($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
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


    public function load_club_details($club_id)
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


    public function get_list_of_clubs_inside_debre_zeit($club_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_city', 'debre_zeit');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_clubs_inside_adama($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_city', 'Adama');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_clubs_inside_bahir_dar($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_city', 'Bahir_Dar');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_clubs_inside_dire_dawa($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_city', 'dire_dawa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function comming_soon()
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'bole');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }



    public function count_debre_Zeit_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_city', 'Debre Zeit');

        }
        return $this->db->count_all_results('clubs');

    }


    public function count_adama_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_city', 'Adama');
        }
        return $this->db->count_all_results('clubs');
    }

    public function count_bahir_dar_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_city', 'Bahir Dar');
        }
        return $this->db->count_all_results('clubs');
    }

    public function count_dire_dawa_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_city', 'Dire Dawa');
        }
        return $this->db->count_all_results('clubs');
    }


    public function count_cultural_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('catagory', 'Cultural');
        }
        return $this->db->count_all_results('clubs');
    }


    public function count_with_food($club_location = null)
    {

        if ($club_location) {
            $this->db->where('food_status', 'Available');
        }
        return $this->db->count_all_results('clubs');
    }


    public function count_with_parking($club_location = null)
    {

        if ($club_location) {
            $this->db->or_like('club_parking', 'yes');
            $this->db->or_like('club_parking', 'available');
            $this->db->or_like('club_parking', 'cars');
            $this->db->or_like('club_parking', 'many');
            $this->db->or_like('club_parking', 'car');
        }
        return $this->db->count_all_results('clubs');
    }



    public function count_modern_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('catagory', 'Modern');
        }
        return $this->db->count_all_results('clubs');
    }

    // COUNT BY SATR LEVEL





    public function food_availablity($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
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



    public function count_some($club_location='4 star') {

        if ($club_location) {
            $this->db->from('clubs');
            $this->db->where('club_star_level', $club_location);
            $query = $this->db->get();
            if ($query->num_rows > 0) {
                echo $club_location;
                return $this->db->count_all_results('clubs', $club_location);

            } else {
                return false;
            }
        }}

    public function modern_clubs($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('catagory', 'Modern');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function cultural_clubs($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('catagory', 'Cultural');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function count_adiss_clubs($link_adiss = null)
    {

        if ($link_adiss) {
            $this->db->where('club_city', 'Addis Ababa');

        }
        return $this->db->count_all_results('clubs');
    }

    public function count_clubs_inside_adiss($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_city', 'Addis Ababa');
        }
        return $this->db->count_all_results('clubs');
    }


    public function count_bole_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'bole');
        }
        return $this->db->count_all_results('clubs');
    }


    public function count_cazanches_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'cazanches');
        }
        return $this->db->count_all_results('clubs');
    }

    public function count_4_kilo_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', '4_kilo');
        }
        return $this->db->count_all_results('clubs');
    }

    public function count_piassa_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'piassa');
        }
        return $this->db->count_all_results('clubs');
    }

    public function count_22_mazoria_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', '22_mazoria');
        }
        return $this->db->count_all_results('clubs');
    }


    public function count_megenagna_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'megenagna');
        }
        return $this->db->count_all_results('clubs');
    }


    public function count_paster_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'paster');
        }
        return $this->db->count_all_results('clubs');
    }


    public function count_saris_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'saris');
        }
        return $this->db->count_all_results('clubs');
    }

    public function count_sar_bet_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'sar bet');
        }
        return $this->db->count_all_results('clubs');
    }

    public function count_asko_clubs($club_location = null)
    {

        if ($club_location) {
            $this->db->where('club_location', 'asko');
        }
        return $this->db->count_all_results('clubs');
    }

    //END OF COUNT


    //GET clubS
    public function get_list_of_clubs_inside_adiss($limit = 200, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_city', 'Addis Ababa');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    // public function get_list_of_clubs_inside_adama($link_adiss, $limit = 200, $offset = 0) {
    //     $this->db->select('*');
    //     $this->db->from('clubs_adama');

    //     if ($link_adiss) {
    //         $this->db->or_like('club_name', $link_adiss);
    //         $this->db->or_like('club_location', $link_adiss);
    //         $this->db->or_like('club_star_level', $link_adiss);
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


// public function get_list_of_clubs_inside_debre_zeit($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('clubs');

//         if ($link_adiss) {
//             $this->db->or_like('club_name', $link_adiss);
//             $this->db->or_like('club_location', $link_adiss);
//             $this->db->or_like('club_star_level', $link_adiss);
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


// public function get_list_of_clubs_inside_bahir_dar($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('clubs_bahir_dar');

//         if ($link_adiss) {
//             $this->db->or_like('club_name', $link_adiss);
//             $this->db->or_like('club_location', $link_adiss);
//             $this->db->or_like('club_star_level', $link_adiss);
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


// public function get_list_of_clubs_inside_dire_dawa($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('clubs_debre_zeit');

//         if ($link_adiss) {
//             $this->db->or_like('club_name', $link_adiss);
//             $this->db->or_like('club_location', $link_adiss);
//             $this->db->or_like('club_star_level', $link_adiss);
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


    public function get_list_of_clubs_bole($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'bole');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_clubs_cazanches($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'cazanches');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_clubs_4_kilo($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', '4 kilo');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_clubs_piassa($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'piassa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_clubs_22_mazoria($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', '22 mazoria');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_clubs_megenagna($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'megenagna');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_clubs_paster($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'paster');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_clubs_saris($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'saris');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_clubs_sar_bet($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'sar bet');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_clubs_asko($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_location', 'asko');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    //END OF GET clubS


    public function get_list_of_clubs_500ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
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

    public function get_list_of_clubs_1000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
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

    public function with_swimming_pool($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->not_like('club_swimming_pool', 'no');
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
        $this->db->from('clubs');
        $this->db->or_like('club_parking', 'Yes');
        $this->db->or_like('club_parking', 'available');
        $this->db->or_like('club_parking', 'cars');
        $this->db->or_like('club_parking', 'many');
        $this->db->or_like('club_parking', 'car');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


// public function search_clubs($club_location, $limit = 200, $offset = 0) {

//         $this->db->select('*');
//         $this->db->from('clubs');
//         if ($club_location) {
//             $this->db->like('club_location', $club_location);
//             $this->db->like('club_city', $club_location);
//             $this->db->like('club_name', $club_location);
//             $this->db->like('club_star_level', $club_location);
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


//     public function get_list_of_clubs_inside_diredawa() {

//         $this->db->select('*');
//         $this->db->from('clubs');
//         $query = $this->db->get();
// //print_r($query);
//         if ($query->num_rows() > 0) {
//             return $query->result();
//         } else {
//             return false;
//         }
//     }


//  public function search_clubs_inside_adiss($club_location) {
//
//        $this->db->select('*');
//        $this->db->from('clubs');
//
//        if($club_location)
//        {
//        $this->db->or_like('club_location', $club_location);
//        }
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }


    public function search_clubs($club_location)
    {

        $this->db->select('*');
        $this->db->from('clubs');
        if ($club_location) {
            $this->db->or_like('club_location', $club_location);
            $this->db->or_like('club_city', $club_location);
            $this->db->or_like('club_name', $club_location);
            $this->db->or_like('club_direction', $club_location);

        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function check_availablity($club_location)
    {

        $this->db->select('*');
        $this->db->from('clubs');

        if ($club_location) {
            $this->db->where('club_city', $club_location);
            $this->db->where('club_location', $club_location);
            // $this->db->where('club_parking',,$club_location);
            // $this->db->where('club_parking',,$club_location);

        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function search_clubs_inside_adiss_by_price_range($rooms_from)
    {

        $this->db->select('*');
        $this->db->from('clubs');
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


    public function get_club_details($id = 'id')
    {

        $this->db->select('*');
        $this->db->from('clubs');
        $this->db->where('club_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}

?>