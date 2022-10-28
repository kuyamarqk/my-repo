<?php
    class Catalogs extends CI_Model{
        function get_all_product(){
            return $this->db->get('product');
        }
    }
?>