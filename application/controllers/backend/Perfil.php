<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mperfil');
        $this->load->helper('general');
        $this->load->library('session');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {

    }

    public function editar() {
        $idmodulo=4;


        $user=$this->manager['user']['idperfil'];
//        print_r($this->manager); exit;
        $data = array();
//        $data['paginas']=$this->sistema->getPaginas();
        $data['modulos']=$this->sistema->getModulos($user);
        $data['mods']=$this->sistema->getModulos($user);
        
        $data['pags']=$this->sistema->getPaginas();
        $data['perfil'] = $this->mperfil->getPerfil($this->manager['user']['iduser']);

        //print_r($data); exit;
        $output = $this->load->view('backend/perfil-index', $data, TRUE);

        return $this->__output($output);
    }

    public function guardar() {
        $usuario = $this->session->userdata('manager');
        $perfil = $this->mperfil->getPerfil($usuario['user']['iduser']);
        
        $data = $this->input->post(NULL, TRUE);
        //print_r($usuario); exit;
        $errores=array();
        $success = array();

        if (!empty($data['profile'])) {
            if (!empty($perfil)) {
                $data['profile']['idprofile'] = $perfil['idprofile'];

                $result_prof = $this->mperfil->savePerfil($data['profile']);
            } else {
                $data['profile']['iduser'] = $usuario['user']['iduser'];

                $result_prof = $this->mperfil->createPerfil($data['profile']);
            }

            if ($result_prof) {
//                $success['profile'] = 1;
                $mensaje=array("mensaje"=>"Se actualizaron los datos correctamente","tipo"=>1);
            } else {
//                $success['profile'] = 0;
                $mensaje=array("mensaje"=>"Hubo una falla en el registro","tipo"=>2,"errores"=>json_encode($errores));
            }
        } else {
//            $success['profile'] = 0;
            $mensaje=array("mensaje"=>"Hubo una falla en el registro","tipo"=>2,"errores"=>json_encode($errores));
        }

        if (isset($data['changepassword']) && $data['changepassword'] == 1) {
            if (!empty($data['user']['password']) && !empty($data['user']['passwordc'])) {
                if ($data['user']['password'] === $data['user']['passwordc']) {
                    $password = password_hash($data['user']['password'], PASSWORD_BCRYPT);
                    $data['user']['iduser'] = $usuario['user']['iduser'];

                    $result_pass = $this->mperfil->savePass($data['user'], $password);

                    if ($result_pass) {
                        $mensaje=array("mensaje"=>"Se actualizó contraseña correctamente","tipo"=>1);
//                        $success['password'] = 1; //SE ACTUALIZO CONTRASEÑA
                    } else {
                        $errores[]="password";
                        $errores[]="passwordc";
                        $mensaje=array("mensaje"=>"No se actualizó contraseña correctamente","tipo"=>2,"errores"=>json_encode($errores));
//                        $success['password'] = 0; //NO SE PUDO ACTUALIZAR LA CONTRASEÑA
                    }
                } else {
                    $errores[]="password";
                    $errores[]="passwordc";
//                    $success['password'] = 2; //LAS CONTRASEÑAS NO COINCIDEN
                    $mensaje=array("mensaje"=>"Las contraseñas no coinciden","tipo"=>2,"errores"=>json_encode($errores));
                }
            } else {
                $errores[]="password";
                $errores[]="passwordc";
                $mensaje=array("mensaje"=>"Los campos contraseñas no deben estar vacios","tipo"=>2,"errores"=>json_encode($errores));
//                $success['password'] = 1; //LOS CAMPOS CONTRASEÑAS NO DEBEN ESTAR VACIOS
            }
        }

//        $params = http_build_query($success);
//        if(isset($success['password']) && !empty($success['password'])){
//            $respuesta=$success['password'];
//        }else{
//            $respuesta=$success['profile'];
//        }
            
        echo json_encode($mensaje);
//        print_r($respuesta); exit;
//        $uri = 'manager/perfil/editar' . (!empty($params) ? '?' . $params : '');
//
//        redirect($uri);
    }
    
    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            // $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}

