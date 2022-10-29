<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->library(array('form_validation','session'));
    }
    public function index(){
        $data = array();
        $this->load->model('Products');
        $data['all'] = $this->Products->get_all();
        $data['players'] = $this->Products->get_players();
        $this->load->view("product/index",$data);
    }
    public function add(){
        $this->load->view("product/add");
    }
    public function addProduct(){
        $this->load->model('Products');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('name', 'Title', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('qty', 'Image', 'trim|required|max_length[60]');

        if($this->form_validation->run() === FALSE){
            $this->add();
        }else{
            $data = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'qty' => $this->input->post('qty')
            );
            $this->Products->add($data);
            redirect('product/add');
        }
    }
    public function cart(){
        $cart = $this->session->userdata('cart');
        $total_price = $this->session->userdata('total_price');
        $items['in_cart'] = $cart;
        $this->load->view('product/cart',$items);
    }
    public function add_to_cart(){
        $this->load->library('session');
       

        //set session for cart
        $cart[] = $this->session->userdata('cart');
        $cart[] = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty')
        );
        array_push($cart,$cart);
        $this->session->set_userdata('cart',$cart);

        //set session for total price
        $price = $this->input->post('price');
        $tprice = $price * $this->input->post('qty');
        $total_price = $tprice + $this->session->userdata('total_price');
        $this->session->set_userdata('total_price',$total_price);

        redirect('/');
    }
    public function remove_all(){
        $this->session->set_userdata('total_price','');
        $this->session->set_userdata('cart','');

        redirect('product/index');
    }
}
?>