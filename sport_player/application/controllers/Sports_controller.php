<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Sports_controller extends CI_Controller{
        public function __constructor(){
            parent::__constructor();
            $this->load->helper(array('url','form'));
            $this->load->library('form_validation');
            $this->load->database();
        }
        public function index(){
            $this->load->view('sport/index');
        }
        public function add_player(){
            $this->load->view('sport/add');
        }
    }
?>