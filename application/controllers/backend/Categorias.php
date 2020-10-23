<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends MY_Controller {

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
        $user = $this->manager['user']['idperfil']; 
        $data['pags'] = $this->sistema->getPaginas();
        $data['mods'] = $this->sistema->getModulos($user);
        $key = null;
        foreach ($data['pags'] as $key => $pag0) {            
            $hijos = $this->sistema->getHijos($pag0['idpagina']);
            if ($hijos) {
                $data['pags'][$key]['hijos'] = $hijos;              
            }
        }
        foreach( $data['mods'] as $modu){
            $modulosjm[]=$modu['idmodulo'];
        }

        $data['modulosjm'] = isset( $modulosjm ) ? $modulosjm : [] ;
        $output = $this->load->view('backend/categorias', $data, TRUE);
        return $this->__output($output);
    }

    public function readCat(){

        $categories = $this->mcategorias->getAll();
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output( json_encode( ['data'=> $categories ] ));
                    
    }
    public function savecategoria(){
		$post = $this->input->post();
		print_r($post);exit;
        $jm = array();
        if(empty($post['categoria']['nombre'])){
            $errores[]="nombre";
        }else{
            $jm[]="nombre";
        }
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
        }else{
            if((int)$post['categoria']['idcategoria_video']>0){
                $this->mvideos->updateCategoria($post);
                $mensaje=array("mensaje"=>"Categoría editada correctamente","tipo"=>1);
            }else{
                $this->mvideos->saveCategoria($post);
                $mensaje=array("mensaje"=>"Categoría registrada correctamente","tipo"=>1);
            }
        }     
        echo json_encode($mensaje);      
  
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
    
        if(empty($post['categoria']['nombre'])){
            $errores[]="nombre";
        }else{
            $jm[]="nombre";
        }
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
        }else{
            if( (int) $post['categoria']['idsitemap'] > 0) {

                $data = [
                    'pagetitle' => $post['categoria']['nombre'],
                    'url'       => $this->generateUrl($post['categoria']['nombre'])
                ];
                $respuesta = $this->dbUpdate($data , 'sitemap' , ['idsitemap' =>(int)$post['categoria']['idsitemap']]);
                if($respuesta) {
                    $pagina['categorias'] = [
                        'pagina' => $post['categoria']['nombre'],
                        'estado' => $post['categoria']['estado'],
                        'color' => $post['categoria']['color']
                    ];
                    $categoriaDB = $this->mcategorias->oneCategoria([ 'idsitemap' => (int)$post['categoria']['idsitemap'] ]);
                    
                    $this->mcategorias->updatecategoria( $pagina , $categoriaDB['idpagina']);
                    $mensaje=array("mensaje"=>"Categoría editada correctamente","tipo"=> 1);
                }else {
                    $mensaje=array("mensaje"=>"Ocurrio algún error ","tipo"=> 2);
                }
               
            }else{
                $data = [
                    'pagetitle' => $post['categoria']['nombre'],
                    'url'       => $this->generateUrl($post['categoria']['nombre'])
                ];
                $id_sitemap = $this->mcategorias->insertSitemap($data);
                
                $pagina['categorias'] = [
                    'pagina' => $post['categoria']['nombre'],
                    'header' => 1 ,
                    'footer' => 1 ,
                    'color' => $post['categoria']['color'] ,
                    'estado' => $post['categoria']['estado'],
                    'idparent' => 2,
                    'idmodulo' => 1,
                    'idsitemap' => $id_sitemap  
                ];
                $this->mcategorias->savecategoria($pagina);

                $mensaje = [
                    "mensaje"=>"Categoría registrada correctamente",
                    "tipo" => 1 
                ];
            }
        }     
        echo json_encode($mensaje);      
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

    public function read() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);
        
        $user=$this->manager['user']['idperfil'];
        $idmodulo = 8;
        
        $permiso = $this->sistema->getPermisos($user,$idmodulo);
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
        $this->output->set_output($html);
    }


    

    

    

    

}
