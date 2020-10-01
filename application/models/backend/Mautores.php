<?php

class Mautores extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAutores($search = NULL, $length = 0, $start = 0) {
        if ($search != NULL) {
            $this->db->like('autores.nombres',$search);
            $this->db->or_like('autores.apellidos',$search);
        }
        $this->db->limit($length, $start);
        $query=$this->db->get('autores');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL) {
        if ($search != NULL) {
            $this->db->like('autores.nombres',$search);
            $this->db->or_like('autores.apellidos',$search);
        }

        return $this->db->count_all_results('autores');
    }
    
    public function getAutor($idautor=0){
        $this->db->where('idautor',$idautor);
        $query=$this->db->get('autores');
        return $query->row_array();
    }

     public function updateautor($datos=array()){
        $this->db->where('idautor',$datos['autores']['idautor']);
        return $this->db->update('autores',$datos['autores']);
    }
    
    public function saveautor($datos=array()){
        $this->db->insert('autores',$datos['autores']);
        return $this->db->insert_id();
    }
    
    public function verificarautor($idp=0){
         $this->db->where('idautor',$idp);
         return $this->db->count_all_results('blogs');
     }
  
     public function deleteautor($idautor=0){
         $this->db->where('idautor',$idautor);
         return $this->db->delete('autores');
     }

     public function getAnunciosAutores($id=0){
        $this->db->select('anuncios.*, CONCAT("esp_", anuncios.idautor, anuncios.iddimension,anuncios.idanuncio) AS idcolumn');
        $this->db->where('idautor',$id);
        $query=$this->db->get('anuncios');
        return $query->result();
    }
    
    public function getDimensiones(){
        $query=$this->db->get('dimensiones');
        return $query->result_array();
    }
    
    public function deleteanuncios($id=0){
        $this->db->where('idautor',$id);
        return $this->db->delete('anuncios');
    }
    
    public function guardaranuncios($datos=array()){
        return $this->db->insert('anuncios',$datos['anuncios']);
    }

}
