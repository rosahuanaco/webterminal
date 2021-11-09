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
        $this->db->select("v.id, u.nombre,u.apellido_paterno,u.apellido_materno,v.nombre razon_social,v.nit_ci, concat(o.nombre,'-',d.nombre) viaje, v.fecha_reserva, v.total,v.estado");
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

    public function obtenerDetalle($venta_id){
        $this->db->select("vd.nombre,vd.apellido_paterno,vd.apellido_materno,vd.ci, a.numero,vd.precio");
        $this->db->from("venta_detalle vd");
        $this->db->join("asiento a","a.id=vd.asiento");
        $this->db->where('vd.venta',$venta_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function obtenerViaje($venta_id){
        $this->db->select("b.placa,d.nombre destino,vi.fecha_salida");
        $this->db->from("venta v");
        $this->db->join("viaje vi","vi.id=v.viaje");
        $this->db->join("bus b","b.id=vi.bus");
        $this->db->join("departamento d","d.id=vi.destino");
        $this->db->where('v.id',$venta_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $res = $query->result();
			if (is_array ( $res ) && count ( $res ) > 0) {
				return $res [0];
			}
        }
        return false;
    }

    public function obtenerVentaDetalle($venta_id){
        $this->db->select("vd.nombre,vd.apellido_paterno,vd.apellido_materno, a.numero, vd.precio");
        $this->db->from("venta_detalle vd");
        $this->db->join("asiento a","a.id=vd.asiento");
        $this->db->where('vd.venta',$venta_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function reportes($where){

        $resp = false;
	    $sql = "select v.id, concat(u.nombre,' ',u.apellido_paterno,' ',u.apellido_materno) pasajero,v.nombre,v.nit_ci, concat(o.nombre,'-',d.nombre) viaje, v.fecha, v.total,v.estado";
        $sql = $sql." from venta v inner join usuario u on u.id=v.pasajero inner join viaje vi on vi.id=v.viaje inner join departamento o on o.id=vi.origen inner join departamento d on d.id=vi.destino";
        $sql = $sql." where ".$where;
	    $query = $this->db->query($sql);
	    $res = is_object($query)?$query->result():false;
	    if(is_array($res) && count($res) > 0){
	        $resp = $res;
	    }
	    
	    return $resp;
    }
    
}