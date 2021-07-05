<?php

class Base_Model extends CI_Model {
	public function __construct() {
		parent::__construct ();
	}

	public function guardar($tabla, $datos) {
		if ($this->db->insert ( $tabla, $datos )) {
			return $this->db->insert_id ();
		}
		return false;
	}
	public function modificar($tabla, $datos, $condicion) {
		return $this->db->update ( $tabla, $datos, $condicion );
	}

	public function saveMany($tabla, $datos){
	    if ($this->db->insert_batch($tabla, $datos )) {
	        return $this->db->insert_id ();
	    }
	    return false;
	}

	public function obtener($tabla, $condicion = false, $unico = true) {
	    if($condicion){
	        $this->db->where ( $condicion );
	    }
		$res = $this->db->get ( $tabla );
		if (is_object ( $res )) {
			$res = $res->result ();
			if (is_array ( $res ) && count ( $res ) > 0) {
				if (count ( $res ) >= 1 && $unico)
					return $res [0];
				return $res;
			}
		}
		return false;
	}

	public function eliminar($tabla,$id){
		$this->db->where('id', $id);
    	return $this->db->delete($tabla);
	}
}

?>