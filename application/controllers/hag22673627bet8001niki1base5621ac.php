<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hag22673627bet8001niki1base5621ac extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('admin_model');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');

    }


    public function check_availablity($offset = 0)
    {
        $hotel_location = $this->input->post('hotel_location');
        $hotel_city = $this->input->post('hotel_city');
        $room_type = $this->input->post('room_type');
        $free_room = $this->input->post('free_room');
        $star_level = $this->input->post('star_level');
        $room_price = $this->input->post('room_price');
//        $price_range = $this->input->post('price_range');
       // $data['hotel_location'] = $this->admin_model->check_availablity($hotel_location,$hotel_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($data);
//
//        die;
        $this->load->library('pagination');
        $limit = 8;
        $total = 200;
        $config['base_url'] = site_url('hotels_controller/check_availablity');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->admin_model->check_availablity($hotel_location,$hotel_city,$room_type,$room_price,$star_level,$free_room);
//        print_r($result);
//
//        die;
        if ($result) {
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            // $this->load->view('hotels/check', $data);
            $this->load->view('hotels/page_header', $data);
            $this->load->view('hotels/search_view', array('hotel_location' => $result));
            $this->load->view('commons/footer', $data);
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);
            $this->load->view('commons/advertisement_view', $data);
            $this->load->view('commons/sponsors_view', $data);
            $this->load->view('footer', $data);
        }
    }










    public function search_hotels_inside_adiss($offset = 0)
    {
        $hotel_location = $this->input->post('search_term');
        $data['hotel_location'] = $this->admin_model->search_hotels_inside_adiss($hotel_location);
        $this->load->library('pagination');
        $limit = 8;
        $total = $this->admin_model->count_hotels_inside_adiss($hotel_location);
        $config['base_url'] = site_url('hotels_controller/search_hotels_inside_adiss');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();
        $result = $this->admin_model->search_hotels_inside_adiss($hotel_location, $limit, $offset);

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
            $this->load->view('commons/header', $data);
            $this->load->view('hotels/discriptor', $data);
            $this->load->view('hotels/no_results', $data);

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
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_image1' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_image3' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_image2' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_image4' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_image5' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_image6' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_image7' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_single_image' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_twin_image' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_suit_image' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_presidential_image' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'mhall_image' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'pool_image' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'hotel_country_view' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'gym_image' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
        //$result2 = $this->admin_model->get_content($login->uname);

        // $img_path='uploads/'.$this->upload->file_name;

        if ($result) {
            $hotel_id = $this->input->post('hotel_id');
            $img_path='uploads/'.$this->upload->file_name;
            $data = array(
                'whall_image' => ($img_path),
                'hotel_id' => ($hotel_id)
            );
//                print_r($data);
//                exit;
            $this->admin_model->image_upload( $hotel_id, $data);
            $this->get_images($hotel_id);

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
//            $q = $this->admin_model->image_upload('image_thumbnail', $data);
//            // $this->login();
//
//
//        }
//    }
//
//


    function update_ri()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(
            'free_room' => $this->input->post('free_room1'),
            'free_suit_rooms' => $this->input->post('free_suit_rooms1'),
            'free_single_rooms' => $this->input->post('free_single_rooms1'),
            'free_twin_room' => $this->input->post('free_twin_room1'),
            'free_presidential_suit' => $this->input->post('free_presidential_suit1'),
            'available_room_types' => $this->input->post('available_room_types1')

        );
        $this->admin_model->update_ri($hotel_id, $data);
       $this->rooms($hotel_id);
    }


    function update_bi()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(  
            'hotel_phone_office' => $this->input->post('hotel_phone_office1'),
            'hotel_phone_mobile' => $this->input->post('hotel_phone_mobile1'),
            'hotel_city' => $this->input->post('hotel_city1'),
            'hotel_location' => $this->input->post('hotel_location1'),
            'hotel_direction' => $this->input->post('hotel_direction1'),
            'hotel_email' => $this->input->post('hotel_email1'),
            'hotel_web_site' => $this->input->post('hotel_web_site1'),
            'hotel_discription' => $this->input->post('hotel_discription1')
        );
        $this->admin_model->update_bi($hotel_id, $data);
        $this->get_client_contents($data);
    }







    function update_af()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(
            'hotel_fast_food' => $this->input->post('hotel_fast_food1'),
            'hotel_local_food' => $this->input->post('hotel_local_food1'),
            'hotel_burger_and_pizza' => $this->input->post('hotel_burger_and_pizza1'),
            'hotel_modern_food' => $this->input->post('hotel_modern_food1'),

        );
        $this->admin_model->update_af($hotel_id, $data);
        $this->get_client_contents($data);
    }


    function update_bos()
    {
        $booking_id = $this->input->post('booking_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->admin_model->update_bos($booking_id, $data);
        $this->booking_more($booking_id);
    }




    function update_password()
    {
        $hotel_id= $this->input->post('hotel_id');
        $data = array(

            'password' => $this->input->post('password1')
        );
        $this->admin_model->update_pass($hotel_id, $data);
        $this->settings();
    }

    function update_sl()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(

            'star_level' => $this->input->post('star_level1')
        );
        $this->admin_model->update_sl($hotel_id, $data);
        $this->settings();
    }



    function update_as()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(

            'activation_status' => $this->input->post('activation_status1')
        );
        $this->admin_model->update_sl($hotel_id, $data);
        $this->settings();
    }





    function update_rqs()
    {
        $request_id = $this->input->post('request_id');
        $data = array(

            'status' => $this->input->post('status1')
        );
        $this->admin_model->update_rqs($request_id, $data);
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
        $this->admin_model->update_even($event_id, $data);
        $this->event_more($event_id);
    }






    function update_di()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(
            'hotel_hot_drinks' => $this->input->post('hotel_hot_drinks1'),
            'hotel_soft_drinks' => $this->input->post('hotel_soft_drinks1'),
            'hotel_local_drinks' => $this->input->post('hotel_local_drinks1'),
            'hotel_beer_and_alcohol' => $this->input->post('hotel_beer_and_alcohol1'),

        );
        $this->admin_model->update_af($hotel_id, $data);
        $this->get_client_contents($data);
    }


    function update_serv()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(
            'hotel_parking' => $this->input->post('hotel_parking1'),
            'hotel_swimming_pool' => $this->input->post('hotel_swimming_pool1'),
            'hotel_children_play_ground' => $this->input->post('hotel_children_play_ground1'),
            'hotel_conference_room' => $this->input->post('hotel_conference_room1'),
            'meeting_hall_description' => $this->input->post('meeting_hall_description1'),
            'wedding_hall_description' => $this->input->post('wedding_hall_description1'),
            'gym_discription' => $this->input->post('gym_discription1'),
            'swimming_pool_description' => $this->input->post('swimming_pool_description1'),

        );
        $this->admin_model->update_serv($hotel_id, $data);
        $this->get_client_contents($data);
    }





    function update_rp()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(
            'hotel_single_room_price' => $this->input->post('hotel_single_room_price1'),
            'hotel_twin_room_price' => $this->input->post('hotel_twin_room_price1'),
            'hotel_suit_room_price' => $this->input->post('hotel_suit_room_price1'),
            'hotel_presidential_suit_price' => $this->input->post('hotel_presidential_suit_price1'),
            'rooms_from' => $this->input->post('rooms_from1'),

        );
        $this->admin_model->update_rp($hotel_id, $data);
        $this->get_client_contents($data);
    }

    function update_rav()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(
            'hotel_single_room' => $this->input->post('hotel_single_room1'),
            'hotel_twin_room' => $this->input->post('hotel_twin_room1'),
            'hotel_suit_room' => $this->input->post('hotel_suit_room1'),
            'hotel_presidential_suit' => $this->input->post('hotel_presidential_suit1'),

        );
        $this->admin_model->update_rav($hotel_id, $data);
        $this->get_client_contents($data);
    }


    function update_rserv()
    {
        $hotel_id = $this->input->post('hotel_id');
        $data = array(
            'hotel_wifi' => $this->input->post('hotel_wifi1'),
            'hotel_satelite_tv' => $this->input->post('hotel_satelite_tv1'),
            'hotel_hair_drier' => $this->input->post('hotel_hair_drier1'),
            'hotel_ac' => $this->input->post('hotel_ac1'),

        );
        $this->admin_model->update_rserv($hotel_id, $data);
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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_basic_info', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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
        $hotel_id = $this->input->post('hotel_id');
        $post = $this->input->post();
        {
            $q = $this->admin_model->add_support('support', $post);
            $this->support_success($hotel_id);
        }
    }




