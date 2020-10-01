<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autores extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mautores');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        $user=$this->manager['user']['idperfil'];
//        print_r($user); exit;
        $idmodulo=5;
        
        $data = array();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        
        $output = $this->load->view('backend/autores', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $idautor = $this->input->post('id', TRUE);

        $data = array(
            'autor' => $this->mautores->getAutor($idautor)
        );
        
        $anuncios_autores = $this->mautores->getAnunciosAutores($data['autor']['idautor']);
        $data['anuncios_autores'] = json_encode($anuncios_autores);
//        print_r($anuncios_blogs); exit;
//        print_r($data['blog_tags']); exit;
        $dimensiones = $this->mautores->getDimensiones();
        $data['dimensiones']=json_encode($dimensiones);
        $output = $this->load->view('backend/popups/edit_autor', $data, TRUE);

        return $this->__output($output);
    }
    
    public function save(){
        $post=$this->input->post();
        $jm=array();
        if(empty($post['autores']['apellidos'])){
            $errores[]="apellidos";
        }else{
            $jm[]="apellidos";
        }
        
        if(empty($post['autores']['nombres'])){
            $errores[]="nombres";
        }else{
            $jm[]="nombres";
        }
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
        }else{
            if((int)$post['autores']['idautor']>0){
                $this->mautores->updateautor($post);
                $mensaje=array("mensaje"=>"Autor editado correctamente","tipo"=>1);
            }else{
                $this->mautores->saveautor($post);
                $mensaje=array("mensaje"=>"Autor registrado correctamente","tipo"=>1);
            }
        }
        
        $pres = $post['anuncios_autores']['anuncios_autores'];
            
            if(isset($pres) && !empty($pres)){
                $dec = json_decode($pres,TRUE);
    //            print_r($dec); exit;
                $this->mautores->deleteanuncios($post['autores']['idautor']);
                foreach ($dec as $d) {
                    $postp['anuncios'] = array("idautor" => $post['autores']['idautor'],
                        "imagen" => $d['imagen'],
                        "url" => $d['url'],
                        "iddimension" => $d['iddimension'],
                        "orden" => $d['orden'],
                        "idcategoria"=>0,
                        "idblog"=>0,
                        "estado" => $d['estado']);
                    $this->mautores->guardaranuncios($postp);
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
        $idmodulo=5;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $autores = $this->mautores->getAutores($search['value'], $length, $start);
        
        $data = array();

        foreach ($autores as $autor) {
            $autor['botones'] = '<center>';
            if($permiso['editar']==1){
            $autor['botones'] .= '<a href="javascript: Exeperu.editAutor(' . $autor['idautor'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
            $autor['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delAutor(' . $autor['idautor'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $autor['botones'] .= '</center>';

            $data[] = $autor;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mautores->getTotal(),
            'recordsFiltered' => $this->mautores->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idautor=$this->input->post('id');
        $ver=$this->mautores->verificarautor($idautor);
//        print_r($ver); exit;
        if($ver>0){
            $mensaje=array("mensaje"=>"Este autor tiene artículos asignados","tipo"=>2);
            
        }else{
            $mensaje=array("mensaje"=>"Autor eliminado correctamente","tipo"=>1);
            $this->mautores->deleteautor($idautor);
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
