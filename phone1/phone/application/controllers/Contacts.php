<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Contact');
        $this->load->helper(array('url','form'));
        $this->load->database();
		$this->load->library(array("form_validation","session"));
	}

	public function index()
	{
		
		$this->load->model('Contact');
		$data['myData'] = $this->Contact->get_all_contacts();
		$this->load->view('Main',$data);
	}
	public function add()
	{
		$this->load->view('Main/add');
	}
	public function create()
	{	
		$this->load->library('form_validation');
		$this->load->model('Contact');
		$post = $this->input->post();
		$result = $this->validate($post);
		$add_contacts = $this->Contact->add_contacts($post);
			if($add_contacts === true){
				echo "Bookmarks has been added!";
				redirect('main');
			}
	}
	public function show($id)
	{
		$this->load->model('Contact');
		$result['all'] = $this->Contact->get_by_id($id);
		$this->load->view('main/show',$result);
	}

	public function edit($id){
		$this->load->model('Contact');
		$result['all'] = $this->Contact->get_by_id($id);
		$this->load->view('main/edit',$result);
	}
	public function update(){
		$this->load->library('form_validation');
		$this->load->model('Contact');
		$post = $this->input->post();
		$result = $this->validate($post);
		$update_contact = $this->Contact->update_contact($post);
			if($update_contact === true){
				echo "Bookmarks has been updated!";
				redirect('main');
			}
	}
	public function delete($id)
	{
		$this->load->model('Contact');
		$result['all'] = $this->Contact->get_by_id($id);
		$this->load->view('main/delete',$result);
	}
	public function deleting($id)
	{
		$this->load->model('Contact');
		$result = $this->Contact->delete($id);
		if($result === true){
			redirect('main');
		}else{
			echo "there is an error deleting this bookmark";
			$this->load->view('main');
		}
	}
	public function validate($post){
		$this->load->library('form_validation');
		$this->form_validation->set_rules($post['firstname'],'firstname','trim|required');
		$this->form_validation->set_rules($post['lastname'],'lastname','trim|required');
		$this->form_validation->set_rules($post['number'],'number','trim|required');
    	if($this->form_validation->run()) {
      		return "valid";
   		} else {
     		return array(validation_errors());
    	}
	}
}

