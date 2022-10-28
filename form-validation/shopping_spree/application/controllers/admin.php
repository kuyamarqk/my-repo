<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller{
        public function __constructor(){
            parent::__constructor();
            $this->load->helper(array('url','form'));
            $this->load->library('form_validation');
            $this->load->database();
        }
        public function index(){
            $this->load->model('Admins');
            $data['all'] = $this->Admins->get_all_product();
            $this->load->view('admin/index', $data);
        }
        public function add(){
            $this->load->model('Admins');
            $result = $this->Admins->validate($this->input->post());
            if ($result == true){
                $this->Admins->add_product($this->input->post());
                redirect('admin/index');
            }else{
                echo "There is error while adding data";
            }
        }
    }
?>