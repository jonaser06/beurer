<?php

class Mpedidos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   
    public function getAll(
        string $table,
        ?array $conditions = NULL
    ) {
           return empty($conditions)
            ? $this->db->get($table)->result_array()
            : $this->db->get_where($table, $conditions)->row_array();
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
    public function get(
        string $table,
        array $conditions
    ){
        $query = $this->db->get_where($table, $conditions);
        
        // return !empty($query) ? $query->result_array():[];
        return$query->result_array();
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
