<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hag20637210001nikki5621001101basepath33cac extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cadmin_model');
        $this->load->model('cadmin_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }




    public function update_food_status()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }



        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_food_status', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));
            $this->load->view('admin/clubs/footer', array('company_list' => $result));

        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }



    public function update_catagory()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }



        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_catagory', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));
            $this->load->view('admin/clubs/footer', array('company_list' => $result));

        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('admin_header', $data);
            $this->load->view('no_results', $data);
            $this->load->view('footer_view', $data);
        }
    }




    function update_fs()
    {
        $club_id = $this->input->post('club_id');
        $data = array(

            'food_status' => $this->input->post('food_status1')

        );
        $this->cadmin_model->update_fs($club_id, $data);
        $this->settings();
    }


    function update_cat()
    {
        $club_id = $this->input->post('club_id');
        $data = array(

            'catagory' => $this->input->post('catagory1')

        );
        $this->cadmin_model->update_cat($club_id, $data);
        $this->settings();
    }




    public function check_availablity($offset = 0)
    {
        $club_location = $this->input->post('club_location');
        $club_city = $this->input->post('club_city');
        $room_type = $this->input->post('room_type');
        $free_room = $this->input->post('free_room');
        $star_level = $this->input->post('star_level');
        $room_price = $this->input->post('room_price');
//        $price_range = $this->input->post('price_range');
        // $data['club_location'] = $this->cadmin_model->check_availablity($club_location,$club_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($data);
//
//        die;
        $this->load->library('pagination');
        $limit = 8;
        $total = 200;
        $config['base_url'] = site_url('clubs_controller/check_availablity');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->cadmin_model->check_availablity($club_location,$club_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($result);
//
//        die;
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            // $this->load->view('clubs/check', $data);
            $this->load->view('clubs/page_header', $data);
            $this->load->view('clubs/search_view', array('club_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);
            $this->load->view('commons/advertisement_view', $data);
            $this->load->view('commons/sponsors_view', $data);
            $this->load->view('footer', $data);
        }
    }










    public function search_clubs_inside_adiss($offset = 0)
    {
        $club_location = $this->input->post('search_term');
        $data['club_location'] = $this->cadmin_model->search_clubs_inside_adiss($club_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->cadmin_model->count_clubs_inside_adiss($club_location);
        $config['base_url'] = site_url('clubs_controller/search_clubs_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->cadmin_model->search_clubs_inside_adiss($club_location, $limit, $offset);

        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/page_header', $data);
            $this->load->view('clubs/thumbnail', array('club_location' => $result));

            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('clubs/discriptor', $data);
            $this->load->view('clubs/no_results', $data);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

            if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'club_image1' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'club_image3' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'club_image2' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'club_image4' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'club_image5' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'club_image6' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'club_image7' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'vip_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'class1_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'class2_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'class3_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'games_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'lightening_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'parking_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'gym_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
        //$result2 = $this->cadmin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $club_id = $this->input->post('club_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'whall_image' => ($img_path),
                'club_id' => ($club_id)
            );
//                print_r($data);
//                exit;
            $this->cadmin_model->image_upload( $club_id, $data);
            $this->get_images($club_id);

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
//            $q = $this->cadmin_model->image_upload('image_thumbnail', $data);
//            // $this->login();
//
//
//        }
//    }
//
//




    function update_ri()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'free_seats' => $this->input->post('free_seats1'),
            'free_vip_seats' => $this->input->post('free_vip_seats1'),
            'free_c1_seats' => $this->input->post('free_c1_seats1'),
            'free_c2_seats' => $this->input->post('free_c2_seats1'),
            'free_c3_seats' => $this->input->post('free_c3_seats1'),
            'seat_type' => $this->input->post('seat_type1')

        );
        $this->cadmin_model->update_ri($club_id, $data);
        $this->rooms($club_id);
    }


    function update_bi()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'club_phone_office' => $this->input->post('club_phone_office1'),
            'club_phone_mobile' => $this->input->post('club_phone_mobile1'),
            'club_city' => $this->input->post('club_city1'),
            'club_location' => $this->input->post('club_location1'),
            'club_direction' => $this->input->post('club_direction1'),
            'club_email' => $this->input->post('club_email1'),
            'club_web_site' => $this->input->post('club_web_site1'),
            'club_discription' => $this->input->post('club_discription1')
        );
        $this->cadmin_model->update_bi($club_id, $data);
        $this->get_client_contents($data);
    }






    function update_af()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'club_fast_food' => $this->input->post('club_fast_food1'),
            'club_local_food' => $this->input->post('club_local_food1'),
            'club_burger_and_pizza' => $this->input->post('club_burger_and_pizza1'),
            'club_modern_food' => $this->input->post('club_modern_food1'),

        );
        $this->cadmin_model->update_af($club_id, $data);
        $this->get_client_contents($data);
    }


    function update_bos()
    {
        $reservation_id = $this->input->post('reservation_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->cadmin_model->update_bos($reservation_id, $data);
        $this->reservation_more($reservation_id);
    }




    function update_password()
    {
        $club_id= $this->input->post('club_id');
        $data = array(

            'password' => $this->input->post('password1')
        );
        $this->cadmin_model->update_pass($club_id, $data);
        $this->settings();
    }

    function update_sl()
    {
        $club_id = $this->input->post('club_id');
        $data = array(

            'club_class' => $this->input->post('club_class1')
        );
        $this->cadmin_model->update_sl($club_id, $data);
        $this->settings();
    }



    function update_as()
    {
        $club_id = $this->input->post('club_id');
        $data = array(

            'activation_status' => $this->input->post('activation_status1')
        );
        $this->cadmin_model->update_sl($club_id, $data);
        $this->settings();
    }





    function update_rqs()
    {
        $request_id = $this->input->post('request_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->cadmin_model->update_rqs($request_id, $data);
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
        $this->cadmin_model->update_even($event_id, $data);
        $this->event_more($event_id);
    }






    function update_di()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'club_hot_drinks' => $this->input->post('club_hot_drinks1'),
            'club_soft_drinks' => $this->input->post('club_soft_drinks1'),
            'club_local_drinks' => $this->input->post('club_local_drinks1'),
            'club_beer_and_alcohol' => $this->input->post('club_beer_and_alcohol1'),

        );
        $this->cadmin_model->update_af($club_id, $data);
        $this->get_client_contents($data);
    }


    function update_serv()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'parking' => $this->input->post('parking1'),
            'pool' => $this->input->post('pool1'),
            'children_play_ground' => $this->input->post('children_play_ground1'),
            'wifi' => $this->input->post('wifi1'),

        );
        $this->cadmin_model->update_serv($club_id, $data);
        $this->get_client_contents($data);
    }





    function update_rp()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'monday' => $this->input->post('monday1'),
            'tuesday' => $this->input->post('tuesday1'),
            'wednesday' => $this->input->post('wednesday1'),
            'thursday' => $this->input->post('thursday1'),
            'friday' => $this->input->post('friday1'),
            'saturday' => $this->input->post('saturday1'),
            'sunday' => $this->input->post('sunday1'),
            'monday_dis' => $this->input->post('monday_dis1'),
            'tuesday_dis' => $this->input->post('tuesday_dis1'),
            'wednesday_dis' => $this->input->post('wednesday_dis1'),
            'thursday_dis' => $this->input->post('thursday_dis1'),
            'friday_dis' => $this->input->post('friday_dis1'),
            'saturday_dis' => $this->input->post('saturday_dis1'),
            'sunday_dis' => $this->input->post('sunday_dis1'),


        );
        $this->cadmin_model->update_rp($club_id, $data);
        $this->get_client_contents($data);
    }

    function update_rav()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'vip_discription' => $this->input->post('vip_discription1'),
            'c1_discription' => $this->input->post('c1_discription1'),
            'c2_discription' => $this->input->post('c2_discription1'),
            'c3_discription' => $this->input->post('c3_discription1'),

        );
        $this->cadmin_model->update_rav($club_id, $data);
        $this->get_client_contents($data);
    }


    function update_rserv()
    {
        $club_id = $this->input->post('club_id');
        $data = array(
            'club_special' => $this->input->post('club_special1'),
            'special_price' => $this->input->post('special_price1'),
            'special_cheif' => $this->input->post('special_cheif1'),
            'special_ingridients' => $this->input->post('special_ingridients1'),

        );
        $this->cadmin_model->update_rserv($club_id, $data);
        $this->get_client_contents($data);
    }


    public function update_basic_info()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_basic_info', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
        $club_id = $this->input->post('club_id');
        $post = $this->input->post();
        {
            $q = $this->cadmin_model->add_support('support', $post);
            $this->support_success($club_id);
        }
    }





    public function add_client()
    {
        $club_id = $this->input->post('club_id');
        $post = $this->input->post();
        {
            $q = $this->cadmin_model->add_client('clubs', $post);

            $this->login();
        }
    }


    public function support()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/support', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/settings', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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




    public function support_success($club_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);

        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/success', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('clubs/no_results', $data);
        }
    }









    public function update_room_info()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_room_info', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form2', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form3', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form4', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form5', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form6', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form7', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form8', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form9', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form10', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form11', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form12', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form13', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form14', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form15', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/upload_form/upload_form16', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/image_view', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $club_id = $this->input->post('club_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_services', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->get_events($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');

            $this->load->view('admin/clubs/events', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($club_id);
        }
    }

    public function rooms()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->rooms($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');

            $this->load->view('admin/clubs/rooms', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

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
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->requests($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');

            $this->load->view('admin/clubs/requests', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_req_results($club_id);
        }
    }



    public function events()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->events($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');

            $this->load->view('admin/clubs/events', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($club_id);
        }
    }


    public function message()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->message($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');

            $this->load->view('admin/clubs/message', array('message' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_message_results($club_id);
        }
    }





    public function update_special()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_room_services', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->count_pending($club_id);


        if ($result) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header', array('company_list' => $result2));
//            $this->load->view('admin/clubs/update_room_services', array('company_list' => $result));
//            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $club_id = $this->input->post('club_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_room_prices', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $club_id = $this->input->post('club_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_available_room_types', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $club_id = $this->input->post('club_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_available_food_items', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

        $club_id = $this->input->post('club_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_available_drink_items', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
        $this->load->view('admin/clubs/login');
        // $this->load->view('admin/footer', $data);
    }


    public function loginer()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/clubs/selector');
        // $this->load->view('admin/footer', $data);
    }




    public function register()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/clubs/register');
        // $this->load->view('admin/footer', $data);
    }









    public function login_process()
    {

        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $result = $this->cadmin_model->login($uname, $password);
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
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->delete_reservation($reservation_id);
        if ($result) {

            $result2 = $this->cadmin_model->get_content($login->uname);
            $result3 = $this->cadmin_model->reservation_enquiries($club_id);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/reservation_view', array('book' => $result3));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_reservation_results($club_id);
        }
    }



    public function delete_request($request_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->delete_request($request_id);
        if ($result) {

            $result2 = $this->cadmin_model->get_content($login->uname);
            $result3 = $this->cadmin_model->requests($club_id);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/requests', array('company_list' => $result3));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_reservation_results($club_id);
        }
    }

    public function delete_event($event_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->delete_event($event_id);
        if ($result) {

            $result2 = $this->cadmin_model->get_content($login->uname);
            $result3 = $this->cadmin_model->events($club_id);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/events', array('company_list' => $result3));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

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
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->delete_message($message_id);
        if ($result) {

            $result2 = $this->cadmin_model->get_content($login->uname);
            $result3 = $this->cadmin_model->message($club_id);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/message', array('message' => $result3));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->add_support();
        }
    }




    function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('admin/clubs/login');
    }




//    public function trial()
//    {
//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->cadmin_model->get_content($club_id, $uname, $password);
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


    public function reservation_enquiries($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->reservation_enquiries($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/reservation_view', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($club_id);
        }
    }


    public function reservation_pending($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->reservation_pending($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/reservation_pending', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($club_id);
        }
    }


    public function reservation_canceled($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->reservation_canceled($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/reservation_canceled', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($club_id);
        }
    }


    public function reservation_approved($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->reservation_approved($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/approved_reservation', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($club_id);
        }
    }


    public function reservation_completed($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
        $result = $this->cadmin_model->reservation_completed($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/reservation_view', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_reservation_results($club_id);
        }

    }


    public function no_reservation_results($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
//        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_completed($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/no_results', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_event_results($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
//        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_completed($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/no_event_results', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_message_results($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
//        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_completed($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/no_message_results', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }



    public function no_req_results($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
//        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_completed($club_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);

            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/no_req_results', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));

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
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_enquiries($club_id);


        $result = $this->cadmin_model->reservation_more($reservation_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/b_more', array('book' => $result),array('company_list' => $result2) );

            $this->load->view('admin/clubs/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function request_more($request_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_enquiries($club_id);


        $result = $this->cadmin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/r_more', array('request' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }






    public function event_more($event_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_enquiries($club_id);


        $result = $this->cadmin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/event_more', array('event' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }







    public function update_reservation_status($reservation_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_enquiries($club_id);


        $result = $this->cadmin_model->reservation_more($reservation_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_reservation_view', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }





    public function prints($reservation_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_enquiries($club_id);


        $result = $this->cadmin_model->reservation_more($reservation_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/invoice_print', array('book' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function printrs($request_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_enquiries($club_id);


        $result = $this->cadmin_model->reservation_more($request_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/request_print', array('request' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }



    public function update_star_level()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_star_level', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $club_id = $this->input->post('club_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_activation', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));


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
            redirect(site_url('cadmin_controller/login'));
        }

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/change_password', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));

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
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        if($result){
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/change_password', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));
        }else{
            $query = $this->cadmin_model->checkpass($this->input->post('password'));
            if($query){
                $query = $this->cadmin_model->savePass($this->input->post('password1'));
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
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_enquiries($club_id);


        $result = $this->cadmin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_request', array('request' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }


    public function update_event($event_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }
        $result = $this->cadmin_model->get_content($login->uname);
        $club_id = ($result[0]->club_id);
//        $result = $this->cadmin_model->reservation_enquiries($club_id);


        $result = $this->cadmin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->cadmin_model->get_content($login->uname);
            $this->load->view('admin/clubs/header');
            $this->load->view('admin/clubs/update_event', array('event' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result2));
        } else {
            $this->login();
        }
    }











    public function get_client_contents()

    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('cadmin_controller/login'));
        }

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {


            $this->load->view('admin/clubs/header', array('company_list' => $result));
            $this->load->view('admin/clubs/main2', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));

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
            redirect(site_url('cadmin_controller/login'));
        }

        $result = $this->cadmin_model->get_content($login->uname);
        if ($result) {


            $this->load->view('admin/clubs/header', array('company_list' => $result));
            $this->load->view('admin/clubs/main', array('company_list' => $result));
            $this->load->view('admin/clubs/aside', array('company_list' => $result));  $this->load->view('admin/clubs/footer', array('company_list' => $result));

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








