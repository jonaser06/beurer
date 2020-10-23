<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mnoticias');
        $this->load->model('backend/mvideos');
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
        $idmodulo=3;
        $data = array(           
            'pags'=>$this->sistema->getPaginas(),   
        );
        
		$key = null;
        foreach ($data['pags'] as $key => $pag0) {            
            $hijos = $this->sistema->getHijos($pag0['idpagina']);
            if ($hijos) {
                $data['pags'][$key]['hijos'] = $hijos;              
            }
        }
		
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        
        $output = $this->load->view('backend/videos', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $idvideo = $this->input->post('id', TRUE);

        $data = array(
            'video' => $this->mvideos->getVideo($idvideo),
			'categorias'=>$this->mvideos->getCategorias()
        );
        //print_r($data['categorias']);
        //$anuncios_autores = $this->mautores->getAnunciosAutores($data['noticia']['idnoticia']);
        //$data['anuncios_autores'] = json_encode($anuncios_autores);
//        print_r($anuncios_blogs); exit;
//        print_r($data['blog_tags']); exit;
        //$dimensiones = $this->mautores->getDimensiones();
        //$data['dimensiones']=json_encode($dimensiones);
        $output = $this->load->view('backend/popups/edit_video', $data, TRUE);

        return $this->__output($output);
    }
    
    public function save(){
		//$fecha=(new DateTime())->format('Y-m-d H:i:s');		
        $post=$this->input->post();
        $jm=array();
        if(empty($post['video']['titulo'])){
            $errores[]="titulo";
        }else{
            $jm[]="titulo";
        }
        
        if(isset($errores) && !empty($errores)){
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
        }else{
            if((int)$post['video']['idvideo']>0){
                $this->mvideos->updateVideo($post);
                $mensaje=array("mensaje"=>"Video editado correctamente","tipo"=>1);
            }else{
                $this->mvideos->saveVideo($post);
                $mensaje=array("mensaje"=>"Video registrado correctamente","tipo"=>1);
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
        $idmodulo=3;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $videos = $this->mvideos->getVideos($search['value'], $length, $start);
        
        $data = array();

        foreach ($videos as $video) {
            $video['botones'] = '<center>';
            if($permiso['editar']==1){
            $video['botones'] .= '<a href="javascript: Exeperu.editVideo(' . $video['idvideo'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
            $video['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delVideo(' . $video['idvideo'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $video['botones'] .= '</center>';

            $data[] = $video;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mvideos->getTotal(),
            'recordsFiltered' => $this->mvideos->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idvideo=$this->input->post('id');

        $this->mvideos->deletevideo($idvideo);
   
    }
	
	/**********TIPO CATEGORIA*********/
	
    public function editcategoria() {
        $idcategoria_video = $this->input->post('id', TRUE);

        $data = array(
            'categoria' => $this->mvideos->getCategoria($idcategoria_video)
        );
        
//        print_r($data['tipo']); exit;
//        exit();
        $output = $this->load->view('backend/popups/edit_categoria', $data, TRUE);

        return $this->__output($output);
    }
	
	public function savecategoria(){
		$post=$this->input->post();
		//print_r($post);exit;
        $jm=array();
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
	
	public function readcategoria() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);


        $categorias = $this->mvideos->getCategoriasread($search['value'], $length, $start);
        $data = array();

        foreach ($categorias as $categoria) {
            $categoria['botones'] = '<center>';
            $categoria['botones'] .= '<a href="javascript: Exeperu.editCategoria(' . $categoria['idcategoria_video'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            $categoria['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delCategoria(' . $categoria['idcategoria_video'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            $categoria['botones'] .= '</center>';

            $data[] = $categoria;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mvideos->getTotalcategorias(),
            'recordsFiltered' => $this->mvideos->getTotalcategorias($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    } 
	
	public function deletecategoria(){
        $idcategoria_video=$this->input->post('id');
        $this->mvideos->deletecategoria($idcategoria_video);
    }
    
	
    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
