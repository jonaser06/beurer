<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfiles extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mperfiles');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        $user=$this->manager['user']['idperfil'];
        $idmodulo=2;
        
        $data = array();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        
        
        $output = $this->load->view('backend/perfiles', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $idperfil = $this->input->post('id', TRUE);

        $data = array(
            'perfil' => $this->mperfiles->getPerfil($idperfil),
            'modulos'=>$this->mperfiles->getModulos()
        );
        
        $modulosjm = $this->mperfiles->getModulosPerfil($idperfil);
        foreach($modulosjm as $moduljm){
            if($moduljm['ver']==1){
                $verjm[]=$moduljm['idmodulo'];
            }
            if($moduljm['editar']==1){
                $editarjm[]=$moduljm['idmodulo'];
            }
            if($moduljm['eliminar']==1){
                $eliminarjm[]=$moduljm['idmodulo'];
            }
        }
        $data['verjm']=[];
        $data['editarjm']=[];
        $data['eliminarjm']=[];
        if(isset($verjm) && !empty($verjm)){
            $data['verjm']=$verjm;
        }
        
        if(isset($editarjm) && !empty($editarjm)){
            $data['editarjm']=$editarjm;
        }
        
        if(isset($eliminarjm) && !empty($eliminarjm)){
            $data['eliminarjm']=$eliminarjm;
        }
//       print_r($verjm); exit;
        if (!empty($modulosjm)) {
            $modulosjm = array_column($modulosjm, 'idmodulo');
        }
        
        $data['cmodulos']=$modulosjm;

        $output = $this->load->view('backend/popups/edit_perfil', $data, TRUE);

        return $this->__output($output);
    }
    
    public function save(){
        $post=$this->input->post();

//        $modulos=$this->mperfiles->getModulos();
        if(empty($post['perfiles']['perfil'])){
            $errores[]="perfil";
        }
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores));
        }else{
            if((int)$post['perfiles']['idperfil']>0){
                $this->mperfiles->updateperfil($post);
                $idperfil=$post['perfiles']['idperfil'];
                $mensaje=array("mensaje"=>"Perfil editado correctamente","tipo"=>1);
            }else{
                $idperfil=$this->mperfiles->saveperfil($post);
                $mensaje=array("mensaje"=>"Perfil registrado correctamente","tipo"=>1);
            }

            if(isset($post['modulos']) && !empty($post['modulos']))
            {
                foreach($post['modulos'] as $jm=>$modulo){
                    $post['modulos'][$jm]['idperfil']=$idperfil;
                }

                $this->mperfiles->deleteperfilmodulos($idperfil);

                $modulosjm=$post['modulos'];

                foreach($modulosjm as $modjm){
                    $this->mperfiles->saveperfilmodulos($modjm);
                }   
            }
        }
        
        echo json_encode($mensaje);
        
    }
    

    public function read() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);
             
        $perfiles = $this->mperfiles->getPerfiles($search['value'], $length, $start);
        
        $user=$this->manager['user']['idperfil'];
        $idmodulo=2;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $data = array();

        foreach ($perfiles as $perfil) {
            $perfil['botones'] = '<center>';
            if($permiso['editar']==1){
                $perfil['botones'] .= '<a href="javascript: Exeperu.editPerfil(' . $perfil['idperfil'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
                $perfil['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delPerfil(' . $perfil['idperfil'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $perfil['botones'] .= '</center>';

            $data[] = $perfil;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mperfiles->getTotal(),
            'recordsFiltered' => $this->mperfiles->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idperfil=$this->input->post('id');
        $ver=$this->mperfiles->verificarperfil($idperfil);
//        print_r($ver); exit;
        if($ver>0){
            $mensaje=array("mensaje"=>"Este perfil tiene usuarios asignados","tipo"=>2);
            
        }else{
            $mensaje=array("mensaje"=>"Perfil eliminado correctamente","tipo"=>1);
            $this->mperfiles->deleteperfilmodulos($idperfil);
            $this->mperfiles->deleteperfil($idperfil);
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
