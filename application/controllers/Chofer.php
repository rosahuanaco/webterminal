<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Controller.php');

class Chofer extends Controller {

	public function __construct()
    {
        parent::__construct();        
        $this->load->model('Chofer_Model', 'Chofer');
        $this->load->library("form_validation");
    }

	public function index()
	{	
		$lista = $this->Chofer->toList();
		$data = array("lista"=>$lista);
		$this->load->view('inc_head');
		$this->load->view('inc_menu');//$this->session->userdata('menu')
		$this->load->view('chofer/inc_chofer',$data);
		$this->load->view('inc_footer');
	}
	public function crear(){
		$data = array();
		$this->load->view('inc_head');
		$this->load->view("inc_menu");
		$this->load->view('chofer/crear',$data);
		$this->load->view('inc_footer');
	}

	public function guardar(){
		$respuesta = array("exito"=>500,"mensaje"=>"Ocurrio un error!");
		$nombres = $this->input->post('nombres');
		$apellido_paterno = $this->input->post('apellido_paterno');
		$apellido_materno = $this->input->post('apellido_materno');
		$ci = $this->input->post('ci');
		$licencia = $this->input->post('licencia');
		$telefono = $this->input->post('telefono');

		$this->form_validation->set_rules('nombres', 'Nombres', 'required');
		$this->form_validation->set_rules('ci', 'CI', 'required|numeric');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric');
		//Verifica que el formulario esté validado.
		if ($this->form_validation->run() == TRUE){
			$id = $this->input->post('id');
			$datos = array(
				"nombres"=>$nombres,
				"apellido_paterno"=>$apellido_paterno,
				"apellido_materno"=>$apellido_materno,
				"ci"=>$ci,
				"licencia"=>$licencia,
				"telefono"=>$telefono
			);
			if($id>0){
				if($this->Chofer->modificar("chofer", $datos,array("id"=>$id))){
					$respuesta["exito"]=200;
					$respuesta["mensaje"]="Se modifico con exito";
				}
			}else{
				if($this->Chofer->guardar("chofer", $datos)){
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

	public function editar($id){
		$chofer = $this->Chofer->obtener("chofer",array("id"=>$id));
		$data = array("chofer"=>$chofer);
		$this->load->view('inc_head');
		$this->load->view("inc_menu");
		$this->load->view('chofer/editar',$data);
		$this->load->view('inc_footer');
	}
	public function eliminar(){
		$response = array(
			"exito"=>400
		);
		try {
			if($this->input->post('id') > 0)
			{
				$id=$this->input->post('id');
				$this->Chofer->eliminar("chofer",$id);	
				$response["exito"] = 200;
			}
		}catch (Exception $e) {

		}		 	
		echo json_encode($response);
	}
}
