<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hag70178731nikki5362045182basepath66321097reac extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('readmin_model');
        $this->load->model('readmin_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }


    public function check_availablity($offset = 0)
    {
        $resort_location = $this->input->post('resort_location');
        $resort_city = $this->input->post('resort_city');
        $room_type = $this->input->post('room_type');
        $free_room = $this->input->post('free_room');
        $star_level = $this->input->post('star_level');
        $room_price = $this->input->post('room_price');
//        $price_range = $this->input->post('price_range');
        // $data['resort_location'] = $this->readmin_model->check_availablity($resort_location,$resort_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($data);
//
//        die;
        $this->load->library('pagination');
        $limit = 8;
        $total = 200;
        $config['base_url'] = site_url('resorts_controller/check_availablity');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->readmin_model->check_availablity($resort_location,$resort_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($result);
//
//        die;
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            // $this->load->view('resorts/check', $data);
            $this->load->view('resorts/page_header', $data);
            $this->load->view('resorts/search_view', array('resort_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);
            $this->load->view('commons/advertisement_view', $data);
            $this->load->view('commons/sponsors_view', $data);
            $this->load->view('footer', $data);
        }
    }










    public function search_resorts_inside_adiss($offset = 0)
    {
        $resort_location = $this->input->post('search_term');
        $data['resort_location'] = $this->readmin_model->search_resorts_inside_adiss($resort_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->readmin_model->count_resorts_inside_adiss($resort_location);
        $config['base_url'] = site_url('resorts_controller/search_resorts_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->readmin_model->search_resorts_inside_adiss($resort_location, $limit, $offset);

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/page_header', $data);
            $this->load->view('resorts/thumbnail', array('resort_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('resorts/discriptor', $data);
            $this->load->view('resorts/no_results', $data);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_image1' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_image3' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_image2' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_image4' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_image5' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_image6' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_image7' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_single_image' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_twin_image' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_suit_image' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_presidential_image' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'mhall_image' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'pool_image' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'resort_country_view' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'gym_image' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
        //$result2 = $this->readmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $resort_id = $this->input->post('resort_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'whall_image' => ($img_path),
                'resort_id' => ($resort_id)
            );
//                print_r($data);
//                exit;
            $this->readmin_model->image_upload( $resort_id, $data);
            $this->get_images($resort_id);

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
//            $q = $this->readmin_model->image_upload('image_thumbnail', $data);
//            // $this->login();
//
//
//        }
//    }
//
//


    function update_ri()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
            'free_room' => $this->input->post('free_room1'),
            'free_suit_rooms' => $this->input->post('free_suit_rooms1'),
            'free_single_rooms' => $this->input->post('free_single_rooms1'),
            'free_twin_room' => $this->input->post('free_twin_room1'),
            'free_presidential_suit' => $this->input->post('free_presidential_suit1'),
            'available_room_types' => $this->input->post('available_room_types1')

        );
        $this->readmin_model->update_ri($resort_id, $data);
        $this->rooms($resort_id);
    }


    function update_bi()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
             'resort_phone_office' => $this->input->post('resort_phone_office1'),
            'resort_phone_mobile' => $this->input->post('resort_phone_mobile1'),
            'resort_city' => $this->input->post('resort_city1'),
            'resort_location' => $this->input->post('resort_location1'),
            'resort_direction' => $this->input->post('resort_direction1'),
            'resort_email' => $this->input->post('resort_email1'),
            'resort_web_site' => $this->input->post('resort_web_site1'),
            'resort_discription' => $this->input->post('resort_discription1')

        );
        $this->readmin_model->update_bi($resort_id, $data);
        $this->get_client_contents($data);
    }






    function update_af()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
            'resort_fast_food' => $this->input->post('resort_fast_food1'),
            'resort_local_food' => $this->input->post('resort_local_food1'),
            'resort_burger_and_pizza' => $this->input->post('resort_burger_and_pizza1'),
            'resort_modern_food' => $this->input->post('resort_modern_food1'),

        );
        $this->readmin_model->update_af($resort_id, $data);
        $this->get_client_contents($data);
    }


    function update_bos()
    {
        $booking_id = $this->input->post('booking_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->readmin_model->update_bos($booking_id, $data);
        $this->booking_more($booking_id);
    }




    function update_password()
    {
        $resort_id= $this->input->post('resort_id');
        $data = array(

            'password' => $this->input->post('password1')
        );
        $this->readmin_model->update_pass($resort_id, $data);
        $this->settings();
    }

    function update_sl()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(

            'star_level' => $this->input->post('star_level1')
        );
        $this->readmin_model->update_sl($resort_id, $data);
        $this->settings();
    }



    function update_as()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(

            'activation_status' => $this->input->post('activation_status1')
        );
        $this->readmin_model->update_sl($resort_id, $data);
        $this->settings();
    }





    function update_rqs()
    {
        $request_id = $this->input->post('request_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->readmin_model->update_rqs($request_id, $data);
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
        $this->readmin_model->update_even($event_id, $data);
        $this->event_more($event_id);
    }






    function update_di()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
            'resort_hot_drinks' => $this->input->post('resort_hot_drinks1'),
            'resort_soft_drinks' => $this->input->post('resort_soft_drinks1'),
            'resort_local_drinks' => $this->input->post('resort_local_drinks1'),
            'resort_beer_and_alcohol' => $this->input->post('resort_beer_and_alcohol1'),

        );
        $this->readmin_model->update_af($resort_id, $data);
        $this->get_client_contents($data);
    }

    function update_serv()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
            'resort_parking' => $this->input->post('resort_parking1'),
            'resort_swimming_pool' => $this->input->post('resort_swimming_pool1'),
            'resort_children_play_ground' => $this->input->post('resort_children_play_ground1'),
            'resort_conference_room' => $this->input->post('resort_conference_room1'),
            'meeting_hall_description' => $this->input->post('meeting_hall_description1'),
            'wedding_hall_description' => $this->input->post('wedding_hall_description1'),
            'gym_discription' => $this->input->post('gym_discription1'),
            'swimming_pool_description' => $this->input->post('swimming_pool_description1'),

        );
        $this->readmin_model->update_serv($resort_id, $data);
        $this->get_client_contents($data);
    }





    function update_rp()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
            'resort_single_room_price' => $this->input->post('resort_single_room_price1'),
            'resort_twin_room_price' => $this->input->post('resort_twin_room_price1'),
            'resort_suit_room_price' => $this->input->post('resort_suit_room_price1'),
            'resort_presidential_suit_price' => $this->input->post('resort_presidential_suit_price1'),
            'rooms_from' => $this->input->post('rooms_from1'),

        );
        $this->readmin_model->update_rp($resort_id, $data);
        $this->get_client_contents($data);
    }

    function update_rav()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
            'resort_single_room' => $this->input->post('resort_single_room1'),
            'resort_twin_room' => $this->input->post('resort_twin_room1'),
            'resort_suit_room' => $this->input->post('resort_suit_room1'),
            'resort_presidential_suit' => $this->input->post('resort_presidential_suit1'),

        );
        $this->readmin_model->update_rav($resort_id, $data);
        $this->get_client_contents($data);
    }


    function update_rserv()
    {
        $resort_id = $this->input->post('resort_id');
        $data = array(
            'resort_wifi' => $this->input->post('resort_wifi1'),
            'resort_satelite_tv' => $this->input->post('resort_satelite_tv1'),
            'resort_hair_drier' => $this->input->post('resort_hair_drier1'),
            'resort_ac' => $this->input->post('resort_ac1'),

        );
        $this->readmin_model->update_rserv($resort_id, $data);
        $this->get_client_contents($data);
    }


    public function update_basic_info()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_basic_info', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
        $resort_id = $this->input->post('resort_id');
        $post = $this->input->post();
        {
            $q = $this->readmin_model->add_support('support', $post);
            $this->support_success($resort_id);
        }
    }





    public function add_client()
    {
        $resort_id = $this->input->post('resort_id');
        $post = $this->input->post();
        {
            $q = $this->readmin_model->add_client('resorts', $post);

            $this->login();
        }
    }


    public function support()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/support', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/settings', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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




    public function support_success($resort_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);

        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/success', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('resorts/no_results', $data);
        }
    }









    public function update_room_info()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_room_info', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form2', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form3', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form4', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form5', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form6', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form7', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form8', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form9', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form10', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form11', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form12', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form13', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form14', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form15', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/upload_form/upload_form16', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/image_view', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $resort_id = $this->input->post('resort_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_services', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->get_events($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');

            $this->load->view('admin/resorts/events', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($resort_id);
        }
    }

    public function rooms()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->rooms($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');

            $this->load->view('admin/resorts/rooms', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

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
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->requests($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');

            $this->load->view('admin/resorts/requests', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_req_results($resort_id);
        }
    }



    public function events()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->events($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');

            $this->load->view('admin/resorts/events', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($resort_id);
        }
    }


    public function message()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->message($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');

            $this->load->view('admin/resorts/message', array('message' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_message_results($resort_id);
        }
    }





    public function update_room_services()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_room_services', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->count_pending($resort_id);


        if ($result) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header', array('company_list' => $result2));
//            $this->load->view('admin/resorts/update_room_services', array('company_list' => $result));
//            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $resort_id = $this->input->post('resort_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_room_prices', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $resort_id = $this->input->post('resort_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_available_room_types', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $resort_id = $this->input->post('resort_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_available_food_items', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $resort_id = $this->input->post('resort_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_available_drink_items', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
        $this->load->view('admin/resorts/login');
        // $this->load->view('admin/footer', $data);
    }


    public function loginer()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/resorts/selector');
        // $this->load->view('admin/footer', $data);
    }




    public function register()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/resorts/register');
        // $this->load->view('admin/footer', $data);
    }









    public function login_process()
    {

        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $result = $this->readmin_model->login($uname, $password);
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
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->delete_booking($booking_id);
        if ($result) {

            $result2 = $this->readmin_model->get_content($login->uname);
            $result3 = $this->readmin_model->booking_enquiries($resort_id);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/booking_view', array('book' => $result3));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_booking_results($resort_id);
        }
    }



    public function delete_request($request_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->delete_request($request_id);
        if ($result) {

            $result2 = $this->readmin_model->get_content($login->uname);
            $result3 = $this->readmin_model->requests($resort_id);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/requests', array('company_list' => $result3));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_booking_results($resort_id);
        }
    }

    public function delete_event($event_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->delete_event($event_id);
        if ($result) {

            $result2 = $this->readmin_model->get_content($login->uname);
            $result3 = $this->readmin_model->events($resort_id);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/events', array('company_list' => $result3));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

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
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->delete_message($message_id);
        if ($result) {

            $result2 = $this->readmin_model->get_content($login->uname);
            $result3 = $this->readmin_model->message($resort_id);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/message', array('message' => $result3));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->add_support();
        }
    }




    function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('admin/resorts/login');
    }




