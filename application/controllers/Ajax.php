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
    
    public function login(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            #isMail?
            $user = $this->input->post('username');
            $user = explode('@',$user);
            if(count($user) > 1): $data = [ 'correo' => $this->input->post('username') ];
            else: $data = [ 'documento' => $this->input->post('username') ];
            endif; 
            $data += [ 'contrasena' => hash('sha256',$this->input->post('contrasena')) ];

            #query DB
            $query = $this->dbSelect('*','clientes', $data );
            if($query):
                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->set_session($query);
                $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(200)
                 ->set_output(json_encode($this->resp));
                 return;
            endif;

            $this->resp['message'] = 'Usuario o contraseña incorrecta!';
            $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(404)
                 ->set_output(json_encode($this->resp));
                 return;
        }
    }

    public function logout(){
        session_destroy();
        header('Location: '.base_url() );
    }

    public function recovery(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $user = $this->input->post('correo');
            $data = ['correo' => $user ];
            #query DB
            $query = $this->dbSelect('*','clientes', $data );
            #si exite el usuario
            if($query){
                $id = $this->salt_encrypt($query[0]['id_cliente']);
                $body = [
                    "url" => base_url('recovery/'.$id),
                    "name" => $query[0]['nombre'],
                    "email" => $query[0]['correo'],
                    "message"=> "Restauración de contraseña de su cuenta"
                ];
                #oculto correo
                $mail = $query[0]['correo'];
                $mail = explode('@',$mail);
                $domain = $mail[1];
                $mail = substr($mail[0], 0, 1);
                $mail = $mail.'*****@'.$domain;
                #Enviarlo
                $enviar = $this->sendmail($body['email'], $body, $body['message'], 'mail_recovery.php');

                $this->resp['status'] = true;
                $this->resp['code'] = 200;
                $this->resp['message'] = 'find One!';
                $this->resp['data'] = [
                    "correo" => $mail
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->resp));
                    return;

            }else{
                $this->resp['message'] = '';
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode($this->resp));
                    return;
            }
        }
    }

    public function updatePass(int $id)
    {
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => 'Metodo POST requerido',
        ];
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

           
            $pass = hash('sha256',$this->input->post('currentPass'));
            $newPass = hash('sha256', $this->input->post('newPass'));
            $result = $this->get('clientes',['contrasena' => $pass ,'id_cliente' => (int)$id ]);
            
            if (!empty($result)) {
                $result =  $this->dbUpdate(['contrasena' => $newPass ], 'clientes', ['id_cliente' => (int)$id]);
                if($result) {
                    $resp = [
                        'status'  => true,
                        'code'    => 200,
                        'message' => 'Contraseña Actualizada.',
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($resp));
                    return;
                }else {
                    $resp = [
                        'status'  => true,
                        'code'    => 404,
                        'message' => 'No se pudo actualizar intentelo otra vez',
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(404)
                        ->set_output(json_encode($resp));
                    return;
                }
                
            } else {
                $resp = [
                    'status'  => true,
                    'code'    => 404,
                    'message' => 'x La contraseña no es correcta.'
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($resp));
                return;
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode($resp));
    }
}