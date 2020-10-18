<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Perfil extends MY_Controller

{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('frontend/taxonomia');
        $this->load->model('frontend/contenido');
	}

	public function index()
	{
        $uri_segment = $this->uri->segment_array();
        $uri = implode('/',$uri_segment);
		
        $this->data['varify_product'] = false;
        $this->data['pagina'] = $this->taxonomia->getPaginaurl($uri);
        $this->data['uri'] = $uri;
        $this->data['confif'] = $this->contenido->getContenido(1);
		$this->data['menu'] = $this->contenido->getMenu();
		
		$this->data['userData'] =  $this->get('clientes', ['id_cliente' => (int)$_SESSION['id_cliente']]);
	
		$output = $this->load->view("frontend/cuenta.php", $this->data, TRUE);
        echo $output;
	}
	public function updateCuenta(int $id)
	{
		return $this->updateUsuario((int)$id);
	}
}
