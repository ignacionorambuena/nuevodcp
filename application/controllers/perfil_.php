<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Perfil extends CI_Controller {
protected $user;
private $nivel;
public function __construct()
{
parent::__construct();
$this->load->model(array('access_model','persona_model'));

}

public function index()
{

$GLOBALS['sessionid'] = isset($_GET['sessionid']) ? $_GET['sessionid'] : @$_COOKIE['sessionid'];
if(!$GLOBALS['sessionid'])
{
Header('Location: ../../intranet/login.php'.
('?phpgw_forward='.urlencode('..'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'])));
exit;
}

$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr']
);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/home', $data);
$this->load->view('footer');
}

//========================================
//PROGRAMA==============================
//========================================
public function programa(){

$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region()
);


$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/programa/ver_programa', $data);
if (isset($_POST['aceptar'])) {

$programa=$this->input->post('programa');
$region=$this->input->post('region');
$ano=$this->input->post('ano');


if($region==999){
$filtro=$this->persona_model->all_region($ano,$programa,$region);
}else{
$filtro=$this->persona_model->filtro_programa($ano,$programa,$region);
}
$data['filtro']=$filtro;


if($filtro!=""){
$this->load->view('perfil/programa/busqueda',$data);
}else
{
echo "<script>alert('No existen registros para esta busqueda');</script>";
}
}
else{
echo "</div>";
}
$this->load->view('footer');

}

public function agregar_programa(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region()
);

if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('subtitulo','Subtitulo','required|trim|xss_clean');
$this->form_validation->set_rules('item','Item','required|trim|xss_clean');
$this->form_validation->set_rules('asignacion','Asignacion','required|trim|xss_clean');
$this->form_validation->set_rules('nombre','Nombre','required|trim|xss_clean');
$this->form_validation->set_message('required', 'Campo requerido');



if($this->form_validation->run()){

$subtitulo=$this->input->post('subtitulo');
$item=$this->input->post('item');
$asignacion=$this->input->post('asignacion');
$nombre=$this->input->post('nombre');

$insert=$this->persona_model->nuevo_programa($subtitulo,$item,$asignacion,$nombre);
if($insert){
echo "<script>alert('Acaba de agregar un programa');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}//fin post
}

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/programa/agregar_programa', $data);
$this->load->view('footer');

}

public function agregar_presupuesto(){



$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->prog_region()
);


$sesion= $this->session->userdata('programa_ses');
if (isset($_POST['aceptar'])) {
$programa=$this->input->post('programa');
$monto=$this->input->post('monto');
$ano=$this->input->post('ano');

$sess_array = array(
'programa' => $programa,
'monto' => $monto,
'ano'=>$ano,
'nombreProg'=>$this->persona_model->n_prog($programa)
);
$this->session->set_userdata('programa_ses',$sess_array);
redirect('perfil/agregar_ppto_region');
}
else{
if($this->session->userdata('programa_ses')){
redirect('perfil/agregar_ppto_region','refresh');
}else{
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/programa/agregar_presupuesto', $data);
$this->load->view('footer');
}
}
}


public function 	agregar_ppto_region()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'progregion'=>$this->persona_model->listar_region()
);

$data['prog']=$this->session->userdata('programa_ses');





if (isset($_POST['aceptar'])) {

$programa=$this->input->post('programa');
$ano=$this->input->post('ano');
$region=$this->input->post('region');
$monto=$this->input->post('monto');
$actual=$data['prog']['monto'];
$resta = $actual-$monto;


$verificar=$this->persona_model->existe_reg_ano($ano,$region,$programa);
	if($verificar==FALSE and $resta>0){
		$insert=$this->persona_model->presupuesto_programa($programa,$ano,$region,$monto);
		if($insert){
		$sess_array = array(
		'programa' => $data['prog']['programa'],
		'monto' => $resta,
		'ano'=>$data['prog']['ano'],
		'nombreProg'=>$this->persona_model->n_prog($programa)
		);
		$this->session->set_userdata('programa_ses',$sess_array);
		echo '<script>setTimeout(function(){ alert("Acaba de agregar un persupuesto en la region seleccionada");window.location="'.base_url('/perfil/agregar_ppto_region').'"; }, 800);</script>';

		}//fin iinsert
		else{
		echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
		}
	}
	else{
		echo "<script>alert('Ya ingreso un presupuesto para la region seleccionada o el presupuesto actual es cero.');</script>";
	}
}//fin post


$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/programa/agregar_regiones', $data);
$this->load->view('footer');
}

