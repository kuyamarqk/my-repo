<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Catalog extends CI_Controller{
        public function __constructor(){
            parent::__constructor();
            $this->load->helper(array('url','form'));
            $this->load->library('form_validation');
            $this->load->database();
        }
        public function index(){
            $this->load->model('Catalogs');
            $data['all'] =  $this->Catalogs->get_all_product();
            $this->load->view('catalog/index',$data);
        }
        public function add_to_cart(){
            $post = $this->input->post();
            $cart_products = $this->session->userdata('products');
            $cart_products[] = array(
                'id' => $post['id'],
                'name' => $post['name'],
                'qty' => $post['qty'],
                'price' => $post['price']
            );
            $price = $post['price'] * $post['qty'];
            $total_price = $price = $this->session->userdata('price');
            $this->session->set_userdata('price',$total_price);
            $this->session->set_userdata('products', $cart_products);
            redirect('catalog/index');
        }
    }
?>