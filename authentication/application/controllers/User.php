<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->library(array('form_validation','session'));
    }
    public function index() {
        $this->load->helper('url');
        if($this->session->userdata('Id') === true){
            redirect('users/profile');
        } else{
            $this->load->view('users/index');
        }
        
    }
    
    public function create(){
        $this->load->library('form_validation');
		$this->load->model('Users');   
        $result = $this->regValidate($this->input->post());
        if($result == false){
            $this->load->view('users/index');
        }else{
            $number = $this->Users->search_number($this->input->post('number'));
            if ($number == true){
                $create = $this->Users->create_users($this->input->post());
                if($create == true){
                    $success = "Registration Success";
                    $this->session->set_flashdata('success', $success);
                    redirect('users/index');
                    
                }else{
                    $error = "Error in adding data!";
                    $this->session->set_flashdata('errors');
                    $this->load->view('users/index' );
                }
            }else{
                $error = "Number is already registered";
                $this->session->set_flashdata('errors', $error);
                $this->load->view('users/index', $error);
            }
            
        }
    }
    public function profile(){
        $this->load->model('Users');
        $this->load->library('form_validation');
        $log = $this->logValidate($this->input->post());
        if($log == true){
            $result = $this->Users->login($this->input->post());
            if($result == true){
                $this->session->userdata('Id',$result->id);
                $data = array(
                    'first_name' => $result->first_name,
                    'last_name' => $result->last_name,
                    'contact_number' =>  $result->contact_number,
                    'last_login' => $result->last_login
                );
                $this->load->view('users/profile',$data);
            }else{
                $error = "wrong email and password";
                $this->session->set_flashdata('errors',$error);
                $this->load->view('users/index');
            }
        }else{
            $this->load->view('users/index');
        }
        
    }
    public function regValidate($post){
        $this->form_validation->set_rules('first_name','First name','trim|required');
        $this->form_validation->set_rules('last_name','Last name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('number','Number','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]');

        if($this->form_validation->run() === false){
            return false;
        }else{
            return true;
        }
    }
    public function logValidate($post){
        $this->form_validation->set_rules('log_username','Username','trim|required');
        $this->form_validation->set_rules('log_password','Password','trim|required');
        if($this->form_validation->run() === false){
            return false;
        }else{
            return true;
        }
    }

    public function logout(){
        $this->session->set_userdata('id','');
        $this->load->view('index');
    }
    
}

?>