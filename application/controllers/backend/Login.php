<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        if (boolval($this->input->get('logout', TRUE))) {
            $this->session->unset_userdata('manager');
            redirect('manager');
            exit();
        }

        if ($this->session->has_userdata('manager')) {
            redirect('manager/paginas/');
        }
    }

    public function index() {
//        print_r("JM"); exit;
        $data = array();
//        $password = password_hash('Sudo12358', PASSWORD_BCRYPT, array(
////                    'cost' => 10,
//            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
//        ));
//        
//        print_r($password);
//        exit();

        $output = $this->load->view('backend/login', $data, TRUE);

        return $this->__output($output);
    }

    public function login() {
        
//        print_r("JM"); exit;
        $usuario = $this->input->post('usuario', TRUE);
        $password = $this->input->post('contrasena', TRUE);
        
        if(empty($usuario) && empty($password)){
            $errores[]="usuario";
            $errores[]="contrasena";
            $mensaje=array("mensaje"=>"Debe llenar los campos","tipo"=>2,"errores"=>json_encode($errores)); 
        }else if(empty($usuario) && !empty($password)){
            $errores[]="usuario";
            $mensaje=array("mensaje"=>"Debe ingresar el usuario","tipo"=>2,"errores"=>json_encode($errores));
        }else if(empty($password) && !empty($usuario)){
            $errores[]="contrasena";
            $mensaje=array("mensaje"=>"Debe ingresar la contraseña","tipo"=>2,"errores"=>json_encode($errores));
        }else{
        
            $user = $this->sistema->getUsuario($usuario);
    //        print_r($user); exit;

            if (!empty($user) && password_verify($password, $user['password'])) {
                $data = array(
                    'user' => $user
                );

                $this->session->set_userdata('manager', $data);
                $mensaje=array("mensaje"=>"Bienvenido","tipo"=>1);
    //            redirect('manager/dashboard');
            } else {
    //            redirect('manager?error');
                $errores[]="usuario";
                $errores[]="contrasena";
                $mensaje=array("mensaje"=>"Los datos son incorrectos","tipo"=>2,"errores"=>json_encode($errores));
            }
        }
        
        echo json_encode($mensaje);
    }

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
