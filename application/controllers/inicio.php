<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicio extends CI_Controller {
public function index()
{

$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr']
);
$this->load->view('header',$data);
$this->load->view('inicio',$data);
$this->load->view('footer');

}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
