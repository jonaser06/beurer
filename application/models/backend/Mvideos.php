<?php

class Mvideos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getVideos($search = NULL, $length = 0, $start = 0) {
        if ($search != NULL) {
            $this->db->like('videos.titulo',$search);
            $this->db->or_like('videos.titulo_en',$search);
        }
        $this->db->limit($length, $start);
        $query=$this->db->get('videos');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL) {
        if ($search != NULL) {
            $this->db->like('videos.titulo',$search);
            $this->db->or_like('videos.titulo_en',$search);
        }

        return $this->db->count_all_results('videos');
    }
    
    public function getVideo($idvideo=0){
        $this->db->where('idvideo',$idvideo);
        $query=$this->db->get('videos');
        return $query->row_array();
    }

    public function updateVideo($datos=array()){
        $this->db->where('idvideo',$datos['video']['idvideo']);
        return $this->db->update('videos',$datos['video']);
    }
    
    public function saveVideo($datos=array()){ 
        $this->db->insert('videos',$datos['video']);
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
	
	public function deletevideo($idvideo=0){
         $this->db->where('idvideo',$idvideo);
         return $this->db->delete('videos');
    }
	
	public function getCategorias(){
        $this->db->where('estado',1);
        $query=$this->db->get('categorias_video');
        return $query->result_array();
    }
	/*******CATEGORIA******/
	public function getCategoria($idcategoria_video){
        $this->db->where(array(
            "idcategoria_video"=>$idcategoria_video,
           // "estado"=>1
        ));
        $query=$this->db->get('categorias_video');
        return $query->row_array();
    }
	
	public function getCategoriasread($search = NULL, $length = 0, $start = 25) {
        if ($search != NULL) {
            $this->db->group_start();
            $this->db->like('nombre', $search);
            $this->db->group_end();
        }
        //$this->db->where('estado',1);
        $this->db->limit($length, $start);
        $query = $this->db->get('categorias_video');

        return $query->result_array();
    }
	
	public function getTotalcategorias($search = NULL) {
       //$this->db->join('grupos', 'grupos.idgrupo = productos.idgrupo');

        if ($search != NULL) {
            $this->db->group_start();
            $this->db->like('nombre', $search);
            $this->db->group_end();
        }

        return $this->db->count_all_results('categorias_video');
    }
	
	public function deletecategoria($idcategoria_video){
        $this->db->where('idcategoria_video',$idcategoria_video);
        return $this->db->delete('categorias_video');
    }
	
	
	public function updateCategoria($datos=array()){
        $this->db->where('idcategoria_video',$datos['categoria']['idcategoria_video']);
        return $this->db->update('categorias_video',$datos['categoria']);
    }
    
    public function saveCategoria($datos=array()){ 
        $this->db->insert('categorias_video',$datos['categoria']);
        return $this->db->insert_id();
    }
	
}