public function cambiar_region()
{
$this->session->unset_userdata('programa_ses');
redirect('perfil/agregar_presupuesto','refresh');
}


//========================================
//COMPONENTE===========================
//========================================

public function componente(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'componente'=>$this->persona_model->listar_componente(),
'detcomp'=>$this->persona_model->detalle_componente(),
'region'=>$this->persona_model->listar_region()
);

if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('componente','Item','required|trim|xss_clean');
if($this->form_validation->run()){

$programa=$this->input->post('programa');
$componente=$this->input->post('componente');

$insert=$this->persona_model->nuevo_componente($programa,$componente);
if($insert){
echo "<script>alert('Acaba de agregar un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}//fin post
}


$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/componente/ver_componente', $data);
$this->load->view('footer');
}


public function agregar_componente(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('componente','Item','required|trim|xss_clean');
if($this->form_validation->run()){

$programa=$this->input->post('programa');
$componente=$this->input->post('componente');

$insert=$this->persona_model->nuevo_componente($programa,$componente);
if($insert){
echo "<script>alert('Acaba de agregar un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}//fin post
}
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/componente/agregar_componente', $data);
$this->load->view('footer');
}

public function agregar_presupuesto_componente(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'componente'=>$this->persona_model->comp_prog()
);
if(isset($_POST['aceptar'])){

}

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/componente/agregar_presupuesto_componente', $data);
$this->load->view('footer');
}


public function 	monto_componente_region()
{
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/componente/agregar_monto_componente_reg', $data);
$this->load->view('footer');
}

//========================================
//ITEM==============================
//========================================
public function item(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'item'=>$this->persona_model->listar_item()
);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/item/ver_item', $data);
$this->load->view('footer');
}

