<?php

class Menviar extends CI_Model {

    public function saveForm($data = array()) {
        return $this->db->insert('formularios', $data);
    }

    public function saveSuscriptor($data = array()){
        return $this->db->insert('suscriptores', $data);
    }
}
