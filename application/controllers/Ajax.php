<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();
    }

    public function index(){
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => '',
        ];
        


        $this->output
             ->set_content_type('application/json')
             ->set_status_header(200)
             ->set_output(json_encode($resp));
    }

    public function getprovincia(){
        $file = file_get_contents('assets/js/ubigeo.min.js');
        $this->output
             ->set_content_type('application/json')
             ->set_status_header(200)
             ->set_output($file);
    }

    public function setregister(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'apellido_paterno' => $this->input->post('apellido_paterno'),
                'apellido_materno' => $this->input->post('apellido_materno'),
                'correo' => $this->input->post('correo'),
                'contrasena' => hash('sha256',$this->input->post('contrasena')),
                'departamento' => $this->input->post('departamento'),
                'provincia' => $this->input->post('provincia'),
                'distrito' => $this->input->post('distrito'),
                'direccion' => $this->input->post('direccion'),
                'referencia' => $this->input->post('referencia'),
                'telefono' => $this->input->post('telefono'),
                'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
                'tipo_documento' => $this->input->post('tipo_documento'),
                'documento' => $this->input->post('documento'),
                'politicas' => $this->input->post('politicas'),
                'ofertas' => $this->input->post('ofertas'),
                'idperfil' => 4
            ];
            $query = $this->dbSelect('*','clientes', ['correo' => $this->input->post('correo')]);

            if($query){
                $this->resp['status'] = true;
                $this->resp['code'] = 404;
                $this->resp['message'] = 'Ya existe un usuario con ese correo';

                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode($this->resp));
                return;
            }else{
                $this->dbInsert('clientes',$data);
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->resp['data'] = $data;
                $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(200)
                 ->set_output(json_encode($this->resp));
                 return;
            }


        }else{
            $this->resp['message'] = 'Ocurrio un error en la petición';
        }
        $this->output
             ->set_content_type('application/json')
             ->set_status_header(404)
             ->set_output(json_encode($this->resp));
    }
    

}