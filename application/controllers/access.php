<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access extends CI_Controller {
function __construct()
{
parent::__construct();
$this->load->model('access_model');
}
public function index()
{
session_start();
$GLOBALS['sessionid'] = isset($_GET['sessionid']) ? $_GET['sessionid'] : @$_COOKIE['sessionid'];
if(!$GLOBALS['sessionid'])
{
Header('Location: ../../intranet/login.php'.
('?phpgw_forward='.urlencode('..'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'])));
exit;
}
else{
$id =$GLOBALS['sessionid'];
$user = $this->access_model->verificarUser($id);
$log = $this->access_model->verificarUserList($user[0]->loginid);

if($log)
{
$this->session->set_userdata($user);
$sess_array=array();

foreach ($log as $key) {
$sess_array = array(
'usuarioUsr' => $key ->usuarioUsr,
'nombreUsr' => $key->nombreUsr,
'perfilUsr'=>$key->perfilUsr,
'regionUsr'=>$key->regionUsr,
'programaUsr'=>$key->programaUsr,
'componenteUsr'=>$key->componenteUsr
);
$this->session->set_userdata('datosuser',$sess_array);

}
echo "<script>window.location='inicio';</script>";
}
else{
$this->load->view('header');
$this->load->view('error_login');
$this->load->view('footer');
}


}
}
}
