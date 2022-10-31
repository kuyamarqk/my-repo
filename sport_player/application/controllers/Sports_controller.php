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
            $this->load->model('Sport_model');
            $data['sport'] = $this->Sport_model->get_sport();
            $data['players'] = $this->Sport_model->get_players();
            $data['gender'] = $this->Sport_model->get_gender();
            $this->load->view('sport/index',$data);
        }
        public function filter(){
            $this->load->model('Sport_model');
            $query = $this->Sport_model->filter();
            $data['sport'] = $this->Sport_model->get_sport();
            $data['gender'] = $this->Sport_model->get_gender();
            $data['players'] = $this->Sport_model->fetch_players($query);
            $this->load->view('sport/index',$data);
        }
        public function add_player(){
            $this->load->model('Sport_model');
            $data['sport'] = $this->Sport_model->get_sport();
            $data['gender'] = $this->Sport_model->get_gender();
            $this->load->view('sport/add',$data);
        }
        public function create_player(){
            $this->load->model('Sport_model');
            $result = $this->Sport_model->validate($this->input->post());
            if($result == true) {
                redirect('add');
            }

        }
        public function sport_list(){
            $this->load->model('Sport_model');
            $data['sport'] = $this->Sport_model->get_sport();
            $data['gender'] = $this->Sport_model->get_gender();
            $data['players'] = $this->Sport_model->get_players();
            $this->load->view('sport/sport_list',$data);
        }
        
        public function add_sport(){
            $post = $this->input->post();
            $this->load->model('Sport_model');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('sport/add');
            }else{
                $post['name'] = $this->security->xss_clean($post['name']);
                $data = $this->Sport_model->add_sport($post);
                
                if($data === TRUE){
                    $this->session->set_flashdata('success', 'Record added successfully.');
                    redirect('sport');
                }else{
                    $this->load->view('sport/add');
                }
            }
        }
    }
?>