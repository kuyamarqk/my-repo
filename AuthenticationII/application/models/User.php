<?php
    class User extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        function add_user($post){
            var_dump($post);
            $query = "INSERT INTO users(first_name,last_name,number,email,password,created_at,updated_at) values (?,?,?,?,?,now(),now())";
            $value = $post;
            echo $this->db->query($query, $value);          
        }
        function checkNum($num){
            $query = "SELECT number FROM users WHERE number = '".$num ."'";
            return $this->db-query($query);
        }
    }
?>