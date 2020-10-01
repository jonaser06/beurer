<?php

class Mcorreos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCorreos($search = NULL, $length = 0, $start = 0,$tipo=1) {

        if ($search != NULL) {
            $this->db->group_start();
            $this->db->or_like('persona', $search);
            $this->db->or_like('empresa', $search);
            $this->db->or_like('ruc', $search);
            $this->db->group_end();
        }
        if($tipo>0){
            $this->db->where('tipoformulario',$tipo);
        }
        $this->db->order_by('fecha desc');
        $this->db->limit($length, $start);
        $query = $this->db->get('formularios');

        return $query->result_array();
    }
    
    public function getCorreosexp($tipo=1) {

        if($tipo>0){
            $this->db->where('tipoformulario',$tipo);
        }
        
        $query = $this->db->get('formularios');

        return $query->result_array();
    }

    public function getTotal($search = NULL,$tipo=0) {

        if ($search != NULL) {
            $this->db->group_start();
            $this->db->or_like('persona', $search);
            $this->db->or_like('empresa', $search);
            $this->db->or_like('ruc', $search);
            $this->db->group_end();
        }
        if($tipo>0){
            $this->db->where('tipoformulario',$tipo);
        }

        return $this->db->count_all_results('formularios');
    }

}
