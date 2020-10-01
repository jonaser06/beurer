<?php

class Sistema extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsuario($usuario = NULL) {
        $this->db->select('sys_users.*,perfiles.perfil,sys_users_profile.*');
        $this->db->join('sys_users_profile','sys_users.iduser=sys_users_profile.iduser','LEFT');
        $this->db->join('perfiles','sys_users.idperfil=perfiles.idperfil');
        $this->db->where(array(
            'sys_users.username' => $usuario,
            'sys_users.active' => 1
        ));

        $query = $this->db->get('sys_users');

        return $query->row_array();
    }
    
   /* public function getPaginas($idm=0){
        $this->db->join('sitemap','paginas.idsitemap=sitemap.idsitemap');
        $this->db->where('paginas.idparent',0);
        $this->db->where('paginas.idmodulo',$idm);
//        $this->db->where('paginas.estado',1);
//        if($user!=0){
//            $this->db->where('user_paginas.id_user',$user);
//        }
        $this->db->order_by('paginas.orden asc');
        $query=$this->db->get('paginas'); 
        return $query->result_array();
    }*/
	
	 
    public function getPaginas($user=0){
        $this->db->select('paginas.*');
        if($user!=0){
            $this->db->join('sitemap','paginas.idpagina=sitemap.idpagina','LEFT');
        }
        $this->db->where('paginas.idparent',0);
        $this->db->where('paginas.estado',1);
        if($user!=0){
            $this->db->where('sitemap.idsitemap',$user);
        }
        $this->db->order_by('paginas.orden asc');
        $query=$this->db->get('paginas');
        return $query->result_array();
    }
    
    /*public function totalblogsjm(){
        $this->db->where('estado',1);
        $this->db->from('blogs');
        return $this->db->count_all_results();
    }*/
    
    public function totalautoresjm(){
        $this->db->where('estado',1);
        $this->db->from('autores');
        return $this->db->count_all_results();
    }
    
    public function getCategorias(){
        $this->db->where('estado',1);
        $query=$this->db->get('categorias');
        return $query->result_array();
    }
    
    public function getContenido($pagina = 0) {
        $this->db->where(array(
            'idpagina' => $pagina,
        ));
        $this->db->order_by('orden', 'ASC');

        $result = $this->db->get('contenido');

        return $this->salida($result->result_array());
    }
    
    public function getCategoria($ids=0){
        $this->db->where('idsitemap',$ids);
        $query=$this->db->get('categorias');
        return $query->row_array();
    }
    
    public function updatecategoria($jm=array()){
        $this->db->where('idcategoria',$jm['categorias']['idcategoria']);
        return $this->db->update('categorias',$jm['categorias']);
    }
    
    public function verificarCate($idc){
        $this->db->where('idsitemap',$idc);
        $query=$this->db->get('categorias');
        return $query->row_array();
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
    
    public function getPaginasf($user=0){
        $this->db->select('paginas.*');
        if($user!=0){
            $this->db->join('user_paginas','paginas.idpagina=user_paginas.idpagina');
        }
        $this->db->where('paginas.idparent <>',0);
        $this->db->where('paginas.estado',1);
        if($user!=0){
            $this->db->where('user_paginas.id_user',$user);
        }
        $this->db->order_by('paginas.orden asc');
        $query=$this->db->get('paginas');
        return $query->result_array();
    }
    
    public function verpagina($id=0){
        $this->db->join('sitemap','paginas.idsitemap=sitemap.idsitemap');
        $this->db->where('paginas.idpagina',$id);
        $query=$this->db->get('paginas');
        return $query->row_array();
    }
    
    public function getModulo($uri=null){
        $this->db->where('url',$uri);
        $query=$this->db->get('modulos');
        return $query->row_array();
    }
    
    public function getHijos($id=0,$user=0){
        if($user!=0){
            $this->db->join('user_paginas','paginas.idpagina=user_paginas.idpagina','LEFT');
        }
        $this->db->where('paginas.idparent',$id);
        $this->db->where('paginas.estado',1);
        if($user!=0){
            $this->db->where('user_paginas.id_user',$user);
        }
        $this->db->order_by('paginas.orden asc');
        $query=$this->db->get('paginas');
        return $query->result_array();
    }
    
    public function getModulos($user=0){
        if($user>0){
            $this->db->join('perfil_modulos','modulos.idmodulo=perfil_modulos.idmodulo');
        }
        $this->db->where('modulos.activo',1);
        if($user>0){
            $this->db->where('perfil_modulos.idperfil',$user);
            $this->db->where('perfil_modulos.ver',1);
        }
        $this->db->order_by('modulos.orden asc');
        $query=$this->db->get('modulos');
        return $query->result_array();
    }
    
    public function getPermisos($idp=0,$idm=0){
        $this->db->where(array(
            'idperfil'=>$idp,
            'idmodulo'=>$idm
        ));
        $query=$this->db->get('perfil_modulos');
        return $query->row_array();
    }
    
    public function getContenedores($id){
        $this->db->select('contenedor.*');
        $this->db->join('contenedor','contenido.idcontenedor=contenedor.idcontenedor');
        $this->db->where('contenido.idpagina',$id);
        $this->db->order_by('contenedor.orden asc');
        $this->db->group_by('contenido.idcontenedor');
        $query=$this->db->get('contenido');
        return $query->result_array();
    }
    
    public function editpagina($datos=array()){
        $this->db->where('idpagina',$datos['paginas']['idpagina']);
        return $this->db->update('paginas',$datos['paginas']);
    }
    
    public function getpaginasit($ids=0){
        $this->db->where('idsitemap',$ids);
        $query=$this->db->get('paginas');
        return $query->row_array();
    }
    
    public function editsitemap($datos=array()){
        $this->db->where('idsitemap',$datos['sitemap']['idsitemap']);
        return $this->db->update('sitemap',$datos['sitemap']);
    }


    // GetCategory
    public function getcat($ids=0){
        $this->db->where('idpagina',$ids);
        $query=$this->db->get('categorias');
        return $query->result_array();
    }
}
