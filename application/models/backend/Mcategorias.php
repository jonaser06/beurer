<?php

class Mcategorias extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCategorias($search = NULL, $length = 0, $start = 0) {
        if ($search != NULL) {
            $this->db->like('categorias.categoria',$search);
        }
        $this->db->limit($length, $start);
        $query=$this->db->get('categorias');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL) {
        if ($search != NULL) {
            $this->db->like('categorias.categoria',$search);
        }

        return $this->db->count_all_results('categorias');
    }
    
    public function getCategoria($idcategoria=0){
        $this->db->where('idcategoria',$idcategoria);
        $query=$this->db->get('categorias');
        return $query->row_array();
    }

     public function updatecategoria($datos=array()){
        $this->db->where('idcategoria',$datos['categorias']['idcategoria']);
        return $this->db->update('categorias',$datos['categorias']);
    }
    
    public function savecategoria($datos=array()){
        $this->db->insert('categorias',$datos['categorias']);
        return $this->db->insert_id();
    }
  
    public function getPaginas(){
        $query=$this->db->get('paginas');
        return $query->result_array();
    }
    
     public function deletecategoria($idcategoria=0){
         $this->db->where('idcategoria',$idcategoria);
         return $this->db->delete('categorias');
     }


}