public function agregar_item(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'item'=>$this->persona_model->listar_item()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('programa','Programa','required|trim|xss_clean');
$this->form_validation->set_rules('nombre','Item','required|trim|xss_clean');

if($this->form_validation->run()){

$programa=$this->input->post('programa');
$nombre=$this->input->post('nombre');


$insert=$this->persona_model->nuevo_item($programa,$nombre);
if($insert){
echo "<script>alert('Acaba de agregar un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}
}
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/item/agregar_item', $data);
$this->load->view('footer');
}

public function agregar_presupuesto_item(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'item'=>$this->persona_model->listar_item()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('region','Región','required|trim|xss_clean');
$this->form_validation->set_rules('item','Item','required|trim|xss_clean');
$this->form_validation->set_rules('ano','año','required|trim|xss_clean');
$this->form_validation->set_rules('monto','Monto','required|trim|xss_clean');


if($this->form_validation->run()){

$region=$this->input->post('region');
$item=$this->input->post('item');
$ano=$this->input->post('ano');
$monto=$this->input->post('monto');


$insert=$this->persona_model->nuevo_presupuesto_item($region,$item,$ano,$monto);
if($insert){
echo "<script>alert('Acaba de agregar un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}
}
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/item/agregar_presupuesto_item', $data);
$this->load->view('footer');
}


//========================================
//CUENTA==============================
//========================================
public function cuenta(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region()
);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/cuenta/ver_cuenta', $data);
$this->load->view('footer');
}

public function agregar_cuenta(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('programa','Programa','required|trim|xss_clean');
$this->form_validation->set_rules('item','Item','required|trim|xss_clean');
$this->form_validation->set_rules('nombreCuenta','Nombre de Cuenta','required|trim|xss_clean');

if($this->form_validation->run()){

$programa=$this->input->post('programa');
$item=$this->input->post('item');
$nombreCuenta=$this->input->post('nombreCuenta');


$insert=$this->persona_model->nueva_cuenta($programa,$item,$nombreCuenta);
if($insert){
echo "<script>alert('Acaba de agregar un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}
}
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/cuenta/agregar_cuenta', $data);
$this->load->view('footer');
}

public function agregar_presupuesto_cuenta(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('item','Item','required|trim|xss_clean');
$this->form_validation->set_rules('ano','Año','required|trim|xss_clean');
$this->form_validation->set_rules('monto','Monto','required|trim|xss_clean');
$this->form_validation->set_rules('region','Región','required|trim|xss_clean');

if($this->form_validation->run()){
$item=$this->input->post('item');
$ano=$this->input->post('ano');
$monto=$this->input->post('monto');
$region=$this->input->post('region');


$insert=$this->persona_model->nueva_cuenta_presupuesto($item,$ano,$monto,$region);
if($insert){
echo "<script>alert('Acaba de agregar un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}
}
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/cuenta/agregar_presupuesto_cuenta', $data);
$this->load->view('footer');
}


//========================================
//ACTIVIDAD==============================
//========================================
public function actividad(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region()
);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/actividad/ver_actividad', $data);
$this->load->view('footer');
}

public function agregar_actividad(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'componente' => $this->persona_model->listar_componente()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('componente','Componente','required|trim|xss_clean');
$this->form_validation->set_rules('nombreAct','Nombre Actividad','required|trim|xss_clean');


if($this->form_validation->run()){
$componente=$this->input->post('componente');
$nombreAct=$this->input->post('nombreAct');



$insert=$this->persona_model->nueva_actividad($componente,$nombreAct);
if($insert){
echo "<script>alert('Acaba de agregar un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}
}
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/actividad/agregar_actividad', $data);
$this->load->view('footer');
}

public function agregar_presupuesto_actividad(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'actividad' => $this->persona_model->listar_actividad(),
'region'=>$this->persona_model->listar_region()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('actividad','Actividad','required|trim|xss_clean');
$this->form_validation->set_rules('ano','Año','required|trim|xss_clean');
$this->form_validation->set_rules('afecto','Afecto','required|trim|xss_clean');
$this->form_validation->set_rules('monto','Monto','required|trim|xss_clean');
$this->form_validation->set_rules('region','Región','required|trim|xss_clean');


if($this->form_validation->run()){
$actividad=$this->input->post('actividad');
$ano=$this->input->post('ano');
$afecto=$this->input->post('afecto');
$monto=$this->input->post('monto');
$region=$this->input->post('region');


$insert=$this->persona_model->nueva_actividad_presupuesto($actividad,$ano,$afecto,$monto,$region);
if($insert){
echo "<script>alert('Acaba de agregar un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Algo anda mal');</script>";
}
}
$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/actividad/agregar_presupuesto_actividad', $data);
$this->load->view('footer');
}


//========================================
//PROPIR==============================
//========================================
public function agregar_propir(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'presact'=>$this->persona_model->listar_presact(),
'region'=>$this->persona_model->listar_region()
);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/propir/agregar_propir', $data);
$this->load->view('footer');
}

public function ver_propir(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr']
);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil', $data);
$this->load->view('perfil/propir/ver_resumen', $data);
$this->load->view('footer');
}



//========================================
//USUARIOS==============================
//========================================

public function listar_usuarios(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'listar' => $this->persona_model->listar_usuario(),
'region' => $this->persona_model->listar_region(),
'programa' => $this->persona_model->listar_programa(),
'componente' => $this->persona_model->listar_componente()
);




if(isset($_POST['aceptar'])){

$this->form_validation->set_rules('usuario','Nombre','required|trim|xss_clean');
$this->form_validation->set_rules('perfil','Perfil','required|trim|xss_clean');
$this->form_validation->set_message('required', '%s Campo requerido');

if($this->form_validation->run()){

$id=$this->input->post('usuario');
$perfil=$this->input->post('perfil');
$region=$this->input->post('region');
$programa=$this->input->post('programa');
$componente=$this->input->post('componente');

if($region==""){$region="NULL";}
if($programa==""){$programa="NULL";}
if($componente==""){$componente="NULL";}



$verificar=$this->persona_model->verificar_usuario($id);


$nombre=$this->persona_model->nombre_usuario($id);

foreach ($nombre as $key) {
$nom=ucwords(strtolower($key->n_fn));
}

if ($verificar) {
echo "<script>alert('El usuario ingresado ya se encuentra registrado');window.location='".base_url('perfil/listar_usuarios')."'</script>";

}
else{
$insert=$this->persona_model->insertar_usuario($id,$nom,$perfil,$region,$programa,$componente);
if($insert){
echo "<script>alert('Registro realizado de manera correcta');window.location='".base_url('perfil/listar_usuarios')."'</script>";
}
}


}//FIN RUN



}//FIN POST

$this->load->view('header',$data);
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/usuarios/listar_usuario',$data);
$this->load->view('footer');
}


public function ver_usuarios()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);
$this->load->view('header',$data);
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/usuarios/ver_usuarios',$data);
$this->load->view('footer');
}


//========================================
//GASTOS==============================
//========================================


public function justificar_gastos()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);
$this->load->view('header',$data);
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/gastos/justificar_gastos',$data);
$this->load->view('footer');
}



public function logout()
{
$this->session->sess_destroy();
redirect('http://intranet.injuv.gob.cl/','refresh');
}


}
/* End of file nivel.php */
/* Location: ./application/controllers/nivel.php */
