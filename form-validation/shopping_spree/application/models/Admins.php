<?php

    class Admins extends CI_Model{
        public function __constructor(){
            
        }
        function validate($post){
            $this->form_validation->set_rules('name','Name','required|trim');
            $this->form_validation->set_rules('qty','Quantity','required|trim');
            $this->form_validation->set_rules('price','Price','required|trim');

            if($this->form_validation->run() === false){
                return false;
            }else{
                return true;
            }
        }
        function add_product($post){
            $data = array(
                'name' => $post['name'],
                'qty' => $post['qty'],
                'price' => $post['price']
            );
            $this->db->set('created_at','NOW()',False);
            $this->db->set('updated_at','NOW()',False);
            $query = $this->db->insert('product', $data);
            if($query == true){
                return true;
            }else{
                echo "something wrong while adding data";
            }
        }
        function get_all_product(){
            return $this->db->get('product');
        }
    }
?>