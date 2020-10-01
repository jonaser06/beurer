<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/musuarios');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        $user=$this->manager['user']['idperfil'];
        $idmodulo=3;
        
        $data = array();
        $data['pags']=$this->sistema->getPaginas();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['mods']=$this->sistema->getModulos($user);
        

        $output = $this->load->view('backend/usuarios', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $iduser = $this->input->post('id', TRUE);

        $data = array(
            'usuario' => $this->musuarios->getUsuario($iduser),
            'perfiles'=>$this->musuarios->getPerfiles(),
            'perfiljm'=>$this->musuarios->getPerfiljm($iduser)
        );
//        print_r($data); exit;
        $output = $this->load->view('backend/popups/edit_usuario', $data, TRUE);

        return $this->__output($output);
    }
    
    public function save(){
        try {
            $post=$this->input->post();
            //print_r($post);exit;
            $post['sys_users']['superuser']=0;
            $jm=array();
            if(empty($post['sys_users']['username'])){
                $errores[]="username";
            }else{
                $jm[]="username";
            }
            
            if(empty($post['sys_users']['idperfil'])){
                $errores[]="idperfil";
            }else{
                $jm[]="idperfil";
            }
            
            if(isset($errores) && !empty($errores)){
                $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
            }else{
            
            if((int)$post['sys_users']['iduser']>0){
                $iduser=$post['sys_users']['iduser'];
                if($post['user']['password'] != '' || $post['user']['passwordc'] != ''){
                    if($post['user']['password']!= $post['user']['passwordc']){
                        $errores[]="passwordc";
                        $errores[]="passwordc";
                        $mensaje=array("mensaje"=>"Las contraseñas no coinciden","tipo"=>2,"errores"=>json_encode($errores));
                    }else{
                        /*
                        $opciones = array(
                            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
                            //'salt' => random_bytes(22)
                        );
                        */
                        //$post['sys_users']['password'] = password_hash($post['user']['password'], PASSWORD_BCRYPT, $opciones);
                        $post['sys_users']['password'] = password_hash($post['user']['password'], PASSWORD_BCRYPT);
                        $this->musuarios->updateuser($post);
                        $this->musuarios->updateperfil($post);
                        $mensaje=array("mensaje"=>"Usuario editado correctamente","tipo"=>1);
                    }
                }else{
                    $this->musuarios->updateuser($post);
                    $this->musuarios->updateperfil($post);
                    $mensaje=array("mensaje"=>"Usuario editado correctamente","tipo"=>1);
                }
    //            $post['sys_users']['registerdate']=date('Y-m-d');
                
                
            }else{
                $post['sys_users']['registerdate']=date('Y-m-d');
    //            $iduser=$post['sys_users']['iduser'];
                
                    if($post['user']['password']!= $post['user']['passwordc']){
                        $errores[]="passwordc";
                        $errores[]="passwordc";
                        $mensaje=array("mensaje"=>"Las contraseñas no coinciden","tipo"=>2,"errores"=>json_encode($errores));
                    }else if($post['user']['password'] != '' ){
                        /*
                        $opciones = array(
                            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
                        );
                        */
                        //$post['sys_users']['password'] = password_hash($post['user']['password'], PASSWORD_BCRYPT, $opciones);
                        $iduser=$this->musuarios->saveuser($post);
                        $post['sys_users_profile']['iduser']=$iduser;
                        $this->musuarios->saveperfil($post);
                        $mensaje=array("mensaje"=>"Usuario registrado correctamente","tipo"=>1);
                    }
                
                }
                
                
            }
            
            echo json_encode($mensaje);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
//         if((int)$post['sys_users']['iduser']>0){
//            $iduser=$post['sys_users']['iduser'];
//            if($post['user']['password'] != '' || $post['user']['passwordc'] != ''){
//                if($post['user']['password']!= $post['user']['passwordc']){
//                    echo 2;
//                }else{
//                    $opciones = array(
//                        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
//                    );
//                    $post['sys_users']['password'] = password_hash($post['user']['password'], PASSWORD_BCRYPT, $opciones);
//                }
//            }else{
//                echo 1;
//            }
////            $post['sys_users']['registerdate']=date('Y-m-d');
//            $this->musuarios->updateuser($post);
//            $this->musuarios->updateperfil($post);
//            
//        }else{
//            $post['sys_users']['registerdate']=date('Y-m-d');
////            $iduser=$post['sys_users']['iduser'];
//            if($post['user']['password'] != '' || $post['user']['passwordc'] != ''){
//                if($post['user']['password']!= $post['user']['passwordc']){
//                    echo 2;
//                }else{
//                    $opciones = array(
//                        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
//                    );
//                    $post['sys_users']['password'] = password_hash($post['user']['password'], PASSWORD_BCRYPT, $opciones);
//                    $iduser=$this->musuarios->saveuser($post);
//                    $post['sys_users_profile']['iduser']=$iduser;
//                    $this->musuarios->saveperfil($post);
//                }
//            }else{
//                $iduser=$this->musuarios->saveuser($post);
//                $post['sys_users_profile']['iduser']=$iduser;
//                $this->musuarios->saveperfil($post);
//                echo 3;
//            }           
//        }
    }
    

    public function read() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);
             
        $user=$this->manager['user']['idperfil'];
        $idmodulo=3;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $usuarios = $this->musuarios->getUsuarios($search['value'], $length, $start);
//        print_r($usuarios); exit;
        $data = array();

        foreach ($usuarios as $usuario) {
            $usuario['botones'] = '<center>';
            if($permiso['editar']==1){
                $usuario['botones'] .= '<a href="javascript: Exeperu.editUsuario(' . $usuario['iduser'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
                $usuario['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delUsuario(' . $usuario['iduser'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $usuario['botones'] .= '</center>';

            $data[] = $usuario;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->musuarios->getTotal(),
            'recordsFiltered' => $this->musuarios->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idusuario=$this->input->post('id');
        $this->musuarios->deleteperfiljm($idusuario);
        $this->musuarios->deleteusuario($idusuario);
    }

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
