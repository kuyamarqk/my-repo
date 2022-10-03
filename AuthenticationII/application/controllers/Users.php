<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
        $this->load->helper(array('url','form'));
        $this->load->database();
		$this->load->library(array("form_validation","session"));
	}

	public function index()
	{
		$this->load->view('user');
	}
	public function create()
	{	
		$this->load->library('form_validation');
		$this->load->model('User');
		$post = $this->input->post();
		$result = $this->validate($post);
		echo $result;
		
	}
	
	public function validate($post){
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->form_validation->set_rules($post['firstname'],'firstname','required');
		$this->form_validation->set_rules($post['lastname'],'lastname','trim|required');
		$this->form_validation->set_rules($post['number'],'number','trim|required');
		$this->form_validation->set_rules($post['email'],'email','trim|required');
		$this->form_validation->set_rules($post['password'],'password','trim|required');
		$this->form_validation->set_rules($post['confirm-password'],'confirm-password','trim|required');
		$this->form_validation->set_error_delimiters('<div class=error>','<div>');
		$this->form_validation->set_message('required','Enter %s');
    	if($this->form_validation->run() === FALSE ) {
      		$this->load->view('user');
   		} else {
			$checkNumber = $this->User->checkNum($post['number']);
			if($checkNumber === true){
				$error = "Number is registered!";
			}else{
				$contact_number = $this->post['number'];
			}
			if($post['password'] !== $post['confirm-password']){
				$error = "Number is registered!";
			}else{
				$password = md5($this->post['password']);
			}
     		$data = array(
				'first_name' => $this->post['firstname'],
				'last_name' => $this->post['lastname'],
				'contact_number' => $contact_number,
				'email' => $this->post['email'],
				'password' => $password
			);
			var_dump($data);
    	}
	}
}

