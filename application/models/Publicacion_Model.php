<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Publicacion_Model extends Base_Model
{
    private $table_name = "publicaciones";
    public function __construct()
    {
        parent::__construct();
    }
    
    public function toList(){
        $this->db->select("p.id,o.ciudad as origen, d.ciudad as destino,f.placa as bus,p.fecha_salida,p.precio, p.estado");
        $this->db->from("publicaciones p");
        $this->db->join("lugar o","o.id=p.origen");
        $this->db->join("lugar d","d.id=p.destino");
        $this->db->join("flota f", "f.id=p.bus");
        $this->db->order_by("fecha_salida","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }       
}