public function add_client()
    {
        $hotel_id = $this->input->post('hotel_id');
        $post = $this->input->post();
        {
            $q = $this->admin_model->add_client('hotels', $post);

            $this->login();
        }
    }


public function add_new_hotel()
    {
        $hotel_id = $this->input->post('hotel_id');
        $post = $this->input->post();
        {
            $q = $this->admin_model->add_new_hotel('hotels', $post);

            $this->view_all_hotels();
        }
    }




public function add_new_rest()
    {
       
        $post = $this->input->post();
        {
            $q = $this->admin_model->add_new_restaurant('restaurants', $post);

            $this->view_all_restaurants();
        }
    }



    public function add_new_reso()
    {
       
        $post = $this->input->post();
        {
            $q = $this->admin_model->add_new_resort('resorts', $post);

            $this->view_all_resorts();
        }
    }


public function add_new_ghouse()
    {
        
        $post = $this->input->post();
        {
            $q = $this->admin_model->add_new_guest_house('guest_houses', $post);

            $this->view_all_guest_houses();
        }
    }


    public function add_new_clu()
    {
      
        $post = $this->input->post();
        {
            $q = $this->admin_model->add_new_club('clubs', $post);

            $this->view_all_clubs();
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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/support', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/settings', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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




    public function support_success($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);

        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/success', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));
        } else {
            $data = array(
                'error_message' => 'List Empity'
            );
            $this->load->view('hotels/no_results', $data);
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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_room_info', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form2', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form3', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form4', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form5', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form6', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form7', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form8', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form9', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form10', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form11', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form12', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form13', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form14', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form15', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/upload_form/upload_form16', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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




     public function add_new()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/add_new');
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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




     public function add_new_restaurant()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/add_new_rest');
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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


     public function add_new_resort()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/add_new_reso');
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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



 public function add_new_guest_house()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/add_new_ghouse');
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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



     public function add_new_club()
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

//        print_r($login);
//        exit();

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/add_new_clu');
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/image_view', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

        $hotel_id = $this->input->post('hotel_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_services', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->get_events($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/events', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($hotel_id);
        }
    }

    public function rooms()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->rooms($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/rooms', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->requests($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/requests', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_req_results($hotel_id);
        }
    }



    public function events()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->events($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/events', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($hotel_id);
        }
    }



     public function view_all_hotels()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->view_all_hotels();

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/table', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
            $this->load->view('admin/hotels/footer', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($hotel_id);
        }
    }











     public function view_all_restaurants()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        // $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->view_all_restaurants();

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/table2', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
            $this->load->view('admin/hotels/footer', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($hotel_id);
        }
    }




