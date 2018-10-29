<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class resorts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('resorts_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }

    public function resort()
    {
        $data['title'] = 'resorts';
        $this->get_list_of_resorts_bole();
    }


    function update_bi()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
            'resort_phone_mobile' => $this->input->post('resort_phone_mobile1'),
            'resort_city' => $this->input->post('resort_city1'),
            'resort_location' => $this->input->post('resort_location1'),
            'resort_direction' => $this->input->post('resort_direction1'),
            'resort_email' => $this->input->post('resort_email1'),
            'resort_web_site' => $this->input->post('resort_web_site1')
        );
        $this->resorts_model->update_bi($resort_id, $data);
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
//$resort_id= $this->input->post('resort_id');
//$data = array(
//// 'Student_Name' => $this->input->post('dname'),
//// 'Student_Email' => $this->input->post('demail'),
//// 'Student_Mobile' => $this->input->post('dmobile'),
//// 'Student_Address' => $this->input->post('daddress')
//);
//$this->resorts_model->update_resort_content($resort_id,$data);
//$this->show_student_id();
//}


    public function update_basic_info()
    {
        $resort_id = $this->input->post('resort_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->resorts_model->get_content($resort_id, $uname, $password);
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
        $result = $this->resorts_model->login($uname, $password);
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
//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->resorts_model->get_content($resort_id, $uname, $password);
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
        $resort_id = $this->input->post('resort_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->resorts_model->get_content($resort_id, $uname, $password, $userdata);
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





    // public function load_resort_details($resort_id)
    //   {


    //       $result = $this->resorts_model->load_resort_details($resort_id);

    //       if ($result) {
    //           $this->load->view('commons/header');
    //           $this->load->view('resorts/discriptor');
    //           $this->load->view('resorts/single_resort', array('resort_detail' => $result));
    //          $this->load->view('commons/footer');
    //       } else {
    //           $data = array(
    //               'error_message' => 'List Empity'
    //           );


    //           $this->load->view('resorts/no_results', $data);
    //       }
    //   }


    public function booking($resort_id)
    {
        $result = $this->resorts_model->load_resort_details($resort_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('resorts/toper2',array('resort_detail' => $result));
            $this->load->view('resorts/booking', array('resort_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('resorts/no_results', $data);
        }
    }

    public function booking_success($resort_id)
    {
        $result = $this->resorts_model->load_resort_details($resort_id);

        if ($result) {

            $this->load->view('commons/header');
             $this->load->view('resorts/toper2', array('resort_detail' => $result));
            $this->load->view('resorts/success', array('resort_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('resorts/no_results', $data);
        }
    }


    public function contact_success($resort_id)
    {
        $result = $this->resorts_model->load_resort_details($resort_id);

        if ($result) {

            $this->load->view('commons/header');
             $this->load->view('resorts/toper2', array('resort_detail' => $result));
            $this->load->view('resorts/contact_success', array('resort_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('resorts/no_results', $data);
        }
    }


    public function contact($resort_id)
    {
        $result = $this->resorts_model->load_resort_details($resort_id);

        if ($result) {

            $this->load->view('commons/header');
           $this->load->view('resorts/toper2', array('resort_detail' => $result));
            $this->load->view('resorts/contact_view', array('resort_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('resorts/no_results', $data);
        }
    }


    public function add_book()
    {   $resort_id = $this->input->post('resort_id');
        $post = $this->input->post();
        {
            $q = $this->resorts_model->add_book('booking', $post);

        }

        if ($q) {
            $this->booking_success($resort_id);
//            $this->success();

        } else {
            $this->load->view('resorts/s');

        }


    }


    public function add_contact()
    {   $resort_id = $this->input->post('resort_id');
        $post = $this->input->post();
        {
            $q = $this->resorts_model->add_book('request', $post);

        }

        if ($q) {
            $this->contact_success($resort_id);
//            $this->success();

        } else {
            $this->load->view('resorts/s');

        }


    }



    public function success()
    {


        $this->load->view('resorts/success');
        $this->get_list_of_resorts_boles();

    }


    public function check_availablity($offset = 0)
    {
        $resort_location = $this->input->post('search_term');

        $this->load->library('pagination');
        $limit = 4;
        $total = 20;

        $config['base_url'] = site_url('resorts/get_list_of_resorts_boles');

        // $config['base_url'] = site_url('resorts/resorts');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_bole($resort_location, $limit, $offset);

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            // $this->load->view('resorts/check', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
            $this->load->view('resorts/advertisment_view', array('resort_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }




//
//    public function check_availablity($offset = 0)
//    {
//        $resort_location = $this->input->post('search_term');
//        $data['resort_location'] = $this->resorts_model->check_availablity($resort_location);
//        $this->load->library('pagination');
//        $limit = 8;
//        $total = $this->resorts_model->count_resorts_inside_adiss($resort_location);
//        $config['base_url'] = site_url('resorts/check_availablity');
//        $config['total_rows'] = $total;
//        $config['per_page'] = $limit;
//         $config['num_links'] = 5;
        // $config['next_link'] = 'Next';
        // $config['prev_link'] = 'Previous';

//        $this->pagination->initialize($config);
//        $data['page_links'] = $this->pagination->create_links();
//        $result = $this->resorts_model->check_availablity($resort_location, $limit, $offset);
//        if ($result) {
//            $this->load->view('commons/header', $data);
//            $this->load->view('resorts/discriptor', $data);
//            $this->load->view('resorts/check', $data);
//            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
//            $this->load->view('commons/advertisement_view', $data);
//            $this->load->view('commons/sponsors_view', $data);
//            $this->load->view('commons/footer', $data);
//        } else {
//            $data = array(
//                'error_message' => 'List Empity'
//            );
//            $this->load->view('commons/header', $data);
//            $this->load->view('resorts/discriptor', $data);
//            $this->load->view('resorts/no_results', $data);
//            $this->load->view('commons/advertisement_view', $data);
//            $this->load->view('commons/sponsors_view', $data);
//            $this->load->view('commons/footer', $data);
//        }
//    }


    public function load_resort_details($resort_id)
    {


        $result = $this->resorts_model->load_resort_details($resort_id);

        if ($result) {
            $this->load->view('commons/header');
            $this->load->view('resorts/toper', array('resort_detail' => $result));
            $this->load->view('resorts/single_resort', array('resort_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );


            $this->load->view('resorts/no_results', $data);
        }
    }

    public function get_list_of_resorts_boles($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = 20;

        $config['base_url'] = site_url('resorts/get_list_of_resorts_boles');

        $config['base_url'] = site_url('resorts/resorts');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_bole($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            // $this->load->view('resorts/check', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_resorts_inside_adiss($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_adiss_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_inside_adiss($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_inside_debre_zeit($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_debre_zeit_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_inside_debre_zeit');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_inside_debre_zeit($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_resorts_inside_adama($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_adama_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_inside_adama');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_inside_adama($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_inside_bahir_dar($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_bahir_dar_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_inside_bahir_dar');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_inside_bahir_dar($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_inside_dire_dawa($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_dire_dawa_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_inside_dire_dawa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_inside_dire_dawa($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }


// INSIDE ADDISS


    public function get_list_of_resorts_bole($offset = 0)
    {
//        $resort_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_bole_resorts('re');
//        print_r($total);
//        exit;
        $config['base_url'] = site_url('resorts/get_list_of_resorts_bole');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_bole($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_cazanches($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_cazanches_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_cazanches');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_cazanches($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));
                
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_4_kilo($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_4_kilo_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_4_kilo');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_4_kilo($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_resorts_piassa($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_piassa_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_piassa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_piassa($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_22_mazoria($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_22_mazoria_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_22_mazoria');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_22_mazoria($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_megenagna($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_megenagna_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_megenagna');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_megenagna($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_paster($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_paster_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_paster');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_paster($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_saris($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_saris_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_saris');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_saris($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_resorts_sar_bet($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_sar_bet_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_sar_bet');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_sar_bet($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_resorts_asko($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_asko_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_asko');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_asko($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_resorts_inside_adiss($offset = 0)
    {

        $data['resort_location'] = $this->resorts_model->search_resorts_inside_adiss('re');
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->resorts_model->count_resorts_inside_adiss();
        $config['base_url'] = site_url('resorts/search_resorts_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->search_resorts_inside_adiss($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_resorts_inside_adisss($offset = 0)
    {

        $data['resort_location'] = $this->resorts_model->search_resorts_inside_adiss('re');
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->resorts_model->count_resorts_inside_adiss();
        $config['base_url'] = site_url('resorts/search_resorts_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->search_resorts_inside_adiss($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/resorts_main_view', array('resort_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }





public function check()
    {
     
            
            $this->load->view('commons/header');
            $this->load->view('resorts/discriptor2');
            $this->load->view('resorts/searcher');
            $this->load->view('resorts/advertisement_view');
            $this->load->view('commons/footer');
        
    }

    public function search_resorts($offset = 0)
    {
        $resort_location = $this->input->post('search_term');
        $data['resort_location'] = $this->resorts_model->search_resorts($resort_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = 20;
        $config['base_url'] = site_url('resorts/search_resorts');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->search_resorts($resort_location, $limit, $offset);
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
             
            $this->load->view('resorts/search_view', array('resort_location' => $result));
            
            $this->load->view('resorts/advertisement_view', $data);
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    //   public function search_resorts() {
    //     $resort_location = $this->input->post('search_term');
    //     $data['resort_location'] = $this->resorts_model->search_resorts($resort_location);
    //     $this->load->view("admin_header", $data);
    //     $this->load->view("search_view", $data);
    //     $this->load->view("footer", $data);
    // }


    public function search_resorts_inside_adiss_by_price_range()
    {
        $rooms_from = $this->input->post('search_term');
        $data['rooms_from'] = $this->resorts_model->search_resorts_inside_adiss_by_price_range($rooms_from);
        $this->load->view('commons/header', $data);
        $this->load->view('resort/discriptor', $data);

        $this->load->view('resort/resorts_inside_adiss_by_price_range_view', $data);

        $this->load->view('commons/footer', $data);
    }


    // GET BY STAR LEVLE


    public function get_list_of_resorts_5_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_some('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_5_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_5_star_resorts($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_4_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_4_star_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_4_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_4_star_resorts($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_resorts_3_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_3_star_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_3_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_3_star_resorts($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_2_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_2_star_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_2_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_2_star_resorts($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_1_star($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_1_star_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_1_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_1_star_resorts($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

//GET BY PRICE RANGE
    public function get_list_of_resorts_500ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_500ETB_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_500ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_500ETB($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_1000ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_1000ETB_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_1000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_1000ETB($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_1500ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_500ETB_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_1500ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_1500ETB($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_2000ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_2000ETB_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_2000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_2000ETB($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function with_swimming_pool($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_resorts_with_swimming_pool('re');
        $config['base_url'] = site_url('resorts/with_swimming_pool');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->with_swimming_pool($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      
                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function with_parking($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_resorts_with_parking('re');
        $config['base_url'] = site_url('resorts/with_parking');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->with_parking($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_resorts_more2000ETB($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->resorts_model->count_more2000ETB_resorts('re');
        $config['base_url'] = site_url('resorts/get_list_of_resorts_more2000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->resorts_model->get_list_of_resorts_more2000ETB($limit, $offset);
        $result2 = $this->resorts_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
               
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));      

                  
            $this->load->view('resorts/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_resorts_inside_adiss_by_star_level()
    {
        $star_level = $this->input->post('search_term');
        $data['star_level'] = $this->resorts_model->search_resorts_inside_adiss_by_star_level($star_level);
        $this->load->view('commons/header', $data);
        $this->load->view('resorts/discriptor', $data);
        $this->load->view('resorts/search_resorts_by_star_level_view', $data);

        $this->load->view('commons/footer', $data);
    }

}

?>.




