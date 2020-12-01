<?php

class Mnovedades extends CI_Model {

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


     
}
