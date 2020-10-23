<?php

class Taxonomia extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCategorias() {
        $where = array(
//            'campana' => 0,
            'activo' => 1
        );

        $this->db->where($where);
        $this->db->order_by('orden', 'ASC');

        $result = $this->db->get('categorias');

        return $result->result_array();
    }

    public function getCategoria($idcategoria = 0) {
        $where = array(
            'idcategoria' => $idcategoria,
//            'campana' => 0,
            'activo' => 1,
        );

        $this->db->where($where);

        $result = $this->db->get('categorias');

        return $result->row_array();
    }

    public function getSubCategorias($idcategoria = 0, $joinned = NULL, $recordatorio = FALSE) {
		
        if ($joinned === 'joinned') {
            $this->db->select('categorias.idcategoria, categorias.nombre AS categoria');
            $this->db->join('categorias', 'categorias.idcategoria = subcategorias.idcategoria');
        }

        $this->db->select('subcategorias.*');

        $where = array(
//            'subcategorias.idcategoria' => $idcategoria,
            'subcategorias.activo' => 1
        );
        if ((int) $idcategoria > 0) {
            $where['subcategorias.idcategoria'] = $idcategoria;
        }

        if ($recordatorio) {
            $where['subcategorias.recordatorio'] = 1;
        }

        $this->db->where($where);
        $this->db->order_by('subcategorias.orden', 'ASC');

        $result = $this->db->get('subcategorias');

        return $result->result_array();
    }

    public function getSubCategoria($idsubcategoria = 0) {
        $where = array(
            'idsubcategoria' => $idsubcategoria,
            'activo' => 1,
        );

        $this->db->where($where);
        $this->db->order_by('orden', 'ASC');

        $result = $this->db->get('subcategorias');

        return $result->row_array();
    }
    
    public function getPaginaurl($url=NULL){
        $this->db->select('paginas.*,templates.template, sitemap.*');
        $this->db->join('templates','paginas.idpagina=templates.idpagina');
        $this->db->join('sitemap','paginas.idsitemap=sitemap.idsitemap');
        $this->db->where('sitemap.url',$url);
        $query=$this->db->get('paginas');
        return $query->row_array();
    }
    
    public function palabrasClaves($meta_keyword){
        $array = explode(",", $meta_keyword);
        $palabras_claves = "";
        foreach ($array as $key => $value) {
            if (strlen($palabras_claves) < 55) {
                $palabras_claves .= $value . ",";
            }
        }
        $palabras_claves = trim($palabras_claves, ',');
        return $palabras_claves;
    }
    
    public function salida($data = array()) {
        $salida = array();

        foreach ($data as $key => $value) {
            switch ($value['tipo']) {
                case 'data':
                    $valor = json_decode($value['valor'], TRUE);
                    break;
                default:
                    $valor = $value['valor'];
                    break;
            }

            $salida[$value['nombre']] = $valor;
        }

        return $salida;
    }
    
    public function getPaginasHeader(){
        $this->db->join('sitemap','paginas.idsitemap=sitemap.idsitemap');
        $this->db->where(array(
            'paginas.header'=>1,
            'paginas.estado'=>1
        ));
        $this->db->order_by('paginas.orden asc');
        $query=$this->db->get('paginas');
        return $query->result_array();
    }
    
    public function getPaginasFooter(){
        $this->db->join('sitemap','paginas.idsitemap=sitemap.idsitemap');
        $this->db->where(array(
            'paginas.footer'=>1,
            'paginas.estado'=>1
        ));
        $this->db->order_by('paginas.orden asc');
        $query=$this->db->get('paginas');
        return $query->result_array();
    }
	
	public function getNoticiaById($idnoti){
		$where = array(          
            'estado' => 1,
			'idnoticia' => $idnoti
        );		
        $this->db->where($where);		
        $result = $this->db->get('noticias');
        return $result->row_array();
	}
	
	public function getNoticias(){
		$where = array(          
            'estado' => 1,
        );		
        $this->db->where($where);
		$this->db->order_by('fecha', 'desc');
        $result = $this->db->get('noticias');
        return $result->result_array();
	}
	
	public function getVideos(){
		$where = array(          
            'estado' => 1,
        );
		
        $this->db->where($where);
		$this->db->order_by('orden', 'ASC');
        $result = $this->db->get('videos');
        return $result->result_array();
	}
	
	public function getVideosByCat($idcat = 0){
		$where = array(          
            'estado' => 1,
			'idcategoria_video' => $idcat
        );
		
		$this->db->where($where);
		$this->db->order_by('orden', 'ASC');
        $result = $this->db->get('videos');
        return $result->result_array();		
	}
	
	public function getCategoriasVideo(){
		$where = array(          
            'estado' => 1,			
        );
		
		$this->db->where($where);
		$this->db->order_by('orden', 'ASC');
        $result = $this->db->get('categorias_video');
        return $result->result_array();		
	}
	
	public function guardarFomulario($post = array()){
		
		$this->db->insert('formularios', $post);		
		
	}

}
