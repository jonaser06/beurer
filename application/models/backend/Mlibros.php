<?php

class Mlibros extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getLibros($search = NULL, $length = 0, $start = 0) {
        if ($search != NULL) {
            $this->db->like('libros.titulo',$search);
            $this->db->or_like('libros.autor',$search);
        }
        $this->db->limit($length, $start);
        $query=$this->db->get('libros');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL) {
        if ($search != NULL) {
            $this->db->like('libros.titulo',$search);
            $this->db->or_like('libros.autor',$search);
        }
        return $this->db->count_all_results('libros');
    }

    
    public function getLibro($idlibro=0){
        $this->db->join('sitemap','libros.idsitemap=sitemap.idsitemap');
        $this->db->where('libros.idlibro',$idlibro);
        $query=$this->db->get('libros');
        return $query->row_array();
    }

    public function savelibro($datos=array()){
        $this->db->insert('libros',$datos['libros']);
        return $this->db->insert_id();
    }
    
    public function listalibros(){
        $this->db->where('estado',1);
        $query=$this->db->get('libros');
        return $query->result_array();
    }
    
    public function updatesitemap($datos=array()){
        $this->db->where('idsitemap',$datos['sitemap']['idsitemap']);
        return $this->db->update('sitemap',$datos['sitemap']);
    }
    
    public function updatelibro($datos=array()){
        $this->db->where('idlibro',$datos['libros']['idlibro']);
        return $this->db->update('libros',$datos['libros']);
    }
    
    public function savesitemap($datos=array()){
        $this->db->insert('sitemap',$datos['sitemap']);
        return $this->db->insert_id();
    }
    
     public function deletelibro($idlibro=0){
         $this->db->where('idlibro',$idlibro);
         return $this->db->delete('libros');
     }
     
     public function deletesitemap($idsitemap=0){
         $this->db->where('idsitemap',$idsitemap);
         return $this->db->delete('sitemap');
     }

}
