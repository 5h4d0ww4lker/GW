<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hag38926610027834202nikki626basepath645rac extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('radmin_model');
        $this->load->model('radmin_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }


    public function check_availablity($offset = 0)
    {
        $restaurant_location = $this->input->post('restaurant_location');
        $restaurant_city = $this->input->post('restaurant_city');
        $room_type = $this->input->post('room_type');
        $free_room = $this->input->post('free_room');
        $star_level = $this->input->post('star_level');
        $room_price = $this->input->post('room_price');
//        $price_range = $this->input->post('price_range');
        // $data['restaurant_location'] = $this->radmin_model->check_availablity($restaurant_location,$restaurant_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($data);
//
//        die;
        $this->load->library('pagination');
        $limit = 8;
        $total = 200;
        $config['base_url'] = site_url('restaurants_controller/check_availablity');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->radmin_model->check_availablity($restaurant_location,$restaurant_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($result);
//
//        die;
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            // $this->load->view('restaurants/check', $data);
            $this->load->view('restaurants/page_header', $data);
            $this->load->view('restaurants/search_view', array('restaurant_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);
            $this->load->view('commons/advertisement_view', $data);
            $this->load->view('commons/sponsors_view', $data);
            $this->load->view('footer', $data);
        }
    }










    public function search_restaurants_inside_adiss($offset = 0)
    {
        $restaurant_location = $this->input->post('search_term');
        $data['restaurant_location'] = $this->radmin_model->search_restaurants_inside_adiss($restaurant_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->radmin_model->count_restaurants_inside_adiss($restaurant_location);
        $config['base_url'] = site_url('restaurants_controller/search_restaurants_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->radmin_model->search_restaurants_inside_adiss($restaurant_location, $limit, $offset);

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/page_header', $data);
            $this->load->view('restaurants/thumbnail', array('restaurant_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('restaurants/discriptor', $data);
            $this->load->view('restaurants/no_results', $data);

            $this->load->view('footer', $data);
        }
    }








    public function do_upload()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'restaurant_image1' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }





    public function do_upload3()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'restaurant_image3' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }













    public function do_upload2()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'restaurant_image2' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }




    public function do_upload4()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'restaurant_image4' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }



    public function do_upload5()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'restaurant_image5' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }




    public function do_upload6()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'restaurant_image6' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }



    public function do_upload7()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'restaurant_image7' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }







    public function do_upload8()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'vip_seat_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }


    public function do_upload9()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'normal_seat_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }




    public function do_upload10()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'class1_seat_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }



    public function do_upload11()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'class2_seat_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }


    public function do_upload12()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'special_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }

    public function do_upload13()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'conference_room_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }





    public function do_upload14()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'pool_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }

    public function do_upload15()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'gym_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }


    public function do_upload16()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(stie_url('admin_controller/login'));
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1000000';
        $config['max_height'] = '1000000';
        $this->load->library('upload', $config);
        $result=$this->upload->do_upload();
        //$result2 = $this->radmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $restaurant_id = $this->input->post('restaurant_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'whall_image' => ($img_path),
                'restaurant_id' => ($restaurant_id)
            );
//                print_r($data);
//                exit;
            $this->radmin_model->image_upload( $restaurant_id, $data);
            $this->get_images($restaurant_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->login();

        }
    }






