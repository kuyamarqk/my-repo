<?php

    class Users extends CI_Model{
        public function __constructor(){
            
        }
        function create_users($post){
            $data = array(
                'first_name' => $post['first_name'],
                'last_name' => $post['last_name'],
                'email' => $post['email'],
                'contact_number' => $post['number'],
                'password' => $post['password'],
            );
            $this->db->set('created_at','NOW()',false);
            $this->db->set('updated_at','NOW()',false);
            $this->db->insert('user', $data);
            return true;
        }
        function search_number($string){
            $this->db->where('contact_number', $string);
            $sql =  $this->db->get('user');
            if($sql->num_rows() == 1){
                return false;
            }else{
                return true;
            }
            
        }
        function login($post){
            $this->db->where('contact_number',$post['log_username'])->or_where('email', $post['log_username']);
            $query = $this->db->get('user');
            if($query->num_rows() == 1){
                foreach($query->result() as $row){
                    if($row->password == $post['log_password']){
                        //echo $row->password;
                        return $row;
                    }else{
                        $this->db->set('last_login','NOW()',FALSE);
                        return false;
                    }
                }
            }else{
                return false;    
            } 
        }
    }
?>