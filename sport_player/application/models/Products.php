<?php

    class Products extends CI_Model{
        public function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }
        function add($post){
            $data = [
                'name' => $post['name'],
                'price' => $post['price'],
                'qty' => $post['qty']
            ];
            $this->db->set('created_at','NOW()',false);
            $this->db->set('updated_at','NOW()',false)->insert('product',$data);
        }
        function get_all(){
            $data = $this->db->get('product')->result();
            return $data;
        }

    }

?>