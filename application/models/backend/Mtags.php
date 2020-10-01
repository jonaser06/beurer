<?php

class Mtags extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTags($search = NULL, $length = 0, $start = 0) {
        if ($search != NULL) {
            $this->db->like('nombre',$search);
        }
        $this->db->limit($length, $start);
        $query=$this->db->get('tags');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL) {
        if ($search != NULL) {
            $this->db->like('nombre',$search);
        }

        return $this->db->count_all_results('tags');
    }
    
    public function getTag($idtag=0){
        $this->db->where('idtag',$idtag);
        $query=$this->db->get('tags');
        return $query->row_array();
    }

     public function updatetag($datos=array()){
        $this->db->where('idtag',$datos['tags']['idtag']);
        return $this->db->update('tags',$datos['tags']);
    }
    
    public function savetag($datos=array()){
        $this->db->insert('tags',$datos['tags']);
        return $this->db->insert_id();
    }
  
     
     public function deletetag($idtag=0){
         $this->db->where('idtag',$idtag);
         return $this->db->delete('tags');
     }


}
