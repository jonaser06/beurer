<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data;
    protected $resp;

    public function __construct()
    {
        parent::__construct();
        // $this->data = 'test'; 
        $this->resp = [
            'status'  => false,
            'code'    => 404,
            'message' => '',
        ];   
    }

    public function dbInsert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        if ($query) return true;
        return false;
    }
    public function dbSelect($label, $table, $where = [], $o = '')
    {
        $this->db->select($label);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($o, 'DESC');
        $query = $this->db->get()->result_array();
        if ($query) return $query;
        return false;
    }
}