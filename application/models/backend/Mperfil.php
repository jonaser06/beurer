<?php

class Mperfil extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPerfil($iduser = 0) {
        $this->db->join('sys_users','sys_users_profile.iduser=sys_users.iduser');
        $this->db->where(array(
            'sys_users_profile.iduser' => $iduser
        ));
        $query = $this->db->get('sys_users_profile');

        return $query->row_array();
    }

    public function createPerfil($data = array()) {
        return $this->db->insert('sys_users_profile', $data);
    }

    public function savePerfil($data = array()) {
        $this->db->where(array(
            'idprofile' => $data['idprofile']
        ));

        return $this->db->update('sys_users_profile', $data);
    }

    public function savePass($data = array(), $password = NULL) {
        if (isset($password) && !empty($password)) {
            $this->db->set('password', $password);

            $this->db->where(array(
                'iduser' => $data['iduser']
            ));

            return $this->db->update('sys_users');
        }

        return false;
    }

}
