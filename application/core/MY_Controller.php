<?php
defined('BASEPATH') or exit('No direct script access allowed');

define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$.//ppp693-');
define('SECRET_IV', '99326425');
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
        if( !isset($_SESSION) ) {
            session_start();

        }
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
    public function set_session($data){
        $_SESSION['status'] = true;
        $_SESSION['id_cliente'] = $data[0]['id_cliente'];
        return;
    }
    public function salt_encrypt($pass){
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_KEY), 0, 16);

        $output = openssl_encrypt($pass, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
    public function salt_decrypt($pass){

        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_KEY), 0, 16);

        $output = openssl_decrypt(base64_decode($pass), METHOD, $key, 0, $iv);
        return $output;
    }
}