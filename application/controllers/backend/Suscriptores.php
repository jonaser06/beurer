<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Suscriptores extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/msuscriptores');
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
        $idmodulo=4;
        
        $data = array();
        $user=$this->manager['user']['idperfil'];

        $data = array();

        $data['pags']=$this->sistema->getPaginas();

        $data['mods']=$this->sistema->getModulos($user);

        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);

        $output = $this->load->view('backend/suscriptores', $data, TRUE);

        return $this->__output($output);
    }


    public function read() {

        $user=$this->manager['user']['idperfil'];
        $idmodulo=4;
        
        $permiso=$this->sistema->getPermisos($user,$idmodulo);
        
        $suscriptores = $this->msuscriptores->getSuscriptores();
        $this->output->set_content_type('application/json')
                                ->set_output(json_encode(['data' => $suscriptores]));



    }
    
    public function exportarsus()
    {
        setlocale(LC_ALL, 'es_PE');
        $nom=$this->input->get('nom');
        $data = $this->msuscriptores->getSuscriptoresExcel($nom);
        $registros = array();

        foreach ($data as $contacto) {

            $registros[] = $contacto;
        }

        $salida = '<table border="1">';
        $salida .= '<tr>';
        $salida .= '<td>id</td>';
        $salida .= '<td>E-MAIL</td>';
        $salida .= '</tr>';

        foreach ($registros as $i => $registro) {
            $salida .= '<tr>';
            $salida .= '<td>' . utf8_decode($registro['id']) . '</td>';
            $salida .= '<td>' . utf8_decode($registro['email']) . '</td>';
            $salida .= '</tr>';
        }

        $salida .= '</table>';

        $this->output->set_header("Content-Disposition: attachment; filename=reporte_" . date('Y-m-d') . ".xls");
        $this->output->set_content_type('application/vnd.ms-excel');
        $this->output->set_output($salida);
    }
  
    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
