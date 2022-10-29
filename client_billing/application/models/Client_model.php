<?php

    class Client_model extends CI_Model{
        public function __constructor(){
            
        }
        function get_charges(){
            $sql = "SELECT YEAR(charged_datetime)as year, 
                            MONTH(charged_datetime)as month, 
                            SUM(amount) as total_cost
                            FROM billing
                            where YEAR(charged_datetime) = '2011' 
                            group by YEAR(charged_datetime),
                            MONTH(charged_datetime)
                            
                            ";

            return $this->db->query($sql)->result();
        }
        function get_filter($post){
            var_dump($post);
            $sql = "SELECT YEAR(charged_datetime)as year, 
                            MONTH(charged_datetime)as month, 
                            SUM(amount) as total_cost
                            FROM billing
                            where YEAR(charged_datetime) = '2011' 
                            
                            group by YEAR(charged_datetime),
                            MONTH(charged_datetime)
                            
                            ";
        }
        
    }
?>