<?php

class Mnoticias extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getNoticias($search = NULL, $length = 0, $start = 0) {
        if ($search != NULL) {
            $this->db->like('noticias.titulo',$search);
            $this->db->or_like('noticias.titulo_en',$search);
        }
        $this->db->limit($length, $start);
        $query=$this->db->get('noticias');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL) {
        if ($search != NULL) {
            $this->db->like('noticias.titulo',$search);
            $this->db->or_like('noticias.titulo_en',$search);
        }

        return $this->db->count_all_results('noticias');
    }
    
    public function getNoticia($idnoticia=0){
        $this->db->where('idnoticia',$idnoticia);
        $query=$this->db->get('noticias');
        return $query->row_array();
    }

     public function updateNoticia($datos=array()){
        $this->db->where('idnoticia',$datos['noticia']['idnoticia']);
        return $this->db->update('noticias',$datos['noticia']);
    }
    
    public function savenoticia($datos=array()){
        $this->db->insert('noticias',$datos['noticia']);
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
	
	public function deletenoticia($idnoticia=0){
         $this->db->where('idnoticia',$idnoticia);
         return $this->db->delete('noticias');
    }
    public function getAnunciosAutores($id=0){
        $this->db->select('anuncios.*, CONCAT("esp_", anuncios.idautor, anuncios.iddimension,anuncios.idanuncio) AS idcolumn');
        $this->db->where('idautor',$id);
        $query=$this->db->get('anuncios');
        return $query->result();
    }
	
	public function updatesitemap($datos=array()){
        $this->db->where('idsitemap',$datos['sitemap']['idsitemap']);
        return $this->db->update('sitemap',$datos['sitemap']);
    }
	
	public function savesitemap($datos=array()){
        $this->db->insert('sitemap',$datos['sitemap']);
        return $this->db->insert_id();
    }


}
