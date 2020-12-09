<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ResumenPedido extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();
        $this->load->model('frontend/taxonomia');
        $this->load->model('frontend/contenido');
    }
    function index(){

        
        $uri_segment = $this->uri->segment_array();
        $uri = implode('/',$uri_segment);

        $this->data['varify_product'] = false;
        $this->data['pagina'] = $this->taxonomia->getPaginaurl($uri);
        $this->data['uri'] = $uri;
        $this->data['confif'] = $this->contenido->getContenido(1);
        $this->data['menu'] = $this->contenido->getMenu();
        

        $output = $this->load->view("frontend/resumen-pedido.php", $this->data, TRUE);
        
        echo $output;
    }
}