public function view_all_clubs()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->view_all_clubs();

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/table4', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
            $this->load->view('admin/hotels/footer', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($hotel_id);
        }
    }




    public function view_all_guest_houses()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->view_all_guest_houses();

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/table5', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
            $this->load->view('admin/hotels/footer', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($hotel_id);
        }
    }



    public function view_all_resorts()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->view_all_resorts();

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/table3', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
            $this->load->view('admin/hotels/footer', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_event_results($hotel_id);
        }
    }



    public function message()
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->message($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');

            $this->load->view('admin/hotels/message', array('message' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_message_results($hotel_id);
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

        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_room_services', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->count_pending($hotel_id);


        if ($result) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header', array('company_list' => $result2));
//            $this->load->view('admin/hotels/update_room_services', array('company_list' => $result));
//            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

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

        $hotel_id = $this->input->post('hotel_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_room_prices', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

        $hotel_id = $this->input->post('hotel_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_available_room_types', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

        $hotel_id = $this->input->post('hotel_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_available_food_items', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

        $hotel_id = $this->input->post('hotel_id');
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_available_drink_items', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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
        $this->load->view('admin/hotels/login');
        // $this->load->view('admin/footer', $data);
    }


    public function index()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/hotels/selector');
        // $this->load->view('admin/footer', $data);
    }




    public function register()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/hotels/register');
        // $this->load->view('admin/footer', $data);
    }

    public function notified()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $this->load->view('admin/hotels/notified');
        // $this->load->view('admin/footer', $data);
    }









    public function login_process()
    {

        $uname = $this->input->post('uname');
        $password = $this->input->post('password');
        $result = $this->admin_model->login($uname, $password);
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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->delete_booking($booking_id);
        if ($result) {

            $result2 = $this->admin_model->get_content($login->uname);
            $result3 = $this->admin_model->booking_enquiries($hotel_id);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/booking_view', array('book' => $result3));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_booking_results($hotel_id);
        }
    }




    public function delete_hotel($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
      
        $result = $this->admin_model->delete_hotel($hotel_id);
        if ($result) {

           $this->view_all_hotels();
//              print_r($result);
// die();

        } else {
            $this->no_booking_results($hotel_id);
        }
    }



    public function delete_request($request_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->delete_request($request_id);
        if ($result) {

            $result2 = $this->admin_model->get_content($login->uname);
            $result3 = $this->admin_model->requests($hotel_id);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/requests', array('company_list' => $result3));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->no_booking_results($hotel_id);
        }
    }

    public function delete_event($event_id)
    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->delete_event($event_id);
        if ($result) {

            $result2 = $this->admin_model->get_content($login->uname);
            $result3 = $this->admin_model->events($hotel_id);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/events', array('company_list' => $result3));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->delete_message($message_id);
        if ($result) {

            $result2 = $this->admin_model->get_content($login->uname);
            $result3 = $this->admin_model->message($hotel_id);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/message', array('message' => $result3));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//              print_r($result);
// die();

        } else {
            $this->add_support();
        }
    }






    function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('admin/hotels/login');
    }




//    public function trial()
//    {
//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');
//
//        $result = $this->admin_model->get_content($hotel_id, $uname, $password);
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


    public function booking_enquiries($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->booking_enquiries($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/booking_view', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($hotel_id);
        }
    }


    public function booking_pending($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->booking_pending($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/booking_pending', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($hotel_id);
        }
    }


    public function booking_canceled($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->booking_canceled($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/booking_canceled', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($hotel_id);
        }
    }


    public function booking_approved($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->booking_approved($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/approved_booking', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($hotel_id);
        }
    }


    public function booking_completed($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
        $result = $this->admin_model->booking_completed($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/booking_view', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->no_booking_results($hotel_id);
        }

    }


    public function no_booking_results($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
//        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_completed($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/no_results', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_event_results($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
//        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_completed($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/no_event_results', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }






    public function no_message_results($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
//        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_completed($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/no_message_results', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

//            print_r($result);
//            die();


        } else {
            $this->login();
        }

    }



    public function no_req_results($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_content($login->uname);
//        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_completed($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);

            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/no_req_results', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));

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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/b_more', array('book' => $result),array('company_list' => $result2) );

            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/r_more', array('request' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/event_more', array('event' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_booking_view', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->booking_more($booking_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/invoice_print', array('book' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->booking_more($request_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/request_print', array('request' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_star_level', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

//        $hotel_id = $this->input->post('hotel_id');
//        $uname = $this->input->post('uname');
//        $password = $this->input->post('password');

        $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_activation', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));


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

 $result = $this->admin_model->get_content($login->uname);
        if ($result) {

            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/change_password', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));

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
       $result = $this->admin_model->get_content($login->uname);
        if($result){
            $this->session->set_userdata('logged_in', $result);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/change_password', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));  $this->load->view('admin/hotels/footer', array('company_list' => $result));
        }else{
            $query = $this->admin_model->checkpass($this->input->post('password'));
            if($query){
                $query = $this->admin_model->savePass($this->input->post('password1'));
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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->requests_more($request_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_request', array('request' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
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
        $result = $this->admin_model->get_content($login->uname);
        $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->event_more($event_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_content($login->uname);
            $this->load->view('admin/hotels/header');
            $this->load->view('admin/hotels/update_event', array('event' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result2));
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

        $result = $this->admin_model->get_content($login->uname);

        if ($result) {





            $this->load->view('admin/hotels/header', array('company_list' => $result));
            $this->load->view('admin/hotels/main2', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result));
            $this->load->view('admin/hotels/footer', array('company_list' => $result));

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









 public function get_more($hotel_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_more($login->uname);
        // $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->get_more($hotel_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_more($login->uname);
            
            $this->load->view('admin/hotels/header', array('company_list' => $result));
            $this->load->view('admin/hotels/main', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result)); 
             $this->load->view('admin/hotels/footer', array('company_list' => $result));
           
        } else {
            $this->login();
        }
    }




 public function get_more_rest($restaurant_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_more_rest($login->uname);
        // $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->get_more_rest($restaurant_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_more_rest($login->uname);
            
            $this->load->view('admin/hotels/header', array('company_list' => $result));
            $this->load->view('admin/hotels/main_rest', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result)); 
             $this->load->view('admin/hotels/footer', array('company_list' => $result));
           
        } else {
            $this->login();
        }
    }





    public function get_more_club($club_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_more_club($login->uname);
        // $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->get_more_club($club_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_more_club($login->uname);
            
            $this->load->view('admin/hotels/header', array('company_list' => $result));
            $this->load->view('admin/hotels/main_rest', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result)); 
             $this->load->view('admin/hotels/footer', array('company_list' => $result));
           
        } else {
            $this->login();
        }
    }





public function get_more_resort($resort_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_more_resort($login->uname);
        // $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->get_more_resort($resort_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_more_resort($login->uname);
            
            $this->load->view('admin/hotels/header', array('company_list' => $result));
            $this->load->view('admin/hotels/main_rest', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result)); 
             $this->load->view('admin/hotels/footer', array('company_list' => $result));
           
        } else {
            $this->login();
        }
    }




    public function get_more_guest_house($guest_house_id)
    {
        $login = $this->session->userdata('loginaccount');
        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }
        $result = $this->admin_model->get_more_guest_house($login->uname);
        // $hotel_id = ($result[0]->hotel_id);
//        $result = $this->admin_model->booking_enquiries($hotel_id);


        $result = $this->admin_model->get_more_guest_house($guest_house_id);

        if ($result && $login) {
            $result2 = $this->admin_model->get_more_guest_house($login->uname);
            
            $this->load->view('admin/hotels/header', array('company_list' => $result));
            $this->load->view('admin/hotels/main_rest', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result)); 
             $this->load->view('admin/hotels/footer', array('company_list' => $result));
           
        } else {
            $this->login();
        }
    }

 public function general($hotel_id)

    {
        $login = $this->session->userdata('loginaccount');

        if (!$login) {
            redirect(site_url('admin_controller/login'));
        }

        $result = $this->admin_model->get_more($login->uname, $hotel_id);
        if ($result) {


            $this->load->view('admin/hotels/header', array('company_list' => $result));
            $this->load->view('admin/hotels/main', array('company_list' => $result));
            $this->load->view('admin/hotels/aside', array('company_list' => $result)); 
             $this->load->view('admin/hotels/footer', array('company_list' => $result));

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