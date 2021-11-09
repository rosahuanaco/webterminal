<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Usuario_Model extends Base_Model
{
    private $table_name = "usuario";
    public function __construct()
    {
        parent::__construct();
    }
    
    public function validar($login, $password)
    {
        $this->db->select('u.id,u.email,p.nombre as privilegio ,u.nombre,u.apellido_paterno,u.apellido_materno, u.telefono');
        $this->db->from('usuario u');
        $this->db->join('privilegio p','p.id=u.privilegio');
        $this->db->where('email',$login);
        $this->db->where('password',$password);
        $res = $this->db->get();
        if (is_object ( $res )) {
			$res = $res->result ();
			if (is_array ( $res ) && count ( $res ) > 0) {
					return $res [0];
			}
		}

        return false;
    }

    public function toList(){
        $this->db->select("u.id,u.nombre,u.apellido_paterno,u.apellido_materno , u.email, u.ci, u.estado ");
        $this->db->from("usuario u");

        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
      }

    public function obtenerPasajero($login, $password)
    {
        $this->db->select('u.id,u.email,u.nombre,u.ci,k.key as apiKey, u.telefono,u.direcciones');
        $this->db->from('usuario u');
        $this->db->join('privilegio p','p.id=u.privilegio');
        $this->db->join('keys k','k.usuario=u.id');
        $this->db->where('email',$login);
        $this->db->where('password',$password);
        $this->db->where('p.nombre','Pasajero');
        $res = $this->db->get();
        if (is_object ( $res )) {
			$res = $res->result ();
			if (is_array ( $res ) && count ( $res ) > 0) {
					return $res [0];
			}
		}
		return false;
    } 

}