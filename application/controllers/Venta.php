<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Controller.php');

class Venta extends Controller {

	public function __construct()
    {
        parent::__construct();        
        $this->load->model('Venta_Model', 'Venta');
        $this->load->library("form_validation");
		$this->load->library("EscPos.php");
    }

	public function index()
	{

		$reservas = $this->Venta->listar();
		$data = array("reservas"=>$reservas);
		$this->load->view('inc_head');
		$this->load->view($this->session->userdata('menu'));
		$this->load->view('venta/inc_reservas',$data);
		$this->load->view('inc_footer_cajero');
	}

	public function obtenerDetalle(){
		$response = array(
			"exito"=>400,
			"detalles"=>""
		);
		try {
			$id=$this->input->post('id');
			$response['detalles'] = $this->Venta->obtener("venta_detalle",array("venta"=>$id));
		}catch (Exception $e) {

		}		 	
		echo json_encode($response);
	}

	public function detalle($venta_id){
		$venta = $this->Venta->obtener("venta",array("id"=>$venta_id));
		$detalles = $this->Venta->obtenerDetalle($venta_id);
		$data=array("venta"=>$venta,"detalles"=>$detalles);
		$this->load->view("venta/detalle",$data);
	}

	public function guardar(){

		$response = array(
			"exito"=>400,
			"mensaje"=>""
		);
		$venta_id = $this->input->post('id');
		$nit = $this->input->post('nit_ci');
		$razon_social = $this->input->post('razon_social');
		
		$this->form_validation->set_rules('id','Id','required');
		$this->form_validation->set_rules('nit_ci','Nit/Ci','required|numeric');
		$this->form_validation->set_rules('razon_social', 'Razon Social/Nombre', 'required');
		//Verifica que el formulario esté validado.
		if ($this->form_validation->run() == TRUE){
			if($this->Venta->modificar("venta",array("nombre"=>$razon_social,"nit_ci"=>$nit,"estado"=>"Activo","tipo"=>"Digital","fecha"=>date("Y-m-d H:i:s"),"cajero"=>$this->session->userdata('id')),array("id"=>$venta_id))){				
					$viaje = $this->Venta->obtenerViaje($venta_id);
					$venta_detalle = $this->Venta->obtenerVentaDetalle($venta_id);
					if(is_object($viaje) && is_array($venta_detalle)){
						try {
							$connector = new Escpos\PrintConnectors\WindowsPrintConnector("smb://DESKTOP-CD3F2MI/impresora");	
							$printer = new Escpos\Printer($connector);

							$printer -> setJustification(Escpos\Printer::JUSTIFY_CENTER);
							$printer -> setFont(Escpos\Printer::FONT_A);//letras pequeñas
							$text = "TERMINAL DE BUSES CBBA\n";
							$text .= "-----------------------------------------------\n";
							$text .= "NOTA DE VENTA\n";
							$text .= "Ticket Nº: $venta_id\n";
							$text .= "Fecha:".date("d/m/Y h:i")."\n";
							$text .= "Nombre: $razon_social\n";
							$text .= "Nit/Ci: $nit\n";
							$text .= "-----------------------------------------------\n";
							$printer->text($text);									
							$text = "          Nombre          | Asiento | Precio \n";
							$text .= "-----------------------------------------------\n";
							$total = 0;
							foreach($venta_detalle as $vd){
								$text .= str_pad($vd->nombre." ".$vd->apellido_paterno, 26," ",STR_PAD_BOTH)." ".str_pad($vd->numero,10," ",STR_PAD_BOTH)." ".str_pad($vd->precio,8," ",STR_PAD_BOTH)."\n";
								$total += floatval($vd->precio);
							}
							$text .= "-----------------------------------------------\n";
							$text .= str_pad("Total Bs:",36," ",STR_PAD_LEFT)."".str_pad(number_format($total,2),8," ",STR_PAD_BOTH)."\n";
							$printer -> setJustification(Escpos\Printer::JUSTIFY_LEFT);								
							$printer->text($text);							
							$text = "Carril: 12\n";
							$text .= "Placa: $viaje->placa\n";
							$text .= "Destino: $viaje->destino\n";
							$text .= "Fecha y hora Salida: ".convertDateTimeRev($viaje->fecha_salida)."\n";							
							$printer->text($text);							
							$text = "\nGRACIAS POR SU PREFERENCIA\n";
							$printer -> setJustification(Escpos\Printer::JUSTIFY_CENTER);	
							$printer->text($text);
							$printer -> cut();
				
							/* Close printer */
							$printer -> close();
						} catch (Exception $e) {
							echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
						}
					}					
				$response["exito"] = 200;
				$response["mensaje"] = "Se genero con exito";
			}
		}

		echo json_encode($response);
	}
	
	public function reportes(){		
		//$ventas = $this->Venta->reportes();
		$cajeros = $this->Venta->obtener("usuario",array("estado"=>"Activo","privilegio"=>6),false);
		$departamentos = $this->Venta->obtener("departamento",false,false);
		$buses = $this->Venta->obtener("bus",array("estado"=>"Activo"),false);
		$datos = array("cajeros"=>$cajeros,"departamentos"=>$departamentos,"buses"=>$buses);
		$this->load->view('inc_head');
		$this->load->view($this->session->userdata('menu'));
		$this->load->view('venta/reportes',$datos);
		$this->load->view('inc_footer');		
	}

	public function reporte_detalle(){
		list ( $fecha_inicio, $tiempo_inicio ) = extractDateTime ( str_replace ( "-", "/", $this->input->post ( "fecha_inicio" ) ) );
		list ( $fecha_fin, $tiempo_fin ) = extractDateTime ( str_replace ( "-", "/", $this->input->post ( "fecha_fin" ) ) );
		$where = "";
		if (! $tiempo_inicio || ! $tiempo_fin) {
			$fecha_inicio = convertDateTime ( str_replace ( "-", "/", $this->input->post ( "fecha_inicio" ) ) );
			$fecha_fin = convertDateTime ( str_replace ( "-", "/", $this->input->post ( "fecha_fin" ) ), false );
			$where = "v.fecha between '$fecha_inicio' and '$fecha_fin'";
		} else {
			$fecha_inicio = convertDate ( str_replace ( "-", "/", $this->input->post ( "fecha_inicio" ) ) );
			$fecha_fin = convertDate ( str_replace ( "-", "/", $this->input->post ( "fecha_fin" ) ) );
			$where = "date(v.fecha) between '$fecha_inicio' and '$fecha_fin' and time(v.fecha) between '$tiempo_inicio' and '$tiempo_fin'";
		}

		if($this->input->post("origen") && $this->input->post("destino")){
			$origen = $this->input->post("origen");
			$destino = $this->input->post("destino");
			$where = $where." and vi.origen=$origen and vi.destino=$destino";
		}

		if($this->input->post("cajero")){
			$cajero = $this->input->post("cajero");
			$where = $where." and v.cajero=$cajero";
		}

		if($this->input->post("bus")){
			$bus = $this->input->post("bus");
			$where = $where." and vi.bus=$bus";
		}
		$ventas = $this->Venta->reportes($where);
		$data=array("ventas"=>$ventas);

		$this->load->view("venta/reporte_detalle",$data);
	}
}
