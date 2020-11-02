<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mcontenido');
        $this->load->model('backend/mblogs');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }
    
    public function index(){
        if(!$this->input->get('page')) header('location:'.URL_BASE.'manager/reclamos?page=1');
        $user=$this->manager['user']['idperfil'];
        $idmodulo=4;
        
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
        $data['mods']=$this->sistema->getModulos($user);

        $output = $this->load->view('backend/reclamos', $data, TRUE);

        return $this->__output($output);
    }
    
    private function __output($html = NULL) {
        $this->output->set_output($html);
    }
}