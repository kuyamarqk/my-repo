<?php
    class Contact extends CI_Model{
        function get_all_contacts(){
            return $this->db->query('SELECT * FROM contacts');
        }
        function add_contacts($post){
            $query = "INSERT INTO contacts(first_name,last_name,number,created_at,updated_at) values (?,?,?,now(),now())";
            $value = $post;
            return $this->db->query($query, $value);          
        }
        function delete($id){
            return $this->db->query("DELETE FROM contacts where id= $id");
        }
        function get_by_id($id){
            return $this->db->query("SELECT * FROM contacts where id=$id")->result_array();
        }
        function update_contact($post){
            $query = "UPDATE contacts SET first_name = '".$post['firstname']."',
                                         last_name = '".$post['lastname']."', 
                                        number = '".$post['number']."', 
                                        updated_at = now() 
                                        WHERE (id = '".$post['id']."')";
            return $this->db->query($query); 
        }
    }
?>