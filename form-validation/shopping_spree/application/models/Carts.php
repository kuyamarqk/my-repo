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
        function add_order($post){
            $product = json_encode($post['product']);
            $data = array(
                'name' => $post['name'],
                'address' => $post['address'],
                'card' => $post['card'],
                'product'   => $product
            );
            
            $this->db->set('created_at','NOW()',false);
            $this->db->set('updated_at','NOW()',false);
            
            $this->db->insert('orders',$data);
            $this->subQuantity($product);
            //return true;
            // $this->db->insert('product',$post);
            // return $this->db->insert_id();
        }
        function subQuantity($product){
            $items = json_decode($product);

            foreach($items as $key => $value){
                var_dump(json_decode($value->qty));
            }
        }
        function updateQty($id, $qty){
            var_dump($id);
        }
    }
?>