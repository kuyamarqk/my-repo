<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Cart extends CI_Controller{

        public function __constructor(){
            parent::__constructor();
            $this->load->helper(array('url','form'));
            $this->load->library('form_validation');
            $this->load->database();
        }

        public function index(){
            $cart_item = $this->session->userdata('products');
            $price = 0;
            foreach($cart_item as $key => $value){
                $price += $value['price'];
            }
            $this->session->set_userdata('price',$price);
            $items['in_carts'] = $cart_item;
            $this->load->view('catalog/cart',$items);
        }

        public function add_product(){
            $post = $this->input->post();
            $this->load->model('Carts');
            $result = $this->Carts->validate($post);
            if($result === true){
                $products = $this->session->userdata('products');
                foreach($products as $key => $value){
                    $product[] =  json_encode($value);
                    $post['product'] = $product; 
                }
                $success = $this->Carts->add_order($post);
                if($success == true){
                    $this->session->set_userdata('products');
                    $this->session->set_userdata('price');
                    redirect('catalog/index');
                }
            }   
        }

        public function remove($id){
            $list = $this->session->userdata('products');
            $this->load->model('Carts');
            unset($list[$id]);
            $this->session->set_userdata('products',$list); 
            $cart_item = $this->session->userdata('products');
            foreach($list as $key => $value){
                $price += $value['price']; 
            }
            $this->session->set_userdata('price', $price);
            redirect('cart');
            
        }
        public function remove_all(){
            $this->session->set_userdata('products');
            $this->session->set_userdata('price');
            redirect('catalog/index');
        }
        
    }
?>