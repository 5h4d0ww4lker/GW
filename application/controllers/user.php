<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
//        $this->load->model('hotels_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
    }

//    MAIN LINKS
    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('commons/header', $data);
        $this->load->view('index/slider', $data);
        $this->load->view('index/main', $data);
        $this->load->view('index/advertisement_view', $data);
        $this->load->view('commons/footer', $data);
    }




    public function home()
    {
        $data['title'] = 'Home';
        $this->load->view('commons/header', $data);
        $this->load->view('index/slider', $data);
        $this->load->view('index/main', $data);
        $this->load->view('index/advertisement_view', $data);
        $this->load->view('commons/footer', $data);
    }


    public function get_list_of_hotels_boles($offset = 0)
    {
        $hotel_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 12;
        $total = $this->hotels_model->count_bole_hotels($hotel_location);

        $config['base_url'] = site_url('hotels_controller/get_list_of_hotels_boles');

        // $config['base_url'] = site_url('hotels_controller/hotels');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_bole($hotel_location, $limit, $offset);

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/page_header', $data);


            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header_view', $data);
            $this->load->view('hotels/hotels_left_sider_view', $data);
            $this->load->view('hotels/no_results', $data);
            $this->load->view('commons/advertisement_view', $data);
            $this->load->view('commons/sponsors_view', $data);
            $this->load->view('commons/footer_view', $data);
        }
    }


    public function hotels()
    {


        $data['title'] = 'Hotels';
        $this->get_list_of_hotels_boles();
    }


    public function detail()
    {
        $data['title'] = 'Detail';
        $this->load->view('commons/header', $data);
        $this->load->view('hotels/discriptor', $data);
        $this->load->view('hotels/page_header', $data);
        $this->load->view('hotels/single_hotel', $data);


        $this->load->view('commons/footer', $data);
    }


    public function restaurants()
    {
        $data['title'] = 'Restaurants';
        $this->load->view('header_view', $data);
        $this->load->view('restaurants_left_sider_view', $data);
        $this->load->view('restaurants_main_view', $data);
        $this->load->view('advertisement_view', $data);
        $this->load->view('sponsors_view', $data);
        $this->load->view('footer_view', $data);
    }

    public function guest_houses()
    {
        $data['title'] = 'Guest Houses';
        $this->load->view('header_view', $data);
        $this->load->view('guest_houses_left_sider_view', $data);
        $this->load->view('guest_houses_main_view', $data);
        $this->load->view('advertisement_view', $data);
        $this->load->view('sponsors_view', $data);
        $this->load->view('footer_view', $data);
    }

    public function resorts()
    {
        $data['title'] = 'Resorts';
        $this->load->view('header_view', $data);
        $this->load->view('resorts_left_sider_view', $data);
        $this->load->view('resorts_main_view', $data);
        $this->load->view('advertisement_view', $data);
        $this->load->view('sponsors_view', $data);
        $this->load->view('footer_view', $data);
    }

    public function clubs()
    {
        $data['title'] = 'Clubs';
        $this->load->view('header_view', $data);
        $this->load->view('clubs_left_sider_view', $data);
        $this->load->view('clubs_main_view', $data);
        $this->load->view('advertisement_view', $data);
        $this->load->view('sponsors_view', $data);
        $this->load->view('footer_view', $data);
    }

