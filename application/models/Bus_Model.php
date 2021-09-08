<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Bus_Model extends Base_Model
{
    private $table_name = "bus";
    public function __construct()
    {
        parent::__construct();
    }
    
    public function toList(){
        $this->db->select("b.id,b.placa,b.tipo,b.comodidad,b.filas,b.columnas,b.piso,b.estado,b.imagen");
        $this->db->from("bus b");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function obtenerAsiento($idBus,$piso=1){
        $this->db->select("a.*");
        $this->db->from("asiento a");
        $this->db->where("a.bus",$idBus);
        $this->db->where("a.piso",$piso);
        $this->db->order_by("numero", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function obtenerReservas($idBus){
        $this->db->select("v.*");
        $this->db->from("asiento a");
        $this->db->join('venta_detalle v','v.asiento=a.id');
        $this->db->where("a.bus",$idBus);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
        
    }
    public function eliminarAsientos($idBus){
        $this->db->where('bus', $idBus);
    	return $this->db->delete("asiento");
    }


}