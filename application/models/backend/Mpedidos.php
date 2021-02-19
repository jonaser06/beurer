<?php

class Mpedidos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   
    public function getAll(
        string $table,
        ?array $conditions = NULL
    ) {
          if(  empty($conditions) ) {
            $this->db->from($table);
            $this->db->order_by("id_pedido", "DESC");
            $query = $this->db->get(); 
            return $query->result_array();
          }
          return $this->db->get_where($table, $conditions)->row_array();

             
    }


    public function get(
        string $table,
        array $conditions
    ){
        $query = $this->db->get_where($table, $conditions);
        
        // return !empty($query) ? $query->result_array():[];
        return$query->result_array();
    }

     public function dbInsert($table, $data)
     {
         $query = $this->db->insert($table, $data);
         if ($query) return true;
         return false;
     }
}