//    DETAILS


    public function load_hotel_details()
    {
        $this->load->view('header_view');
        $this->load->view('hotels/hotels_left_sider_view');
        $this->load->view('hotels_detail_view');
        $this->load->view('advertisement_view');
        $this->load->view('sponsors_view');
        $this->load->view('footer_view');
    }

    public function load_restaurant_details()
    {
        $this->load->view('header_view');
        $this->load->view('restaurants_left_sider_view');
        $this->load->view('restaurants_detail_view');
        $this->load->view('advertisement_view');
        $this->load->view('sponsors_view');
        $this->load->view('footer_view');
    }

    public function load_guest_house_details()
    {
        $this->load->view('header_view');
        $this->load->view('guest_houses_left_sider_view');
        $this->load->view('guest_houses_detail_view');
        $this->load->view('advertisement_view');
        $this->load->view('sponsors_view');
        $this->load->view('footer_view');
    }

    public function load_resort_details()
    {
        $this->load->view('header_view');
        $this->load->view('resorts_left_sider_view');
        $this->load->view('resorts_detail_view');
        $this->load->view('advertisement_view');
        $this->load->view('sponsors_view');
        $this->load->view('footer_view');
    }

    public function load_club_details()
    {
        $this->load->view('header_view');
        $this->load->view('clubs_left_sider_view');
        $this->load->view('clubs_detail_view');
        $this->load->view('advertisement_view');
        $this->load->view('sponsors_view');
        $this->load->view('footer_view');
    }


    public function get_list_of_hotels_inside_adiss($offset = 0)
    {
        $link_adiss = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 6;
        $total = $this->user_model->count_adiss_hotels($link_adiss);
        $config['base_url'] = site_url('user/get_list_of_hotels_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->user_model->get_list_of_hotels_inside_adiss($link_adiss, $limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('header_view', $data);
            $this->load->view('hotels_left_sider_view', $data);
            $this->load->view('searchs', array('link_adiss' => $result));
            $this->load->view('advertisement_view', $data);
            $this->load->view('sponsors_view', $data);
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function search_hotels()
    {
        $link_adiss = $this->input->post('search_term');
        $data['link_adiss'] = $this->user_model->get_list_of_hotels_inside_adiss($link_adiss);
        $this->load->view("admin_header", $data);
        $this->load->view("search_view", $data);
        $this->load->view("footer_view", $data);
    }

    public function link_hotels_inside_adama()
    {
        $this->get_list_of_hotels_inside_adama();
    }

    public function get_list_of_hotels_inside_adama()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_hotels_inside_adama();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_inside_bahir_dar()
    {
        $this->get_list_of_hotels_inside_adiss();
    }

    public function get_list_of_hotels_inside_bahir_dar()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_hotels_inside_bahir_dar();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_inside_dire_dawa()
    {
        $this->get_list_of_hotels_inside_adiss();
    }

    public function get_list_of_hotels_inside_dire_dawa()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

//    INSIDE ADISSS

    public function link_hotels_bole_area()
    {
        $this->get_list_of_hotels_bole_area();
    }

    public function get_list_of_hotels_bole_area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_piassa_area()
    {
        $this->get_list_of_hotels_piassa_area();
    }

    public function get_list_of_hotels_piassa_area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_4kilo_area()
    {
        $this->get_list_of_hotels_4kilo_area();
    }

    public function get_list_of_hotels_4kilo_area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_kazanchis_area()
    {
        $this->get_list_of_hotels_kazanchis_area();
    }

    public function get_list_of_hotels_kazanchis_area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_22area()
    {
        $this->get_list_of_hotels_22_area();
    }

    public function get_list_of_hotels_22area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_megenagna_area()
    {
        $this->get_list_of_hotels_megenagna_area();
    }

    public function get_list_of_megenagna_area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_shiromeda_area()
    {
        $this->get_list_of_hotels_shiromeda_area();
    }

    public function get_list_of_shiromeda_area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_sar_bet_area()
    {
        $this->get_list_of_hotels_sar_bet_area();
    }

    public function get_list_of_sar_bet_area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function link_hotels_asko_area()
    {
        $this->get_list_of_hotels_asko_area();
    }

    public function get_list_of_hotels_asko_area()
    {
        $data = array( //            'company_name' => $company_name,
//            'contact_person' => $contact_person
        );
        $result = $this->user_model->get_list_of_follow_ups();
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('follow_up_view', array('follow_ups' => $result));
            $this->load->view('footer_view', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('header_view', $data);
            $this->load->view('admin_page', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function search_hotels_inside_adiss()
    {
        $hotel_location = $this->input->post('search_term');
        $data['hotel_location'] = $this->user_model->search_hotels_inside_adiss($hotel_location);
        $this->load->view('header_view', $data);
        $this->load->view('hotels_left_sider_view', $data);
        $this->load->view('hotels_inside_adiss_search_view', $data);
        $this->load->view('advertisement_view', $data);
        $this->load->view('sponsors_view', $data);
        $this->load->view('footer_view', $data);
    }

    public function search_hotels_inside_adiss_by_price_range()
    {
        $rooms_from = $this->input->post('search_term');
        $data['rooms_from'] = $this->user_model->search_hotels_inside_adiss_by_price_range($rooms_from);
        $this->load->view('header_view', $data);
        $this->load->view('hotels_left_sider_view', $data);
        $this->load->view('hotels_inside_adiss_by_price_range_view', $data);
        $this->load->view('advertisement_view', $data);
        $this->load->view('sponsors_view', $data);
        $this->load->view('footer_view', $data);
    }

    public function search_hotels_inside_adiss_by_star_level()
    {
        $star_level = $this->input->post('search_term');
        $data['star_level'] = $this->user_model->search_hotels_inside_adiss_by_star_level($star_level);
        $this->load->view('header_view', $data);
        $this->load->view('hotels_left_sider_view', $data);
        $this->load->view('search_hotels_by_star_level_view', $data);
        $this->load->view('advertisement_view', $data);
        $this->load->view('sponsors_view', $data);
        $this->load->view('footer_view', $data);
    }


}

?>.




