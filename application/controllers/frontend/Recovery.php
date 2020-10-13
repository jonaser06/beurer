<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recovery extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();
    }

    public function index(){

        $output = $this->load->view("mail/recovery.php", "", TRUE);

        echo $output;
    }
}