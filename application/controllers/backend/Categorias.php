<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mcategorias');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        $user=$this->manager['user']['idperfil'];
        $idmodulo=8;
        
        $data = array();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        
        $output = $this->load->view('backend/categorias', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $idcategoria = $this->input->post('id', TRUE);

        $data = array(
            'categoria' => $this->mcategorias->getCategoria($idcategoria),
            'paginas'=>$this->mcategorias->getPaginas()
        );
        $output = $this->load->view('backend/popups/edit_categoria', $data, TRUE);

        return $this->__output($output);
    }
    
    public function categorianom(){
        $idcategoria=$this->input->post('idcategoria');
        $categoria=$this->mcategorias->getCategoria($idcategoria);
//        print_r($libro); exit;
        echo $categoria['categoria'];
    }
    
    public function save(){
        $post=$this->input->post();
        $jm=array();
        if(empty($post['categorias']['apellidos'])){
            $errores[]="apellidos";
        }else{
            $jm[]="apellidos";
        }
        
        if(empty($post['categorias']['nombres'])){
            $errores[]="nombres";
        }else{
            $jm[]="nombres";
        }
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
        }else{
            if((int)$post['categorias']['idcategoria']>0){
                $this->mcategorias->updateautor($post);
                $mensaje=array("mensaje"=>"Autor editado correctamente","tipo"=>1);
            }else{
                $this->mcategorias->saveautor($post);
                $mensaje=array("mensaje"=>"Autor registrado correctamente","tipo"=>1);
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
        $idmodulo=8;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $categorias = $this->mcategorias->getcategorias($search['value'], $length, $start);
        
        $data = array();

        foreach ($categorias as $categoria) {
            $categoria['botones'] = '<center>';
            if($permiso['editar']==1){
            $categoria['botones'] .= '<a href="javascript: Exeperu.editCategoria(' . $categoria['idcategoria'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
            $categoria['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delCategoria(' . $categoria['idcategoria'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $categoria['botones'] .= '</center>';

            $data[] = $categoria;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mcategorias->getTotal(),
            'recordsFiltered' => $this->mcategorias->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idcategoria=$this->input->post('id');
        $this->mcategorias->deleteautor($idcategoria);
    }

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }


    

    

    

    

}
