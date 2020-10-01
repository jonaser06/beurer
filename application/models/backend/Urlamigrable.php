<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Urlamigrable extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getcat()
	{
		$qry = $this->db->get('productos');
		return $qry->result_array();
	}

	public function insert_data($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('productos', $data);
	}

}

/* End of file Urlamigrable.php */
/* Location: ./application/models/Urlamigrable.php */