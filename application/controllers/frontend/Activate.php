<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activate extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();
        $this->load->model('frontend/taxonomia');
        $this->load->model('frontend/contenido');
    }

    public function index(){
        $uri_segment = $this->uri->segment_array();
        $uri = implode('/',$uri_segment);
        $this->data['varify_product'] = false;
        $this->data['pagina'] = $this->taxonomia->getPaginaurl($uri);
        $this->data['uri'] = $uri;
        $this->data['confif'] = $this->contenido->getContenido(1);
        $this->data['menu'] = $this->contenido->getMenu();

        $id =  $_GET['code'];
        // echo $this->salt_encrypt($id);
        #decrypt
        $id = $this->salt_decrypt($id);
        $data = ['id_cliente'=> $id, 'verificado' => 0];
        #query DB
        $query = $this->dbSelect('*','clientes', $data );
        if($query){
            $this->dbUpdate([ 'verificado' => 1 ], 'clientes', [ 'id_cliente' => $id ]);
            $this->data['mail'] = [
                'title' => 'Cuenta activada correctamente',
                'message' => 'se redirigira a la pagina principal para que inicie sesión.',
                'redirect' => true
            ];
        }else{
            $this->data['mail'] = [
                'title' => 'Ocurrio un error!',
                'message' => 'la cuenta no existe, o ya fue verificada',
                'redirect' => false
            ];
        }

        $output = $this->load->view("frontend/activate.php", $this->data, TRUE);

        echo $output;
    }

    public function restore($id){
        if(!empty($id)){
            $uri_segment = $this->uri->segment_array();
            $uri = implode('/',$uri_segment);

            $this->data['varify_product'] = false;
            $this->data['pagina'] = $this->taxonomia->getPaginaurl($uri);
            $this->data['uri'] = $uri;
            $this->data['confif'] = $this->contenido->getContenido(1);
            $this->data['menu'] = $this->contenido->getMenu();

            $this->data['id'] = [ 'key' => $id ];

            #decrypt
            $id = $this->salt_decrypt($id);
            $data = ['id_cliente'=> $id];
            #query DB
            $query = $this->dbSelect('*','clientes', $data );
            if($query){
                $view = 'change_password.php';
            }else{
                echo 'false';
                return;
            }
        }else{
            echo 'false';
            return;
        }

        $output = $this->load->view("frontend/".$view, $this->data, TRUE);

        echo $output;
    }
}