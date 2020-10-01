<?php

class Musuarios extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsuarios($search = NULL, $length = 0, $start = 0, $all = NULL) {
        $this->db->select('sys_users.*,perfiles.perfil');
        $this->db->join('perfiles','sys_users.idperfil=perfiles.idperfil');
        if ($search != NULL) {
            $this->db->like('perfiles.perfil',$search);
            $this->db->or_like('sys_users.username',$search);
        }
        $this->db->where('superuser <>',1);
        if ($all == NULL) {
            $this->db->limit($length, $start);
        }
        $this->db->order_by('sys_users.iduser asc');
        $query=$this->db->get('sys_users');
        return $query->result_array();
    }

    
     
    public function getTotal($search = NULL) {
        $this->db->select('sys_users.*,perfiles.perfil');
        $this->db->join('perfiles','sys_users.idperfil=perfiles.idperfil');
        if ($search != NULL) {
            $this->db->like('perfiles.perfil',$search);
            $this->db->or_like('sys_users.username',$search);
        }
        $this->db->where('superuser <>',1);

        return $this->db->count_all_results('sys_users');
    }
    
    public function getUsuario($idusuario=0){
        $this->db->where('iduser',$idusuario);
        $query=$this->db->get('sys_users');
        return $query->row_array();
    }
    
    public function getModulos(){
        $query=$this->db->get('modulos');
        return $query->result_array();
    }
    
    public function getModulosPerfil($idperfil=0){
        $this->db->where('idperfil',$idperfil);
        $query=$this->db->get('perfil_modulos');
        return $query->result_array();
    }
     
     public function updateperfil($datos=array()){
         $this->db->where('idprofile',$datos['sys_users_profile']['idprofile']);
         return $this->db->update('sys_users_profile',$datos['sys_users_profile']);
     }
     
     public function getPerfiljm($idu=0){
         $this->db->where('iduser',$idu);
         $query=$this->db->get('sys_users_profile');
         return $query->row_array();
     }
     
     public function getPerfiles(){
         $query=$this->db->get('perfiles');
         return $query->result_array();
     }
     
     public function saveperfil($datos=array()){
         $this->db->insert('sys_users_profile',$datos['sys_users_profile']);
         return $this->db->insert_id();
     }
     
     public function deletemodulosper($idperfil=0){
         $this->db->where('idperfil',$idperfil);
         return $this->db->delete('perfil_modulos');
     }
     
     public function updateuser($datos=array()){
        $this->db->where('iduser',$datos['sys_users']['iduser']);
        return $this->db->update('sys_users',$datos['sys_users']);
    }
    
    public function saveuser($datos=array()){
        $this->db->insert('sys_users',$datos['sys_users']);
        return $this->db->insert_id();
    }
     
     public function savepaginasperfiles($data=array()){

        return $this->db->insert('perfil_modulos',$data);
    }
     
     public function deleteusuario($idusuario=0){
         $this->db->where('iduser',$idusuario);
         return $this->db->delete('sys_users');
     }
     
     public function deleteperfiljm($idusuario=0){
         $this->db->where('iduser',$idusuario);
         return $this->db->delete('sys_users_profile');
     }

}
