<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User extends REST_Controller {
    function __construct()
    {
        parent::__construct();      
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }
        
       if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods: GET, POST, PUT,DELETE, OPTIONS");
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
                exit(0);
        }
        $this->load->model("Usuario_Model","Usuario");
        $this->load->library("form_validation");        
    }       
    
    /**
     * Authenticar usuario con login y password.
     * Login
     * **/
    public function login_post(){
        $response = array('status'=>false,'response'=>'','message' => "Usuario o contrasenia es incorrecto");
        $email = trim($this->post('email'));
        $password = trim($this->post('password'));
        if (!empty($email) && !empty($password)) {
            $response['response'] = $this->Usuario->obtenerPasajero($email,md5($password));
            if($response['response']){
                $response['status'] = true;
                $response['message'] = "";
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }
    /**
     * Registrar Pasajero
     * ** */
    public function index_post(){
        $response = array("status"=>false,"response"=>"","message"=>"No se pudo registrar");
        try {
            $email = $this->post('email');
            $password = $this->post('password');
            $nombre = $this->post('nombre');
            $apellido_paterno = $this->post('apellido_paterno');
            $apellido_materno = $this->post('apellido_materno');
            $ci = $this->post('ci');
            $telefono = $this->post('telefono');
            $direccion = $this->post('direccion');
            $datos = array(
                "email"=>$email,
                "password"=>$password,
                "nombre"=>$nombre,
                "apellido_paterno"=>$apellido_paterno,
                "apellido_materno"=>$apellido_materno,
                "ci"=>$ci,
                "telefono"=>$telefono,
                "direcciones"=>$direccion        
            );
            //VALIDACION
            $this->form_validation->set_data($datos);
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('ci', 'Ci', 'required|numeric');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric');
            //Verifica que el formulario esté validado.
            if ($this->form_validation->run() == TRUE){
                $privilegio = $this->Usuario->obtener("privilegio",array("nombre"=>"Pasajero"));
                if($privilegio){                    
                    $datos["password"] = md5($datos["password"]);
                    $datos["privilegio"] = $privilegio->id;
                    $idUsuario = $this->Usuario->guardar("usuario",$datos);
                    if($idUsuario){
                        $keys = array("usuario"=>$idUsuario,"key"=>md5($email.$password),"level"=>1,"ignore_limits"=>true,"date_created"=>date("Y-m-d H:i:s"));
                        if($this->Usuario->guardar("keys",$keys)){
                            $response["response"] = $this->Usuario->obtenerPasajero($email,md5($password));
                            $response["status"] = true;
                            $response["message"] = "";
                        }
                    }
                }									
            }else{
                $response["message"] = implode("<br>",$this->form_validation->error_array());
            }    
        } catch (Exception  $e) {
            
        }
        
        return $this->response($response, REST_Controller::HTTP_OK);
    }
}

