<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Viaje_Model extends Base_Model
{
    private $table_name = "viaje";
    public function __construct()
    {
        parent::__construct();
    }
    
    public function toList(){
        $this->db->select("v.id,concat(b.placa,'->',b.tipo) bus , d.nombre origen,dd.nombre as destino, v.fecha_salida , v.precio, v.estado");
        $this->db->from("viaje v");
        $this->db->join("departamento d","d.id=v.origen");
        $this->db->join("departamento dd","dd.id=v.destino");
        $this->db->join("bus b "," b.id=v.bus");
        $this->db->order_by("fecha_salida","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;


      //  select v.id,v.bus , v.origen as origen, v.destino as destino, v.fecha_salida as 'fecha y hora de salida', v.precio, v.estado from viaje v INNER JOIN departamento d ON d.id=v.origen INNER JOIN bus b ON b.id=v.bus order by fecha_salida DESC;//
    }
    
    public function listar($origen,$destino,$fecha){       
        $time = strtotime($fecha);
        $fechaDate = date('Y-m-d',$time);
        $hour = "00:00:00";
        if($fechaDate==date("Y-m-d")){
            $hour = date("H:i:s");
        }
        $this->db->select("v.id,o.nombre as origen, d.nombre as destino,b.placa as bus,v.fecha_salida,b.tipo,v.precio,count(a.id) as asientos,b.comodidad");
        $this->db->from("viaje v");
        $this->db->join("departamento o","o.id=v.origen");
        $this->db->join("departamento d","d.id=v.destino");
        $this->db->join("bus b", "b.id=v.bus");
        $this->db->join("asiento a","a.bus=b.id");
        $this->db->join("venta_detalle vd","vd.asiento=a.id","left");
        $this->db->where("v.fecha_salida >=",$fecha." ".$hour);
        $this->db->where("v.fecha_salida <=",$fecha." 23:59:59");
        $this->db->where("v.origen",$origen);
        $this->db->where("v.destino",$destino);
        $this->db->where("vd.id",NULL);
        $this->db->where("v.estado","Activo");
        $this->db->group_by("v.id");
        $this->db->order_by("v.fecha_salida","ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function obtenerAsientos($viaje_id){
        $this->db->select("a.id,a.bus,a.piso,a.fila,a.columna,a.numero");
        $this->db->from("viaje v");
        $this->db->join("asiento a","a.bus=v.bus");
        $this->db->where("v.id",$viaje_id);
        $this->db->order_by("a.piso","ASC");
        $this->db->order_by("a.numero","ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function obtenerAsientosReservados($viaje_id){
        $this->db->select("vd.asiento,ve.id reserva_id,ve.pasajero,vd.nombre,vd.ci");
        $this->db->from("viaje v");
        $this->db->join("venta ve","ve.viaje=v.id");
        $this->db->join("venta_detalle vd","vd.venta=ve.id");
        $this->db->where("v.id",$viaje_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
}