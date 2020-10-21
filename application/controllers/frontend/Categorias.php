<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function liscategorias()
    {
        $this->db->select('paginas.*, sitemap.url');
        $this->db->where('idparent', 2);
        $this->db->join('sitemap', 'sitemap.idsitemap = paginas.idsitemap');
        $qry = $this->db->get('paginas');

        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($qry->result_array()));
    }

    public function lissubcategorias()
    {
        $this->db->select('*');
        $this->db->where('idpagina', $this->input->post('idcat'));
        $qry = $this->db->get('categorias');

        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($qry->result_array()));
    }

    public function getProducto()
    {
        $this->db->select('*');
        $this->db->where('categoria_id', $this->input->post('idsubcat'));
        $qry = $this->db->get('productos');

        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($qry->result_array()));
    }

}

/* End of file Categorias.php */
/* Location: ./application/controllers/Categorias.php */