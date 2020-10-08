<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();
    }

    public function index(){
        $resp = [
            'status'  => false,
            'code'    => 404,
            'message' => '',
        ];
        


        $this->output
             ->set_content_type('application/json')
             ->set_status_header(200)
             ->set_output(json_encode($resp));
    }

    public function getprovincia(){
        $file = file_get_contents('assets/js/ubigeo.min.js');
        $this->output
             ->set_content_type('application/json')
             ->set_status_header(200)
             ->set_output($file);
    }

}