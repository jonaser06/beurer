<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('backend/sistema');
        $this->load->model('backend/mcontenido');

        if ($this->session->has_userdata('manager')) {
            $this->manager = $this->session->userdata('contenido');
        } else {
            redirect('manager');
        }
    }

    public function popupinputdata() {
        $data = array(
            'values' => $this->input->post(NULL, FALSE),
            'columnas' => json_decode($this->input->post('columnas', TRUE), TRUE)
        );
        
//        print_r($data); exit;

        unset($data['values']['botones']);
        unset($data['values']['columnas']);

        $output = $this->load->view('backend/inputs/_popupdata', $data, TRUE);

        return $this->__output($output);
    }

    private function __output($html = NULL) {
        if (ENVIRONMENT === 'production') {
            // $html = minifyHtml($html);
        }

        $this->output->set_output($html);
    }

}
