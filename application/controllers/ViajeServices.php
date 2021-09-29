<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

class ViajeServices extends REST_Controller
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
        
        $this->load->model('Viaje_Model', 'Viaje');
        $this->load->library("form_validation");
    }
    /**
     * Cliente Lista Las publicaciones de la fecha y hora actual en adelante
     * **/
    public function listar_post(){
        $origen = $this->post("origen");
        $destino = $this->post("destino");
        $fecha = $this->post("fecha");
        $pasajeros = $this->post("cantidad");
        $data = array(
            "origen"=>$origen,
            "destino"=>$destino,
            "fecha_salida"=>implode ( "-", array_reverse ( explode ( "/", $fecha ) ) ),
            "pasajeros"=>$pasajeros
        );
        
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules("origen", "Origen","required");
        $this->form_validation->set_rules("destino", "Destino","required");
        $this->form_validation->set_rules("fecha_salida", "Fecha Salida",'required|callback_validar_fecha');
        $this->form_validation->set_rules("pasajeros", "Cantidad pasajeros","required|numeric");        
        
        $response = array("status"=>false,"response"=>array(),"message"=>"No se encontro resultados para esta consulta.");
        if($this->form_validation->run() == true){
            $viajes = $this->Viaje->listar($origen,$destino,$data["fecha_salida"]);
            if($viajes){
                $viajes_filtrado = array();
                foreach($viajes as $viaje){
                    if($viaje->asientos >= $pasajeros){
                        $viajes_filtrado[] = $viaje;
                    }
                }
                if(count($viajes_filtrado) > 0){
                    $response["status"] = true;
                    $response["response"] = $viajes_filtrado;
                }
            }
        }else{
            $response["message"] = $this->form_validation->error_array();
        }
               
        $this->response($response, REST_Controller::HTTP_OK);        
    }
    public function validar_fecha($fecha){
        $fechab = date("Y-m-d 00:00:00",strtotime($fecha));
        return $fechab >= date("Y-m-d 00:00:00");
    }

    public function obtenerAsientos_get(){
        $viaje_id = $this->get("viaje_id");
        $res = array("status"=>false,"bus"=>"","response"=>"No se encontro resultado para esta consulta","message"=>"No se encontro resultado para esta consulta");
        if($viaje_id > 0){
            $asientos = $this->Viaje->obtenerAsientos($viaje_id);
            if(is_array($asientos)){
                $res["bus"] = $this->Viaje->obtener("bus",array("id"=>$asientos[0]->bus));
                $res["response"] = $this->indexarAsientos($asientos, $this->indexarAsientosReservados($this->Viaje->obtenerAsientosReservados($viaje_id)));
                $res["status"] = true;
                $res["message"] = "";
            }
        }
        
        $this->response($res, REST_Controller::HTTP_OK);
    }

    private function indexarAsientosReservados($reservados){
        $resp = array();
        if(is_array($reservados)){
            foreach ($reservados as $r){
                $resp[$r->asiento] = $r;
            }
        }
        return $resp;
    }
    
    private function indexarAsientos($asientos,$reservados){
        $res = array();
        foreach ($asientos as $asiento){
            if(is_array($reservados) && isset($reservados[$asiento->id])){
                $asiento->reserva_id = $reservados[$asiento->id]->reserva_id;
                $asiento->pasajero = $reservados[$asiento->id]->pasajero;
                $asiento->nombre_pasajero = $reservados[$asiento->id]->nombre_pasajero;
                $asiento->ci = $reservados[$asiento->id]->ci;
            }else{
                $asiento->reserva_id = NULL;
                $asiento->pasajero = NULL;
                $asiento->nombre_pasajero = NULL;
                $asiento->ci = NULL;
            }

            $res[] = $asiento;

        }
        
        return $res;
    }
}
?>