//    public function trial()
//    {
//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->readmin_model->get_content($resort_id, $uname, $password);
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


    public function booking_enquiries($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->booking_enquiries($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/booking_view', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($resort_id);
        }
    }


    public function booking_pending($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->booking_pending($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/booking_pending', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($resort_id);
        }
    }


    public function booking_canceled($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->booking_canceled($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/booking_canceled', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($resort_id);
        }
    }


    public function booking_approved($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->booking_approved($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/approved_booking', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($resort_id);
        }
    }


    public function booking_completed($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
        $result = $this->readmin_model->booking_completed($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/booking_view', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($resort_id);
        }

    }


    public function no_booking_results($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
//        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_completed($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/no_results', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_event_results($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
//        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_completed($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/no_event_results', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_message_results($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
//        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_completed($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/no_message_results', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }



    public function no_req_results($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
//        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_completed($resort_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);

            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/no_req_results', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));

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
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_enquiries($resort_id);


        $result = $this->readmin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/b_more', array('book' => $result),array('company_list' => $result2) );

            $this->load->view('admin/resorts/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function request_more($request_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_enquiries($resort_id);


        $result = $this->readmin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/r_more', array('request' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }






    public function event_more($event_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_enquiries($resort_id);


        $result = $this->readmin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/event_more', array('event' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }







    public function update_booking_status($booking_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_enquiries($resort_id);


        $result = $this->readmin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_booking_view', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }





    public function prints($booking_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_enquiries($resort_id);


        $result = $this->readmin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/invoice_print', array('book' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function printrs($request_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_enquiries($resort_id);


        $result = $this->readmin_model->booking_more($request_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/request_print', array('request' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function update_star_level()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_star_level', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $resort_id = $this->input->post('resort_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_activation', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));


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
            redirect(site_url('readmin_controller/login'));
        }

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/change_password', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));

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
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        if($result){
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/change_password', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));
        }else{
            $query = $this->readmin_model->checkpass($this->input->post('password'));
            if($query){
                $query = $this->readmin_model->savePass($this->input->post('password1'));
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
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_enquiries($resort_id);


        $result = $this->readmin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_request', array('request' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }


    public function update_event($event_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }
        $result = $this->readmin_model->get_content($login->uname);
        $resort_id = ($result[0]->resort_id);
//        $result = $this->readmin_model->booking_enquiries($resort_id);


        $result = $this->readmin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->readmin_model->get_content($login->uname);
            $this->load->view('admin/resorts/header');
            $this->load->view('admin/resorts/update_event', array('event' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }











    public function get_client_contents()

    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('readmin_controller/login'));
        }

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {


            $this->load->view('admin/resorts/header', array('company_list' => $result));
            $this->load->view('admin/resorts/main2', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));

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
            redirect(site_url('readmin_controller/login'));
        }

        $result = $this->readmin_model->get_content($login->uname);
        if ($result) {


            $this->load->view('admin/resorts/header', array('company_list' => $result));
            $this->load->view('admin/resorts/main', array('company_list' => $result));
            $this->load->view('admin/resorts/aside', array('company_list' => $result));  $this->load->view('admin/resorts/footer', array('company_list' => $result));

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