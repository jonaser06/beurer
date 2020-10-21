<?php

class Mcategorias extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() : array
    {
        $this->db->select('paginas.*, sitemap.url');
        $this->db->where('idparent', 2 );
        $this->db->join('sitemap', 'sitemap.idsitemap = paginas.idsitemap');
        return $this->db->get('paginas')->result_array();
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
    
    public function getCategoria(  $idcategoria = 0 ){
        $this->db->where('idpagina', $idcategoria);
        $query = $this->db->get('paginas');
        return $query->row_array();
    }
    public function oneCategoria (array $where = [] ) : array
    {
        $this->db->where($where);
        $query = $this->db->get('paginas');
        return $query->row_array();
    }

    public function updatecategoria( 
         array $datos = [] ,
          $id_pagina 
    ):bool
    {
        $this->db->where('idpagina', (int) $id_pagina);
        return $this->db->update('paginas',$datos['categorias']);
    }
    
    public function savecategoria($datos = array()){
        // $this->db->insert('categorias',$datos['categorias']);
        $this->db->insert('paginas',$datos['categorias']);
        return $this->db->insert_id();
    }
    public function getPaginas(){
        $query=$this->db->get('paginas');
        return $query->result_array();
    }

     public function deletecategoria($idcategoria = 0){
         $this->db->where('idcategoria',$idcategoria);
         return $this->db->delete('categorias');
     }

     public function insertSitemap( array $data = []) :int
     {
         $this->db->insert('sitemap' , $data );
         $id_sitemap = $this->db->insert_id();
         return $id_sitemap;
     }
}
