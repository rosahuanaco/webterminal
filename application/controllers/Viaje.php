<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Controller.php');

class Viaje extends Controller {

	public function __construct()
    {
        parent::__construct();        
        $this->load->model('Viaje_Model', 'Viaje');
        $this->load->library("form_validation");
		$this->load->helper('util');
    }

	public function index()
	{
		$viajes = $this->Viaje->toList();
		$data = array("viajes"=>$viajes);
		$this->load->view('inc_head');
		$this->load->view($this->session->userdata('menu'));
		$this->load->view('inc_principal',$data);
		$this->load->view('inc_footer');
	}
	public function crear(){
		$departamento = $this->Viaje->obtener("departamento",false,false);
		$buses = $this->Viaje->obtener("bus",array("estado"=>"Activo"),false);
		$chofers = $this->Viaje->obtener("chofer",false,false);
		$data = array("departamentos"=>$departamento,"buses"=>$buses,"chofers"=>$chofers);
		$this->load->view('inc_head');
		$this->load->view("inc_menu");//$this->session->userdata('menu')
		$this->load->view('viaje/crear',$data);
		$this->load->view('inc_footer');
	}
	public function guardar(){
		$respuesta = array("exito"=>500,"mensaje"=>"Ocurrio un error!");
		$origen = $this->input->post('origen');
		$destino = $this->input->post('destino');
		$bus = $this->input->post('bus');
		$chofer = $this->input->post('chofer');
		$precio = $this->input->post('precio');
		//USANDO HELPER
		$fecha = convertDateTime($this->input->post('fecha'));
		$this->form_validation->set_rules('origen', 'Origen', 'required');
		$this->form_validation->set_rules('destino', 'Destino', 'required|callback_validate_diferente');
		$this->form_validation->set_rules('bus', 'Bus', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
		$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		//Verifica que el formulario esté validado.
		if ($this->form_validation->run() == TRUE){
			$id = $this->input->post("id");
			$datos = array(
				"origen"=>$origen,
				"destino"=>$destino,
				"bus"=>$bus,
				"precio"=>$precio,
				"fecha_salida"=>$fecha,
				"chofer"=>$chofer
			);
			if($id>0){
				if($this->Viaje->modificar("viaje", $datos,array("id"=>$id))){
					$respuesta["exito"]=200;
					$respuesta["mensaje"]="Se registro con exito";
				}
			}else{
				if($this->Viaje->guardar("viaje", $datos)){
					$respuesta["exito"]=200;
					$respuesta["mensaje"]="Se registro con exito";
				}
			}						
		}else{
			$errors = $this->form_validation->error_array();
			$respuesta["mensaje"]=implode("<br>",$errors);
		}
		echo json_encode($respuesta);
	}
	function validate_diferente()
	{
		$origen = $this->input->post('origen');
		$destino = $this->input->post('destino');

		if($origen==$destino)
		{
			return false;
			$this->form_validation->set_message('Origen y Destino no deben ser iguales');
		}
		else
		{
			return true;
		}
	}

	public function editar($id){
		$viaje = $this->Viaje->obtener("viaje",array("id"=>$id));
		$departamentos = $this->Viaje->obtener("departamento",false,false);
		$buses = $this->Viaje->obtener("bus",array("estado"=>"Activo"),false);
		$chofers = $this->Viaje->obtener("chofer",false,false);
		$data = array("departamentos"=>$departamentos,"buses"=>$buses,"viaje"=>$viaje,"chofers"=>$chofers);
		$this->load->view('inc_head');
		$this->load->view($this->session->userdata('menu'));
		$this->load->view('viaje/editar',$data);
		$this->load->view('inc_footer');
	}

	public function cambiarEstado(){
		$response = array(
			"exito"=>400,
			"estado"=>""
		);
		try {
			if($this->input->post('id') > 0)
			{
				$id=$this->input->post('id');
				$viaje = $this->Viaje->obtener("viaje",array("id"=>$id));
				if(is_object($viaje)){
					$estado = $viaje->estado=='Activo'?'Inactivo':'Activo';
					$this->Viaje->modificar("viaje",array("estado"=>$estado),array("id"=>$id));
					$response["exito"] = 200;
					$response["estado"] = $estado;
				}				
			}
		}catch (Exception $e) {

		}		 	
		echo json_encode($response);
	}
	
	public function eliminar(){
		$response = array(
			"exito"=>400
		);
		
		if($this->input->post('id') > 0)
		{
			$id=$this->input->post('id');
			$this->Viaje->eliminar("viaje",$id);	
			$response["exito"] = 200;
		} 	
		echo json_encode($response);	
	}
}
