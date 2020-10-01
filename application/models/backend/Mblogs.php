<?php

class Mblogs extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getBlogs($search = NULL, $length = 0, $start = 0,$idcat=0) {
        $this->db->select('blogs.*,CONCAT(autores.nombres," ",autores.apellidos) as nombrecompleto,categorias.categoria, sys_users.alias');
        $this->db->join('autores','blogs.idautor=autores.idautor','LEFT');
        $this->db->join('sys_users','blogs.iduser=sys_users.iduser','LEFT');
        $this->db->join('categorias','blogs.idcategoria=categorias.idcategoria');
        if ($search != NULL) {
            $this->db->like('blogs.titulo',$search);
            $this->db->or_like('autores.nombres',$search);
            $this->db->or_like('autores.apellidos',$search);
        }
        if($idcat>0){
            $this->db->where('blogs.idcategoria',$idcat);
        }
        $this->db->order_by('idblog desc');
        $this->db->limit($length, $start);
        $query=$this->db->get('blogs');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL,$idcat=0) {
        $this->db->join('autores','blogs.idautor=autores.idautor','LEFT');
        $this->db->join('categorias','blogs.idcategoria=categorias.idcategoria');
        if ($search != NULL) {
            $this->db->like('blogs.titulo',$search);
            $this->db->or_like('autores.nombres',$search);
            $this->db->or_like('autores.apellidos',$search);
        }
        if($idcat>0){
            $this->db->where('blogs.idcategoria',$idcat);
        }
        return $this->db->count_all_results('blogs');
    }
    
    public function getBlogTags($idblog=0){
        $this->db->where('idblog',$idblog);
        $query=$this->db->get('blogs_tags');
        return $query->result_array();
    }
    
    public function getTagsjm(){
        $query=$this->db->get('tags');
        return $query->result_array();
    }
    
    public function listacategorias(){
        $query=$this->db->get('categorias');
        return $query->result_array();
    }
    
    public function getBlog($idblog=0){
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->where('blogs.idblog',$idblog);
        $query=$this->db->get('blogs');
        return $query->row_array();
    }

     public function updateautor($datos=array()){
        $this->db->where('idautor',$datos['blogs']['idautor']);
        return $this->db->update('blogs',$datos['blogs']);
    }
    
    public function saveblog($datos=array()){
        $this->db->insert('blogs',$datos['blogs']);
        return $this->db->insert_id();
    }
    
    public function saveblogtag($datos=array()){
        $this->db->insert('blogs_tags',$datos);
    }
    
    public function updatesitemap($datos=array()){
        $this->db->where('idsitemap',$datos['sitemap']['idsitemap']);
        return $this->db->update('sitemap',$datos['sitemap']);
    }
    
    public function updateblog($datos=array()){
        $this->db->where('idblog',$datos['blogs']['idblog']);
        return $this->db->update('blogs',$datos['blogs']);
    }
    
    public function savesitemap($datos=array()){
        $this->db->insert('sitemap',$datos['sitemap']);
        return $this->db->insert_id();
    }
    
    public function deleteblogTags($idblog=0){
        $this->db->where('idblog',$idblog);
        return $this->db->delete('blogs_tags');
    }
  
    public function getAutores(){
        $query=$this->db->get('autores');
        return $query->result_array();
    }
     
     public function deleteblog($idblog=0){
         $this->db->where('idblog',$idblog);
         return $this->db->delete('blogs');
     }
     
     public function deletesitemap($idsitemap=0){
         $this->db->where('idsitemap',$idsitemap);
         return $this->db->delete('sitemap');
     }

     public function getCategorias(){
         $query=$this->db->get('categorias');
         return $query->result_array();
     }
     
     public function getAnunciosArticulos($id=0){
        $this->db->select('anuncios.*, CONCAT("esp_", anuncios.idblog, anuncios.iddimension,anuncios.idanuncio) AS idcolumn');
        $this->db->where('idblog',$id);
        $query=$this->db->get('anuncios');
        return $query->result();
    }
    
    public function getDimensiones(){
        $query=$this->db->get('dimensiones');
        return $query->result_array();
    }
    
    public function deleteanuncios($id=0){
        $this->db->where('idblog',$id);
        return $this->db->delete('anuncios');
    }
    
    public function guardaranuncios($datos=array()){
        return $this->db->insert('anuncios',$datos['anuncios']);
    }

}
