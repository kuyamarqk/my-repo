<?php
    class Carts extends CI_Model{
        function get_all_product(){
            return $this->db->get('product');
        }
        function validate($post){
            $this->form_validation->set_rules('name','Name','required|trim');
            $this->form_validation->set_rules('address','Address','required|trim');
            $this->form_validation->set_rules('card','Card Number','required|trim');

            if($this->form_validation->run() === false){
                return false;
            }else{
                return true;
            }
        }
        function add_order($post,$transaction){
            
            $data = array(
                'name' => $post['name'],
                'address' => $post['address'],
                'card' => $post['card'],
            );
            
            $this->db->set('created_at','NOW()',false);
            $this->db->set('updated_at','NOW()',false);
            
            $this->db->insert('order',$data);
            $insert_id = $this->db->insert_id();

            $this->insertTransaction($insert_id,$transaction);
            $this->subQuantity($transaction);
            return true;
           
        }
        function subQuantity($product){
            foreach($product as $key ){
                $this->db->set('qty','qty -', $key['qty'],false);
                $this->db->where('id',$key['id']);
            }
            return $this->db->update('product');
        }
        function insertTransaction($id,$transaction){
            foreach($transaction as $key ){
               $this->db->set('product_id',$key['id'],false)->set('qty',$key['qty'],false)->set('order_id', $id)->insert('transaction');
               $this->db->set('created_at','NOW()',false)->set('updated_at','NOW()',false);
               return $this->db->insert_id();
            }
            
            
        }

    }
?>