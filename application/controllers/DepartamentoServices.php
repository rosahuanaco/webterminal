<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

class DepartamentoServices extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods: GET, POST, PUT,DELETE, OPTIONS");
                if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
                    exit(0);
        }
        $this->load->model('Lugar_Model', 'Departamento');
        $this->load->library("form_validation");
    }
    
    
    public function listar_get(){
        $lugares = $this->Departamento->obtener("departamento",false,false);
        $this->response(array("status"=>true,"response"=>$lugares,"messages"=>""), REST_Controller::HTTP_OK);
    }
}