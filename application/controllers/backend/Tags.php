<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mtags');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        $user=$this->manager['user']['idperfil'];
        $idmodulo=7;
        
        $data = array();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        

        $output = $this->load->view('backend/tags', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $idtag = $this->input->post('id', TRUE);

        $data = array(
            'tag' => $this->mtags->getTag($idtag)
        );
//        print_r($data); exit;
        $output = $this->load->view('backend/popups/edit_tag', $data, TRUE);

        return $this->__output($output);
    }
    
    public function save(){
        $post=$this->input->post();
         
        if(empty($post['tags']['nombre'])){
            $errores[]="nombre";
        }
        
        if(empty($post['tags']['orden'])){
            $errores[]="orden";
        }
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores));
        }else{
            if((int)$post['tags']['idtag']>0){
                $this->mtags->updatetag($post);
                $mensaje=array("mensaje"=>"Tag editado correctamente","tipo"=>1);
            }else{
                $this->mtags->savetag($post);
                $mensaje=array("mensaje"=>"Tag registrado correctamente","tipo"=>1);
            }
        }
        
        echo json_encode($mensaje);
        
    }
    

    public function read() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);
        
        $user=$this->manager['user']['idperfil'];
        $idmodulo=7;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $tags = $this->mtags->getTags($search['value'], $length, $start);
        
        $data = array();

        foreach ($tags as $tag) {
            $tag['botones'] = '<center>';
            if($permiso['editar']==1){
            $tag['botones'] .= '<a href="javascript: Exeperu.editTag(' . $tag['idtag'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
            $tag['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delTag(' . $tag['idtag'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $tag['botones'] .= '</center>';

            $data[] = $tag;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mtags->getTotal(),
            'recordsFiltered' => $this->mtags->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idtag=$this->input->post('id');
        $this->mtags->deletetag($idtag);
    }

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
