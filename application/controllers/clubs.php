<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class clubs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('clubs_model');
        $this->load->model('hotels_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }

    public function club()
    {
        $data['title'] = 'clubs';
        $this->get_list_of_clubs_inside_adiss();
    }




  public function add_reservation()
    {   $club_id = $this->input->post('club_id');
        $post = $this->input->post();
        {
            $q = $this->clubs_model->add_reservation('reservation', $post);

        }

        if ($q) {
            $this->reservation_success($club_id);
//            $this->success();

        } else {
            $this->load->view('hotels/s');

        }


    }




 public function reservation_success($club_id)
    {
        $result = $this->clubs_model->load_club_details($club_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('clubs/toper2' , array('club_detail' => $result));
            $this->load->view('clubs/success', array('club_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('clubs/no_results', $data);
        }
    }





    function update_bi()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'club_phone_mobile' => $this->input->post('club_phone_mobile1'),
            'club_city' => $this->input->post('club_city1'),
            'club_location' => $this->input->post('club_location1'),
            'club_direction' => $this->input->post('club_direction1'),
            'club_email' => $this->input->post('club_email1'),
            'club_web_site' => $this->input->post('club_web_site1'),
            'catagory' => $this->input->post('catagory1')
        );
        $this->clubs_model->update_bi($club_id, $data);
        $this->get_client_contents($data);
    }




public function reservation($club_id)
    {
        $result = $this->clubs_model->load_club_details($club_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('clubs/toper2',  array('club_detail' => $result));
            $this->load->view('clubs/booking', array('club_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('clubs/no_results', $data);
        }
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
//$club_id= $this->input->post('club_id');
//$data = array(
//// 'Student_Name' => $this->input->post('dname'),
//// 'Student_Email' => $this->input->post('demail'),
//// 'Student_Mobile' => $this->input->post('dmobile'),
//// 'Student_Address' => $this->input->post('daddress')
//);
//$this->clubs_model->update_club_content($club_id,$data);
//$this->show_student_id();
//}


    public function update_basic_info()
    {
        $club_id = $this->input->post('club_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->clubs_model->get_content($club_id, $uname, $password);
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
        $result = $this->clubs_model->login($uname, $password);
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
//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->clubs_model->get_content($club_id, $uname, $password);
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
        $club_id = $this->input->post('club_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->clubs_model->get_content($club_id, $uname, $password, $userdata);
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





    // public function load_club_details($club_id)
    //   {


    //       $result = $this->clubs_model->load_club_details($club_id);

    //       if ($result) {
    //           $this->load->view('commons/header');
    //           $this->load->view('clubs/discriptor');
    //           $this->load->view('clubs/single_club', array('club_detail' => $result));
    //          $this->load->view('commons/footer');
    //       } else {
    //           $data = array(
    //               'error_message' => 'List Empity'
    //           );


    //           $this->load->view('clubs/no_results', $data);
    //       }
    //   }


    public function booking($club_id)
    {
        $result = $this->clubs_model->load_club_details($club_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('clubs/aligner');
            $this->load->view('clubs/booking', array('club_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('clubs/no_results', $data);
        }
    }

    public function booking_success($club_id)
    {
        $result = $this->clubs_model->load_club_details($club_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('clubs/aligner');
            $this->load->view('clubs/success', array('club_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('clubs/no_results', $data);
        }
    }


    public function contact_success($club_id)
    {
        $result = $this->clubs_model->load_club_details($club_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('clubs/aligner');
            $this->load->view('clubs/contact_success', array('club_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('clubs/no_results', $data);
        }
    }


    public function contact($club_id)
    {
        $result = $this->clubs_model->load_club_details($club_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('clubs/toper2', array('club_detail' => $result));
            $this->load->view('clubs/contact_view', array('club_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('clubs/no_results', $data);
        }
    }


    public function add_book()
    {   $club_id = $this->input->post('club_id');
        $post = $this->input->post();
        {
            $q = $this->clubs_model->add_book('reservation', $post);

        }

        if ($q) {
            $this->booking_success($club_id);
//            $this->success();

        } else {
            $this->load->view('clubs/s');

        }


    }


    public function add_contact()
    {   $club_id = $this->input->post('club_id');
        $post = $this->input->post();
        {
            $q = $this->clubs_model->add_book('rerequest', $post);

        }

        if ($q) {
            $this->contact_success($club_id);
//            $this->success();

        } else {
            $this->load->view('clubs/s');

        }


    }



    public function success()
    {


        $this->load->view('clubs/success');
        $this->get_list_of_clubs_boles();

    }


    public function check_availablity($offset = 0)
    {


        $this->load->library('pagination');
         $limit = 4; 
        $total = 20;

        $config['base_url'] = site_url('clubs/get_list_of_clubs_boles');

        // $config['base_url'] = site_url('clubs/clubs');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_bole($limit, $offset);

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            // $this->load->view('clubs/check', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));
            $this->load->view('clubs/advertisment_view', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }




//
//    public function check_availablity($offset = 0)
//    {
//        $club_location = $this->input->post('search_term');
//        $data['club_location'] = $this->clubs_model->check_availablity($club_location);
//        $this->load->library('pagination');
//        $limit = 8;
//        $total = $this->clubs_model->count_clubs_inside_adiss($club_location);
//        $config['base_url'] = site_url('clubs/check_availablity');
//        $config['total_rows'] = $total;
//        $config['per_page'] = $limit;
//         $config['num_links'] = 5;
        // $config['next_link'] = 'Next';
        // $config['prev_link'] = 'Previous';

//        $this->pagination->initialize($config);
//        $data['page_links'] = $this->pagination->create_links();
//        $result = $this->clubs_model->check_availablity($club_location, $limit, $offset);
//        if ($result) {
//            $this->load->view('commons/header', $data);
//            $this->load->view('clubs/discriptor', $data);
//            $this->load->view('clubs/check', $data);
//            $this->load->view('clubs/thumbnail', array('club_location' => $result));
//            $this->load->view('commons/advertisement_view', $data);
//            $this->load->view('commons/sponsors_view', $data);
//            $this->load->view('commons/footer', $data);
//        } else {
//            $data = array(
//                'error_message' => 'List Empity'
//            );
//            $this->load->view('commons/header', $data);
//            $this->load->view('clubs/discriptor', $data);
//            $this->load->view('clubs/no_results', $data);
//            $this->load->view('commons/advertisement_view', $data);
//            $this->load->view('commons/sponsors_view', $data);
//            $this->load->view('commons/footer', $data);
//        }
//    }


    public function load_club_details($club_id)
    {


        $result = $this->clubs_model->load_club_details($club_id);

        if ($result) {
            $this->load->view('commons/header');
            $this->load->view('clubs/toper', array('club_detail' => $result));
            $this->load->view('clubs/single_club', array('club_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );


            $this->load->view('clubs/no_results', $data);
        }
    }

    public function get_list_of_clubs_boles($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = 20;

        $config['base_url'] = site_url('clubs/get_list_of_clubs_boles');

        // $config['base_url'] = site_url('clubs/clubs');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_bole($limit, $offset);

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            // $this->load->view('clubs/check', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));
             
            $this->load->view('clubs/advertisement_view', array('club_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_clubs_inside_adiss($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_adiss_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_inside_adiss($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_inside_debre_zeit($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_debre_zeit_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_inside_debre_zeit');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_inside_debre_zeit($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_clubs_inside_adama($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_adama_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_inside_adama');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_inside_adama($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_inside_bahir_dar($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_bahir_dar_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_inside_bahir_dar');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_inside_bahir_dar($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_inside_dire_dawa($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_dire_dawa_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_inside_dire_dawa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_inside_dire_dawa($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }


// INSIDE ADDISS


    public function get_list_of_clubs_bole($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_bole_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_bole');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_bole($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_cazanches($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_cazanches_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_cazanches');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_cazanches($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_4_kilo($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_4_kilo_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_4_kilo');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_4_kilo($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


















 public function food_availablity($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_with_food('c');
        $config['base_url'] = site_url('clubs/food_availablity');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->food_availablity($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }






















    public function get_list_of_clubs_piassa($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_piassa_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_piassa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_piassa($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_22_mazoria($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_22_mazoria_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_22_mazoria');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_22_mazoria($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_megenagna($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_megenagna_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_megenagna');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_megenagna($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_paster($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_paster_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_paster');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_paster($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_clubs_saris($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_saris_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_saris');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_saris($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }



    public function cultural_clubs($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_cultural_clubs('c');
        $config['base_url'] = site_url('clubs/cultural_clubs');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->cultural_clubs($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }







    public function modern_clubs($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_modern_clubs('c');
        $config['base_url'] = site_url('clubs/modern_clubs');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->modern_clubs($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }
























    public function get_list_of_clubs_sar_bet($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_sar_bet_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_sar_bet');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_sar_bet($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_clubs_asko($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_asko_clubs('c');
        $config['base_url'] = site_url('clubs/get_list_of_clubs_asko');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->get_list_of_clubs_asko($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_clubs_inside_adiss($offset = 0)
    {
        $club_location = $this->input->post('search_term');
        $data['club_location'] = $this->clubs_model->search_clubs_inside_adiss($club_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->clubs_model->count_clubs_inside_adiss($club_location);
        $config['base_url'] = site_url('clubs/search_clubs_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->search_clubs_inside_adiss($club_location, $limit, $offset);
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_clubs_inside_adisss($offset = 0)
    {
        $club_location = $this->input->post('search_term');
        $data['club_location'] = $this->clubs_model->search_clubs_inside_adiss($club_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->clubs_model->count_clubs_inside_adiss($club_location);
        $config['base_url'] = site_url('clubs/search_clubs_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->search_clubs_inside_adiss($club_location, $limit, $offset);
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/clubs_main_view', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_clubs($offset = 0)
    {
        $club_location = $this->input->post('search_term');
        $data['club_location'] = $this->clubs_model->search_clubs($club_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = 20;
        $config['base_url'] = site_url('clubs/search_clubs');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->search_clubs($club_location, $limit, $offset);
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/search_view', array('club_location' => $result));
           
            $this->load->view('clubs/advertisement_view', $data);
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    //   public function search_clubs() {
    //     $club_location = $this->input->post('search_term');
    //     $data['club_location'] = $this->clubs_model->search_clubs($club_location);
    //     $this->load->view("admin_header", $data);
    //     $this->load->view("search_view", $data);
    //     $this->load->view("footer", $data);
    // }


    public function search_clubs_inside_adiss_by_price_range()
    {
        $rooms_from = $this->input->post('search_term');
        $data['rooms_from'] = $this->clubs_model->search_clubs_inside_adiss_by_price_range($rooms_from);
        $this->load->view('commons/header', $data);
        $this->load->view('club/discriptor', $data);

        $this->load->view('club/clubs_inside_adiss_by_price_range_view', $data);

        $this->load->view('commons/footer', $data);
    }


    // GET BY STAR LEVLE



    public function with_parking($offset = 0)
    {

        $this->load->library('pagination');
         $limit = 4; 
        $total = $this->clubs_model->count_with_parking();
        $config['base_url'] = site_url('clubs/with_parking');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->clubs_model->with_parking($limit, $offset);
        $result2 = $this->hotels_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
           
            $this->load->view('clubs/thumbnail', array('club_location' => $result));
                
            $this->load->view('clubs/advertisement_view', array('advert' => $result2));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }




}

?>.




