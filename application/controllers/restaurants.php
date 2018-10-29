<!--

/* ========================================================================
 * Authors: Melaku Minas And Nebil Fikru
 * www.2hagerbet.com
 * ========================================================================
  */-->
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class restaurants extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('restaurants_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
    }


    public function reservation($restaurant_id)
    {
        $result = $this->restaurants_model->load_restaurant_details($restaurant_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('restaurants/toper2',  array('restaurant_detail' => $result));
            $this->load->view('restaurants/booking', array('restaurant_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('restaurants/no_results', $data);
        }
    }


    public function check_availablity($offset = 0)
    {
        $restaurant_location = $this->input->post('restaurant_location');
        $restaurant_city = $this->input->post('restaurant_city');
        $seat_type = $this->input->post('room_type');

        $restaurant_class = $this->input->post('restaurant_class');

//        $price_range = $this->input->post('price_range');
        // $data['restaurant_location'] = $this->admin_model->check_availablity($restaurant_location,$restaurant_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($data);
//
//        die;
        $this->load->library('pagination');
        $limit = 8;
        $total = 200;
        $config['base_url'] = site_url('restaurants/check_availablity');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->check_availablity($restaurant_location,$restaurant_city,$seat_type,$restaurant_class);
//        print_r($result);
//
//        die;
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            // $this->load->view('restaurants/check', $data);
            
            $this->load->view('restaurants/search_view', array('restaurant_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);
            $this->load->view('commons/footer', $data);
        }
    }






    public function success()
    {


        $this->load->view('restaurants/success');
        $this->get_list_of_restaurants_boles();

    }



    public function add_reservation()
    {   $restaurant_id = $this->input->post('restaurant_id');
        $post = $this->input->post();
        {
            $q = $this->restaurants_model->add_reservation('reservation', $post);

        }

        if ($q) {
            $this->reservation_success($restaurant_id);
//            $this->success();

        } else {
            $this->load->view('hotels/s');

        }


    }



    public function check()
    {
     
            
            $this->load->view('commons/header');
            $this->load->view('restaurants/discriptor2');
            $this->load->view('restaurants/searcher');
            $this->load->view('restaurants/advertisement_view');
            $this->load->view('commons/footer');
        
    }









    public function restaurant()
    {
        $data['title'] = 'restaurants';
        $this->get_list_of_restaurants_inside_adiss();
    }


    public function reservations($restaurant_id)
    {
        $result = $this->restaurants_model->load_restaurant_details($restaurant_id);


        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('restaurants/toper2', array('restaurant_detail' => $result));
            $this->load->view('restaurants/booking', array('restaurant_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('restaurants/no_results', $data);
        }
    }

    public function reservation_success($restaurant_id)
    {
        $result = $this->restaurants_model->load_restaurant_details($restaurant_id);

        if ($result) {

            $this->load->view('commons/header');
            $this->load->view('restaurants/toper2' , array('restaurant_detail' => $result));
            $this->load->view('restaurants/success', array('restaurant_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('restaurants/no_results', $data);
        }
    }


    public function contact_success($restaurant_id)
    {
        $result = $this->restaurants_model->load_restaurant_details($restaurant_id);

        if ($result) {

            $this->load->view('commons/header');
           $this->load->view('restaurants/toper2', array('restaurant_detail' => $result));
            $this->load->view('restaurants/contact_success', array('restaurant_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('restaurants/no_results', $data);
        }
    }


    public function contact($restaurant_id)
    {
        $result = $this->restaurants_model->load_restaurant_details($restaurant_id);

        if ($result) {

            $this->load->view('commons/header');
             $this->load->view('restaurants/toper2', array('restaurant_detail' => $result));
            $this->load->view('restaurants/contact_view', array('restaurant_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('restaurants/no_results', $data);
        }
    }


    public function add_reservations()
    {   $restaurant_id = $this->input->post('restaurant_id');
        $post = $this->input->post();
        {
            $q = $this->restaurants_model->add_reservation('reservation', $post);

        }

        if ($q) {
            $this->reservation_success($restaurant_id);
//            $this->success();

        } else {
            $this->load->view('restaurants/s');

        }


    }


    public function add_contact()
    {   $restaurant_id = $this->input->post('restaurant_id');
        $post = $this->input->post();
        {
            $q = $this->restaurants_model->add_contact('request', $post);

        }

        if ($q) {
            $this->contact_success($restaurant_id);
//            $this->success();

        } else {
            $this->load->view('restaurants/s');

        }


    }






    public function load_restaurant_details($restaurant_id)
    {


        $result = $this->restaurants_model->load_restaurant_details($restaurant_id);

        if ($result) {
            $this->load->view('commons/header');
           $this->load->view('restaurants/toper', array('restaurant_detail' => $result));
            $this->load->view('restaurants/single_restaurant', array('restaurant_detail' => $result));
            $this->load->view('commons/footer');
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );


            $this->load->view('restaurants/no_results', $data);
        }
    }

    public function get_list_of_restaurants_boles($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = 20;

        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_boles');

        // $config['base_url'] = site_url('restaurants/restaurants');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_bole($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            // $this->load->view('restaurants/check', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

                      
             $this->load->view('restaurants/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);
              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_inside_adiss($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_adiss_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_inside_adiss($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));
           
             
            $this->load->view('restaurants/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_inside_debre_zeit($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_debre_zeit_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_inside_debre_zeit');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_inside_debre_zeit($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_inside_adama($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_adama_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_inside_adama');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_inside_adama($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));
$this->load->view('restaurants/adv_header', $data);
             $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_inside_bahir_dar($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_bahir_dar_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_inside_bahir_dar');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_inside_bahir_dar($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);
            
            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_inside_dire_dawa($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_dire_dawa_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_inside_dire_dawa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_inside_dire_dawa($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


// INSIDE ADDISS


    public function get_list_of_restaurants_bole($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_bole_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_bole');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_bole($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_cazanches($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_cazanches_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_cazanches');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_cazanches($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_4_kilo($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_4_kilo_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_4_kilo');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_4_kilo($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_restaurants_piassa($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_piassa_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_piassa');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_piassa($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_22_mazoria($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_22_mazoria_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_22_mazoria');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_22_mazoria($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_megenagna($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_megenagna_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_megenagna');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_megenagna($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_paster($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_paster_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_paster');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_paster($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_saris($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_saris_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_saris');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_saris($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_restaurants_sar_bet($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_sar_bet_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_sar_bet');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_sar_bet($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_restaurants_asko($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_asko_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_asko');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_asko($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }



    public function get_list_of_restaurants_luxury($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_luxury_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_luxury');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_luxury($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

             $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_restaurants_medium($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_medium_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_medium');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_medium($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert($limit, $offset);
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

                   
            $this->load->view('restaurants/advertisement_view', array('advert' => $result2));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_restaurants_low($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_low_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_low');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_low($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

             $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_restaurants_standard($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_standard_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_standard');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_standard($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

             $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_ordinary($offset = 0)
    {

        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_ordinary_restaurants('r');
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_ordinary');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_ordinary($limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

             $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }




    public function search_restaurants_inside_adiss($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $data['restaurant_location'] = $this->restaurants_model->search_restaurants_inside_adiss($restaurant_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->restaurants_model->count_restaurants_inside_adiss($restaurant_location);
        $config['base_url'] = site_url('restaurants/search_restaurants_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->search_restaurants_inside_adiss($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_restaurants_inside_adisss($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $data['restaurant_location'] = $this->restaurants_model->search_restaurants_inside_adiss($restaurant_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->restaurants_model->count_restaurants_inside_adiss($restaurant_location);
        $config['base_url'] = site_url('restaurants/search_restaurants_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->search_restaurants_inside_adiss($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/restaurants_main_view', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_restaurants($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $data['restaurant_location'] = $this->restaurants_model->search_restaurants($restaurant_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = 20;
        $config['base_url'] = site_url('restaurants/search_restaurants');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->search_restaurants($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
             $this->load->view('restaurants/search_view', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    //   public function search_restaurants() {
    //     $restaurant_location = $this->input->post('search_term');
    //     $data['restaurant_location'] = $this->restaurants_model->search_restaurants($restaurant_location);
    //     $this->load->view("admin_header", $data);
    //     $this->load->view("search_view", $data);
    //     $this->load->view("footer", $data);
    // }


    public function search_restaurants_inside_adiss_by_price_range()
    {
        $rooms_from = $this->input->post('search_term');
        $data['rooms_from'] = $this->restaurants_model->search_restaurants_inside_adiss_by_price_range($rooms_from);
        $this->load->view('commons/header', $data);
        $this->load->view('restaurant/discriptor', $data);

        $this->load->view('restaurant/restaurants_inside_adiss_by_price_range_view', $data);

          $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
    }


    // GET BY STAR LEVLE


    public function get_list_of_restaurants_5_star($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_4_star_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_5_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_5_star_restaurants($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_4_star($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_4_star_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_4_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_4_star_restaurants($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

    public function get_list_of_restaurants_3_star($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_3_star_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_3_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_3_star_restaurants($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_2_star($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_2_star_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_2_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_2_star_restaurants($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_1_star($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_1_star_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_1_star');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_1_star_restaurants($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }

//GET BY PRICE RANGE
    public function get_list_of_restaurants_500ETB($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_500ETB_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_500ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_500ETB($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_1000ETB($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_1000ETB_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_1000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_1000ETB($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_1500ETB($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_500ETB_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_1500ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_1500ETB($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_2000ETB($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_2000ETB_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_2000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_2000ETB($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function with_swimming_pool($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_bahir_dar_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/with_swimming_pool');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->with_swimming_pool($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function with_parking($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_bahir_dar_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/with_parking');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->with_parking($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

                      
            $this->load->view('restaurants/advertisement_view', array('advert' => $result2));


            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function get_list_of_restaurants_more2000ETB($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $this->load->library('pagination');
        $limit = 4;
        $total = $this->restaurants_model->count_more2000ETB_restaurants($restaurant_location);
        $config['base_url'] = site_url('restaurants/get_list_of_restaurants_more2000ETB');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
         $config['num_links'] = 5;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->restaurants_model->get_list_of_restaurants_more2000ETB($restaurant_location, $limit, $offset);
        $result2 = $this->restaurants_model->get_list_of_advert();
        if ($result) {
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

              $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('commons/footer', $data);
        }
    }


    public function search_restaurants_inside_adiss_by_star_level()
    {
        $star_level = $this->input->post('search_term');
        $data['star_level'] = $this->restaurants_model->search_restaurants_inside_adiss_by_star_level($star_level);
        $this->load->view('commons/header', $data);
        $this->load->view('restaurants/discriptor', $data);
        $this->load->view('restaurants/search_restaurants_by_star_level_view', $data);

          $this->load->view('restaurants/advertisement_view', array('advert' => $result2)); $this->load->view('commons/footer', $data);
    }

}

?>.




