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
            $data['all'] = $this->Sport_model->get_sport();
            $data['players'] = $this->Sport_model->get_players();
            $this->load->view('sport/index',$data);
        }
        public function filter(){
            $post = $this->input->post();
            $this->load->model('Sport_model');
            $data['all'] = $this->Sport_model->get_sport();
            $data['players'] = $this->Sport_model->fetch_players($post);
            $this->load->view('sport/index',$data);
        }
        public function add_player(){
            $this->load->model('Sport_model');
            $data['all'] = $this->Sport_model->get_sport();
            $this->load->view('sport/add',$data);
        }
        public function create_player(){
            $post = $this->input->post();
            
            $this->load->model('Sport_model');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name','required|trim');
            $this->form_validation->set_rules('last_name', 'last Name','required|trim');
            $this->form_validation->set_rules('img_link', 'Link', 'trim|required');


            if($this->form_validation->run() === FALSE){
                var_dump($post);
            }else{
                $data = array(
                    'first_name' => $post['first_name'],
                    'last_name' => $post['last_name'],
                    'img' => $post['img_link'],
                    'gender' => $post['gender'] 
                    
                );
                    $this->Sport_model->add_player($data, $post['sport']);
                    $this->session->set_flashdata('success', 'Successfully added!');
                    redirect('add');
                    
            }

        }
        public function sport_list(){
            $this->load->model('Sport_model');
            $data['all'] = $this->Sport_model->get_sport();
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