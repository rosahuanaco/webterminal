<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();  
        $this->load->model('Usuario_Model', 'Usuario');
        $this->load->helper('form');
        $this->load->library("form_validation");
    }

	public function index()
	{	
        $data['msg']=$this->uri->segment(3);

        if($this->session->userdata('login'))
        {
            redirect('login/inicializar','refresh');
        }
        else
        {
            $this->load->view('loginform',$data);
        }
	}

    public function validarusuario()
    {
        $login=$_POST['login'];
        $password=md5($_POST['password']);

        $u=$this->Usuario->validar($login,$password);
        if(is_object($u)){
            //creando las variables de session
            $this->session->set_userdata('id',$u->id);
            $this->session->set_userdata('email',$u->email);
            $this->session->set_userdata('privilegio',$u->privilegio);
            $this->session->set_userdata('nombre',$u->nombre);
            redirect('login/inicializar/','refresh');
        }else
        {
            redirect('login/index/1','refresh');
        }
       
    }

    public function inicializar(){
        $url = "login/";
        if($this->session->userdata('email') && $this->session->userdata('privilegio'))
        {
            switch ($this->session->userdata('privilegio')) {
                case "Administrador":
                    $this->session->set_userdata('menu',"inc_menu");
                    $url = "usuario/";
                    break;
                case "Cajero":
                    $this->session->set_userdata('menu',"inc_menu_cajero");
                    $url = "venta/";
                    break;
                default:
                    break;
            } 
        }
        redirect($url,'refresh');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/index/3','refresh');
    }	
}
