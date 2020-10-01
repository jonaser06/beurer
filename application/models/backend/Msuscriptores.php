<?php

class Msuscriptores extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getSuscriptores() {
        $query=$this->db->get('suscribete');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL) {
        if ($search != NULL) {
            $this->db->like('suscriptores.nombres',$search);
            $this->db->or_like('suscriptores.email',$search);
        }

        return $this->db->count_all_results('suscriptores');
    }
    
    public function getSuscriptoresExcel(){
        $query=$this->db->get('suscribete');
        return $query->result_array();
    }
}
