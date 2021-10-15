<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

class VentaServices extends REST_Controller
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
        
        $this->load->model('Venta_Model', 'Venta');
        $this->load->library("form_validation");
    }

    public function index_post(){
        $response = array("status"=>false,"response"=>"No se pudo procesar el servicio","message"=>"No se pudo procesar el servicio");
        $this->Venta->db->trans_begin();
        try {
            $venta = $this->post("venta");
            $venta_detalle = $this->post("venta_detalle");        
            $venta["pasajero"] = $this->user->id;
            $venta["estado"] = "Reservada";
            $venta["fecha"] = date("Y-m-d H:i:s");
            $venta["nit_ci"] = $venta["nit"];
            $venta["total"] = 80;
            unset($venta["nit"]);            
            $ventaId = $this->Venta->guardar("venta",$venta);
            if($ventaId){
                $datos = array();
                $isValid = true;
                $response["message"] = "Los numeros de asientos ya se encuentran reservado ";
                foreach($venta_detalle as $vd){
                    $a = $this->Venta->obtenerAsiento($venta['viaje'],$vd['asiento']);
                    if(is_object($a)){                        
                        $isValid = $isValid && false;
                        $response["message"] = $response["message"]." ".$a->numero.",";
                    }else{
                        $isValid = $isValid && true;
                        $vd["venta"]=$ventaId;
                        $vd["apellidos"]=$vd["apellido"];
                        unset($vd["apellido"]);
                        $datos[] = $vd;
                    }
                }
                if($isValid){
                    if($this->Venta->guardarMuchos("venta_detalle",$datos)){
                        $this->Sale->db->trans_commit();
                        $response["response"] = "Se registro con exito";
                        $response["status"] = true;
                        $response["message"] = "Se registro con exito";
                    }else{
                        $this->Sale->db->trans_rollback();
                    }
                }else{
                    $this->Sale->db->trans_rollback();                    
                }
                
            }    
        } catch (Exception $e) {
            $this->Sale->db->trans_rollback();
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
}
?>