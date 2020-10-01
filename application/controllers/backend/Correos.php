<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Correos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mcorreos');
        $this->load->helper('general');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('manager');
        } else {
            redirect('manager');
        }
    }

    public function index() {
        $user=$this->manager['user']['idperfil'];
        $idmodulo=10;
        
        $data = array();
        $data['permiso']=$this->sistema->getPermisos($user,$idmodulo);
        $data['modulos']=$this->sistema->getModulos($user);
        
        $output = $this->load->view('backend/correos', $data, TRUE);

        return $this->__output($output);
    }


    public function read() {
        $draw = $this->input->post('draw', TRUE);
        $search = $this->input->post('search', TRUE);
        $start = (int) $this->input->post('start', TRUE);
        $length = (int) $this->input->post('length', TRUE);
        
        $tipo=$this->input->post('formulario');

        $correos = $this->mcorreos->getCorreos($search['value'], $length, $start,$tipo);
//        print_r($productos); exit;
        $data = array();

        foreach ($correos as $correo) {

            $data[] = $correo;
        }

        $dataObj = array(
            'draw' => $draw,
            'recordsTotal' => $this->mcorreos->getTotal(),
            'recordsFiltered' => $this->mcorreos->getTotal($search['value'],$tipo),
            'data' => $data
        );
//        print_r($data); exit;

        $this->output->set_content_type('application/json');

        return $this->__output(json_encode($dataObj));
    }
    
    public function exportar()
    {
        setlocale(LC_ALL, 'es_PE');
        $tipo=$this->input->get('tipo');
        $registros = $this->mcorreos->getCorreosexp($tipo);
//        print_r($registros); exit;
        

        $salida = '<table border="1">';
        $salida .= '<tr>';
        if($tipo==1){
            $salida .= '<td>NOMBRES Y APELLIDOS</td>';
        }else{
           $salida .= '<td>PERSONA DE CONTACTO</td>'; 
        }
        if($tipo==2){
            $salida .= '<td>EMPRESA</td>';
            $salida .= '<td>RUC</td>';
        }
        $salida .= '<td>E-MAIL</td>';
        $salida .= '<td>TELEFONO</td>';
        $salida .= '<td>MENSAJE</td>';
        $salida .= '<td>FECHA</td>';
        $salida .= '</tr>';

        foreach ($registros as $i => $registro) {

            $salida .= '<tr>';
            $salida .= '<td>' . utf8_decode($registro['persona']) . '</td>';
            if($tipo==2){
                $salida .= '<td>' . utf8_decode($registro['empresa']) . '</td>';
                $salida .= '<td>' . utf8_decode($registro['ruc']) . '</td>';
            }
            $salida .= '<td>' . utf8_decode($registro['email']) . '</td>';
            $salida .= '<td>' . utf8_decode($registro['telefono']) . '</td>';

            $salida .= '<td>' . utf8_decode($registro['mensaje']) . '</td>';
            $salida .= '<td>' . $registro['fecha'] . '</td>';
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
