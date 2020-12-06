<?php

class Mcontenido extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getVariables($id = NULL) {
        $this->db->where(array(
            'idpagina' => $id,
            'activo' => 1
        ));
        $this->db->order_by('orden', 'ASC');

        $query = $this->db->get('contenido');

        return $query->result_array();
    }

    public function setVariable($data = array()) {
        $this->db->where(array(
            'nombre' => $data['nombre'],
            'idpagina'=>$data['idpagina']
        ));

        return $this->db->update('contenido', $data);
    }
    
    /*public function getPaginas($search = NULL, $length = 0, $start = 0){
        $this->db->join('sitemap','paginas.idsitemap=sitemap.idsitemap');
        if ($search != NULL) {
            $this->db->like('paginas.pagina',$search);
            $this->db->or_like('sitemap.url',$search);
        }
        $this->db->limit($length, $start);
        $query=$this->db->get('paginas');
        return $query->result_array();
    }*/
	
	public function getPaginas($search = NULL, $length = 0, $start = 0, $idparent = 0){
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");

        $this->db->select('paginas.*, sitemap.*, IF( p.idpagina > 0,  "si", "no" ) as hijos');
        $this->db->join('sitemap','paginas.idsitemap=sitemap.idsitemap');
        $this->db->join('paginas as p', 'paginas.idpagina = p.idparent',"LEFT");            
        $this->db->where('paginas.idparent',$idparent);
        $this->db->group_by("paginas.idpagina");
        if ($search != NULL) {
            $this->db->like('paginas.pagina',$search);
            //$this->db->or_like('sitemap.url',$search); 
        }
        if ($length > 0 ) {
             $this->db->limit($length, $start);
        }      
        $query=$this->db->get('paginas');
        return $query->result_array();
    }
    
    public function getTotal($search = NULL) {
        //$this->db->join('sitemap','paginas.idsitemap=sitemap.idsitemap');
		$this->db->where('paginas.idparent',0);
        $this->db->group_by("paginas.idpagina");        
        if ($search != NULL) { 
            $this->db->like('paginas.pagina',$search);
            //$this->db->or_like('sitemap.url',$search);
        }
 
        return $this->db->count_all_results('paginas');
    }
    
    public function deletepagina($idp=0){
        $this->db->where('idpagina',$idp);
        return $this->db->delete('paginas');
    }
    
    public function getAnunciosPaginas($id=0){
        $this->db->select('anuncios.*, CONCAT("esp_", anuncios.idblog, anuncios.iddimension,anuncios.idanuncio) AS idcolumn');
        $this->db->where('idcategoria',$id);
        $query=$this->db->get('anuncios');
        return $query->result();
    }
    
    public function deleteanuncios($id=0){
        $this->db->where('idcategoria',$id);
        return $this->db->delete('anuncios');
    }
    
    public function guardaranuncios($datos=array()){
        return $this->db->insert('anuncios',$datos['anuncios']);
    }

}
