<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'controllers/Controller.php');

class Usuario extends Controller {

	public function __construct()
    {
        parent::__construct();  
        $this->load->model('Usuario_Model', 'Usuario');
        $this->load->helper('form');
        $this->load->library("form_validation");
    }

	public function index()
	{	
        $user = $this->Usuario->toList();
		$data = array("users"=>$user);
		$this->load->view('inc_head');
		$this->load->view("inc_menu");
		$this->load->view('usuario/inc_usuario',$data);
		$this->load->view('inc_footer');
	}
    //method
    public function crear(){
        $privilegios = $this->Usuario->obtener("privilegio",false,false);
    	$data = array("privilegios"=> $privilegios);
		$this->load->view('inc_head');
		$this->load->view("inc_menu");
		$this->load->view('usuario/crear',$data);
		$this->load->view('inc_footer');
	}
	public function guardar(){
		$respuesta = array("exito"=>500,"mensaje"=>"Ocurrio un error!");
        try {
            $nombre = $this->input->post('nombre');
            $apellido_paterno = $this->input->post('apellido_paterno');
            $apellido_materno = $this->input->post('apellido_materno');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $ci = $this->input->post('ci');
            $telefono = $this->input->post('telefono');
            $direccion = $this->input->post('direccion');
            $privilegio = $this->input->post('privilegio');
            $id = $this->input->post("id");
            //USANDO HELPER		            
            if(empty($id)){
                $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            }

            if($id && !empty($password)){
                $this->form_validation->set_rules('password', 'Contraseña', 'min_length[8]');
            }       
            $this->form_validation->set_rules('privilegio', 'Privilegio', 'required|numeric');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('ci', 'Ci', 'required|numeric');
            $this->form_validation->set_rules('telefono', 'Celular', 'required|numeric');
            
            //Verifica que el formulario esté validado.
            if ($this->form_validation->run() == TRUE){
                
                $datos = array(
                    "nombre"=>$nombre,
                    "apellido_paterno"=>!empty($apellido_paterno)?$apellido_paterno:"",
                    "apellido_materno"=>!empty($apellido_materno)?$apellido_materno:"",
                    "privilegio"=>$privilegio,
                    "email"=>$email,
                    "password"=>md5($password),
                    "ci"=>$ci,
                    "telefono"=>$telefono,
                    "direcciones"=>$direccion
                );
                if($id>0){
                    unset($datos["email"]);
                    if(empty($password)){
                        unset($datos["password"]);
                    }
                    if($this->Usuario->modificar("usuario", $datos,array("id"=>$id))){
                        if(!empty($password)){
                            $u = $this->Usuario->obtener("usuario",array("id"=>$id));
                            $this->Usuario->modificar("keys",array("key"=>md5($u->email.$password)),array("usuario"=>$id));
                        }
                        $respuesta["exito"]=200;
                        $respuesta["mensaje"]="Se registro con exito";
                    }
                }else{
                    if($idUsuario = $this->Usuario->guardar("usuario", $datos)){
                        $this->crearKey($idUsuario,$email,$password);
                        $respuesta["exito"]=200;
                        $respuesta["mensaje"]="Se registro con exito";
                    }
                }						
            }else{
                $errors = $this->form_validation->error_array();
                $respuesta["mensaje"]=implode("<br>",$errors);
            }
        } catch (Exception $e) {
            
        }
		
		echo json_encode($respuesta);
	}

    public function crearKey($idUsuario,$email,$password){
        if(!empty($idUsuario)){
            $keys = array("usuario"=>$idUsuario,"key"=>md5($email.$password),"level"=>1,"ignore_limits"=>true,"date_created"=>date("Y-m-d H:i:s"));
            $this->Usuario->guardar("keys",$keys);
        }        
    }
	

	public function editar($id){
		$users = $this->Usuario->obtener("usuario",array("id"=>$id));
        $privilegios = $this->Usuario->obtener("privilegio",false,false);
		$data = array("usuario"=>$users,"privilegios"=>$privilegios);
		$this->load->view('inc_head');
		$this->load->view("inc_menu");
		$this->load->view('usuario/editar',$data);
		$this->load->view('inc_footer');
	}
	
	
    public function eliminar(){        
        $response = array("exito"=>400);        
        try {
            if($this->input->post('id') > 0)
            {
                $id=$this->input->post('id');
                $k = $this->Usuario->obtener("keys",array("usuario"=>$id));
                if(is_object($k)){
                    $this->Usuario->eliminar("keys",$k->id);
                }                
                $this->Usuario->eliminar("usuario",$id);	
                $response["exito"] = 200;
            } 
        } catch (Exception  $e) {
            //throw $th;
        }
            
        echo json_encode($response);	
	}
	
}
