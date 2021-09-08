<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->validateSesion();
    }

    public function validateSesion(){
        if(!$this->session->userdata('email') && !$this->session->userdata('privilegio'))
        {
            redirect('login/','refresh');
        }
    }
			
}
