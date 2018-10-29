<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class guest_houses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guest_houses_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }

    public function guest_house()
    {
        $data['title'] = 'guest_houses';
        $this->get_list_of_guest_houses_inside_adiss();
    }


    function update_bi()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'guest_house_phone_mobile' => $this->input->post('guest_house_phone_mobile1'),
            'guest_house_city' => $this->input->post('guest_house_city1'),
            'guest_house_location' => $this->input->post('guest_house_location1'),
            'guest_house_direction' => $this->input->post('guest_house_direction1'),
            'guest_house_email' => $this->input->post('guest_house_email1'),
            'guest_house_web_site' => $this->input->post('guest_house_web_site1')
        );
        $this->guest_houses_model->update_bi($guest_house_id, $data);
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
//$guest_house_id= $this->input->post('guest_house_id');
//$data = array(
//// 'Student_Name' => $this->input->post('dname'),
//// 'Student_Email' => $this->input->post('demail'),
//// 'Student_Mobile' => $this->input->post('dmobile'),
//// 'Student_Address' => $this->input->post('daddress')
//);
//$this->guest_houses_model->update_guest_house_content($guest_house_id,$data);
//$this->show_student_id();
//}


    public function update_basic_info()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->guest_houses_model->get_content($guest_house_id, $uname, $password);
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

    public function update_services()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/update_services');
        $this->load->view('admin/aside');
    }

    public function update_room_services()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/update_room_services');
        $this->load->view('admin/aside');
    }


    public function update_room_prices()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/update_room_prices');
        $this->load->view('admin/aside');
    }


    public function update_available_room_types()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/update_available_room_types');
        $this->load->view('admin/aside');
    }


    public function update_available_food_items()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/update_available_food_items');
        $this->load->view('admin/aside');
    }


    public function update_available_drink_items()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/update_available_drink_items');
        $this->load->view('admin/aside');
    }


    public function login()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/login');
        // $this->load->view('admin/footer', $data);
    }


    public function login_process()
    {

        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $result = $this->guest_houses_model->login($uname, $password);
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


    function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('admin/login');
    }




