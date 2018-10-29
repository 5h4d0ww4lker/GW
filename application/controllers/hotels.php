<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hotels extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('hotels_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');
    }

    public function hotel() {
        $data['title'] = 'Hotels';
        $this->get_list_of_hotels_inside_adiss();
    }

    function update_bi() {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(
            'hotel_phone_mobile' => $this->input->post('hotel_phone_mobile1'),
            'hotel_city' => $this->input->post('hotel_city1'),
            'hotel_location' => $this->input->post('hotel_location1'),
            'hotel_direction' => $this->input->post('hotel_direction1'),
            'hotel_email' => $this->input->post('hotel_email1'),
            'hotel_web_site' => $this->input->post('hotel_web_site1')
        );
        $this->hotels_model->update_bi($hotel_id, $data);
        $this->get_client_contents($data);
    }

//
//
//function show_student_content() {
//$id = $this->uri->segment(3);
//$data['students'] = $this->update_model->show_students();
//$data['single_student'] = $this->update_model->show_student_id($id);
//$this->load->view('update_view', $data);
//}
//
//
//function udate_content() {
//$hotel_id= $this->input->post('hotel_id');
//$data = array(
//// 'Student_Name' => $this->input->post('dname'),
//// 'Student_Email' => $this->input->post('demail'),
//// 'Student_Mobile' => $this->input->post('dmobile'),
//// 'Student_Address' => $this->input->post('daddress')
//);
//$this->hotels_model->update_hotel_content($hotel_id,$data);
//$this->show_student_id();
//}


    public function update_basic_info() {
        $hotel_id = $this->input->post('hotel_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->hotels_model->get_content($hotel_id, $uname, $password);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/header');
            $this->load->view('admin/update_basic_info', array('company_list' => $result));
            $this->load->view('admin/aside', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('clubs/no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }

    public function update_services() {

        $this->load->view('admin/header');
        $this->load->view('admin/update_services');
        $this->load->view('admin/aside');
    }

    public function update_room_services() {

        $this->load->view('admin/header');
        $this->load->view('admin/update_room_services');
        $this->load->view('admin/aside');
    }

    public function update_room_prices() {

        $this->load->view('admin/header');
        $this->load->view('admin/update_room_prices');
        $this->load->view('admin/aside');
    }

    public function update_available_room_types() {

        $this->load->view('admin/header');
        $this->load->view('admin/update_available_room_types');
        $this->load->view('admin/aside');
    }

    public function update_available_food_items() {

        $this->load->view('admin/header');
        $this->load->view('admin/update_available_food_items');
        $this->load->view('admin/aside');
    }

    public function update_available_drink_items() {

        $this->load->view('admin/header');
        $this->load->view('admin/update_available_drink_items');
        $this->load->view('admin/aside');
    }

    public function login() {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/login');
        // $this->load->view('admin/footer', $data);
    }

    public function login_process() {

        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $result = $this->hotels_model->login($uname, $password);
        $this->session->set_userdata('uname', $uname);
        $this->session->set_userdata('password', $password);
        // print_r($result);
//die();
        if ($result) {
            $this->session->set_userdata($result);
            $this->get_client_contents($result);
        } else {

            $this->login();
        }
    }

    function logout() {
        $this->session->sess_destroy();
        $this->load->view('admin/login');
    }

//    public function trial()
//    {
//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->hotels_model->get_content($hotel_id, $uname, $password);
//        if ($result) {
//
//            $this->session->set_userdata('logged_in', $result);
//            $this->load->view('admin/header');
//            $this->load->view('admin/main', array('company_list' => $result));
//            $this->load->view('admin/aside', array('company_list' => $result));
//
//
////              print_r($result);
//// die();
//        } else {
//            $data = array(
//                'error_message' => 'List Empity'
//            );
//            $this->load->view('admin_header', $data);
//            $this->load->view('clubs/no_results', $data);
//            $this->load->view('footer_view', $data);
//        }
//    }


    public function get_client_contents($userdata) {
        $hotel_id = $this->input->post('hotel_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->hotels_model->get_content($hotel_id, $uname, $password, $userdata);
        if ($result) {

            $this->session->set_userdata($result);

            $this->load->view('admin/header');
            $this->load->view('admin/main', array('company_list' => $result));
            $this->load->view('admin/aside', array('company_list' => $result));

            $this->session->set_userdata($result);


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empty'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('clubs/no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }

    // public function load_hotel_details($hotel_id)
    //   {
    //       $result = $this->hotels_model->load_hotel_details($hotel_id);
    //       if ($result) {
    //           $this->load->view('commons/header');
    //           $this->load->view('hotels/discriptor');
    //           $this->load->view('hotels/single_hotel', array('hotel_detail' => $result));
    //          $this->load->view('commons/footer');
    //       } else {
    //           $data = array(
    //               'error_message' => 'List Empity'
    //           );
    //           $this->load->view('hotels/no_results', $data);
    //       }
    //   }


    public function booking($hotel_id) {
        $result = $this->hotels_model->load_hotel_details($hotel_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('hotels/toper2', array('hotel_detail' => $result));
            $this->load->view('hotels/booking', array('hotel_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('hotels/no_results', $data);
        }
    }

    public function booking_success($hotel_id) {
        $result = $this->hotels_model->load_hotel_details($hotel_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('hotels/toper2', array('hotel_detail' => $result));
            $this->load->view('hotels/success', array('hotel_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('hotels/no_results', $data);
        }
    }

    public function contact_success($hotel_id) {
        $result = $this->hotels_model->load_hotel_details($hotel_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('hotels/toper2', array('hotel_detail' => $result));
            $this->load->view('hotels/contact_success', array('hotel_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('hotels/no_results', $data);
        }
    }

    public function contact($hotel_id) {
        $result = $this->hotels_model->load_hotel_details($hotel_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('hotels/toper2', array('hotel_detail' => $result));
            $this->load->view('hotels/contact_view', array('hotel_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('hotels/no_results', $data);
        }
    }

    public function add_book() {
        $hotel_id = $this->input->post('hotel_id');
        $post = $this->input->post(); {
            $q = $this->hotels_model->add_book('booking', $post);
        }

        if ($q) {
            $this->booking_success($hotel_id);
//            $this->success();
        } else {
            $this->load->view('hotels/s');
        }
    }

    public function add_contact() {
        $hotel_id = $this->input->post('hotel_id');
        $post = $this->input->post(); {
            $q = $this->hotels_model->add_book('request', $post);
        }

        if ($q) {
            $this->contact_success($hotel_id);
//            $this->success();
        } else {
            $this->load->view('hotels/s');
        }
    }

    public function success() {


        $this->load->view('hotels/success');
        $this->get_list_of_hotels_boles();
    }

    public function check_availablity($offset = 0) {
        $hotel_city = $this->input->post('hotel_city');
        $hotel_location = $this->input->post('hotel_location');
        $star_level = $this->input->post('star_level');
        $rooms_from = $this->input->post('rooms_from');
        $free_room = $this->input->post('free_room');
        $available_room_types = $this->input->post('available_room_types');
        $this->load->library('pagination');
        $limit = 4;
        $total = 20;

        $config['base_url'] = site_url('hotels/get_list_of_hotels_boles');

        // $config['base_url'] = site_url('hotels/hotels');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->check_availablity($hotel_city, $hotel_location, $star_level, $rooms_from, $free_room, $available_room_types, $limit, $offset);


        if ($result) {



            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/search_view', array('hotel_location' => $result));
            $this->load->view('hotels/advertisement_view', array('hotel_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }

//
//    public function check_availablity($offset = 0)
//    {
//        $hotel_location = $this->input->post('search_term');
//        $data['hotel_location'] = $this->hotels_model->check_availablity($hotel_location);
//        $this->load->library('pagination');
//        $limit = 8;
//        $total = $this->hotels_model->count_hotels_inside_adiss($hotel_location);
//        $config['base_url'] = site_url('hotels/check_availablity');
//        $config['total_rows'] = $total;
//        $config['per_page'] = $limit;
//         $config['num_links'] = 5;
        // $config['next_link'] = 'Next';
        // $config['prev_link'] = 'Previous';

//        $this->pagination->initialize($config);
//        $data['page_links'] = $this->pagination->create_links();
//        $result = $this->hotels_model->check_availablity($hotel_location, $limit, $offset);
//        if ($result) {
//            $this->load->view('commons/header', $data);
//            $this->load->view('hotels/discriptor', $data);
//            $this->load->view('hotels/check', $data);
//            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));    
//            $this->load->view('commons/advertisement_view', $data);
//            $this->load->view('commons/sponsors_view', $data);
//            $this->load->view('commons/footer', $data);
//        } else {
//            $data = array(
//                'error_message' => 'List Empity'
//            );
//            $this->load->view('commons/header', $data);
//            $this->load->view('hotels/discriptor', $data);
//            $this->load->view('hotels/no_results', $data);
//            $this->load->view('commons/advertisement_view', $data);
//            $this->load->view('commons/sponsors_view', $data);
//            $this->load->view('commons/footer', $data);
//        }
//    }


    public function load_hotel_details($hotel_id) {


        $result = $this->hotels_model->load_hotel_details($hotel_id);

        if ($result) {
            $this->load->view('commons/header');
            $this->load->view('hotels/toper', array('hotel_detail' => $result));
            $this->load->view('hotels/single_hotel', array('hotel_detail' => $result));
            $this->load->view('hotels/advertisement_view');
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );


            $this->load->view('hotels/no_results', $data);
        }
    }

    public function get_list_of_hotels_boles($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = 20;

        $config['base_url'] = site_url('hotels/get_list_of_hotels_boles');

        $config['base_url'] = site_url('hotels/hotels');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_bole($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            // $this->load->view('hotels/check', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_inside_adiss($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_adiss_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_inside_adiss($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_inside_debre_zeit($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_debre_zeit_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_inside_debre_zeit');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_inside_debre_zeit($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_inside_adama($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_adama_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_inside_adama');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_inside_adama($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_inside_bahir_dar($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_bahir_dar_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_inside_bahir_dar');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_inside_bahir_dar($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_inside_dire_dawa($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_dire_dawa_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_inside_dire_dawa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_inside_dire_dawa($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }

// INSIDE ADDISS


    public function get_list_of_hotels_bole($offset = 0) {
//        $hotel_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_bole_hotels('h');
//        print_r($total);
//        exit;
        $config['base_url'] = site_url('hotels/get_list_of_hotels_bole');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

       
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_bole($limit, $offset);
//        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('hotel_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function check() {


        $this->load->view('commons/header');
        $this->load->view('hotels/discriptor2');
        $this->load->view('hotels/searcher');
        $this->load->view('hotels/advertisement_view');
        $this->load->view('commons/footer');
    }

    public function get_list_of_hotels_cazanches($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_cazanches_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_cazanches');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_cazanches($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_4_kilo($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_4_kilo_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_4_kilo');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_4_kilo($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_piassa($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_piassa_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_piassa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_piassa($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_22_mazoria($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_22_mazoria_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_22_mazoria');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_22_mazoria($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_megenagna($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_megenagna_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_megenagna');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_megenagna($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_paster($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_paster_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_paster');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_paster($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_saris($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_saris_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_saris');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_saris($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_sar_bet($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_sar_bet_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_sar_bet');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_sar_bet($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_asko($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_asko_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_asko');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_asko($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function search_hotels_inside_adiss($offset = 0) {

        $data['hotel_location'] = $this->hotels_model->search_hotels_inside_adiss('h');
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->hotels_model->count_hotels_inside_adiss();
        $config['base_url'] = site_url('hotels/search_hotels_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->search_hotels_inside_adiss($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function search_hotels_inside_adisss($offset = 0) {

        $data['hotel_location'] = $this->hotels_model->search_hotels_inside_adiss('h');
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->hotels_model->count_hotels_inside_adiss();
        $config['base_url'] = site_url('hotels/search_hotels_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->search_hotels_inside_adiss($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/hotels_main_view', array('hotel_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function search_hotels($offset = 0) {
        $hotel_location = $this->input->post('search_term');
        $data['hotel_location'] = $this->hotels_model->search_hotels($hotel_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = 20;
        $config['base_url'] = site_url('hotels/search_hotels');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->search_hotels($hotel_location, $limit, $offset);
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/search_view', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', $data);
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    //   public function search_hotels() {
    //     $hotel_location = $this->input->post('search_term');
    //     $data['hotel_location'] = $this->hotels_model->search_hotels($hotel_location);
    //     $this->load->view("admin_header", $data);
    //     $this->load->view("search_view", $data);
    //     $this->load->view("footer", $data);
    // }


    public function search_hotels_inside_adiss_by_price_range() {
        $rooms_from = $this->input->post('search_term');
        $data['rooms_from'] = $this->hotels_model->search_hotels_inside_adiss_by_price_range($rooms_from);
        $this->load->view('commons/header', $data);
        $this->load->view('hotel/discriptor', $data);

        $this->load->view('hotel/hotels_inside_adiss_by_price_range_view', $data);

        $this->load->view('commons/footer', $data);
    }

    // GET BY STAR LEVLE


    public function get_list_of_hotels_5_star($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_some('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_5_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_5_star_hotels($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_4_star($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_4_star_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_4_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_4_star_hotels($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_3_star($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_3_star_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_3_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_3_star_hotels($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_2_star($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_2_star_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_2_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_2_star_hotels($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_1_star($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_1_star_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_1_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_1_star_hotels($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

//GET BY PRICE RANGE
    public function get_list_of_hotels_500ETB($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_500ETB_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_500ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_500ETB($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_1000ETB($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_1000ETB_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_1000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_1000ETB($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_1500ETB($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_500ETB_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_1500ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_1500ETB($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_2000ETB($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_2000ETB_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_2000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_2000ETB($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function with_swimming_pool($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_hotels_with_swimming_pool('h');
        $config['base_url'] = site_url('hotels/with_swimming_pool');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->with_swimming_pool($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));

            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function with_parking($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_hotels_with_parking('h');
        $config['base_url'] = site_url('hotels/with_parking');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->with_parking($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_hotels_more2000ETB($offset = 0) {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->hotels_model->count_more2000ETB_hotels('h');
        $config['base_url'] = site_url('hotels/get_list_of_hotels_more2000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->hotels_model->get_list_of_hotels_more2000ETB($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);

            $this->load->view('hotels/thumbnail', array('hotel_location' => $result));


            $this->load->view('hotels/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function search_hotels_inside_adiss_by_star_level() {
        $star_level = $this->input->post('search_term');
        $data['star_level'] = $this->hotels_model->search_hotels_inside_adiss_by_star_level($star_level);
        $this->load->view('commons/header', $data);
        $this->load->view('hotels/discriptor', $data);
        $this->load->view('hotels/search_hotels_by_star_level_view', $data);

        $this->load->view('commons/footer', $data);
    }

}
?>.




