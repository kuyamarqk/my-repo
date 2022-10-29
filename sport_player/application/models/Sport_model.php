<?php

    class Sport_model extends CI_Model{
        public function __constructor(){
            parent::__construct();
        }
        function get_players(){
            return $this->db->get('players');
        }
        function fetch_players($post){
            $sql = "Select * from players 
                    left join sports_player 
                    on players.id = sports_player.player_id 
                    left join sports on sports_player.sport_id = sports.id";
            if($post['name'] !== ''){
                $sql .= " where players.first_name ='%".$post["name"]."%' 
                            or players.last_name ='%".$post["name"]."%'";
            }
            if($post['gender'] !== ''){
                $sql .= " and players.gender='{$post['gender']}'";
            }
            if($post['sport'] !== ''){
                foreach($post['sport'] as $row){
                    $sql .= " and sports.id='{$row}'";
                }
               
            }
            return $this->db->query($sql);
            

        }
        function add_player($post,$sports){
            $this->db->set('created_at','NOW()',false)->set('updated_at','NOW()',false);
            $this->db->insert('players', $post);
            $id = $this->db->insert_id();
            $this->linkPlayer($id, $sports);
            return true;
        }
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
        
        function get_sport(){
            return $this->db->get('sports');
        }
        function add_sport($post){
            $this->db->set('created_at', 'NOW()',false)->set('updated_at', 'NOW()',false);
            return $this->db->insert('sports', $post);
        }
        
       
    }
?>