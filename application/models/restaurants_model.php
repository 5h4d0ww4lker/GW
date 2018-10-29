<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class restaurants_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

//                       COUNTS





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




    public function check_availablity($restaurant_location, $restaurant_city, $seat_type, $restaurant_class)
    {

        $this->db->select('*');
        $this->db->from('restaurants');

        $this->db->where('restaurant_city', $restaurant_city);
        $this->db->where('restaurant_location', $restaurant_location);
        $this->db->or_like('seat_type', $seat_type);
        $this->db->where('restaurant_class', $restaurant_class);
        $query = $this->db->get();
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

    public function add_contact($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
    }
    public function load_restaurant_details($restaurant_id)
    {
        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_id', $restaurant_id);


        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function comming_soon($restaurant_location)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'bole');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


// COUNT BY CITY

    public function count_debre_Zeit_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_city', 'Debre Zeit');

        }
        return $this->db->count_all_results('restaurants');
    }


    public function count_adama_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_city', 'Adama');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_bahir_dar_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_city', 'Bahir Dar');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_dire_dawa_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_city', 'Dire Dawa');
        }
        return $this->db->count_all_results('restaurants');
    }

    // COUNT BY SATR LEVEL

    public function count_luxury_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_class', 'Luxury');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_standard_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_class', 'Standard');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_medium_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_class', 'Medium');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_low_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_class', 'Low');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_ordinary_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_class', 'Ordinary');
        }
        return $this->db->count_all_results('restaurants');
    }


// GET restaurantS BY STAR LEVEL

    public function get_luxury_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'Luxury');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_standard_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'Standard');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_ordinary_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'Ordinary');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_medium_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'Medium');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_low_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'Low');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_4_star_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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


    public function get_3_star_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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

    public function get_2_star_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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

    public function get_1_star_restaurants($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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


    public function count_adiss_restaurants($link_adiss = null)
    {

        if ($link_adiss) {
            $this->db->where('restaurant_city', 'Addis Ababa');

        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_restaurants_inside_adiss($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_city', 'Addiss Ababa');
        }
        return $this->db->count_all_results('restaurants');
    }


    public function count_bole_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', 'bole');
        }
        return $this->db->count_all_results('restaurants');
    }


    public function count_cazanches_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', 'cazanchis');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_4_kilo_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', '4 kilo');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_piassa_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', 'piassa');
        }
        return $this->db->count_all_results('restaurants');
    }


    public function count_22_mazoria_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', '22 mazoria');
        }
        return $this->db->count_all_results('restaurants');
    }


    public function count_megenagna_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', 'megenagna');
        }
        return $this->db->count_all_results('restaurants');
    }


    public function count_paster_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', 'paster');
        }
        return $this->db->count_all_results('restaurants');
    }


    public function count_saris_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', 'saris');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_sar_bet_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', 'sar bet');
        }
        return $this->db->count_all_results('restaurants');
    }

    public function count_asko_restaurants($restaurant_location = null)
    {

        if ($restaurant_location) {
            $this->db->where('restaurant_location', 'asko');
        }
        return $this->db->count_all_results('restaurants');
    }

    //END OF COUNT


    //                               //GET restaurantS
    // public function get_list_of_restaurants_inside_adiss($link_adiss, $limit = 200, $offset = 0) {

    //     $this->db->select('*');
    //     $this->db->from('restaurants');
    //     $this->db->where('star_level','5 star');
    //     $this->db->limit($limit);
    //     $this->db->offset($offset);

    //     $query = $this->db->get();
    //     if ($query->num_rows > 0) {
    //         return $query->result();
    //     } else {
    //         return false;
    //     }
    // }


    public function get_list_of_restaurants_inside_adiss($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_city', 'Addis Ababa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_restaurants_inside_adama($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_city', 'Adama');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_restaurants_inside_debre_zeit($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_city', 'Debre Zeit');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_restaurants_inside_dire_dawa($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_city', 'Dire Dawa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_inside_bahir_dar($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_city', 'Bahir Dar');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    // public function get_list_of_restaurants_inside_adama($link_adiss, $limit = 200, $offset = 0) {
    //     $this->db->select('*');
    //     $this->db->from('restaurants');

    //     if ($link_adiss) {
    //         $this->db->or_like('restaurant_name', $link_adiss);
    //         $this->db->or_like('restaurant_location', $link_adiss);
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


// public function get_list_of_restaurants_inside_debre_zeit($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('restaurants');

//         if ($link_adiss) {
//             $this->db->or_like('restaurant_name', $link_adiss);
//             $this->db->or_like('restaurant_location', $link_adiss);
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


// public function get_list_of_restaurants_inside_bahir_dar($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('restaurants_bahir_dar');

//         if ($link_adiss) {
//             $this->db->or_like('restaurant_name', $link_adiss);
//             $this->db->or_like('restaurant_location', $link_adiss);
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


// public function get_list_of_restaurants_inside_dire_dawa($link_adiss, $limit = 200, $offset = 0) {
//         $this->db->select('*');
//         $this->db->from('restaurants');

//         if ($link_adiss) {
//             $this->db->or_like('restaurant_name', $link_adiss);
//             $this->db->or_like('restaurant_location', $link_adiss);
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


    public function get_list_of_restaurants_bole($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'bole');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_cazanches($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'cazanchis');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_restaurants_4_kilo($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', '4 kilo');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_piassa($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'piassa');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_restaurants_22_mazoria($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', '22 mazoria');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_megenagna($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'megenagna');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_paster($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'paster');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_restaurants_saris($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'saris');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_sar_bet($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'sar bet');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_asko($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_location', 'asko');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    //END OF GET restaurantS


    public function get_list_of_restaurants_500ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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

    public function get_list_of_restaurants_1000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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

    public function get_list_of_restaurants_1500ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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

    public function get_list_of_restaurants_2000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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


    public function get_list_of_restaurants_luxury($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'luxury');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_standard($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'standard');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_list_of_restaurants_medium($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'medium');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_restaurants_ordinary($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'ordinary');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_list_of_restaurants_low($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_class', 'low');
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }






    public function get_list_of_restaurants_more2000ETB($limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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

    public function search_restaurants_inside_adiss($restaurant_location, $limit = 200, $offset = 0)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        if ($restaurant_location) {
            $this->db->like('restaurant_location', $restaurant_location);
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


    public function get_list_of_restaurants_inside_diredawa()
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $query = $this->db->get();
//print_r($query);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


//  public function search_restaurants_inside_adiss($restaurant_location) {
//       
//        $this->db->select('*');
//        $this->db->from('restaurants');
//        
//        if($restaurant_location)
//        {
//        $this->db->or_like('restaurant_location', $restaurant_location);
//        }
//        $query = $this->db->get();
//        if ($query->num_rows > 0) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }  

    public function search_restaurants($search_term)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        if ($search_term) {
            $this->db->or_like('restaurant_class', $search_term);

            $this->db->or_like('restaurant_name', $search_term);
            $this->db->or_like('restaurant_direction', $search_term);
        }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function search_restaurants_inside_adiss_by_star_level($star_level)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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

    public function search_restaurants_inside_adiss_by_price_range($rooms_from)
    {

        $this->db->select('*');
        $this->db->from('restaurants');
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


    public function get_restaurant_details($id = 'id')
    {

        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->where('restaurant_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}

?>