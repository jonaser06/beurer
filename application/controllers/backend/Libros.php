<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Libros extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mlibros');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        $user=$this->manager['user']['idperfil'];
        $idmodulo=9;
        
        $data = array();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        

        $output = $this->load->view('backend/libros', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $idlibro = $this->input->post('id', TRUE);

        $data = array(
            'libro' => $this->mlibros->getLibro($idlibro),
        );
//        print_r($data['blog_tags']); exit;
        $output = $this->load->view('backend/popups/edit_libro', $data, TRUE);

        return $this->__output($output);
    }

    
    public function save(){
        $post=$this->input->post();
//        print_r($post); exit;
        $jm=array();

        if(empty($post['libros']['titulo'])){
            $errores[]="titulo";
        }else{
            $jm[]="titulo";
        }
        
        if(empty($post['libros']['autor'])){
            $errores[]="autor";
        }else{
            $jm[]="autor";
        }
        
        if(empty($post['libros']['imagen'])){
            $errores[]="campo_14jm";
        }else{
            $jm[]="campo_14jm";
        }
 
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
        }else{
            if((int)$post['libros']['idlibro']>0){
//                $this->mlibros->updateblog($post);
                $idlibro=$post['libros']['idlibro'];
                $post['sitemap']['url']=clearString($post['libros']['titulo'])."-lib-".$idlibro;
//                print_r(clearString($post['blogs']['titulo'])."-".$idlibro); exit;
                $this->mlibros->updatesitemap($post);
                $this->mlibros->updatelibro($post);
                $mensaje=array("mensaje"=>"Libro editado correctamente","tipo"=>1);
            }else{
                $idsitemap=$this->mlibros->savesitemap($post);
                $post['libros']['idsitemap']=$idsitemap;
                $idlibro=$this->mlibros->savelibro($post);
                $postjm['sitemap']['url']= clearString($post['libros']['titulo'])."-lib-".$idlibro;
                $postjm['sitemap']['idsitemap']=$idsitemap;
                $this->mlibros->updatesitemap($postjm);
                $mensaje=array("mensaje"=>"Libro registrado correctamente","tipo"=>1);
            }
        }

        echo json_encode($mensaje);
    }
    
    public function listalibros(){
        $res=$this->mlibros->listalibros();
        echo json_encode($res);
    }
    
    public function libronom(){
        $idlibro=$this->input->post('idlibro');
        $libro=$this->mlibros->getLibro($idlibro);
//        print_r($libro); exit;
        echo $libro['titulo'];
    }
    

    public function read() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);
        
        $user=$this->manager['user']['idperfil'];
        $idmodulo=9;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $libros = $this->mlibros->getLibros($search['value'], $length, $start);
        
        $data = array();

        foreach ($libros as $libro) {
            $libro['botones'] = '<center>';
            if($permiso['editar']==1){
                $libro['botones'] .= '<a href="javascript: Exeperu.editLibro(' . $libro['idlibro'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
                $libro['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delLibro(' . $libro['idlibro'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $libro['botones'] .= '</center>';

            $data[] = $libro;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mlibros->getTotal(),
            'recordsFiltered' => $this->mlibros->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idlibro=$this->input->post('id');
        $libro=$this->mlibros->getLibro($idlibro);
        $this->mlibros->deletesitemap($libro['idsitemap']);
        $this->mlibros->deletelibro($idlibro);
        
    }

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
