<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        
        $user=$this->manager['user']['idperfil'];
        $idmodulo=1;
        
        $data = array();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        //$data['cantidad_blogs']=$this->sistema->totalblogsjm();
        //$data['cantidad_autores']=$this->sistema->totalautoresjm();
//        print_r($data); exit;
        $output = $this->load->view('backend/dashboard', $data, TRUE);
        //print_r($output); exit;
        return $this->__output($output);
    }
    
   

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
