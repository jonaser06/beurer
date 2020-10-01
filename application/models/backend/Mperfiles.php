<?php

class Mperfiles extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPerfiles($search = NULL, $length = 0, $start = 25) {
        if ($search != NULL) {
            $this->db->like('perfil',$search);
        }
        $this->db->where('idperfil <>',1);
        $this->db->limit($length, $start);
        $this->db->order_by('idperfil asc');
        $query=$this->db->get('perfiles');
        return $query->result_array();
    }
     
    public function getTotal($search = NULL) {
        if ($search != NULL) {
            $this->db->like('perfil',$search);
        }
        $this->db->where('idperfil <>',1);
        return $this->db->count_all_results('perfiles');
    }
    
    public function getPerfil($idperfil){
        $this->db->where('idperfil',$idperfil);
        $query=$this->db->get('perfiles');
        return $query->row_array();
    }
    
    public function getModulos(){
        $this->db->order_by('orden asc'); 
        $this->db->where('activo',1);
        $query=$this->db->get('modulos');
        return $query->result_array();
    }
    
    public function getModulosPerfil($idperfil=0){
        $this->db->where('idperfil',$idperfil);
        $query=$this->db->get('perfil_modulos');
        return $query->result_array();
    }
     
     public function updateperfil($datos=array()){
         $this->db->where('idperfil',$datos['perfiles']['idperfil']);
         return $this->db->update('perfiles',$datos['perfiles']);
     }
     
     public function saveperfil($datos=array()){
         $this->db->insert('perfiles',$datos['perfiles']);
         return $this->db->insert_id();
     }
     
     public function deletemodulosper($idperfil=0){
         $this->db->where('idperfil',$idperfil);
         return $this->db->delete('perfil_modulos');
     }
    
    public function saveperfilmodulos($datos=array()){
        return $this->db->insert('perfil_modulos',$datos);
    }
     
     public function deleteperfil($idperfil=0){
         $this->db->where('idperfil',$idperfil);
         return $this->db->delete('perfiles');
     }
     
     public function verificarperfil($idp=0){
         $this->db->where('idperfil',$idp);
         return $this->db->count_all_results('sys_users');
     }
     
     public function deleteperfilmodulos($idp=0){
         $this->db->where('idperfil',$idp);
         return $this->db->delete('perfil_modulos');
     }

}
