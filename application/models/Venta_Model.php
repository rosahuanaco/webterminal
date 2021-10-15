<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Venta_Model extends Base_Model
{
    private $table_name = "venta";
    public function __construct()
    {
        parent::__construct();
    }

    public function listar(){
        $this->db->select("v.id, concat(u.nombre,' ',u.apellido_paterno,' ',u.apellido_materno) pasajero,v.nombre,v.nit_ci, concat(o.nombre,'-',d.nombre) viaje, v.fecha, v.total,v.estado");
        $this->db->from("venta v");
        $this->db->join("usuario u","u.id=v.pasajero");
        $this->db->join("viaje vi","vi.id=v.viaje");
        $this->db->join("departamento o","o.id=vi.origen");
        $this->db->join("departamento d","d.id=vi.destino");
        $this->db->where('v.estado','Reservada');
        //$this->db->join("bus b "," b.id=v.bus");
        //$this->db->order_by("fecha_salida","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function obtenerAsiento($viaje_id,$asiento_id){
        $this->db->select("v.id, a.numero");
        $this->db->from("venta v");
        $this->db->join("venta_detalle vd","vd.venta=v.id");
        $this->db->join("asiento a","a.id=vd.asiento");
        $this->db->where('v.viaje',$viaje_id);
        $this->db->where('vd.asiento',$asiento_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $res = $query->result();
			if (is_array ( $res ) && count ( $res ) > 0) {
				return $res [0];
			}
        }
        return false;
    }
    
}