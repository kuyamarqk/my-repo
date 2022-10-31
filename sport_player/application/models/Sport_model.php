<?php

    class Sport_model extends CI_Model{
        public function __constructor(){
            parent::__construct();
        }
        //get all players
        function get_players(){
            return $this->db->get('player')->result_array();;
        }
        //getting the sports
        function get_sport(){
            return $this->db->get('sport');
        }
        //get the genders
        function get_gender(){
            return $this->db->get('gender');
        }
        //filter the query
        function filter(){
            $post = $this->security->xss_clean($this->input->post());
            $data = array(
                'player' => !empty($post['player']) ? "%".$post['player']."%" : "%%",
                'gender' => !empty($post['gender']) ? $post['gender'] : '',
                'sport' => !empty($post['sport']) ? $post['sport'] : ''
            );
            return $data;
        }
        //search functions
        function fetch_players($data){
            $values = array(
                $data['player'],
                $data['gender'], 
                $data['sport']
            );
            $sql = "SELECT first_name,last_name,gender_id,sports_player.sport_id, img from player
                    LEFT JOIN gender on player.gender_id = gender.id
                    left join sports_player on player.id = sports_player.player_id
                    left join sport on sports_player.sport_id = sport.id where ";
                   
                        if(!empty($data['player']) && !empty($data['gender']) && !empty($data['sport'])){
                            $sql.= "
                                concat(first_name,' ',last_name ) like ?
                                and gender_id in ?
                                and sport.id in ? 
                            ";
                            echo $sql;
                            return $this->db->query($sql, $values)->result_array();   
                        }else{
                            if(!empty($data['player'])){
                                $sql .= " concat(first_name,' ',last_name) like ? ";
                                if(count($data) > 1){
                                    $sql .= " AND ";
                                }
                            }
                            if(!empty($data['gender'])){
                               if(count($data['gender']) > 1){
                                    $sql .=' gender_id in ? ';
                               }else{
                                    $sql .=' gender_id = ? ';
                               }
                            }
                            return $this->db->query($sql,$values)->result_array();   
                            // if(!empty($data['player']) && $data['player'] !== "" && empty($data['gender']) && empty($data['sport'])){
                            //     $sql .= " concat(first_name,' ',last_name ) like ? ";
                            //     return $this->db->query($sql, $values)->result();    
                            // }elseif(!empty($data['player']) && $data['player'] !== "" && !empty($data['gender']) && !empty($data['sport'])){
                            //     $sql .=" concat(first_name,' ',last_name ) like ? ";
                            //     $sql .=" AND ";
                            //     return $this->db->query($sql, $values)->result_array();    
                            // }
                            // if(!empty($data['gender']) && $data['gender'] !== "" && empty($data['player']) && empty($data['sport'])){
                            //     $sql .= " and gender_id in ? " ;
                            //     return $this->db->query($sql, $values)->result();  
                            // }elseif(!empty($data['gender']) && $data['gender'] !== "" && !empty($data['player']) && !empty($data['sport'])){
                            //     $sql .=" and gender_id in ? ";
                            //     $sql .=" AND ";
                            //     return $this->db->query($sql, $values)->result_array();    
                            // }
                            // if(!empty($data['sport']) && $data['sport'] !== "" && empty($data['player']) && empty($data['gender'])){
                            //     $sql .= " and sport.id in ? ";
                            //     return $this->db->query($sql, $values)->result();    
                            // }elseif(!empty($data['sport']) && $data['sport'] !== "" && !empty($data['player']) && !empty($data['gender'])){
                            //     $sql .="  and sport.id in ? ";
                            //     $sql .=" AND ";
                            //     return $this->db->query($sql, $values)->result_array();    
                            // }
                            
                        }
                        
                        
               
        }
        //validate add_player function
        function validate($post){
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name','required|trim');
            $this->form_validation->set_rules('last_name', 'last Name','required|trim');
            $this->form_validation->set_rules('img_link', 'Link', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender','required|trim');

            if($this->form_validation->run() === FALSE){
                var_dump($post);
            }else{
                $data = array(
                    'first_name' => $post['first_name'],
                    'last_name' => $post['last_name'],
                    'img' => $post['img_link'],
                    'gender_id' => $post['gender'] ,
                    

                );
                    $this->add_player($data,$post['sport']);
                    return true;
            }
        }
        
        //add player
        function add_player($post,$sport){
            $this->db->set('created_at','NOW()',false)->set('updated_at','NOW()',false);
            $this->db->insert('player', $post);
            $this->linkPlayer($this->db->insert_id(),$sport);
            return true;

        }

        //function for linking player 
        function linkPlayer($id, $sports){
            foreach($sports as $row){
                $this->db->set('created_at','NOW()',false)
                    ->set('updated_at','NOW()',false)
                    ->set('player_id',$id,false)
                    ->set('sport_id',$row, false)
                    ->insert('sports_player');    
            }
            return $this->db->insert_id();
        }
        // adding sports
        function add_sport($post){
            $this->db->set('created_at', 'NOW()',false)->set('updated_at', 'NOW()',false);
            return $this->db->insert('sport', $post);
        }
        
       
    }
?>