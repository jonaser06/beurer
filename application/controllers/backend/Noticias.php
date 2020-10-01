<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mnoticias');
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
        $idmodulo=2;
        
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
        
        $output = $this->load->view('backend/noticias', $data, TRUE);

        return $this->__output($output);
    }

    
    public function edit() {
        $idnoticia = $this->input->post('id', TRUE);
		
        $data = array(
            'noticia' => $this->mnoticias->getNoticia($idnoticia)
			
        );
        //print_r($data['noticia']);
        //$anuncios_autores = $this->mautores->getAnunciosAutores($data['noticia']['idnoticia']);
        //$data['anuncios_autores'] = json_encode($anuncios_autores);
//        print_r($anuncios_blogs); exit;
//        print_r($data['blog_tags']); exit;
        //$dimensiones = $this->mautores->getDimensiones();
        //$data['dimensiones']=json_encode($dimensiones);
        $output = $this->load->view('backend/popups/edit_noticia', $data, TRUE);

        return $this->__output($output);
    }
    
    public function save(){
		
		$fecha=(new DateTime())->format('Y-m-d H:i:s');
        $post=$this->input->post();
		//print_r($post);
        $jm=array();
        if(empty($post['noticia']['titulo'])){
            $errores[]="titulo";
        }else{
            $jm[]="titulo";
        }
     
		if(isset($post['fecha']['fecha']) && !empty($post['fecha']['fecha'])){
            $fecin=str_replace("/","-",$post['fecha']['fecha']);
            $fecha=(new DateTime($fecin,new DateTimeZone('America/New_York')))->format('Y-m-d H:i:s');
        }
        $post['noticia']['fecha']=$fecha;
		
        if(isset($errores) && !empty($errores)){ 
            $mensaje=array("mensaje"=>"Faltan registrar datos importantes","tipo"=>2,"errores"=>json_encode($errores),"jm"=>json_encode($jm));
        }else{
            if((int)$post['noticia']['idnoticia']>0){
				$this->mnoticias->updatesitemap($post);                
                $this->mnoticias->updateNoticia($post);
                $mensaje=array("mensaje"=>"Noticia editado correctamente","tipo"=>1);
            }else{
				$post['noticia']['fecha']=(new DateTime())->format('Y-m-d H:i:s');			
                $this->mnoticias->savenoticia($post);
				$idsitemap=$this->mnoticias->savesitemap($post);  
				$post['noticias']['idsitemap']=$idsitemap;
                $mensaje=array("mensaje"=>"Noticia registrado correctamente","tipo"=>1);
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
        $idmodulo=2;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $noticias = $this->mnoticias->getNoticias($search['value'], $length, $start);
        
        $data = array();

        foreach ($noticias as $noticia) {
            $noticia['botones'] = '<center>';
            if($permiso['editar']==1){
            $noticia['botones'] .= '<a href="javascript: Exeperu.editNoticia(' . $noticia['idnoticia'] . ');" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
            }
            if($permiso['eliminar']==1){
            $noticia['botones'] .= '&nbsp;&nbsp; | &nbsp;&nbsp;<a href="javascript: Exeperu.delNoticia(' . $noticia['idnoticia'] . ');" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i></a>';
            }
            $noticia['botones'] .= '</center>';

            $data[] = $noticia;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mnoticias->getTotal(),
            'recordsFiltered' => $this->mnoticias->getTotal($search['value']),
            'data' => $data
        );

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
  
    public function delete(){
        $idnoticia=$this->input->post('id');

        $this->mnoticias->deletenoticia($idnoticia);
   
    }

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