//    function do_upload()
//    {
//        $config['upload_path'] = './uploads';
//        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size']	= '100';
//        $config['max_width']  = '1024';
//        $config['max_height']  = '768';
//
//        $this->load->library('upload', $config);
//        $result=$this->upload->do_upload();
//
//        if ( !$result )
//        {
//            $error = array('error' => $this->upload->display_errors());
//
//            $this->load->view('upload_form', $error);
//        }
//        else
//        {
//
//            //$data = array('upload_data' => $this->upload->data());
//            //print_r($data->file_name);
//            //$this->load->view('upload_success', $data);
//            $img_path='uploads/'.$this->upload->file_name;
//            $data=array('file_name'=>$img_path);
//            $q = $this->radmin_model->image_upload('image_thumbnail', $data);
//            // $this->login();
//
//
//        }
//    }
//
//




    function update_ri()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(
            'free_seats' => $this->input->post('free_seats1'),
            'free_vip_seat' => $this->input->post('free_vip_seat1'),
            'free_class1_seat' => $this->input->post('free_class1_seat1'),
            'free_class2_seat' => $this->input->post('free_class2_seat1'),
            'free_normal_seat' => $this->input->post('free_normal_seat1'),
            'seat_type' => $this->input->post('seat_type1')

        );
        $this->radmin_model->update_ri($restaurant_id, $data);
        $this->rooms($restaurant_id);
    }


    function update_bi()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(
            'restaurant_phone_office' => $this->input->post('restaurant_phone_office1'),
            'restaurant_phone_mobile' => $this->input->post('restaurant_phone_mobile1'),
            'restaurant_city' => $this->input->post('restaurant_city1'),
            'restaurant_location' => $this->input->post('restaurant_location1'),
            'restaurant_direction' => $this->input->post('restaurant_direction1'),
            'restaurant_email' => $this->input->post('restaurant_email1'),
            'restaurant_web_site' => $this->input->post('restaurant_web_site1'),
            'restaurant_discription' => $this->input->post('restaurant_discription1')
        );
        $this->radmin_model->update_bi($restaurant_id, $data);
        $this->get_client_contents($data);
    }






    function update_af()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(
            'restaurant_fast_food' => $this->input->post('restaurant_fast_food1'),
            'restaurant_local_food' => $this->input->post('restaurant_local_food1'),
            'restaurant_burger_and_pizza' => $this->input->post('restaurant_burger_and_pizza1'),
            'restaurant_modern_food' => $this->input->post('restaurant_modern_food1'),

        );
        $this->radmin_model->update_af($restaurant_id, $data);
        $this->get_client_contents($data);
    }


    function update_bos()
    {
        $reservation_id = $this->input->post('reservation_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->radmin_model->update_bos($reservation_id, $data);
        $this->reservation_more($reservation_id);
    }




    function update_password()
    {
        $restaurant_id= $this->input->post('restaurant_id');
        $data = array(

            'password' => $this->input->post('password1')
        );
        $this->radmin_model->update_pass($restaurant_id, $data);
        $this->settings();
    }

    function update_sl()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(

            'restaurant_class' => $this->input->post('restaurant_class1')
        );
        $this->radmin_model->update_sl($restaurant_id, $data);
        $this->settings();
    }



    function update_as()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(

            'activation_status' => $this->input->post('activation_status1')
        );
        $this->radmin_model->update_sl($restaurant_id, $data);
        $this->settings();
    }





    function update_rqs()
    {
        $request_id = $this->input->post('request_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->radmin_model->update_rqs($request_id, $data);
        $this->request_more($request_id);
    }


    function update_even()
    {
        $event_id = $this->input->post('event_id');
        $data = array(

            'start_date' => $this->input->post('start_date1'),
            'end_date' => $this->input->post('end_date1'),
            'contact_person' => $this->input->post('contact_person1'),
            'contact_person_phone' => $this->input->post('contact_person_phone1'),
            'location' => $this->input->post('location1'),
            'description' => $this->input->post('description1'),

        );
        $this->radmin_model->update_even($event_id, $data);
        $this->event_more($event_id);
    }






    function update_di()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(
            'restaurant_hot_drinks' => $this->input->post('restaurant_hot_drinks1'),
            'restaurant_soft_drinks' => $this->input->post('restaurant_soft_drinks1'),
            'restaurant_local_drinks' => $this->input->post('restaurant_local_drinks1'),
            'restaurant_beer_and_alcohol' => $this->input->post('restaurant_beer_and_alcohol1'),

        );
        $this->radmin_model->update_af($restaurant_id, $data);
        $this->get_client_contents($data);
    }


    function update_serv()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(
            'parking' => $this->input->post('parking1'),
            'pool' => $this->input->post('pool1'),
            'children_play_ground' => $this->input->post('children_play_ground1'),
            'wifi' => $this->input->post('wifi1'),
            'wedding_hall_description' => $this->input->post('wedding_hall_description1'),
            'games_description' => $this->input->post('games_description1'),
            'gym_discription' => $this->input->post('gym_discription1'),
            'conference_room_description' => $this->input->post('conference_room_description1'),

        );
        $this->radmin_model->update_serv($restaurant_id, $data);
        $this->get_client_contents($data);
    }





    function update_rp()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(
            'fi1' => $this->input->post('fi11'),
            'fi2' => $this->input->post('fi21'),
            'fi3' => $this->input->post('fi31'),
            'fi4' => $this->input->post('fi41'),
            'fi5' => $this->input->post('fi51'),
            'fi6' => $this->input->post('fi61'),
            'fi7' => $this->input->post('fi71'),
            'fi8' => $this->input->post('fi81'),
            'fi9' => $this->input->post('fi91'),
            'fi10' => $this->input->post('fi101'),
            'fi1p' => $this->input->post('fi1p1'),
            'fi2p' => $this->input->post('fi2p1'),
            'fi3p' => $this->input->post('fi3p1'),
            'fi4p' => $this->input->post('fi4p1'),
            'fi5p' => $this->input->post('fi5p1'),
            'fi6p' => $this->input->post('fi6p1'),
            'fi7p' => $this->input->post('fi7p1'),
            'fi8p' => $this->input->post('fi8p1'),
            'fi9p' => $this->input->post('fi9p1'),
            'fi10p' => $this->input->post('fi10p1'),

        );
        $this->radmin_model->update_rp($restaurant_id, $data);
        $this->get_client_contents($data);
    }

    function update_rav()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(
            'vip_seat_dis' => $this->input->post('vip_seat_dis1'),
            'class1_seat_dis' => $this->input->post('class1_seat_dis1'),
            'class2_seat_dis' => $this->input->post('class2_seat_dis1'),
            'normal_seat_dis' => $this->input->post('normal_seat_dis1'),

        );
        $this->radmin_model->update_rav($restaurant_id, $data);
        $this->get_client_contents($data);
    }


    function update_rserv()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $data = array(
            'restaurant_special' => $this->input->post('restaurant_special1'),
            'special_price' => $this->input->post('special_price1'),
            'special_cheif' => $this->input->post('special_cheif1'),
            'special_ingridients' => $this->input->post('special_ingridients1'),

        );
        $this->radmin_model->update_rserv($restaurant_id, $data);
        $this->get_client_contents($data);
    }


    public function update_basic_info()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_basic_info', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function add_support()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $post = $this->input->post();
        {
            $q = $this->radmin_model->add_support('support', $post);
            $this->support_success($restaurant_id);
        }
    }





    public function add_client()
    {
        $restaurant_id = $this->input->post('restaurant_id');
        $post = $this->input->post();
        {
            $q = $this->radmin_model->add_client('restaurants', $post);

            $this->login();
        }
    }


    public function support()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/support', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }




    public function settings()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/settings', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }




    public function support_success($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);

        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/success', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('restaurants/no_results', $data);
        }
    }









    public function update_room_info()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_room_info', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }




    public function upload_form()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }




    public function upload_form2()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form2', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }



    public function upload_form3()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form3', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }





    public function upload_form4()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form4', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }




    public function upload_form5()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form5', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }





    public function upload_form6()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form6', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }




    public function upload_form7()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form7', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }



    public function upload_form8()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form8', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function upload_form9()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form9', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }





    public function upload_form10()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form10', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }



    public function upload_form11()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form11', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }







    public function upload_form12()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form12', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }



    public function upload_form13()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form13', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }





    public function upload_form14()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form14', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }





    public function upload_form15()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form15', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }



    public function upload_form16()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/upload_form/upload_form16', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function get_images()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/image_view', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function update_services()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

        $restaurant_id = $this->input->post('restaurant_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_services', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function get_events()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->get_events($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');

            $this->load->view('admin/restaurants/events', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($restaurant_id);
        }
    }

    public function rooms()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->rooms($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');

            $this->load->view('admin/restaurants/rooms', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }
    }



    public function requests()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->requests($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');

            $this->load->view('admin/restaurants/requests', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_req_results($restaurant_id);
        }
    }



    public function events()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->events($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');

            $this->load->view('admin/restaurants/events', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($restaurant_id);
        }
    }


    public function message()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->message($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');

            $this->load->view('admin/restaurants/message', array('message' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_message_results($restaurant_id);
        }
    }





    public function update_special()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_room_services', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function count_pending()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->count_pending($restaurant_id);


        if ($result) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header', array('company_list' => $result2));
//            $this->load->view('admin/restaurants/update_room_services', array('company_list' => $result));
//            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//
//            print_r($result);
//die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function update_room_prices()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

        $restaurant_id = $this->input->post('restaurant_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_room_prices', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }

    public function update_available_room_types()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

        $restaurant_id = $this->input->post('restaurant_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_available_room_types', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function update_available_food_items()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

        $restaurant_id = $this->input->post('restaurant_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_available_food_items', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }

    public function update_available_drink_items()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

        $restaurant_id = $this->input->post('restaurant_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_available_drink_items', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }


    public function login()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/restaurants/login');
        // $this->load->view('admin/footer', $data);
    }


    public function loginer()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/restaurants/selector');
        // $this->load->view('admin/footer', $data);
    }




    public function register()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/restaurants/register');
        // $this->load->view('admin/footer', $data);
    }









    public function login_process()
    {

        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $result = $this->radmin_model->login($uname, $password);
        // print_r($result);
//die();
        if ($this->input->post() && $result) {
            $this->session->set_userdata('loginaccount', $result);
            $this->get_client_contents();

        } else {
            $this->login();
        }
    }


    public function delete_reservation($reservation_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->delete_reservation($reservation_id);
        if ($result) {

            $result2 = $this->radmin_model->get_content($login->uname);
            $result3 = $this->radmin_model->reservation_enquiries($restaurant_id);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/reservation_view', array('book' => $result3));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_reservation_results($restaurant_id);
        }
    }



    public function delete_request($request_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->delete_request($request_id);
        if ($result) {

            $result2 = $this->radmin_model->get_content($login->uname);
            $result3 = $this->radmin_model->requests($restaurant_id);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/requests', array('company_list' => $result3));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_reservation_results($restaurant_id);
        }
    }

    public function delete_event($event_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->delete_event($event_id);
        if ($result) {

            $result2 = $this->radmin_model->get_content($login->uname);
            $result3 = $this->radmin_model->events($restaurant_id);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/events', array('company_list' => $result3));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->add_support();
        }
    }


    public function delete_message($message_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->delete_message($message_id);
        if ($result) {

            $result2 = $this->radmin_model->get_content($login->uname);
            $result3 = $this->radmin_model->message($restaurant_id);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/message', array('message' => $result3));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->add_support();
        }
    }




    function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('admin/restaurants/login');
    }




