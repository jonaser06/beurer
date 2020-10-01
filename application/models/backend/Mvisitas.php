<?php

class Mvisitas extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
     
    public function registrar($datos=array()){
        $this->db->insert('visitas_web',$datos);
        return $this->db->insert_id();
    }    

}
