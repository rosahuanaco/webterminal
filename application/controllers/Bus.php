<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Controller.php');

class Bus extends Controller {

	public function __construct()
    {
        parent::__construct();        
        $this->load->model('Bus_Model', 'Bus');
        $this->load->library("form_validation");
    }

	public function index()
	{	
		$buses = $this->Bus->toList();
		$data = array("buses"=>$buses);
		$this->load->view('inc_head');
		$this->load->view('inc_menu');//$this->session->userdata('menu')
		$this->load->view('bus/inc_bus',$data);
		$this->load->view('inc_footer');
	}
	public function crear(){
		$data = array();
		$this->load->view('inc_head');
		$this->load->view("inc_menu");
		$this->load->view('bus/crear',$data);
		$this->load->view('inc_footer');
	}

	public function guardar(){
		$respuesta = array("exito"=>500,"mensaje"=>"Ocurrio un error!");
		try {
			$tipo = $this->input->post('tipo');
			$placa = $this->input->post('placa');
			$comodidad = $this->input->post('comodidad');
			$fila = $this->input->post('filas');
			$columna = $this->input->post('columnas');
			$fila2 = $this->input->post('filas2');
			$columna2 = $this->input->post('columnas2');
			$piso = $this->input->post('pisos');
			

			$this->form_validation->set_rules('tipo', 'Tipo', 'required');
			$this->form_validation->set_rules('placa', 'Placa', 'required');
			$this->form_validation->set_rules('comodidad', 'Comodidad', 'required');
			$this->form_validation->set_rules('filas', 'Filas', 'required|numeric');
			$this->form_validation->set_rules('columnas', 'Columnas', 'required|numeric');
			$this->form_validation->set_rules('pisos', 'Piso', 'required|numeric');

			$this->form_validation->set_rules('numero[]', 'Generar asientos', 'required');
			//Verifica que el formulario esté validado.
			if ($this->form_validation->run() == TRUE){
				$id = $this->input->post('id');
				$datos = array(
					"tipo"=>$tipo,
					"placa"=>$placa,
					"comodidad"=>$comodidad,
					"filas"=>$fila,
					"columnas"=>$columna,
					"filas2"=>$fila2,
					"columnas2"=>$columna2,
					"piso"=>$piso
				);
				if($id>0){
					$modificar = false;
					$reservas = $this->Bus->obtenerReservas($id);
					if(!(is_array($reservas) && count($reservas)>0)){
						$modificar = true;
					}else{
						unset($datos["filas"]);
						unset($datos["columnas"]);
						unset($datos["filas2"]);
						unset($datos["columnas2"]);
						unset($datos["piso"]);

					}
					if($this->Bus->modificar("bus", $datos,array("id"=>$id))){						
						if($modificar){
							$this->Bus->eliminarAsientos($id);
							$this->guardarAsientos($id);
						}
						$respuesta["exito"]=200;
						$respuesta["mensaje"]="Se modifico con exito";
					}
				}else{
					if($idBus = $this->Bus->guardar("bus", $datos)){
						$this->guardarAsientos($idBus);
						$respuesta["exito"]=200;
						$respuesta["mensaje"]="Se registro con exito";
					}
				}			
			}else{
				$errors = $this->form_validation->error_array();
				$respuesta["mensaje"]=implode("<br>",$errors);
			}
		} catch (Exception $e) {
			//throw $th;
		}
		
		echo json_encode($respuesta);
	}
	private function guardarAsientos($idBus){
		//Obtener asientos
		$numeros = $this->input->post("numero[]");
		$filas = $this->input->post("fila[]");
		$columnas = $this->input->post("columna[]");
		$pisos = $this->input->post("piso[]");
		$datos = array();
		foreach($numeros as $k=>$n){
			$asiento = array("bus"=>$idBus,"numero"=>$n,"piso"=>$pisos[$k],"fila"=>$filas[$k],"columna"=>$columnas[$k]);
			$datos[] = $asiento;
		}
		$this->Bus->guardarMuchos("asiento",$datos);
	}

	public function editar($id){
		$bus = $this->Bus->obtener("bus",array("id"=>$id));
		$asientos1 = indexar($this->Bus->obtenerAsiento($id));
		$asientos2 = indexar($this->Bus->obtenerAsiento($id,2));
		$reservas = $this->Bus->obtenerReservas($id);
		$data = array("bus"=>$bus,"asientos1"=>$asientos1,"asientos2"=>$asientos2,"reservas"=>$reservas);
		$this->load->view('inc_head');
		$this->load->view("inc_menu");
		$this->load->view('bus/editar',$data);
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
				$bus = $this->Bus->obtener("bus",array("id"=>$id));
				if(is_object($bus)){
					$estado = $bus->estado=='Activo'?'Inactivo':'Activo';
					$this->Bus->modificar("bus",array("estado"=>$estado),array("id"=>$id));
					$response["exito"] = 200;
					$response["estado"] = $estado;
				}				
			}
		}catch (Exception $e) {

		}		 	
		echo json_encode($response);
	}
	public function subirimagen()
	{
		$data['idimagen']=$_POST['idbuses'];

		$this->load->view('inc_head');
		$this->load->view($this->session->userdata('menu'));
		$this->load->view('subirform',$data);
		$this->load->view('inc_footer');
	}
	public function subir()
	{
		$idimagen=$_POST['idbuses'];
		$nombrearchivo=$idimagen.".jpg";

		//ruta donde se guardan los ficheros
		$config['upload_path']='./uploads/buses/';
		//config nombre del archivo
		$config['file_name']=$nombrearchivo;
		//renplazar los archivos
		$direccion="./uploads/buses/".$nombrearchivo;
		unlink($direccion);
		//tipos de archivos permitidos
		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload())
		{
			$data['error']=$this->upload->display_errors();
		}
		else
		{
			$data['imagen']=$nombrearchivo;
			$this->Bus->modificar("bus",$data,array('id'=>$idimagen));
			$this->upload->data();
		}
		redirect('bus/','refresh');
	}
}