//    public function trial()
//    {
//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->radmin_model->get_content($restaurant_id, $uname, $password);
//        if ($result) {
//
//            $this->session->set_userdata('logged_in', $result);
//            $this->load->view('admin/header');
//            $this->load->view('admin/main2', array('company_list' => $result));
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
//            $this->load->view('no_results', $data);
//            $this->load->view('footer_view', $data);
//        }
//    }


    public function reservation_enquiries($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->reservation_enquiries($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/reservation_view', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($restaurant_id);
        }
    }


    public function reservation_pending($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->reservation_pending($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/reservation_pending', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($restaurant_id);
        }
    }


    public function reservation_canceled($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->reservation_canceled($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/reservation_canceled', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($restaurant_id);
        }
    }


    public function reservation_approved($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->reservation_approved($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/approved_reservation', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($restaurant_id);
        }
    }


    public function reservation_completed($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
        $result = $this->radmin_model->reservation_completed($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/reservation_view', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($restaurant_id);
        }

    }


    public function no_reservation_results($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
//        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_completed($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/no_results', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_event_results($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
//        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_completed($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/no_event_results', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_message_results($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
//        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_completed($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/no_message_results', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }



    public function no_req_results($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
//        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_completed($restaurant_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);

            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/no_req_results', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }


    public function reservation_more($reservation_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_enquiries($restaurant_id);


        $result = $this->radmin_model->reservation_more($reservation_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/b_more', array('book' => $result),array('company_list' => $result2) );

            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function request_more($request_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_enquiries($restaurant_id);


        $result = $this->radmin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/r_more', array('request' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }






    public function event_more($event_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_enquiries($restaurant_id);


        $result = $this->radmin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/event_more', array('event' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }







    public function update_reservation_status($reservation_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_enquiries($restaurant_id);


        $result = $this->radmin_model->reservation_more($reservation_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_reservation_view', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }





    public function prints($reservation_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_enquiries($restaurant_id);


        $result = $this->radmin_model->reservation_more($reservation_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/invoice_print', array('book' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function printrs($request_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_enquiries($restaurant_id);


        $result = $this->radmin_model->reservation_more($request_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/request_print', array('request' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function update_star_level()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_star_level', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }





    public function update_activation_status()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $restaurant_id = $this->input->post('restaurant_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_activation', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }



    public function change_password()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/change_password', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));

        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->login();

        }
    }



    public function change_pass() {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        if($result){
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/change_password', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));
        }else{
            $query = $this->radmin_model->checkpass($this->input->post('password'));
            if($query){
                $query = $this->radmin_model->savePass($this->input->post('password1'));
                if($query){
                    redirect('change_password');
                }else{
                    redirect('change_password');
                }
            }

        }
    }






    public function update_request_status($request_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_enquiries($restaurant_id);


        $result = $this->radmin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_request', array('request' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }


    public function update_event($event_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->radmin_model->get_content($login->uname);
        $restaurant_id = ($result[0]->restaurant_id);
//        $result = $this->radmin_model->reservation_enquiries($restaurant_id);


        $result = $this->radmin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->radmin_model->get_content($login->uname);
            $this->load->view('admin/restaurants/header');
            $this->load->view('admin/restaurants/update_event', array('event' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }











    public function get_client_contents()

    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {


            $this->load->view('admin/restaurants/header', array('company_list' => $result));
            $this->load->view('admin/restaurants/main2', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));

            $this->session->set_userdata($result);


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empty'
            );
            $this->login();

        }
    }



    public function general()

    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

        $result = $this->radmin_model->get_content($login->uname);
        if ($result) {


            $this->load->view('admin/restaurants/header', array('company_list' => $result));
            $this->load->view('admin/restaurants/main', array('company_list' => $result));
            $this->load->view('admin/restaurants/aside', array('company_list' => $result));  $this->load->view('admin/restaurants/footer', array('company_list' => $result));

            $this->session->set_userdata($result);


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empty'
            );
            $this->login();

        }
    }




}