//    public function trial()
//    {
//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->guest_houses_model->get_content($guest_house_id, $uname, $password);
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


    public function get_client_contents($userdata)
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->guest_houses_model->get_content($guest_house_id, $uname, $password, $userdata);
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





    // public function load_guest_house_details($guest_house_id)
    //   {


    //       $result = $this->guest_houses_model->load_guest_house_details($guest_house_id);

    //       if ($result) {
    //           $this->load->view('commons/header');
    //           $this->load->view('guest_houses/discriptor');
    //           $this->load->view('guest_houses/single_guest_house', array('guest_house_detail' => $result));
    //          $this->load->view('commons/footer');
    //       } else {
    //           $data = array(
    //               'error_message' => 'List Empity'
    //           );


    //           $this->load->view('guest_houses/no_results', $data);
    //       }
    //   }


    public function booking($guest_house_id)
    {
        $result = $this->guest_houses_model->load_guest_house_details($guest_house_id);

        if ($result) {

            $this->load->view('commons/header');
             $this->load->view('guest_houses/toper2',array('guest_house_detail' => $result));
            $this->load->view('guest_houses/booking', array('guest_house_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('guest_houses/no_results', $data);
        }
    }

    public function booking_success($guest_house_id)
    {
        $result = $this->guest_houses_model->load_guest_house_details($guest_house_id);

        if ($result) {

            $this->load->view('commons/header');
           $this->load->view('guest_houses/toper2', array('guest_house_detail' => $result));
            $this->load->view('guest_houses/success', array('guest_house_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('guest_houses/no_results', $data);
        }
    }


public function check()
    {
     
            
            $this->load->view('commons/header');
            $this->load->view('guest_houses/discriptor2');
            $this->load->view('guest_houses/searcher');
            $this->load->view('guest_houses/advertisement_view');
            $this->load->view('commons/footer');
        
    }



    public function contact_success($guest_house_id)
    {
        $result = $this->guest_houses_model->load_guest_house_details($guest_house_id);

        if ($result) {

            $this->load->view('commons/header');
           $this->load->view('guest_houses/toper2', array('guest_house_detail' => $result));
            $this->load->view('guest_houses/contact_success', array('guest_house_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('guest_houses/no_results', $data);
        }
    }


    public function contact($guest_house_id)
    {
        $result = $this->guest_houses_model->load_guest_house_details($guest_house_id);

        if ($result) {

            $this->load->view('commons/header');
           $this->load->view('guest_houses/toper2', array('guest_house_detail' => $result));
            $this->load->view('guest_houses/contact_view', array('guest_house_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('guest_houses/no_results', $data);
        }
    }


    public function add_book()
    {   $guest_house_id = $this->input->post('guest_house_id');
        $post = $this->input->post();
        {
            $q = $this->guest_houses_model->add_book('booking', $post);

        }

        if ($q) {
            $this->booking_success($guest_house_id);
//            $this->success();

        } else {
            $this->load->view('guest_houses/s');

        }


    }


    public function add_contact()
    {   $guest_house_id = $this->input->post('guest_house_id');
        $post = $this->input->post();
        {
            $q = $this->guest_houses_model->add_book('request', $post);

        }

        if ($q) {
            $this->contact_success($guest_house_id);
//            $this->success();

        } else {
            $this->load->view('guest_houses/s');

        }


    }



    public function success()
    {


        $this->load->view('guest_houses/success');
        $this->get_list_of_guest_houses_boles();

    }


    public function check_availablity($offset = 0)
    {
        $guest_house_location = $this->input->post('search_term');

        $this->load->library('pagination');
        $limit = 4;
        $total = 20;

        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_boles');

        // $config['base_url'] = site_url('guest_houses/guest_houses');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_bole($guest_house_location, $limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            // $this->load->view('guest_houses/check', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
                            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }




//
//    public function check_availablity($offset = 0)
//    {
//        $guest_house_location = $this->input->post('search_term');
//        $data['guest_house_location'] = $this->guest_houses_model->check_availablity($guest_house_location);
//        $this->load->library('pagination');
//        $limit = 8;
//        $total = $this->guest_houses_model->count_guest_houses_inside_adiss($guest_house_location);
//        $config['base_url'] = site_url('guest_houses/check_availablity');
//        $config['total_rows'] = $total;
//        $config['per_page'] = $limit;
//         $config['num_links'] = 5;
        // $config['next_link'] = 'Next';
        // $config['prev_link'] = 'Previous';

//        $this->pagination->initialize($config);
//        $data['page_links'] = $this->pagination->create_links();
//        $result = $this->guest_houses_model->check_availablity($guest_house_location, $limit, $offset);
//        if ($result) {
//            $this->load->view('commons/header', $data);
//            $this->load->view('guest_houses/discriptor', $data);
//            $this->load->view('guest_houses/check', $data);
//            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
//            $this->load->view('commons/advertisement_view', $data);
//            $this->load->view('commons/sponsors_view', $data);
//            $this->load->view('commons/footer', $data);
//        } else {
//            $data = array(
//                'error_message' => 'List Empity'
//            );
//            $this->load->view('commons/header', $data);
//            $this->load->view('guest_houses/discriptor', $data);
//            $this->load->view('guest_houses/no_results', $data);
//            $this->load->view('commons/advertisement_view', $data);
//            $this->load->view('commons/sponsors_view', $data);
//            $this->load->view('commons/footer', $data);
//        }
//    }


    public function load_guest_house_details($guest_house_id)
    {


        $result = $this->guest_houses_model->load_guest_house_details($guest_house_id);

        if ($result) {
            $this->load->view('commons/header');
            $this->load->view('guest_houses/toper', array('guest_house_detail' => $result));
            $this->load->view('guest_houses/single_guest_house', array('guest_house_detail' => $result));
            $this->load->view('guest_houses/advertisement_view');
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );


            $this->load->view('guest_houses/no_results', $data);
        }
    }

    public function get_list_of_guest_houses_boles($offset = 0)
    {
        $guest_house_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = 20;

        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_boles');

        // $config['base_url'] = site_url('guest_houses/guest_houses');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_bole($guest_house_location, $limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            // $this->load->view('guest_houses/check', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_guest_houses_inside_adiss($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_adiss_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_inside_adiss($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_inside_debre_zeit($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_debre_zeit_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_inside_debre_zeit');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_inside_debre_zeit($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_guest_houses_inside_adama($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_adama_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_inside_adama');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_inside_adama($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));


            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_inside_bahir_dar($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_bahir_dar_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_inside_bahir_dar');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_inside_bahir_dar($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_inside_dire_dawa($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_dire_dawa_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_inside_dire_dawa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_inside_dire_dawa($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }


// INSIDE ADDISS


    public function get_list_of_guest_houses_bole($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_bole_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_bole');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_bole($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_cazanches($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_cazanches_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_cazanches');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_cazanches($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_4_kilo($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_4_kilo_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_4_kilo');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_4_kilo($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));


            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_guest_houses_piassa($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_piassa_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_piassa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_piassa($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_22_mazoria($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_22_mazoria_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_22_mazoria');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_22_mazoria($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_megenagna($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_megenagna_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_megenagna');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_megenagna($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_paster($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_paster_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_paster');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_paster($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_saris($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_saris_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_saris');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_saris($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));




            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_guest_houses_sar_bet($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_sar_bet_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_sar_bet');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_sar_bet($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_guest_houses_asko($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_asko_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_asko');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_asko($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_guest_houses_inside_adiss($offset = 0)
    {
        $guest_house_location = $this->input->post('search_term');
        $data['guest_house_location'] = $this->guest_houses_model->search_guest_houses_inside_adiss($guest_house_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->guest_houses_model->count_guest_houses_inside_adiss($guest_house_location);
        $config['base_url'] = site_url('guest_houses/search_guest_houses_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->search_guest_houses_inside_adiss($guest_house_location, $limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_guest_houses_inside_adisss($offset = 0)
    {
        $guest_house_location = $this->input->post('search_term');
        $data['guest_house_location'] = $this->guest_houses_model->search_guest_houses_inside_adiss($guest_house_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->guest_houses_model->count_guest_houses_inside_adiss($guest_house_location);
        $config['base_url'] = site_url('guest_houses/search_guest_houses_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->search_guest_houses_inside_adiss($guest_house_location, $limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/guest_houses_main_view', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_guest_houses($offset = 0)
    {
        $guest_house_location = $this->input->post('search_term');
        $data['guest_house_location'] = $this->guest_houses_model->search_guest_houses($guest_house_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = 20;
        $config['base_url'] = site_url('guest_houses/search_guest_houses');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->search_guest_houses($guest_house_location, $limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
             
            $this->load->view('guest_houses/search_view', array('hotel_location' => $result));
            
            $this->load->view('guest_houses/advertisement_view', $data);
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    //   public function search_guest_houses() {
    //     $guest_house_location = $this->input->post('search_term');
    //     $data['guest_house_location'] = $this->guest_houses_model->search_guest_houses($guest_house_location);
    //     $this->load->view("admin_header", $data);
    //     $this->load->view("search_view", $data);
    //     $this->load->view("footer", $data);
    // }


    public function search_guest_houses_inside_adiss_by_price_range()
    {
        $rooms_from = $this->input->post('search_term');
        $data['rooms_from'] = $this->guest_houses_model->search_guest_houses_inside_adiss_by_price_range($rooms_from);
        $this->load->view('commons/header', $data);
        $this->load->view('guest_house/discriptor', $data);

        $this->load->view('guest_house/guest_houses_inside_adiss_by_price_range_view', $data);

        $this->load->view('commons/footer', $data);
    }


    // GET BY STAR LEVLE


    public function get_list_of_guest_houses_5_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_some('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_5_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_5_star_guest_houses($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_4_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_4_star_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_4_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_4_star_guest_houses($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_guest_houses_3_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_3_star_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_3_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_3_star_guest_houses($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));


               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_2_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_2_star_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_2_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_2_star_guest_houses($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_1_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_1_star_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_1_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_1_star_guest_houses($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

//GET BY PRICE RANGE
    public function get_list_of_guest_houses_500ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_500ETB_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_500ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_500ETB($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_1000ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_1000ETB_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_1000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_1000ETB($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_1500ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_500ETB_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_1500ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_1500ETB($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_2000ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_2000ETB_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_2000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_2000ETB($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function with_swimming_pool($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_with_swimming_pool('g');
        $config['base_url'] = site_url('guest_houses/with_swimming_pool');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->with_swimming_pool($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }



    public function with_food_availablity($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_with_food('g');
        $config['base_url'] = site_url('guest_houses/with_food_availablity');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->with_food_availablity($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }





    public function with_parking($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_with_parking();
        $config['base_url'] = site_url('guest_houses/with_parking');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->with_parking($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_guest_houses_more2000ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->guest_houses_model->count_more2000ETB_guest_houses('g');
        $config['base_url'] = site_url('guest_houses/get_list_of_guest_houses_more2000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->guest_houses_model->get_list_of_guest_houses_more2000ETB($limit, $offset);
        $result2 = $this->guest_houses_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
           
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));
               
            $this->load->view('guest_houses/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_guest_houses_inside_adiss_by_star_level()
    {
        $star_level = $this->input->post('search_term');
        $data['star_level'] = $this->guest_houses_model->search_guest_houses_inside_adiss_by_star_level($star_level);
        $this->load->view('commons/header', $data);
        $this->load->view('guest_houses/discriptor', $data);
        $this->load->view('guest_houses/search_guest_houses_by_star_level_view', $data);

        $this->load->view('commons/footer', $data);
    }

}

?>.




