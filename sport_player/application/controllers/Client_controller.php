<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Client_controller extends CI_Controller{
        public function __constructor(){
            parent::__constructor();
            $this->load->helper(array('url','form'));
            $this->load->library('form_validation');
            $this->load->database();
        }
      
        public function index(){
            $this->load->model('Client_model');
            $data['all'] =  $this->Client_model->get_charges();
            $this->load->view('client/index',$data);
        }
        public function filter(){
            $post = $this->input->post();
            $this->load->model('Client_model');
            $data = array();
            $data['all'] =  $this->Client_model->get_filter($post);
            //$this->load->view('client/index',$data);
        }
    }
?>