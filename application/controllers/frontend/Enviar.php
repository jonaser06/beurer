<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enviar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('My_PHPMailer');
        $this->load->model("frontend/contenido");
        $this->load->model("frontend/taxonomia");
        $this->load->model("frontend/menviar");
    }

    public function index()
    {
        return $this->redireccionar();
    }

    public function contacto()
    {
        $post = $this->input->post(NULL, TRUE);
        print_r($post); exit;
        date_default_timezone_set('America/Bogota');
        $post['fecha'] = date('Y-m-d H:i:s');
//        print_r($post['fecha_registro']); exit;
        if (!empty($post)) {
            $data = array(
                'remitente' => array(
                    'email' => 'informes@negociosperu.pe',
                    'nombre' => 'Negocios Perú',
                ),
                'destinatarios' => array(
                    array(
                        'email' => 'informes@negociosperu.pe',
                        'nombre' => 'Operations',
                    )
                ),
                'asunto' => 'Nuevo mensaje de contacto',
                'mensaje' => $this->load->view('frontend/mensajes/contacto', $post, TRUE),
                'redireccionar' => 'gracias-contacto-1',
            );

            $guardar = $this->guardarRegistro($post);

            if ($guardar) {
                return $this->sendMail($data);
            }

            //return $this->redireccionar($post['page']);
        } else {
            //return $this->redireccionar();
        }
    }
    
    public function suscrito()
    {
        $post = $this->input->post(NULL, TRUE);
//        print_r($post); exit;
        unset($post['politicas']);
        date_default_timezone_set('America/Bogota');
        $post['fecha'] = date('Y-m-d H:i:s');
//        print_r($post['fecha_registro']); exit;
        if (!empty($post)) {
            $data = array(
                'remitente' => array(
                    'email' => 'informes@negociosperu.pe',
                    'nombre' => 'Negocios Perú',
                ),
                'destinatarios' => array(
                    array(
                        'email' => $post['email'],
                        'nombre' => 'Operations',
                    )
                ),
                'asunto' => 'Suscripción a Negocios Perú',
                'mensaje' => $this->load->view('frontend/mensajes/suscrito', $post, TRUE),
                'redireccionar' => 'gracias-suscripcion-2',
            );

            $guardar = $this->guardarSuscriptor($post);

            if ($guardar) {
                return $this->sendMail($data);
            }

            //return $this->redireccionar($post['page']);
        } else {
            //return $this->redireccionar();
        }
    }
    
    public function cotizacion()
    {
        $post = $this->input->post(NULL, TRUE);
//        print_r($post); exit;
        date_default_timezone_set('America/Bogota');
        $post['fecha'] = date('Y-m-d H:i:s');
//        print_r($post['fecha_registro']); exit;
        if (!empty($post)) {
            $data = array(
                'remitente' => array(
                    'email' => 'informes@negociosperu.pe',
                    'nombre' => 'Negocios Perú',
                ),
                'destinatarios' => array(
                    array(
                        'email' => 'informes@negociosperu.pe',
                        'nombre' => 'Operations',
                    )
                ),
                'asunto' => 'Nuevo mensaje de cotización',
                'mensaje' => $this->load->view('frontend/mensajes/cotizacion', $post, TRUE),
                'redireccionar' => 'gracias-cotizacion-3',
            );

            $guardar = $this->guardarRegistro($post);

            if ($guardar) {
                return $this->sendMail($data);
            }

            //return $this->redireccionar($post['page']);
        } else {
            //return $this->redireccionar();
        }
    }
    
    public function amigo(){
        $post = $this->input->post(NULL, TRUE);
//        print_r($post); exit;
        
        if (!empty($post)) {
            $data = array(
                'remitente' => array(
                    'email' => $post['tu_correo'],
                    'nombre' => $post['tu_nombre'],
                ),
                'destinatarios' => array(
                    array(
                        'email' => $post['amigo_correo'],
                        'nombre' => $post['amigo_nombre'],
                    )
                ),
                'asunto' => 'Nuevo mensaje de contacto',
                'mensaje' => $this->load->view('frontend/mensajes/amigo', $post, TRUE),
//                'redireccionar' => 'gracias/contacto/1',
            );
            
//            print_r($data); exit;


            return $this->sendMailamigo($data);

            //return $this->redireccionar($post['page']);
        } else {
            //return $this->redireccionar();
        }
    }

    
    private function sendMail($data = array())
    {
        
        $mailer = new PHPMailer();
        if (!empty($data)) {
            $mailer->CharSet = 'UTF-8';
            $mailer->isHTML(true);
            $mailer->setFrom($data['remitente']['email'], $data['remitente']['nombre']);

            foreach ($data['destinatarios'] as $key => $destinatario) {
                $mailer->addAddress($destinatario['email'], $destinatario['nombre']);
            }
         
            $mailer->Subject = $data['asunto'];
            $mailer->msgHTML($data['mensaje']);

            $mailer->send();
            
            return $this->redireccionar($data['redireccionar'], "success=1");
        }
    }
    
    private function sendMailamigo($data = array())
    {
        
        $mailer = new PHPMailer();
        if (!empty($data)) {
            $mailer->CharSet = 'UTF-8';
            $mailer->isHTML(true);
            $mailer->setFrom($data['remitente']['email'], $data['remitente']['nombre']);

            foreach ($data['destinatarios'] as $key => $destinatario) {
                $mailer->addAddress($destinatario['email'], $destinatario['nombre']);
            }

            $mailer->Subject = $data['asunto'];
            $mailer->msgHTML($data['mensaje']);

            $mailer->send();
            
//            return $this->redireccionar($data['redireccionar'], "success=1");
        }
    }
    
    
    public function gracias($jm){
        $data = array(
            'conte'=>$this->contenido->getContenido(1),
            'jm'=>$jm
        );
        $this->load->view('frontend/gracias',$data);
    }

    private function guardarRegistro($data = array())
    {
        return $this->menviar->saveForm($data);
    }
    
    private function guardarSuscriptor($data=array()){
        return $this->menviar->saveSuscriptor($data);
    }

    private function redireccionar($url = '')
    {
        header('Location: ' . $this->config->base_url($url));
        exit();
    }

}
