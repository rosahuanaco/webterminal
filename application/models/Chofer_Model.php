<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Chofer_Model extends Base_Model
{
    private $table_name = "chofer";
    public function __construct()
    {
        parent::__construct();
    }
    
    public function toList(){
        $this->db->select("c.id, CONCAT(c.nombres,' ',c.apellido_paterno,' ',c.apellido_materno) as nombre_completo,c.ci,c.telefono,c.licencia");
        $this->db->from("chofer c");
        $this->db->order_by("c.apellido_paterno", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

}