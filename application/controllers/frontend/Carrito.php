<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends MY_Controller
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
        $this->data['carrito'] = true;

        $output = $this->load->view("frontend/carrito.php", $this->data, TRUE);

        echo $output;
    }
    function register () {
         
        $uri_segment = $this->uri->segment_array();
        $uri = implode('/',$uri_segment);

        $this->data['varify_product'] = false;
        $this->data['pagina'] = $this->taxonomia->getPaginaurl($uri);
        $this->data['uri'] = $uri;
        $this->data['confif'] = $this->contenido->getContenido(1);
        $this->data['menu'] = $this->contenido->getMenu();
        $this->data['userData'] =  isset($_SESSION['id_cliente']) 
                    ? $this->get('clientes', ['id_cliente' => (int)$_SESSION['id_cliente']])
                    : false ;
        
        
        $output = $this->load->view("frontend/facturacion.php", $this->data, TRUE);

        echo $output;
    }
}