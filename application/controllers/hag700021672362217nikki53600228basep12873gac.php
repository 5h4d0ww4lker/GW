<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hag700021672362217nikki53600228basep12873gac extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('gadmin_model');
        $this->load->model('gadmin_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }


    public function check_availablity($offset = 0)
    {
        $guest_house_location = $this->input->post('guest_house_location');
        $guest_house_city = $this->input->post('guest_house_city');
        $room_type = $this->input->post('room_type');
        $free_room = $this->input->post('free_room');
        $star_level = $this->input->post('star_level');
        $room_price = $this->input->post('room_price');
//        $price_range = $this->input->post('price_range');
        // $data['guest_house_location'] = $this->gadmin_model->check_availablity($guest_house_location,$guest_house_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($data);
//
//        die;
        $this->load->library('pagination');
        $limit = 8;
        $total = 200;
        $config['base_url'] = site_url('guest_houses_controller/check_availablity');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->gadmin_model->check_availablity($guest_house_location,$guest_house_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($result);
//
//        die;
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            // $this->load->view('guest_houses/check', $data);
            $this->load->view('guest_houses/page_header', $data);
            $this->load->view('guest_houses/search_view', array('guest_house_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);
            $this->load->view('commons/advertisement_view', $data);
            $this->load->view('commons/sponsors_view', $data);
            $this->load->view('footer', $data);
        }
    }










    public function search_guest_houses_inside_adiss($offset = 0)
    {
        $guest_house_location = $this->input->post('search_term');
        $data['guest_house_location'] = $this->gadmin_model->search_guest_houses_inside_adiss($guest_house_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->gadmin_model->count_guest_houses_inside_adiss($guest_house_location);
        $config['base_url'] = site_url('guest_houses_controller/search_guest_houses_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->gadmin_model->search_guest_houses_inside_adiss($guest_house_location, $limit, $offset);

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/page_header', $data);
            $this->load->view('guest_houses/thumbnail', array('guest_house_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('guest_houses/discriptor', $data);
            $this->load->view('guest_houses/no_results', $data);

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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_image1' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_image3' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_image2' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_image4' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_image5' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_image6' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_image7' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_single_image' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_twin_image' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_suit_image' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_presidential_image' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'mhall_image' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'pool_image' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'guest_house_country_view' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'gym_image' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
        //$result2 = $this->gadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $guest_house_id = $this->input->post('guest_house_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'whall_image' => ($img_path),
                'guest_house_id' => ($guest_house_id)
            );
//                print_r($data);
//                exit;
            $this->gadmin_model->image_upload( $guest_house_id, $data);
            $this->get_images($guest_house_id);

        } else {
            $data = array(
                'error_message' => 'List Empty'
            );

            echo $this->upload->display_errors();

            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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
//            $q = $this->gadmin_model->image_upload('image_thumbnail', $data);
//            // $this->login();
//
//
//        }
//    }
//
//


    function update_ri()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'free_room' => $this->input->post('free_room1'),
            'free_suit_rooms' => $this->input->post('free_suit_rooms1'),
            'free_single_rooms' => $this->input->post('free_single_rooms1'),
            'free_twin_room' => $this->input->post('free_twin_room1'),
            'free_presidential_suit' => $this->input->post('free_presidential_suit1'),
            'available_room_types' => $this->input->post('available_room_types1')

        );
        $this->gadmin_model->update_ri($guest_house_id, $data);
        $this->rooms($guest_house_id);
    }


    function update_bi()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'guest_house_phone_office' => $this->input->post('guest_house_phone_office1'),
            'guest_house_phone_mobile' => $this->input->post('guest_house_phone_mobile1'),
            'guest_house_city' => $this->input->post('guest_house_city1'),
            'guest_house_location' => $this->input->post('guest_house_location1'),
            'guest_house_direction' => $this->input->post('guest_house_direction1'),
            'guest_house_email' => $this->input->post('guest_house_email1'),
            'guest_house_web_site' => $this->input->post('guest_house_web_site1')
        );
        $this->gadmin_model->update_bi($guest_house_id, $data);
        $this->get_client_contents($data);
    }






    function update_af()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'guest_house_fast_food' => $this->input->post('guest_house_fast_food1'),
            'guest_house_local_food' => $this->input->post('guest_house_local_food1'),
            'guest_house_burger_and_pizza' => $this->input->post('guest_house_burger_and_pizza1'),
            'guest_house_modern_food' => $this->input->post('guest_house_modern_food1'),
            'food_status' => $this->input->post('food_status1'),

        );
        $this->gadmin_model->update_af($guest_house_id, $data);
        $this->get_client_contents($data);
    }


    function update_bos()
    {
        $booking_id = $this->input->post('booking_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->gadmin_model->update_bos($booking_id, $data);
        $this->booking_more($booking_id);
    }




    function update_password()
    {
        $guest_house_id= $this->input->post('guest_house_id');
        $data = array(

            'password' => $this->input->post('password1')
        );
        $this->gadmin_model->update_pass($guest_house_id, $data);
        $this->settings();
    }

    function update_sl()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(

            'star_level' => $this->input->post('star_level1')

        );
        $this->gadmin_model->update_sl($guest_house_id, $data);
        $this->settings();
    }


    function update_fs()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(

            'food_status' => $this->input->post('food_status1')

        );
        $this->gadmin_model->update_sl($guest_house_id, $data);
        $this->settings();
    }



    function update_as()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(

            'activation_status' => $this->input->post('activation_status1')
        );
        $this->gadmin_model->update_sl($guest_house_id, $data);
        $this->settings();
    }





    function update_rqs()
    {
        $request_id = $this->input->post('request_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->gadmin_model->update_rqs($request_id, $data);
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
        $this->gadmin_model->update_even($event_id, $data);
        $this->event_more($event_id);
    }






    function update_di()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'guest_house_hot_drinks' => $this->input->post('guest_house_hot_drinks1'),
            'guest_house_soft_drinks' => $this->input->post('guest_house_soft_drinks1'),
            'guest_house_local_drinks' => $this->input->post('guest_house_local_drinks1'),
            'guest_house_beer_and_alcohol' => $this->input->post('guest_house_beer_and_alcohol1'),

        );
        $this->gadmin_model->update_af($guest_house_id, $data);
        $this->get_client_contents($data);
    }


    function update_serv()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'guest_house_parking' => $this->input->post('guest_house_parking1'),
            'guest_house_swimming_pool' => $this->input->post('guest_house_swimming_pool1'),
            'guest_house_children_play_ground' => $this->input->post('guest_house_children_play_ground1'),
            'guest_house_conference_room' => $this->input->post('guest_house_conference_room1'),
            'meeting_hall_description' => $this->input->post('meeting_hall_description1'),
            'wedding_hall_description' => $this->input->post('wedding_hall_description1'),
            'gym_discription' => $this->input->post('gym_discription1'),
            'swimming_pool_description' => $this->input->post('swimming_pool_description1'),

        );
        $this->gadmin_model->update_serv($guest_house_id, $data);
        $this->get_client_contents($data);
    }





    function update_rp()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'guest_house_single_room_price' => $this->input->post('guest_house_single_room_price1'),
            'guest_house_twin_room_price' => $this->input->post('guest_house_twin_room_price1'),
            'guest_house_suit_room_price' => $this->input->post('guest_house_suit_room_price1'),
            'guest_house_presidential_suit_price' => $this->input->post('guest_house_presidential_suit_price1'),
            'rooms_from' => $this->input->post('rooms_from1'),

        );
        $this->gadmin_model->update_rp($guest_house_id, $data);
        $this->get_client_contents($data);
    }

    function update_rav()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'guest_house_single_room' => $this->input->post('guest_house_single_room1'),
            'guest_house_twin_room' => $this->input->post('guest_house_twin_room1'),
            'guest_house_suit_room' => $this->input->post('guest_house_suit_room1'),
            'guest_house_presidential_suit' => $this->input->post('guest_house_presidential_suit1'),

        );
        $this->gadmin_model->update_rav($guest_house_id, $data);
        $this->get_client_contents($data);
    }


    function update_rserv()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $data = array(
            'guest_house_wifi' => $this->input->post('guest_house_wifi1'),
            'guest_house_satelite_tv' => $this->input->post('guest_house_satelite_tv1'),
            'guest_house_hair_drier' => $this->input->post('guest_house_hair_drier1'),
            'guest_house_ac' => $this->input->post('guest_house_ac1'),

        );
        $this->gadmin_model->update_rserv($guest_house_id, $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_basic_info', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }


    public function add_support()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $post = $this->input->post();
        {
            $q = $this->gadmin_model->add_support('support', $post);
            $this->support_success($guest_house_id);
        }
    }





    public function add_client()
    {
        $guest_house_id = $this->input->post('guest_house_id');
        $post = $this->input->post();
        {
            $q = $this->gadmin_model->add_client('guest_houses', $post);

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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/support', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/settings', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }




    public function support_success($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);

        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/success', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('guest_houses/no_results', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_room_info', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form2', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form3', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form4', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form5', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form6', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form7', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form8', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form9', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form10', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form11', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form12', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form13', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form14', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form15', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/upload_form/upload_form16', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/image_view', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

        $guest_house_id = $this->input->post('guest_house_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_services', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }


    public function get_events()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->get_events($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');

            $this->load->view('admin/guest_houses/events', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($guest_house_id);
        }
    }

    public function rooms()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->rooms($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');

            $this->load->view('admin/guest_houses/rooms', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

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
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->requests($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');

            $this->load->view('admin/guest_houses/requests', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_req_results($guest_house_id);
        }
    }



    public function events()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->events($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');

            $this->load->view('admin/guest_houses/events', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($guest_house_id);
        }
    }


    public function message()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->message($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');

            $this->load->view('admin/guest_houses/message', array('message' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_message_results($guest_house_id);
        }
    }





    public function update_room_services()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_room_services', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->count_pending($guest_house_id);


        if ($result) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header', array('company_list' => $result2));
//            $this->load->view('admin/guest_houses/update_room_services', array('company_list' => $result));
//            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//
//            print_r($result);
//die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

        $guest_house_id = $this->input->post('guest_house_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_room_prices', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

        $guest_house_id = $this->input->post('guest_house_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_available_room_types', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

        $guest_house_id = $this->input->post('guest_house_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_available_food_items', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

        $guest_house_id = $this->input->post('guest_house_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_available_drink_items', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }


    public function login()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/guest_houses/login');
        // $this->load->view('admin/footer', $data);
    }


    public function loginer()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/guest_houses/selector');
        // $this->load->view('admin/footer', $data);
    }




    public function register()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/guest_houses/register');
        // $this->load->view('admin/footer', $data);
    }









    public function login_process()
    {

        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $result = $this->gadmin_model->login($uname, $password);
        // print_r($result);
//die();
        if ($this->input->post() && $result) {
            $this->session->set_userdata('loginaccount', $result);
            $this->get_client_contents();

        } else {
            $this->login();
        }
    }


    public function delete_booking($booking_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->delete_booking($booking_id);
        if ($result) {

            $result2 = $this->gadmin_model->get_content($login->uname);
            $result3 = $this->gadmin_model->booking_enquiries($guest_house_id);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/booking_view', array('book' => $result3));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_booking_results($guest_house_id);
        }
    }



    public function delete_request($request_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->delete_request($request_id);
        if ($result) {

            $result2 = $this->gadmin_model->get_content($login->uname);
            $result3 = $this->gadmin_model->requests($guest_house_id);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/requests', array('company_list' => $result3));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_booking_results($guest_house_id);
        }
    }

    public function delete_event($event_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->delete_event($event_id);
        if ($result) {

            $result2 = $this->gadmin_model->get_content($login->uname);
            $result3 = $this->gadmin_model->events($guest_house_id);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/events', array('company_list' => $result3));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

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
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->delete_message($message_id);
        if ($result) {

            $result2 = $this->gadmin_model->get_content($login->uname);
            $result3 = $this->gadmin_model->message($guest_house_id);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/message', array('message' => $result3));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->add_support();
        }
    }




    function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('admin/guest_houses/login');
    }




//    public function trial()
//    {
//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->gadmin_model->get_content($guest_house_id, $uname, $password);
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


    public function booking_enquiries($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->booking_enquiries($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/booking_view', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($guest_house_id);
        }
    }


    public function booking_pending($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->booking_pending($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/booking_pending', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($guest_house_id);
        }
    }


    public function booking_canceled($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->booking_canceled($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/booking_canceled', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($guest_house_id);
        }
    }


    public function booking_approved($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->booking_approved($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/approved_booking', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($guest_house_id);
        }
    }


    public function booking_completed($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
        $result = $this->gadmin_model->booking_completed($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/booking_view', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($guest_house_id);
        }

    }


    public function no_booking_results($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
//        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_completed($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/no_results', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_event_results($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
//        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_completed($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/no_event_results', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_message_results($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
//        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_completed($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/no_message_results', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }



    public function no_req_results($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
//        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_completed($guest_house_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);

            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/no_req_results', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }


    public function booking_more($booking_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_enquiries($guest_house_id);


        $result = $this->gadmin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/b_more', array('book' => $result),array('company_list' => $result2) );

            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));
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
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_enquiries($guest_house_id);


        $result = $this->gadmin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/r_more', array('request' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));
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
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_enquiries($guest_house_id);


        $result = $this->gadmin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/event_more', array('event' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }







    public function update_booking_status($booking_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_enquiries($guest_house_id);


        $result = $this->gadmin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_booking_view', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }





    public function prints($booking_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_enquiries($guest_house_id);


        $result = $this->gadmin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/invoice_print', array('book' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));
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
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_enquiries($guest_house_id);


        $result = $this->gadmin_model->booking_more($request_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/request_print', array('request' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_star_level', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
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

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_activation', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }





    public function update_food_status()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $guest_house_id = $this->input->post('guest_house_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_food_status', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }



    public function change_password()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/change_password', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));

        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }



    public function change_pass() {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->gadmin_model->get_content($login->uname);
        if($result){
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/change_password', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));
        }else{
            $query = $this->gadmin_model->checkpass($this->input->post('password'));
            if($query){
                $query = $this->gadmin_model->savePass($this->input->post('password1'));
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
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_enquiries($guest_house_id);


        $result = $this->gadmin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_request', array('request' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));
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
        $result = $this->gadmin_model->get_content($login->uname);
        $guest_house_id = ($result[0]->guest_house_id);
//        $result = $this->gadmin_model->booking_enquiries($guest_house_id);


        $result = $this->gadmin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->gadmin_model->get_content($login->uname);
            $this->load->view('admin/guest_houses/header');
            $this->load->view('admin/guest_houses/update_event', array('event' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result2));
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

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {


            $this->load->view('admin/guest_houses/header', array('company_list' => $result));
            $this->load->view('admin/guest_houses/main2', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));

            $this->session->set_userdata($result);


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empty'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }







    public function general()

    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

        $result = $this->gadmin_model->get_content($login->uname);
        if ($result) {


            $this->load->view('admin/guest_houses/header', array('company_list' => $result));
            $this->load->view('admin/guest_houses/main', array('company_list' => $result));
            $this->load->view('admin/guest_houses/aside', array('company_list' => $result));  $this->load->view('admin/guest_houses/footer', array('company_list' => $result));

            $this->session->set_userdata($result);


//              print_r($result);
// die();
        } else {
            $data = array(
                'error_message' => 'List Empty'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }


}