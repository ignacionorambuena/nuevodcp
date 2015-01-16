<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Perfil extends CI_Controller {
protected $user;
private $nivel;
public function __construct()
{
parent::__construct();
$this->load->model(array('access_model','persona_model','cascada_model'));

}

public function index()
{

// $GLOBALS['sessionid'] = isset($_GET['sessionid']) ? $_GET['sessionid'] : @$_COOKIE['sessionid'];
// if(!$GLOBALS['sessionid'])
// {
// Header('Location: ../../intranet/login.php'.
// ('?phpgw_forward='.urlencode('..'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'])));
// exit;
// }

$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa()
);


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/programa/ver_programa', $data);
if (isset($_POST['aceptar'])) {

$programa=$this->input->post('programa');
$ano=$this->input->post('ano');


if($programa==99){
$filtro=$this->persona_model->all_programa($ano,$programa);
}else{
$filtro=$this->persona_model->filtro_programa($ano,$programa);
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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
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
}

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/programa/agregar_programa', $data);
$this->load->view('footer');

}

public function agregar_presupuesto(){



$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa()
);


if (isset($_POST['aceptar'])) {

$this->form_validation->set_rules('programa', 'Programa', 'trim|required|xss_clean');
$this->form_validation->set_rules('ano', 'Año', 'trim|required|xss_clean');
$this->form_validation->set_rules('monto', 'Monto Presupuesto', 'trim|required|xss_clean|numeric');
$this->form_validation->set_message('required','Campo requerido.');

if($this->form_validation->run()){
$programa=$this->input->post('programa');
$ano=$this->input->post('ano');
$monto=$this->input->post('monto');


$verificar=$this->persona_model->existe_reg_ano($ano,$programa);
if($verificar==FALSE){
$insert=$this->persona_model->presupuesto_programa($programa,$ano,$monto);
if($insert){
echo '<script>setTimeout(function(){ alert("Presupuesto agregado de forma correcta.");window.location="'.base_url('/perfil/agregar_presupuesto').'"; }, 800);</script>';
}//fin iinsert
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Ya ingreso un presupuesto para el programa seleccionado');</script>";
}
}//fin run
}//fin post


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/programa/agregar_presupuesto', $data);
$this->load->view('footer');

}

public function detalleProgramaPre(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);
$idPP = $this->uri->segment(3);

$data['progPre'] = $this->persona_model->get_progPre_por_id($idPP);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/programa/editar_programa_pre',$data);
$this->load->view('footer');
}

public function editarProgramaPre(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);


$idPP=$this->input->post('idPP');
$anoPP=$this->input->post('anoPP');
$montoPP=$this->input->post('montoPP');


$this->load->library('form_validation');

$this->form_validation->set_rules('idPP', 'ID Presupuesto', 'trim|required');
$this->form_validation->set_rules('anoPP', 'Año', 'trim|required');
$this->form_validation->set_rules('montoPP', 'Monto', 'trim|required');

if($this->form_validation->run()){


$data = array(
'idPP'=>$this->input->post('idPP'),
'anoPP'=>$this->input->post('anoPP'),
'montoPP'=>$this->input->post('montoPP')
);


$ingreso_item = $this->persona_model->editarProgramaPre($data);
if($ingreso_item > 0){
$this->session->set_flashdata('success', 'Datos ingresados correctamente!.');
redirect('perfil/detalleProgramaPre/'.$data['idPP']);
}else{
$this->session->set_flashdata('error', 'No se modifico ningún registro!!.');
redirect('perfil/detalleProgramaPre/'.$data['idPP']);
}

}else{
$this->session->set_flashdata('error', 'No dejar campos vacíos!.');
redirect('perfil/detalleProgramaPre/'.$id);
}

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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'componente'=>$this->persona_model->comp_prog(),
'detcomp'=>$this->persona_model->detalle_componente(),
'region'=>$this->persona_model->listar_region()
);


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/componente/ver_componente', $data);
if (isset($_POST['aceptar'])) {

$componente=$this->input->post('componente');
$ano=$this->input->post('ano');


if($componente==99){
$filtro=$this->persona_model->all_componente($ano,$componente);
}else{
$filtro=$this->persona_model->filtro_componente($ano,$componente);
}
$data['filtro']=$filtro;


if($filtro!=""){
$this->load->view('perfil/componente/busqueda',$data);
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


public function agregar_componente(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region()
);

if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('componente','Item','required|trim|xss_clean|is_unique[componente.nombreComp]');
$this->form_validation->set_rules('programa','Programa','required|trim|xss_clean');
$this->form_validation->set_message('required',' campo requerido');

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
//fin post
}
$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/componente/agregar_componente', $data);
$this->load->view('footer');
}

public function agregar_presupuesto_componente(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'componente'=>$this->persona_model->comp_prog()
);
if(isset($_POST['aceptar'])){

$this->form_validation->set_rules('componente', 'componente', 'trim|required|xss_clean');
$this->form_validation->set_rules('ano', 'Año', 'trim|required|xss_clean');
$this->form_validation->set_rules('monto', 'Monto Presupuesto', 'trim|required|xss_clean|numeric');
$this->form_validation->set_message('required','Campo requerido.');



if($this->form_validation->run()){
$componente=$this->input->post('componente');
$ano=$this->input->post('ano');
$monto=$this->input->post('monto');


$existe=$this->persona_model->existe_pres_comp($ano,$componente);

if($existe==FALSE){

//$alcanza=$this->persona_model->total_programa($componente,$monto);

$insert=$this->persona_model->nuevo_presupuesto_componente($componente,$ano,$monto);
if($insert){
echo "<script>alert('Acaba de agregar un presupuesto a un componente');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Ya existe un presupuesto para el componente ingresado.');</script>";
}



}

}

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/componente/agregar_presupuesto_componente', $data);
$this->load->view('footer');
}

public function detalleComponentePre(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);
$idPC = $this->uri->segment(3);

$data['compPre'] = $this->persona_model->get_compPre_por_id($idPC);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/componente/editar_componente_pre',$data);
$this->load->view('footer');
}

public function editarComponentePre(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);


$idPC=$this->input->post('idPC');
$anoPC=$this->input->post('anoPC');
$montoPC=$this->input->post('montoPC');


$this->load->library('form_validation');

$this->form_validation->set_rules('idPC', 'ID Presupuesto', 'trim|required');
$this->form_validation->set_rules('anoPC', 'Año', 'trim|required');
$this->form_validation->set_rules('montoPC', 'Monto', 'trim|required');

if($this->form_validation->run()){


$data = array(
'idPC'=>$this->input->post('idPC'),
'anoPC'=>$this->input->post('anoPC'),
'montoPC'=>$this->input->post('montoPC')
);


$ingreso_item = $this->persona_model->editarComponentePre($data);
if($ingreso_item > 0){
$this->session->set_flashdata('success', 'Datos ingresados correctamente!.');
redirect('perfil/detalleComponentePre/'.$data['idPC']);
}else{
$this->session->set_flashdata('error', 'No se modifico ningún registro!!.');
redirect('perfil/detalleComponentePre/'.$data['idPC']);
}

}else{
$this->session->set_flashdata('error', 'No dejar campos vacíos!.');
redirect('perfil/detalleComponentePre/'.$id);
}

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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'item'=>$this->persona_model->listar_item()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/item/ver_item', $data);
if (isset($_POST['aceptar'])) {

$item=$this->input->post('item');

if($item==99){
$filtro=$this->persona_model->all_item($item);
}else{
$filtro=$this->persona_model->filtro_item($item);
}
$data['filtro']=$filtro;


if($filtro!=""){
$this->load->view('perfil/item/busqueda',$data);
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

public function agregar_item(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('nombre','Item','required|trim|xss_clean|is_unique[item.nombreItem]');
$this->form_validation->set_message('required', 'Campo requerido');


if($this->form_validation->run()){
$nombre=$this->input->post('nombre');


$insert=$this->persona_model->nuevo_item($nombre);
if($insert){
echo "<script>alert('Acaba de agregar un Item');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
}
$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/item/agregar_item', $data);
$this->load->view('footer');
}

public function detalleItem(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);
$idItem = $this->uri->segment(3);

$data['item'] = $this->persona_model->get_item_por_id($idItem);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/item/editar_item',$data);
$this->load->view('footer');
}

public function editarItem(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);


$iditem=$this->input->post('iditem');
$nombreitem=$this->input->post('nombreitem');


$this->load->library('form_validation');

$this->form_validation->set_rules('iditem', 'ID Item', 'trim|required');
$this->form_validation->set_rules('nombreitem', 'Nombre Item', 'trim|required');

if($this->form_validation->run()){


$data = array(
'iditem'=>$this->input->post('iditem'),
'nombreitem'=>$this->input->post('nombreitem')
);


$ingreso_item = $this->persona_model->editarItem($data);
if($ingreso_item > 0){
$this->session->set_flashdata('success', 'Datos ingresados correctamente!.');
redirect('perfil/detalleItem/'.$data['iditem']);
}else{
$this->session->set_flashdata('error', 'No se modifico ningún registro!!.');
redirect('perfil/detalleItem/'.$data['iditem']);
}

}else{
$this->session->set_flashdata('error', 'No dejar campos vacíos!.');
redirect('perfil/detalleItem/'.$id);
}

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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region(),
'cuenta'=>$this->persona_model->listar_cuenta()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/cuenta/ver_cuenta', $data);
if (isset($_POST['aceptar'])) {

$cuenta=$this->input->post('cuenta');
$ano=$this->input->post('ano');


if($cuenta==99){
$filtro=$this->persona_model->all_cuenta($ano,$cuenta);
}else{
$filtro=$this->persona_model->filtro_cuenta($ano,$cuenta);
}
$data['filtro']=$filtro;


if($filtro!=""){
$this->load->view('perfil/cuenta/busqueda',$data);
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

public function agregar_cuenta(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'item'=>$this->persona_model->listar_item()

);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('item','Item','required|trim|xss_clean');
$this->form_validation->set_rules('nombreCuenta','Nombre de Cuenta','required|trim|xss_clean|is_unique[cuenta.nombreCuenta]');
$this->form_validation->set_message('required',' campo requerido');

if($this->form_validation->run()){

$item=$this->input->post('item');
$nombreCuenta=$this->input->post('nombreCuenta');

$insert=$this->persona_model->nueva_cuenta($item,$nombreCuenta);
if($insert){
echo "<script>alert('Acaba de agregar una cuenta presupuestaria');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}


}
$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/cuenta/agregar_cuenta', $data);
$this->load->view('footer');
}



public function agregar_presupuesto_cuenta(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'cuenta' => $this->persona_model->listar_cuenta()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('cuenta','cuenta','required|trim|xss_clean');
$this->form_validation->set_rules('ano','Año','required|trim|xss_clean');
$this->form_validation->set_rules('monto','Monto','required|trim|xss_clean');
$this->form_validation->set_message('required',' campo requerido');

if($this->form_validation->run()){
$cuenta=$this->input->post('cuenta');
$ano=$this->input->post('ano');
$monto=$this->input->post('monto');

$existe=$this->persona_model->existe_pres_cuenta($cuenta,$ano,$monto);
if ($existe) {
$insert=$this->persona_model->nueva_cuenta_presupuesto($cuenta,$ano,$monto);
if($insert){
echo "<script>alert('Acaba de agregar una cuenta presupuestaria');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
else{
echo "<script>alert('Ya existe una cuenta para los datos ingresados');</script>";
}

}
}
$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/cuenta/agregar_presupuesto_cuenta', $data);
$this->load->view('footer');
}



public function llena_cuentaPresupuestaria()
{
$options = "";
if($this->input->post('item'))
{
$itemCuenta = $this->input->post('item');
$cuentaPresupuestaria = $this->cascada_model->cuentaPresupuestaria($itemCuenta);
foreach($cuentaPresupuestaria as $fila)
{
?>
<option value="<?=$fila -> idCuenta; ?>"><?=$fila -> nombreCuenta;?></option>
<?php
}
}
}

public function detalleCuentaPre(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);
$idPCta = $this->uri->segment(3);

$data['cuePre'] = $this->persona_model->get_cuePre_por_id($idPCta);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/cuenta/editar_cuenta_pre',$data);
$this->load->view('footer');
}

public function editarCuentaPre(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);


$idPCta=$this->input->post('idPCta');
$anoPCta=$this->input->post('anoPCta');
$montoPCta=$this->input->post('montoPCta');


$this->load->library('form_validation');

$this->form_validation->set_rules('idPCta', 'ID Presupuesto', 'trim|required');
$this->form_validation->set_rules('anoPCta', 'Año', 'trim|required');
$this->form_validation->set_rules('montoPCta', 'Monto', 'trim|required');
if($this->form_validation->run()){


$data = array(
'idPCta'=>$this->input->post('idPCta'),
'anoPCta'=>$this->input->post('anoPCta'),
'montoPCta'=>$this->input->post('montoPCta')
);


$ingreso_item = $this->persona_model->editarCuentaPre($data);
if($ingreso_item > 0){
$this->session->set_flashdata('success', 'Datos ingresados correctamente!.');
redirect('perfil/detalleCuentaPre/'.$data['idPCta']);
}else{
$this->session->set_flashdata('error', 'No se modifico ningún registro!!.');
redirect('perfil/detalleCuentaPre/'.$data['idPCta']);
}

}else{
$this->session->set_flashdata('error', 'No dejar campos vacíos!.');
redirect('perfil/detalleCuentaPre/'.$id);
}

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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'actividad' => $this->persona_model->listar_actividad()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/actividad/ver_actividad', $data);
if (isset($_POST['aceptar'])) {

$actividad=$this->input->post('actividad');
$ano=$this->input->post('ano');


if($actividad==99){
$filtro=$this->persona_model->all_actividad($ano,$actividad);
}else{
$filtro=$this->persona_model->filtro_actividad($ano,$actividad);
}
$data['filtro']=$filtro;


if($filtro!=""){
$this->load->view('perfil/actividad/busqueda',$data);
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

public function agregar_actividad(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'item'=>$this->persona_model->listar_item(),
'componente'=>$this->persona_model->comp_prog()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('componente','Componente','required|trim|xss_clean');
$this->form_validation->set_rules('nombreAct','Nombre Actividad','required|trim|xss_clean');
$this->form_validation->set_message('required',' campo requerido');


if($this->form_validation->run()){
$componente=$this->input->post('componente');
$nombreAct=$this->input->post('nombreAct');



$insert=$this->persona_model->nueva_actividad($componente,$nombreAct);
if($insert){
echo "<script>alert('Acaba de agregar una actividad');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}

}
$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/actividad/agregar_actividad', $data);
$this->load->view('footer');
}

public function agregar_presupuesto_actividad(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'actividad' => $this->persona_model->listar_actividad(),
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'componente'=>$this->persona_model->comp_prog(),
'item'=>$this->persona_model->listar_item()
);

if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('actividad','Actividad','required|trim|xss_clean');
$this->form_validation->set_rules('ano','Año','required|trim|xss_clean');
$this->form_validation->set_rules('afecto','Afecto','required|trim|xss_clean');
$this->form_validation->set_rules('monto','Monto','required|trim|xss_clean');
$this->form_validation->set_rules('componente','Componente','required|trim|xss_clean');
$this->form_validation->set_message('required',' campo requerido');


if($this->form_validation->run()){
$actividad=$this->input->post('actividad');
$ano=$this->input->post('ano');
$monto=$this->input->post('monto');
$afecto=$this->input->post('afecto');

$existe=$this->persona_model->existe_pres_actividad($ano,$actividad);

if($existe==FALSE){


$insert=$this->persona_model->nueva_actividad_presupuesto($actividad,$ano,$monto,$afecto);
if($insert){
echo "<script>alert('Acaba de agregar una actividad');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}else{
echo "<script>alert('Ya existe un presupuesto para la actividad ingresada.');</script>";
}

}
}
$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/actividad/agregar_presupuesto_actividad', $data);
$this->load->view('footer');
}
public function llena_actividad()
{
$options = "";
if($this->input->post('componente'))
{
$componente = $this->input->post('componente');
$actividad = $this->cascada_model->actividad($componente);
?>
<option value="">Seleccione actividad</option>
<?php
foreach($actividad as $fila)
{
?>
<option value="<?=$fila -> idAct ?>"><?=$fila -> nombreAct ?></option>
<?php
}
}
}

public function detalleActividadPre(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);
$idPA = $this->uri->segment(3);

$data['actPre'] = $this->persona_model->get_actPre_por_id($idPA);

$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/actividad/editar_actividad_pre',$data);
$this->load->view('footer');
}

public function editarActividadPre(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);


$idPA=$this->input->post('idPA');
$anoPA=$this->input->post('anoPA');
$montoPA=$this->input->post('montoPA');
$afectoPA=$this->input->post('afectoPA');


$this->load->library('form_validation');

$this->form_validation->set_rules('idPA', 'ID Presupuesto', 'trim|required');
$this->form_validation->set_rules('anoPA', 'Año', 'trim|required');
$this->form_validation->set_rules('montoPA', 'Monto', 'trim|required');
$this->form_validation->set_rules('afectoPA', 'Afecto', 'trim|required');
if($this->form_validation->run()){


$data = array(
'idPA'=>$this->input->post('idPA'),
'anoPA'=>$this->input->post('anoPA'),
'montoPA'=>$this->input->post('montoPA'),
'afectoPA'=>$this->input->post('afectoPA')
);


$ingreso_item = $this->persona_model->editarActividadPre($data);
if($ingreso_item > 0){
$this->session->set_flashdata('success', 'Datos ingresados correctamente!.');
redirect('perfil/detalleActividadPre/'.$data['idPA']);
}else{
$this->session->set_flashdata('error', 'No se modifico ningún registro!!.');
redirect('perfil/detalleActividadPre/'.$data['idPA']);
}

}else{
$this->session->set_flashdata('error', 'No dejar campos vacíos!.');
redirect('perfil/detalleActividadPre/'.$id);
}

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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'item'=>$this->persona_model->listar_item(),
'actividad'=>$this->cascada_model->comp_act(),
'cuenta'=>$this->persona_model->item_cuenta(),
'region'=>$this->persona_model->listar_region()
);
if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('actividad','Actividad','required|trim|xss_clean');
$this->form_validation->set_rules('cuenta','Cuenta','required|trim|xss_clean');
$this->form_validation->set_rules('region','Region','required|trim|xss_clean');
$this->form_validation->set_rules('monto','Monto','required|trim|xss_clean');
$this->form_validation->set_message('required',' campo requerido');

if($this->form_validation->run()){
$actividad=$this->input->post('actividad');
$cuenta=$this->input->post('cuenta');
$region=$this->input->post('region');
$monto=$this->input->post('monto');
$existe=$this->persona_model->existe_propir($actividad,$cuenta,$region);

if($existe){
$insert=$this->persona_model->agregarPropir($actividad,$cuenta,$region,$monto);
}
if($insert){
echo "<script>alert('Acaba de Generar un PROPIR');</script>";
}else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}else{
echo "<script>alert('Ya existe un propir con los mismos datos ingresados');</script>";
}}
$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/propir/agregar_propir', $data);
$this->load->view('footer');
}



public function ver_propir(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'filtro'=>$this->persona_model->all_propir()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/propir/ver_resumen', $data);

$this->load->view('footer');
}

public function detallePropir(){
$session_data=$this->session->userdata('datosuser');
$idPropir = $this->uri->segment(3);
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'propir' => $this->persona_model->get_propir_por_id($idPropir),
'programa'=>$this->persona_model->listar_programa(),
'item'=>$this->persona_model->listar_item(),
'actividad'=>$this->cascada_model->comp_act(),
'cuenta'=>$this->persona_model->item_cuenta(),
'region'=>$this->persona_model->listar_region()
);



$this->load->view('header');
$this->load->view('perfil/menu/menu-perfil',$data);
$this->load->view('perfil/propir/editar_propir',$data);
$this->load->view('footer');
}

public function editarPropir(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'item'=>$this->persona_model->listar_item(),
'actividad'=>$this->cascada_model->comp_act(),
'cuenta'=>$this->persona_model->item_cuenta(),
'region'=>$this->persona_model->listar_region()
);


$idPropir=$this->input->post('idPropir');
$idPA=$this->input->post('idPA');
$idCP=$this->input->post('idCP');
$idReg=$this->input->post('idReg');
$montoPropir=$this->input->post('montoPropir');


$this->load->library('form_validation');

$this->form_validation->set_rules('idPropir', 'ID Presupuesto', 'trim|required');
$this->form_validation->set_rules('idPA', 'Actividad', 'trim|required');
$this->form_validation->set_rules('idCP', 'Cuenta', 'trim|required');
$this->form_validation->set_rules('idReg', 'Región', 'trim|required');
$this->form_validation->set_rules('montoPropir', 'Monto', 'trim|required');
if($this->form_validation->run()){


$data = array(
'idPropir'=>$this->input->post('idPropir'),
'idPA'=>$this->input->post('idPA'),
'idCP'=>$this->input->post('idCP'),
'idReg'=>$this->input->post('idReg'),
'montoPropir'=>$this->input->post('montoPropir')
);


$ingreso_item = $this->persona_model->editarPropir($data);
if($ingreso_item > 0){
$this->session->set_flashdata('success', 'Datos ingresados correctamente!.');
redirect('perfil/detallePropir/'.$data['idPropir']);
}else{
$this->session->set_flashdata('error', 'No se modifico ningún registro!!.');
redirect('perfil/detallePropir/'.$data['idPropir']);
}

}else{
$this->session->set_flashdata('error', 'No dejar campos vacíos!.');
redirect('perfil/detallePropir/'.$id);
}

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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
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
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
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

public function gastos(){
$session_data=$this->session->userdata('datosuser');

$region=$session_data['regionUsr'];
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'item'=>$this->persona_model->listar_item(),
// 'region'=>$this->persona_model->listar_region_b($region),
'region'=>$this->persona_model->listar_region(),
'programa'=>$this->persona_model->listar_programa(),
'codigo'=>$this->persona_model->codigo_gasto(),
'proveedor'=>$this->persona_model->listar_proveedor()
);


if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('region','Región','trim|required|xss_clean');
$this->form_validation->set_rules('programa','Programa','trim|required|xss_clean');
$this->form_validation->set_rules('componente','Componente','trim|required|xss_clean');
$this->form_validation->set_rules('actividad','Actividad','trim|required|xss_clean');

$this->form_validation->set_rules('iva','','trim|required|xss_clean');
$this->form_validation->set_rules('mesejecucion','','trim|required|xss_clean');
$this->form_validation->set_rules('fechaactividad','','trim|required|xss_clean');
$this->form_validation->set_rules('tipogasto','','trim|required|xss_clean');
$this->form_validation->set_rules('estado','','trim|required|xss_clean');
$this->form_validation->set_rules('observaciones','','trim|required|xss_clean|min_length[5]');
$this->form_validation->set_rules('fechamemo','','trim|required|xss_clean');
$this->form_validation->set_rules('visacion','','trim|required|xss_clean');
$this->form_validation->set_rules('proveedor','','trim|required|xss_clean');
$this->form_validation->set_rules('codigo', 'Código de Ingreso', 'trim|required|xss_clean|is_unique[gastos.codGasto]');

$this->form_validation->set_message('required','Campo Requerido');

if($this->form_validation->run()){
$codigo=$this->input->post('codigo');
$region=$this->input->post('region');
$programa=$this->input->post('programa');
$componente=$this->input->post('componente');
$actividad=$this->input->post('actividad');
// == 0 ==
$item0=$this->input->post('item0');
$cuenta0=$this->input->post('cuenta0');
$codtaller0=$this->input->post('codtaller0');
$nombreactividad0=$this->input->post('nombreactividad0');
$producto0=$this->input->post('producto0');
$monto0=$this->input->post('monto0');
// == 0 ==

// == 1 ==
$item1=$this->input->post('item1');
$cuenta1=$this->input->post('cuenta1');
$codtaller1=$this->input->post('codtaller1');
$nombreactividad1=$this->input->post('nombreactividad1');
$producto1=$this->input->post('producto1');
$monto1=$this->input->post('monto1');
// == 1 ==

// == 2 ==
$item2=$this->input->post('item2');
$cuenta2=$this->input->post('cuenta2');
$codtaller2=$this->input->post('codtaller2');
$nombreactividad2=$this->input->post('nombreactividad2');
$producto2=$this->input->post('producto2');
$monto2=$this->input->post('monto2');
// == 2 ==

// == 3 ==
$item3=$this->input->post('item3');
$cuenta3=$this->input->post('cuenta3');
$codtaller3=$this->input->post('codtaller3');
$nombreactividad3=$this->input->post('nombreactividad3');
$producto3=$this->input->post('producto3');
$monto3=$this->input->post('monto3');
// == 3 ==

// == 4 ==
$item4=$this->input->post('item4');
$cuenta4=$this->input->post('cuenta4');
$codtaller4=$this->input->post('codtaller4');
$nombreactividad4=$this->input->post('nombreactividad4');
$producto4=$this->input->post('producto4');
$monto4=$this->input->post('monto4');
// == 4 ==

// == 5 ==
$item5=$this->input->post('item5');
$cuenta5=$this->input->post('cuenta5');
$codtaller5=$this->input->post('codtaller5');
$nombreactividad5=$this->input->post('nombreactividad5');
$producto5=$this->input->post('producto5');
$monto5=$this->input->post('monto5');
// == 5 ==



$iva=$this->input->post('iva');
$mesejecucion=$this->input->post('mesejecucion');
$fechaactividad=$this->input->post('fechaactividad');
$tipogasto=$this->input->post('tipogasto');
$estado=$this->input->post('estado');
$observaciones=$this->input->post('observaciones');

$fechamemo=$this->input->post('fechamemo');
$visacion=$this->input->post('visacion');
$proveedor=$this->input->post('proveedor');


if($this->input->post('jefe')==""){
$jefe=$this->input->post('director_b');
}else{
$jefe=$this->input->post('jefe');
}


if($this->input->post('director')==""){
$director=$this->input->post('director_b');
}else{
$director=$this->input->post('director');
}




if($codtaller0==""){$codtaller0=NULL;}
if($codtaller1==""){$codtaller1=NULL;}
if($codtaller2==""){$codtaller2=NULL;}
if($codtaller3==""){$codtaller3=NULL;}
if($codtaller4==""){$codtaller4=NULL;}
if($codtaller5==""){$codtaller5=NULL;}
$datas=array(
'idGasto'=>NULL,
'codGasto'=>$codigo,
'idReg'=>$region,
'idProg'=>$programa,
'idComp'=>$componente,
'idAct'=>$actividad,
'idCuenta'=>$cuenta0,
'idItem'=>$item0,
'codTaller'=>$codtaller0,
'nombreActGastos'=>$nombreactividad0,
'productoAct'=>$producto0,
'monto'=>$monto0,
'iva'=>$iva,
'mesejecucion'=>$mesejecucion,
'mescontable'=>NULL,
'fechainicio'=>$fechaactividad,
'tipogasto'=>$tipogasto,
'estado'=>$estado,
'idProv'=>$proveedor,
'observaciones'=>$observaciones,
'jefedepto'=>$jefe,
'directorreg'=>$director,
'fechamemooc'=>$fechamemo,
'visacion'=>$visacion,
'etapaFlag'=>0,
'adjunto'=>"",

'idCuenta1'=>$cuenta1,
'idItem1'=>$item1,
'codTaller1'=>$codtaller1,
'nombreActGastos1'=>$nombreactividad1,
'productoAct1'=>$producto1,
'monto1'=>$monto1,

'idCuenta2'=>$cuenta2,
'idItem2'=>$item2,
'codTaller2'=>$codtaller2,
'nombreActGastos2'=>$nombreactividad2,
'productoAct2'=>$producto2,
'monto2'=>$monto2,

'idCuenta3'=>$cuenta3,
'idItem3'=>$item3,
'codTaller3'=>$codtaller3,
'nombreActGastos3'=>$nombreactividad3,
'productoAct3'=>$producto3,
'monto3'=>$monto3,

'idCuenta4'=>$cuenta4,
'idItem4'=>$item4,
'codTaller4'=>$codtaller4,
'nombreActGastos4'=>$nombreactividad4,
'productoAct4'=>$producto4,
'monto4'=>$monto4,

'idCuenta5'=>$cuenta5,
'idItem5'=>$item5,
'codTaller5'=>$codtaller5,
'nombreActGastos5'=>$nombreactividad5,
'productoAct5'=>$producto5,
'monto5'=>$monto5
);

$insert=$this->persona_model->insertar_gastos($datas);

if ($insert) {
echo "<script>window.alert('Acaba de ingresar un gasto');window.location='".base_url('perfil/ver_gastos/'.$codigo)."';</script>";

}else{
echo "<script>window.alert('Ocurrio un error');</script>";
}

}

}

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/home', $data);
$this->load->view('footer');
}


public function adjuntar()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);

$data['error']="";

$data['codigomemo']=$this->uri->segment(3);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/cargar', $data);
$this->load->view('footer');
}



public function do_upload()
{
// $config['allowed_types'] = 'pdf';

// $this->load->helper('path');
////set_realpath('./uploads/peliculas/'.$idp."/");
//retorna el directorio en el servidor /var/www/proyecto/[B]uploads/peliculas/10[/B]
//para dentro de application //set_realpath('./application/uploads/peliculas/'.$idp."/");

// $config['file_name'] = $this->uri->segment(3);


// Estructura de la carpeta deseada


if(isset($_POST['submit']))
{

$estructura = 'uploads/'.$this->uri->segment(3);
$oldmask = umask(0);
mkdir($estructura, 0777);
umask($oldmask);

$this->load->library('upload');
$config['upload_path']="./".$estructura;
$config['allowed_types'] = 'pdf';

$this->upload->initialize($config);
$x=0;
foreach ($_FILES as $field => $file) {
if($this->upload->do_upload($field))
{
// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

$id=$this->uri->segment(3);
$file_info = $this->upload->data();
$nombrearchivo = $file_info['file_name'];

if($x==0){
$archivouno=$nombrearchivo;
$update=$this->persona_model->update_adjunto($id,$archivouno);

}else{
$archivodos=$nombrearchivo;
$update=$this->persona_model->update_adjuntodos($id,$archivodos);

//echo "<br>insertando archivo dos: ".$nombrearchivo." - ".$rut;
}




$x=1;
}
else
{
$data['error']=$this->upload->display_errors();
}
}
$filex=$this->uri->segment(3);
if($update){
echo "<script>alert('Se adjuntaron 2 archivos de manera correcta');window.location='".base_url('perfil/ver_gastos')."';</script>";
}
else{
echo "<script>alert('No se adjunto el archivo,intenta denuevo.');window.location='".base_url('perfil/adjuntar/'.$filex)."';</script>";
}
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios(),
'error' => $this->upload->display_errors(),
'codigomemo'=>$this->uri->segment(3)
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/cargar', $data);
$this->load->view('footer');

}

}


// ================= ADJUNTAR BOLETA HONORARIOS

public function adjuntar_boleta()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);

$data['error']="";

$data['codigomemo']=$this->uri->segment(3);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/cargar_boleta', $data);
$this->load->view('footer');
}

public function do_upload_boleta()
{


if(isset($_POST['submit']))
{
$estructura = 'uploads/'.$this->uri->segment(3);
$oldmask = umask(0);
mkdir($estructura, 0777);
umask($oldmask);

$this->load->library('upload');
$config['upload_path']="./".$estructura;
$config['allowed_types'] = 'pdf';

$this->upload->initialize($config);
$x=0;
foreach ($_FILES as $field => $file) {
if($this->upload->do_upload($field))
{
// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

$id=$this->uri->segment(3);
$file_info = $this->upload->data();
$nombrearchivo = $file_info['file_name'];

if($x==0){
$archivotres=$nombrearchivo;
$etapaFlag=4;
$update=$this->persona_model->update_adjunto_boleta($id,$archivotres,$etapaFlag);

}else{
$archivodos=$nombrearchivo;
$update=$this->persona_model->update_adjuntodos($id,$archivodos);

//echo "<br>insertando archivo dos: ".$nombrearchivo." - ".$rut;
}
$x=1;
}
else
{
$data['error']=$this->upload->display_errors();
}
}
$filex=$this->uri->segment(3);
if($update){
echo "<script>alert('Se adjunto 1 archivo de manera correcta');window.location='".base_url('perfil/revisados')."';</script>";
}
else{
echo "<script>alert('No se adjunto el archivo,intenta denuevo.');window.location='".base_url('perfil/adjuntar/'.$filex)."';</script>";
}
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios(),
'error' => $this->upload->display_errors(),
'codigomemo'=>$this->uri->segment(3)
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/cargar', $data);
$this->load->view('footer');

}

}


// ================= ADJUNTAR BOLETA HONORARIOS

// ================= ADJUNTAR OC NIVEL CENTRAL
public function adjuntar_oc_nc()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);

$data['error']="";

$data['codigomemo']=$this->uri->segment(3);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/cargar_oc_nc', $data);
$this->load->view('footer');
}

public function do_upload_oc_nc()
{
if(isset($_POST['submit']))
{

$estructura = 'uploads/'.$this->uri->segment(3);
$oldmask = umask(0);
mkdir($estructura, 0777);
umask($oldmask);

$this->load->library('upload');
$config['upload_path']="./".$estructura;
$config['allowed_types'] = 'pdf';

$this->upload->initialize($config);
$x=0;
foreach ($_FILES as $field => $file) {
if($this->upload->do_upload($field))
{
// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

$id=$this->uri->segment(3);
$file_info = $this->upload->data();
$nombrearchivo = $file_info['file_name'];

if($x==0){
$archivouno=$nombrearchivo;
$etapaFlag=2;
$update=$this->persona_model->update_adjuntouno_oc_nc($id,$archivouno,$etapaFlag);

}else{
$archivodos=$nombrearchivo;
$update=$this->persona_model->update_adjunto_oc_nc($id,$archivodos);

//echo "<br>insertando archivo dos: ".$nombrearchivo." - ".$rut;
}




$x=1;
}
else
{
$data['error']=$this->upload->display_errors();
}
}
$filex=$this->uri->segment(3);
if($update){
echo "<script>alert('Se adjuntaron 2 archivos de manera correcta');window.location='".base_url('perfil/ver_gastos')."';</script>";
}
else{
echo "<script>alert('No se adjunto el archivo,intenta denuevo.');window.location='".base_url('perfil/adjuntar/'.$filex)."';</script>";
}
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios(),
'error' => $this->upload->display_errors(),
'codigomemo'=>$this->uri->segment(3)
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/cargar', $data);
$this->load->view('footer');

}

}


// ADJUNTAR MEMO DOS ===============

public function adjuntar_memo_dos()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);

$data['error']="";

$data['codigomemo']=$this->uri->segment(3);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti/cargar', $data);
$this->load->view('footer');
}

public function do_upload_dos()
{
// $config['allowed_types'] = 'pdf';

// $this->load->helper('path');
////set_realpath('./uploads/peliculas/'.$idp."/");
//retorna el directorio en el servidor /var/www/proyecto/[B]uploads/peliculas/10[/B]
//para dentro de application //set_realpath('./application/uploads/peliculas/'.$idp."/");

// $config['file_name'] = $this->uri->segment(3);


// Estructura de la carpeta deseada


if(isset($_POST['submit']))
{

$estructura = 'uploads/'.$this->uri->segment(3);

$this->load->library('upload');
$config['upload_path']="./".$estructura;
$config['allowed_types'] = 'pdf';

$this->upload->initialize($config);
$x=0;
foreach ($_FILES as $field => $file) {
if($this->upload->do_upload($field))
{
// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

$id=$this->uri->segment(3);
$file_info = $this->upload->data();
$nombrearchivo = $file_info['file_name'];

if($x==0){
$archivotres=$nombrearchivo;
$etapaFlag=2;
$update=$this->persona_model->update_adjunto_tres($id,$archivotres,$etapaFlag);

}else{
$archivodos=$nombrearchivo;
$update=$this->persona_model->update_adjuntodos($id,$archivodos);

//echo "<br>insertando archivo dos: ".$nombrearchivo." - ".$rut;
}




$x=1;
}
else
{
$data['error']=$this->upload->display_errors();
}
}
$filex=$this->uri->segment(3);
if($update){
echo "<script>alert('Se adjunto 1 archivo de manera correcta');window.location='".base_url('perfil/revisados')."';</script>";
}
else{
echo "<script>alert('No se adjunto el archivo,intenta denuevo.');window.location='".base_url('perfil/adjuntar/'.$filex)."';</script>";
}
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios(),
'error' => $this->upload->display_errors(),
'codigomemo'=>$this->uri->segment(3)
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/cargar', $data);
$this->load->view('footer');

}

}


// ADJUNTAR MEMO TRES ===============

public function adjuntar_memo_tres()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);

$data['error']="";

$data['codigomemo']=$this->uri->segment(3);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pnud/cargar', $data);
$this->load->view('footer');
}

public function do_upload_tres()
{
if(isset($_POST['submit']))
{

$estructura = 'uploads/'.$this->uri->segment(3);

$this->load->library('upload');
$config['upload_path']="./".$estructura;
$config['allowed_types'] = 'pdf';

$this->upload->initialize($config);
$x=0;
foreach ($_FILES as $field => $file) {
if($this->upload->do_upload($field))
{
// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

$id=$this->uri->segment(3);
$file_info = $this->upload->data();
$nombrearchivo = $file_info['file_name'];

if($x==0){
$archivocuatro=$nombrearchivo;
$update=$this->persona_model->update_adjunto_cuatro($id,$archivocuatro);

}

}
else
{
$data['error']=$this->upload->display_errors();
}
}
$filex=$this->uri->segment(3);
if($update){
echo "<script>alert('Se adjunto 1 archivo de manera correcta');window.location='".base_url('perfil/pnud_aprobado')."';</script>";
}
else{
echo "<script>alert('No se adjunto el archivo,intenta denuevo.');window.location='".base_url('perfil/adjuntar_memo_tres/'.$filex)."';</script>";
}
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios(),
'error' => $this->upload->display_errors(),
'codigomemo'=>$this->uri->segment(3)
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pnud/cargar', $data);
$this->load->view('footer');

}

}

// ADJUNTAR MEMO TRES ===============

public function adjuntar_memo_tres_oc_nc()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);

$data['error']="";

$data['codigomemo']=$this->uri->segment(3);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pnud/cargar_oc_nc', $data);
$this->load->view('footer');
}

public function do_upload_tres_oc_nc()
{
if(isset($_POST['submit']))
{

$estructura = 'uploads/'.$this->uri->segment(3);

$this->load->library('upload');
$config['upload_path']="./".$estructura;
$config['allowed_types'] = 'pdf';

$this->upload->initialize($config);
$x=0;
foreach ($_FILES as $field => $file) {
if($this->upload->do_upload($field))
{
// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

$id=$this->uri->segment(3);
$file_info = $this->upload->data();
$nombrearchivo = $file_info['file_name'];

if($x==0){
$archivocuatro=$nombrearchivo;
$update=$this->persona_model->update_adjunto_cuatro_oc_nc($id,$archivocuatro);

}

}
else
{
$data['error']=$this->upload->display_errors();
}
}
$filex=$this->uri->segment(3);
if($update){
echo "<script>alert('Se adjunto 1 archivo de manera correcta');window.location='".base_url('perfil/pnud_aprobado')."';</script>";
}
else{
echo "<script>alert('No se adjunto el archivo,intenta denuevo.');window.location='".base_url('perfil/adjuntar_memo_tres/'.$filex)."';</script>";
}
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios(),
'error' => $this->upload->display_errors(),
'codigomemo'=>$this->uri->segment(3)
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pnud/cargar_oc_nc', $data);
$this->load->view('footer');

}

}


// ADJUNTAR MEMO CUATRO ===============

public function adjuntar_memo_cuatro()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);

$data['error']="";

$data['codigomemo']=$this->uri->segment(3);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti_reg/cargar', $data);
$this->load->view('footer');
}

public function do_upload_cuatro()
{
if(isset($_POST['submit']))
{

$estructura = 'uploads/'.$this->uri->segment(3);

$this->load->library('upload');
$config['upload_path']="./".$estructura;
$config['allowed_types'] = 'pdf';

$this->upload->initialize($config);
$x=0;
foreach ($_FILES as $field => $file) {
if($this->upload->do_upload($field))
{
// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

$id=$this->uri->segment(3);
$file_info = $this->upload->data();
$nombrearchivo = $file_info['file_name'];

if($x==0){
$archivocinco=$nombrearchivo;
$update=$this->persona_model->update_adjunto_cinco($id,$archivocinco);

}

}
else
{
$data['error']=$this->upload->display_errors();
}
}
$filex=$this->uri->segment(3);
if($update){
echo "<script>alert('Se adjunto 1 archivo de manera correcta');window.location='".base_url('perfil/reg_revisados')."';</script>";
}
else{
echo "<script>alert('No se adjunto el archivo,intenta denuevo.');window.location='".base_url('perfil/adjuntar_memo_cuatro/'.$filex)."';</script>";
}
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios(),
'error' => $this->upload->display_errors(),
'codigomemo'=>$this->uri->segment(3)
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti_reg/cargar', $data);
$this->load->view('footer');

}

}

// ADJUNTAR MEMO CINCO ===============

public function adjuntar_memo_cinco()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios()
);

$data['error']="";

$data['codigomemo']=$this->uri->segment(3);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pago_facturas/cargar', $data);
$this->load->view('footer');
}

public function do_upload_cinco()
{
if(isset($_POST['submit']))
{

$estructura = 'uploads/'.$this->uri->segment(3);

$this->load->library('upload');
$config['upload_path']="./".$estructura;
$config['allowed_types'] = 'pdf';

$this->upload->initialize($config);
$x=0;
foreach ($_FILES as $field => $file) {
if($this->upload->do_upload($field))
{
// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

$id=$this->uri->segment(3);
$file_info = $this->upload->data();
$nombrearchivo = $file_info['file_name'];

if($x==0){
$archivoseis=$nombrearchivo;
$update=$this->persona_model->update_adjunto_seis($id,$archivoseis);

}

}
else
{
$data['error']=$this->upload->display_errors();
}
}
$filex=$this->uri->segment(3);
if($update){
echo "<script>alert('Se adjunto 1 archivo de manera correcta');window.location='".base_url('perfil/pago_facturas_revisada')."';</script>";
}
else{
echo "<script>alert('No se adjunto el archivo,intenta denuevo.');window.location='".base_url('perfil/adjuntar_memo_cinco/'.$filex)."';</script>";
}
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'usuarios' => $this->persona_model->ver_usuarios(),
'error' => $this->upload->display_errors(),
'codigomemo'=>$this->uri->segment(3)
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti_reg/cargar', $data);
$this->load->view('footer');

}

}


public function ver_gastos()
{
$session_data=$this->session->userdata('datosuser');
$region=$session_data['regionUsr'];
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
// 'gastos'=>$this->persona_model->listar_gastos_b($region)
'gastos'=>$this->persona_model->listar_gastos()
);


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/ver_gastos', $data);
$this->load->view('footer');
}

public function generar_memo()
{



$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);

$id=$this->uri->segment(3);

$data['set_memo']=$this->persona_model->get_datos_memo($id);



$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/gastos/memo', $data);
$this->load->view('footer');
}



public function revisar_etapa_dos()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region(),
'programa'=>$this->persona_model->listar_programa(),
'codigo'=>$this->persona_model->codigo_gasto(),
'proveedor'=>$this->persona_model->listar_proveedor()
);


$id=$this->uri->segment(3);

$data['revisar']=$this->persona_model->get_datos_memo($id);


if (isset($_POST['aceptar'])) {
$codigo=$id;
$visacion=$this->input->post('visacion');
$jefedepto=$this->input->post('jefedepto');
$observaciones=$this->input->post('observaciones');
$etapaFlag=1;

$update=$this->persona_model->aprobar_memo_etapa_dos($codigo,$visacion,$jefedepto,$observaciones,$etapaFlag);

if ($update) {
echo "<script>alert('Acaba de aprobar un memorandum');window.location='".base_url('perfil/notificaciones')."';</script>";
}

}


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti/revisar', $data);
$this->load->view('footer');
}


public function rechazar_etapa_dos()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);

if(isset($_POST['aceptar'])){
$codigo=$this->input->post('idrechazo');

$update=$this->persona_model->rechazar_etapa_dos($codigo);
if($update){
redirect('perfil/notificaciones','refresh');
}

}

}


public function generate()
{

require_once("dompdf/dompdf_config.inc.php");
$conexion = mysql_connect("localhost","root","2wsxcde3");
mysql_select_db("aa_controlpresupuestario",$conexion);

$id=$this->uri->segment(3);

$set_memo=$this->persona_model->get_datos_memo($id);


foreach($set_memo as $memo){
if($memo->iva=="SI")
{
$iva="Total IVA incluido:";
}
else{
$iva="Total:";
}

$busca = array('á','é','í','ó','ú');
$remplaza = array('Á','É','Í','Ó','Ú');

if($memo->nombreCuentaUno!=NULL) { $AA=1;} else{ $AA=0; }
if($memo->nombreCuentaDos!=NULL) { $BB=1;} else{ $BB=0; }
if($memo->nombreCuentaTres!=NULL) { $CC=1;} else{ $CC=0; }
if($memo->nombreCuentaCuatro!=NULL) { $DD=1;} else{ $DD=0; }
if($memo->nombreCuentaCinco!=NULL) { $EE=1;} else{ $EE=0; }
$FF=1;
$rowtotal=$AA+$BB+$CC+$DD+$EE+$FF;

if($memo->jefedepto==1){
$a="Orlando Mancilla Vasquez";
$a_cargo="JEFE DEPTO. DE ADMINISTRACIÓN Y FINANZAS";
}
if($memo->jefedepto==2){
$a="Angela Venegas Avila";
$a_cargo="JEFA (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->jefedepto==3){
$a="Marcos Barretto Muñoz";
$a_cargo="JEFE (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->jefedepto==4){
$a="Soledad Castillo Medina";
$a_cargo="COORDINADORA DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->jefedepto==5){
$a="Camila Castillo Guerrero";
$a_cargo="Director Regional";
}
if($memo->jefedepto==6){
$a="Victor Santoro";
$a_cargo="Director Regional";
}
if($memo->jefedepto==7){
$a="Miguel Carvajal";
$a_cargo="Director Regional";
}
if($memo->jefedepto==8){
$a="Emilio Reyes Arias";
$a_cargo="Director Regional";
}
if($memo->jefedepto==9){
$a="Cristina Pavez Cosio";
$a_cargo="Director Regional";
}
if($memo->jefedepto==10){
$a="Jorge Parraguez Caroca";
$a_cargo="Director Regional";
}
if($memo->jefedepto==11){
$a="Irene Muñoz Vilches";
$a_cargo="Director Regional";
}
if($memo->jefedepto==12){
$a="Leocan Portus";
$a_cargo="Director Regional";
}
if($memo->jefedepto==13){
$a="Luis Villegas Cardenas";
$a_cargo="Director Regional";
}
if($memo->jefedepto==14){
$a="Felipe Roman";
$a_cargo="Director Regional";
}
if($memo->jefedepto==15){
$a="Rodrigo Saldivia";
$a_cargo="Director Regional";
}
if($memo->jefedepto==16){
$a="Yenifer Sandoval Alegria";
$a_cargo="Director Regional";
}
if($memo->jefedepto==17){
$a="Stefano Ferreccio Bugueño";
$a_cargo="Director Regional";
}
if($memo->jefedepto==18){
$a="Rodrigo Lepe Nuñez";
$a_cargo="Director Regional";
}
if($memo->jefedepto==19){
$a="Samuel Pozo Alfaro";
$a_cargo="Director Regional";
}
if($memo->jefedepto==20){
$a="Marcos Barretto Muñoz";
$a_cargo="Director Regional (S)";
}

if($memo->directorreg==1){
$de="Orlando Mancilla Vasquez";
$de_cargo="JEFE DEPTO. DE ADMINISTRACIÓN Y FINANZAS";
}
if($memo->directorreg==2){
$de="Angela Venegas Avila";
$de_cargo="JEFA (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->directorreg==3){
$de="Marcos Barretto Muñoz";
$de_cargo="JEFE (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->directorreg==4){
$de="Soledad Castillo Medina";
$de_cargo="COORDINADORA DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->directorreg==5){
$de="Camila Castillo Guerrero";
$de_cargo="Director Regional";
}
if($memo->directorreg==6){
$de="Victor Santoro";
$de_cargo="Director Regional";
}
if($memo->directorreg==7){
$de="Miguel Carvajal";
$de_cargo="Director Regional";
}
if($memo->directorreg==8){
$de="Emilio Reyes Arias";
$de_cargo="Director Regional";
}
if($memo->directorreg==9){
$de="Cristina Pavez Cosio";
$de_cargo="Director Regional";
}
if($memo->directorreg==10){
$de="Jorge Parraguez Caroca";
$de_cargo="Director Regional";
}
if($memo->directorreg==11){
$de="Irene Muñoz Vilches";
$de_cargo="Director Regional";
}
if($memo->directorreg==12){
$de="Leocan Portus";
$de_cargo="Director Regional";
}
if($memo->directorreg==13){
$de="Luis Villegas Cardenas";
$de_cargo="Director Regional";
}
if($memo->directorreg==14){
$de="Felipe Roman";
$de_cargo="Director Regional";
}
if($memo->directorreg==15){
$de="Rodrigo Saldivia";
$de_cargo="Director Regional";
}
if($memo->directorreg==16){
$de="Yenifer Sandoval Alegria";
$de_cargo="Director Regional";
}
if($memo->directorreg==17){
$de="Stefano Ferreccio Bugueño";
$de_cargo="Director Regional";
}
if($memo->directorreg==18){
$de="Rodrigo Lepe Nuñez";
$de_cargo="Director Regional";
}
if($memo->directorreg==19){
$de="Samuel Pozo Alfaro";
$de_cargo="Director Regional";
}
if($memo->directorreg==20){
$de="Marcos Barretto Muñoz";
$de_cargo="Director Regional (S)";
}

$codigoHTML='
<div class="well" style="font-size:9px;font-family:helvetica;">
<table width="100%" border="0">
<tr>
<td width="5%" valign="top"><img src="img/logo.png" alt="" width="90"></td>
</tr>
<tr>
</table>
<table width="100%" border="0">
<tr>
<td rowspan="16" width="12%">&nbsp;</td>
<td>
<table width="100%" border="0" cellpadding="5">
<tr>
<td colspan="3">MEMORANDUM '.strtoupper(str_replace($busca,$remplaza,$memo->nombreProg)).' - '.strtoupper($memo->romanoReg).' &nbsp;&nbsp;&nbsp;Nº &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/'.date("Y").'</td>
</tr>

<tr>
<td width="9%" valign="top">A</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
'.strtoupper(str_replace($busca,$remplaza,$a)).'<br>
'.strtoupper(str_replace($busca,$remplaza,$a_cargo)).'<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">DE</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
'.strtoupper(str_replace($busca,$remplaza,$de)).'<br>
'.strtoupper(str_replace($busca,$remplaza,$de_cargo)).'<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">REF</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top"></td>
</tr>

<tr>
<td width="9%" valign="top">MAT.</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">';


if ($memo->tipogasto==1) {
$tipopago = "SOLICITA O.C PARA ADQUISICIÓN";
}
else if ($memo->tipogasto==2) {
$tipopago = "SOLICITA PAGO DE BOLETA HONORARIO";
}

else if ($memo->tipogasto==3) {
$tipopago = "SOLICITA PAGO";
}

else if ($memo->tipogasto==4) {
$tipopago = "SOLICITA PAGO DE LICITACIÓN";
}
else if ($memo->tipogasto==5) {
$tipopago = "SOLICITA O.C PARA ADQUISICIÓN";
}


if ($memo->tipogasto==1) {
$tipoemision="de la orden de compra";
}
else if ($memo->tipogasto==2) {
$tipoemision="de la Boleta de Honorario";
}

else if ($memo->tipogasto==3) {
$tipoemision="del pago";
}

else if ($memo->tipogasto==4) {
$tipoemision="del pago de licitación";
}
else if ($memo->tipogasto==5) {
$tipoemision="de la orden de compra";
}


$codigoHTML.=''.$tipopago.'
</td>
</tr>

<tr>
<td width="9%" valign="top">FECHA</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top"></td>
</tr>


<tr>
<td colspan="3" align="justify">
De mi consideración:<br>
Junto con saludarle, solicito a usted tramitar la emisión '.$tipoemision.' para implementación de las actividad del DCP, de acuerdo a los datos expuestos a continuación:
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%" border="0">
<tr>
<td width="12%">Razón Social :</td>
<td width="88%">'.$memo->nombreProv.'</td>
</tr>
<tr>
<td width="12%">RUT :</td>
<td width="88%">'.$memo->rutProv.'</td>
</tr>
<tr>
<td width="12%">Dirección :</td>
<td width="88%">'.$memo->direccionProv.'</td>
</tr>
<tr>
<td width="12%">Teléfono :</td>
<td width="88%">'.$memo->telefonoProv.'</td>
</tr>
<tr>
<td width="12%">Obs. :</td>
<td width="88%">'.$memo->observaciones.'</td>
</tr>
</table>
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%" border="1" cellpadding="2">
<tr>
<td width="5%" align="center"><b>Cod. Ingreso</b></td>
<td width="40%" align="center"><b>Detalle de la adquisición</b></td>
<td width="10%" align="center"><b>Cuenta presupuestaria</b></td>
<td width="10%" align="center"><b>Ítem Gasto</b></td>
<td width="10%" align="center"><b>Monto</b></td>
</tr>';


$codigoHTML.='
<tr>
<td align="center" rowspan="'.$rowtotal.'">'.$memo->codGasto.'</td>
<td align="justify">'.$memo->productoAct.'</td>
<td align="center">'.$memo->nombreCuenta.'</td>
<td align="center">'.$memo->nombreItem.'</td>
<td align="center">$ '.number_format($memo->monto,0,",",".").'</td>
</tr>';

if($memo->nombreCuentaUno!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct1.'</td>
<td align="center">'.$memo->nombreCuentaUno.'</td>
<td align="center">'.$memo->nombreItemUno.'</td>
<td align="center">$ '.number_format($memo->monto1,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaDos!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct2.'</td>
<td align="center">'.$memo->nombreCuentaDos.'</td>
<td align="center">'.$memo->nombreItemDos.'</td>
<td align="center">$ '.number_format($memo->monto2,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaTres!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct3.'</td>
<td align="center">'.$memo->nombreCuentaTres.'</td>
<td align="center">'.$memo->nombreItemTres.'</td>
<td align="center">$ '.number_format($memo->monto3,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaCuatro!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct4.'</td>
<td align="center">'.$memo->nombreCuentaCuatro.'</td>
<td align="center">'.$memo->nombreItemCuatro.'</td>
<td align="center">$ '.number_format($memo->monto4,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaCinco!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct5.'</td>
<td align="center">'.$memo->nombreCuentaCinco.'</td>
<td align="center">'.$memo->nombreItemCinco.'</td>
<td align="center">$'.number_format($memo->monto5,0,",",".").'></td>
</tr>';
}

$totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5;
$codigoHTML.='
<tr>
<td colspan="4" align="right">'.$iva.'</td>
<td align="center">$ '.number_format($totalMonto,0,",",".").' .-</td>
</tr>
</table>
</td>
</tr>


<tr>
<td colspan="3" align="justify">
Esta solicitud cuenta con VºBº del '.$memo->nombreComp.' en virtud que se ajusta a lo presupuestado. Los gastos deberán ser imputados al '.$memo->nombreProg.', '.$memo->nombreComp.' '.$memo->romanoReg.' Región. <br><br>
Sin otro particular, se despide.
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="center"><b>
'.strtoupper(str_replace($busca,$remplaza,$de)).'<br>
'.strtoupper(str_replace($busca,$remplaza,$de_cargo)).'<br>
'.strtoupper($memo->nombreReg).'<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</b>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="left">
<b>'.$memo->visacion.'</b><br>
cc: Archivo Dirección Regional de '.$memo->nombreReg.'
</td>
</tr>
</table>
</td>
<td rowspan="16" width="5%">&nbsp;</td>

</table>
</div>
';
}
$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream($id.".pdf");


}

public function generate_dos()
{

require_once("dompdf/dompdf_config.inc.php");
$conexion = mysql_connect("localhost","root","2wsxcde3");
mysql_select_db("aaa_controlpresupuestario",$conexion);

$id=$this->uri->segment(3);

$set_memo=$this->persona_model->get_datos_memo_tres($id);


foreach($set_memo as $memo){
if($memo->iva=="SI")
{
$iva="Total IVA incluido:";
}
else{
$iva="Total:";
}

$busca = array('á','é','í','ó','ú');
$remplaza = array('Á','É','Í','Ó','Ú');

if($memo->nombreCuentaUno!=NULL) { $AA=1;} else{ $AA=0; }
if($memo->nombreCuentaDos!=NULL) { $BB=1;} else{ $BB=0; }
if($memo->nombreCuentaTres!=NULL) { $CC=1;} else{ $CC=0; }
if($memo->nombreCuentaCuatro!=NULL) { $DD=1;} else{ $DD=0; }
if($memo->nombreCuentaCinco!=NULL) { $EE=1;} else{ $EE=0; }
$FF=1;
$rowtotal=$AA+$BB+$CC+$DD+$EE+$FF;

if($memo->jefedepto==1){
$a="Orlando Mancilla Vasquez";
$a_cargo="JEFE DEPTO. DE ADMINISTRACIÓN Y FINANZAS";
}
if($memo->jefedepto==2){
$a="Angela Venegas Avila";
$a_cargo="JEFA (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->jefedepto==3){
$a="Marcos Barretto Muñoz";
$a_cargo="JEFE (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->jefedepto==4){
$a="Soledad Castillo Medina";
$a_cargo="COORDINADORA DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->jefedepto==5){
$a="Camila Castillo Guerrero";
$a_cargo="Director Regional";
}
if($memo->jefedepto==6){
$a="Victor Santoro";
$a_cargo="Director Regional";
}
if($memo->jefedepto==7){
$a="Miguel Carvajal";
$a_cargo="Director Regional";
}
if($memo->jefedepto==8){
$a="Emilio Reyes Arias";
$a_cargo="Director Regional";
}
if($memo->jefedepto==9){
$a="Cristina Pavez Cosio";
$a_cargo="Director Regional";
}
if($memo->jefedepto==10){
$a="Jorge Parraguez Caroca";
$a_cargo="Director Regional";
}
if($memo->jefedepto==11){
$a="Irene Muñoz Vilches";
$a_cargo="Director Regional";
}
if($memo->jefedepto==12){
$a="Leocan Portus";
$a_cargo="Director Regional";
}
if($memo->jefedepto==13){
$a="Luis Villegas Cardenas";
$a_cargo="Director Regional";
}
if($memo->jefedepto==14){
$a="Felipe Roman";
$a_cargo="Director Regional";
}
if($memo->jefedepto==15){
$a="Rodrigo Saldivia";
$a_cargo="Director Regional";
}
if($memo->jefedepto==16){
$a="Yenifer Sandoval Alegria";
$a_cargo="Director Regional";
}
if($memo->jefedepto==17){
$a="Stefano Ferreccio Bugueño";
$a_cargo="Director Regional";
}
if($memo->jefedepto==18){
$a="Rodrigo Lepe Nuñez";
$a_cargo="Director Regional";
}
if($memo->jefedepto==19){
$a="Samuel Pozo Alfaro";
$a_cargo="Director Regional";
}
if($memo->jefedepto==20){
$a="Marcos Barretto Muñoz";
$a_cargo="Director Regional (S)";
}

if($memo->directorreg==1){
$de="Orlando Mancilla Vasquez";
$de_cargo="JEFE DEPTO. DE ADMINISTRACIÓN Y FINANZAS";
}
if($memo->directorreg==2){
$de="Angela Venegas Avila";
$de_cargo="JEFA (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->directorreg==3){
$de="Marcos Barretto Muñoz";
$de_cargo="JEFE (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->directorreg==4){
$de="Soledad Castillo Medina";
$de_cargo="COORDINADORA DEPTO. DE COORDINACIÓN PROGRAMÁTICA";
}
if($memo->directorreg==5){
$de="Camila Castillo Guerrero";
$de_cargo="Director Regional";
}
if($memo->directorreg==6){
$de="Victor Santoro";
$de_cargo="Director Regional";
}
if($memo->directorreg==7){
$de="Miguel Carvajal";
$de_cargo="Director Regional";
}
if($memo->directorreg==8){
$de="Emilio Reyes Arias";
$de_cargo="Director Regional";
}
if($memo->directorreg==9){
$de="Cristina Pavez Cosio";
$de_cargo="Director Regional";
}
if($memo->directorreg==10){
$de="Jorge Parraguez Caroca";
$de_cargo="Director Regional";
}
if($memo->directorreg==11){
$de="Irene Muñoz Vilches";
$de_cargo="Director Regional";
}
if($memo->directorreg==12){
$de="Leocan Portus";
$de_cargo="Director Regional";
}
if($memo->directorreg==13){
$de="Luis Villegas Cardenas";
$de_cargo="Director Regional";
}
if($memo->directorreg==14){
$de="Felipe Roman";
$de_cargo="Director Regional";
}
if($memo->directorreg==15){
$de="Rodrigo Saldivia";
$de_cargo="Director Regional";
}
if($memo->directorreg==16){
$de="Yenifer Sandoval Alegria";
$de_cargo="Director Regional";
}
if($memo->directorreg==17){
$de="Stefano Ferreccio Bugueño";
$de_cargo="Director Regional";
}
if($memo->directorreg==18){
$de="Rodrigo Lepe Nuñez";
$de_cargo="Director Regional";
}
if($memo->directorreg==19){
$de="Samuel Pozo Alfaro";
$de_cargo="Director Regional";
}
if($memo->directorreg==20){
$de="Marcos Barretto Muñoz";
$de_cargo="Director Regional (S)";
}


$codigoHTML='
<div class="well" style="font-size:10px;font-family:helvetica;">
<table width="100%" border="0">
<tr>
<td width="5%" valign="top"><img src="img/logo.png" alt="" width="90"></td>
</tr>
<tr>
</table>
<table width="100%" border="0">
<tr>
<td rowspan="16" width="12%">&nbsp;</td>
<td>
<table width="100%" border="0" cellpadding="5">
<tr>
<td colspan="3">MEMORANDUM '.strtoupper(str_replace($busca,$remplaza,$memo->nombreProg)).' &nbsp;&nbsp;&nbsp;Nº &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/'.date("Y").'</td>
</tr>

<tr>
<td width="9%" valign="top">A</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
'.strtoupper(str_replace($busca,$remplaza,$a)).'<br>
'.strtoupper(str_replace($busca,$remplaza,$a_cargo)).'<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">DE</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">'.strtoupper(str_replace($busca,$remplaza,$de)).'<br>
'.strtoupper(str_replace($busca,$remplaza,$de_cargo)).'<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">REF</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">COORDINACIÓN PNUD</td>
</tr>

<tr>
<td width="9%" valign="top">MAT.</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">';

if ($memo->tipogasto==1) {
$tipopago="SOLICITUD DE O.C";
}
else if ($memo->tipogasto==2) {
$tipopago="SOLICITUD DE PAGO BOLETA HONORARIO";
}

else if ($memo->tipogasto==3) {
$tipopago="SOLICITUD DE PAGO";
}

else if ($memo->tipogasto==4) {
$tipopago="SOLICITUD DE PAGO LICITACIÓN";
}
else if ($memo->tipogasto==5) {
$tipopago="SOLICITUD DE O.C";
}


if ($memo->tipogasto==1) {
$tipoemision="de la orden de compra";
}
else if ($memo->tipogasto==2) {
$tipoemision="de la Boleta de Honorario";
}

else if ($memo->tipogasto==3) {
$tipoemision="del pago";
}

else if ($memo->tipogasto==4) {
$tipoemision="del pago de licitación";
}
else if ($memo->tipogasto==5) {
$tipoemision="de la orden de compra";
}


$codigoHTML.=''.$tipopago.'
</td>
</tr>

<tr>
<td width="9%" valign="top">ANT</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
MEMO&nbsp; Nº <b>'.$memo->codGasto.'</b>&nbsp;&nbsp;'.$memo->romanoReg.' REGIÓN
</td>
</tr>

<tr>
<td width="9%" valign="top">FECHA</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top"></td>
</tr>

<tr>
<td colspan="3" align="justify">
De mi consideración:<br>
Junto con saludarle, solicito a usted tramitar la emisión '.$tipoemision.' para implementación de las actividad del DCP, de acuerdo a los datos expuestos a continuación:
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%" border="0">
<tr>
<td width="12%">Razón Social :</td>
<td width="88%">'.$memo->nombreProv.'</td>
</tr>
<tr>
<td width="12%">RUT :</td>
<td width="88%">'.$memo->rutProv.'</td>
</tr>
<tr>
<td width="12%">Dirección :</td>
<td width="88%">'.$memo->direccionProv.'</td>
</tr>
<tr>
<td width="12%">Teléfono :</td>
<td width="88%">'.$memo->telefonoProv.'</td>
</tr>
<tr>
<td width="12%">Obs. :</td>
<td width="88%">'.$memo->observaciones.'</td>
</tr>
</table>
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%" border="1" cellpadding="2">
<tr>
<td width="5%" align="center"><b>Cod. Ingreso</b></td>
<td width="40%" align="center"><b>Detalle de la adquisición</b></td>
<td width="10%" align="center"><b>Cuenta presupuestaria</b></td>
<td width="10%" align="center"><b>Ítem Gasto</b></td>
<td width="10%" align="center"><b>Monto</b></td>
</tr>';

$codigoHTML.='
<tr>
<td align="center" rowspan="'.$rowtotal.'">'.$memo->codGasto.'</td>
<td align="justify">'.$memo->productoAct.'</td>
<td align="center">'.$memo->nombreCuenta.'</td>
<td align="center">'.$memo->nombreItem.'</td>
<td align="center">$ '.number_format($memo->monto,0,",",".").'</td>
</tr>';


if($memo->nombreCuentaUno!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct1.'</td>
<td align="center">'.$memo->nombreCuentaUno.'</td>
<td align="center">'.$memo->nombreItemUno.'</td>
<td align="center">$ '.number_format($memo->monto1,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaDos!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct2.'</td>
<td align="center">'.$memo->nombreCuentaDos.'</td>
<td align="center">'.$memo->nombreItemDos.'</td>
<td align="center">$ '.number_format($memo->monto2,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaTres!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct3.'</td>
<td align="center">'.$memo->nombreCuentaTres.'</td>
<td align="center">'.$memo->nombreItemTres.'</td>
<td align="center">$ '.number_format($memo->monto3,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaCuatro!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct4.'</td>
<td align="center">'.$memo->nombreCuentaCuatro.'</td>
<td align="center">'.$memo->nombreItemCuatro.'</td>
<td align="center">$ '.number_format($memo->monto4,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaCinco!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct5.'</td>
<td align="center">'.$memo->nombreCuentaCinco.'</td>
<td align="center">'.$memo->nombreItemCinco.'</td>
<td align="center">$'.number_format($memo->monto5,0,",",".").'></td>
</tr>';
}


$totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5;
$codigoHTML.='
<tr>
<td colspan="4" align="right">'.$iva.'</td>
<td align="center">$'.number_format($totalMonto,0,",",".").'</td>
</tr>
</table>
</td>
</tr>


<tr>
<td colspan="3" align="justify">
Esta solicitud cuenta con VºBº del '.$memo->nombreComp.' en virtud que se ajusta a lo presupuestado. Los gastos deberán ser imputados al '.$memo->nombreProg.', '.$memo->nombreComp.' '.$memo->romanoReg.' Región. <br><br>
Sin otro particular, se despide.
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="center">
<b>
'.strtoupper(str_replace($busca,$remplaza,$de)).'<br>
'.strtoupper(str_replace($busca,$remplaza,$de_cargo)).'<br>
'.strtoupper(str_replace($busca,$remplaza,$memo->nombreReg)).'<br>
INSTITUTO NACIONAL DE LA JUVENTUD</b>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="left">
'.$memo->visacion.'<br>
cc: Archivo Dirección Regional de '.$memo->nombreReg.'
</td>
</tr>
</table>
</td>
<td rowspan="16" width="5%">&nbsp;</td>

</table>
</div>
';
}
$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream($id.".pdf");


}

public function generate_tres()
{

require_once("dompdf/dompdf_config.inc.php");
$conexion = mysql_connect("localhost","root","2wsxcde3");
mysql_select_db("aaa_controlpresupuestario",$conexion);

$id=$this->uri->segment(3);

$set_memo=$this->persona_model->get_datos_memo_tres($id);


foreach($set_memo as $memo){
if($memo->iva=="SI")
{
$iva="Total IVA incluido:";
}
else{
$iva="Total:";
}
$date = new DateTime($memo->fechaoc);
$fecha=$date->format('d-m-Y');

if($memo->idReg==1){ $direccion="Av. Arturo Prat #940. Iquique"; }
if($memo->idReg==2){ $direccion="San Martín 2298, Antofagasta"; }
if($memo->idReg==3){ $direccion="Colipi 893, Copiapó"; }
if($memo->idReg==4){ $direccion="Av. Francisco de Aguirre Nº 414, La Serena"; }
if($memo->idReg==5){ $direccion="Errázuriz #1236. Local 13. Valparaíso"; }
if($memo->idReg==6){ $direccion="Cuevas #118. Rancagua"; }
if($memo->idReg==7){ $direccion="1 poniente, 5 norte N°1610"; }
if($memo->idReg==8){ $direccion="Cochrane #790. Concepción"; }
if($memo->idReg==9){ $direccion="General Mackenna #825"; }
if($memo->idReg==10){ $direccion="Cristobal Colón Sur #451"; }
if($memo->idReg==11){ $direccion="Colón #311. Coyhaique."; }
if($memo->idReg==12){ $direccion="Lautaro Navarro #631. Punta Arenas."; }
if($memo->idReg==13){ $direccion="Príncipe de Gales #84. Santiago"; }
if($memo->idReg==14){ $direccion="O’Higgins #268. Valdivia"; }
if($memo->idReg==15){ $direccion="18 de Septiembre #485. Arica"; }
if($memo->idReg==16){ $direccion="Agustinas 1564, Santiago"; }

$totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5;

if($memo->iva=="SI"){ $expIva="con IVA incluído :"; } else { $expIva=" : "; }

$busca = array('á','é','í','ó','ú');
$remplaza = array('Á','É','Í','Ó','Ú');

$codigoHTML='
<div style="background:#555;padding:5px;font-size:10px;font-family:helvetica;">

<table width="100%" border="0">
<tr>
<td width="33.333%" valign="top">
Instituto Nacional de la Juventud <br>
Servicio Público <br><br>
R.U.T: 60.110.000-2 <br>
Agustinas 1564, Santiago - Centro <br>
Teléfono 620 47 00 - Fax 671 38 34
</td>
<td width="33.333%" align="center" valign="top">
<img src="img/logo_pnud.png" alt="" width="40" style="margin-top:-6px;">
</td>
<td align="right" width="33.333%" valign="top">
<b>
Proyecto Nº 76548 Fortalecimiento y Desarrollo<br>
de Políticas Públicas en Juventud<br>
Programa de las Naciones Unidas para el<br>
Desarrollo</b><br>
<h3><b>ORDEN DE COMPRA</b></h3>
</td>
</tr>
</table>
<table width="100%">
<tr>
<td colspan="3" style="border-bottom:1px solid #ccc;">&nbsp;</td>
</tr>
<tr>
<td >&nbsp;</td>
<td align="right" width="70%"><b>Nº Orden de Compra :</b></td>
<td align="right" width="30%">
<div style="text-align:right; background:#fff;border:1px solid #ddd;padding:3px;width:100%;">'.$memo->numerooc.'</div>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td align="right" width="70%"><b>Fecha :</b></td>
<td align="right"width="30%">
<div style="text-align:right; background:#fff;border:1px solid #ddd;padding:3px;width:100%;">'.$fecha.'</div>
</td>
</tr>
</table>

<table width="100%">
<tr>
<td align="left" width="15%"> <b>Nombre :</b></td>
<td width="90%" colspan="2"><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;">'.strtoupper($memo->nombreProv).'</div></td>
</tr>

<tr>
<td align="left" width="15%"> <b>RUT :</b></td>
<td width="10%"><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;">'.strtoupper($memo->rutProv).'</div></td>
<td width="80%">&nbsp;</td>
</tr>

<tr>
<td align="left" width="15%"> <b>Dirección :</b></td>
<td width="90%" colspan="2"><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;">'.strtoupper($memo->direccionProv).'</div></td>
</tr>

<tr>
<td align="left" width="15%"> <b>Fono :</b></td>
<td width="10%"><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;">'.strtoupper($memo->telefonoProv).'</div></td>
<td width="80%">&nbsp;</td>
</tr>
</table>

<table width="100%">
<tr>
<td align="center"><b>Detalle</b></td>
</tr>

<tr>
<td align="center">
<div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px; height:200;">
'.$memo->productoAct.'<br><br>'.$memo->productoAct1.'<br><br>'.$memo->productoAct2.'<br><br>'.$memo->productoAct3.'<br><br>'.$memo->productoAct4.'<br><br>'.$memo->productoAct5.'
</div>
</td>
</tr>
</table>

<table width="100%">
<tr>
<td><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;"><b>Emitir factura a Nombre de "PNUD-76548" (Fortalecimiento y Desarrollo de</b></div></td>
</tr>

<tr>
<td><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;"><b>Políticas Públicas en Juventud) Rut: 69.500.900-3, Giro: Organismo Internacional</b></div></td>
</tr>

<tr>
<td><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;"><b>Dirección: Dag.Hammarskjöld 3241, Vitacura, Fono: 654-1000</b></div></td>
</tr>

<tr>
<td><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;">Enviar Factura a: Dirección de '.$memo->nombreReg.', '.$direccion.'</div></td>
</tr>

<tr>
<td><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;">&nbsp;</div></td>
</tr>
</table>

<table width="100%">
<tr>
<td align="right"><b>Total '.$expIva.'</b></td>
<td><div style="text-align:right; font-weight:bold; background:#fff;border:1px solid #ddd;padding:3px;">$ '.number_format($totalMonto,0,",",".").'</div></td>
</tr>
</table>

<br><br>

<table width="100%">
<tr>
<td align="left" width="15%"> <b>Imputación :</b></td>
<td width="90%" colspan="2"><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;">'.$memo->subtituloProg.'.'.$memo->itemProg.'.'.$memo->asignacionProg.' '.strtoupper(str_replace($busca,$remplaza,$memo->nombreProg)).'</div></td>
</tr>
<tr>
<td align="left" width="15%"> <b>Componente :</b></td>
<td width="90%" colspan="2"><div style="text-align:left; background:#fff;border:1px solid #ddd;padding:3px;">'.strtoupper($memo->nombreComp).'</div></td>
</tr>
</table>

<br><br>
<br><br>
<br><br>

<table width="100%">
<tr>
<td width="50%" align="center">
____________________________________<br><br>
VºBº COORDINADOR (S) PNUD
</td>
<td width="50%" align="center">
____________________________________<br><br>
JEFE DAF
</td>
</tr>
</table>
<br><br><br><br>
</div>
';

}


$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream($id.".pdf");


}


public function generate_cuatro()
{

require_once("dompdf/dompdf_config.inc.php");
$conexion = mysql_connect("localhost","root","2wsxcde3");
mysql_select_db("aa_controlpresupuestario",$conexion);

$id=$this->uri->segment(3);

$set_memo=$this->persona_model->get_datos_memo($id);


foreach($set_memo as $memo){
if($memo->iva=="SI")
{
$iva="Total IVA incluido:";
}
else{
$iva="Total:";
}

$busca = array('á','é','í','ó','ú');
$remplaza = array('Á','É','Í','Ó','Ú');

if($memo->nombreCuentaUno!=NULL) { $AA=1;} else{ $AA=0; }
if($memo->nombreCuentaDos!=NULL) { $BB=1;} else{ $BB=0; }
if($memo->nombreCuentaTres!=NULL) { $CC=1;} else{ $CC=0; }
if($memo->nombreCuentaCuatro!=NULL) { $DD=1;} else{ $DD=0; }
if($memo->nombreCuentaCinco!=NULL) { $EE=1;} else{ $EE=0; }
$FF=1;
$rowtotal=$AA+$BB+$CC+$DD+$EE+$FF;

$totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5;

$codigoHTML='
<div class="well" style="font-size:9px;font-family:helvetica;">
<table width="100%" border="0">
<tr>
<td width="5%" valign="top"><img src="img/logo.png" alt="" width="90"></td>
</tr>
<tr>
</table>
<table width="100%" border="0">
<tr>
<td rowspan="16" width="12%">&nbsp;</td>
<td>
<table width="100%" border="0" cellpadding="5">
<tr>
<td colspan="3">MEMORANDUM '.strtoupper(str_replace($busca,$remplaza,$memo->nombreProg)).' - '.strtoupper($memo->romanoReg).' &nbsp;&nbsp;&nbsp;Nº &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/'.date("Y").'</td>
</tr>

<tr>
<td width="9%" valign="top">A</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
'.strtoupper($memo->jefedepto).'<br>
JEFE /A DEPTO. (S) COORDINACIÓN PROGRAMÁTICA<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">DE</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
'.strtoupper($memo->directorreg).'<br>
DIRECTOR /A REGIONAL<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">REF</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top"></td>
</tr>

<tr>
<td width="9%" valign="top">MAT.</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">';

if ($memo->tipogasto==1) {
$tipopago= "SOLICITA PAGO DE LA FACTURA";
}
else if ($memo->tipogasto==2) {
$tipopago= "SOLICITA PAGO DE BOLETA HONORARIO";
}

else if ($memo->tipogasto==3) {
$tipopago= "SOLICITA PAGO";
}

else if ($memo->tipogasto==4) {
$tipopago= "SOLICITA PAGO DE LICITACIÓN";
}
else if ($memo->tipogasto==5) {
$tipopago= "SOLICITA PAGO DE LA FACTURA";
}

if ($memo->tipogasto==1) {
$tipoemision="el pago de la factura";
}
else if ($memo->tipogasto==2) {
$tipoemision="el pago de la Boleta de Honorario";
}

else if ($memo->tipogasto==3) {
$tipoemision="el pago";
}

else if ($memo->tipogasto==4) {
$tipoemision="el pago de licitación";
}
else if ($memo->tipogasto==5) {
$tipoemision="el pago de la orden de compra";
}

$codigoHTML.=''.$tipopago.'
</td>
</tr>

<tr>
<td width="9%" valign="top">FECHA</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top"></td>
</tr>


<tr>
<td colspan="3" align="justify">
De mi consideración:<br>
Junto con saludarle, solicito a usted tramitar la emisión '.$tipoemision.' para implementación de las actividad del DCP, de acuerdo a los datos expuestos a continuación:
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%" border="0">
<tr>
<td width="12%">Nombre :</td>
<td width="88%">'.$memo->nombreProv.'</td>
</tr>
<tr>
<td width="12%">RUT :</td>
<td width="88%">'.$memo->rutProv.'</td>
</tr>
<tr>
<td width="12%">Dirección :</td>
<td width="88%">'.$memo->direccionProv.'</td>
</tr>
<tr>
<td width="12%">Teléfono :</td>
<td width="88%">'.$memo->telefonoProv.'</td>
</tr>
<tr>
<td width="12%">Nº de O.C :</td>
<td width="88%">'.$memo->numerooc.'</td>
</tr>
<tr>
<td width="12%">Nº de Factura :</td>
<td width="88%">'.$memo->numerofactura.'</td>
</tr>
<tr>
<td width="12%">Monto :</td>
<td width="88%">$ '.number_format($totalMonto,0,",",".").'</td>
</tr>
<tr>
<td width="12%">Tipo Cta :</td>
<td width="88%">'.$memo->tipodecuentaProv.'</td>
</tr>
<tr>
<td width="12%">Nombre Banco :</td>
<td width="88%">'.$memo->bancoProv.'</td>
</tr>
<tr>
<td width="12%">Nº de Cuenta :</td>
<td width="88%">'.$memo->rutProv.'</td>
</tr>

<tr>
<td colspan="3">&nbsp;</td>
</tr>

<tr>
<td colspan="3">
<table width="100%" border="1" cellpadding="2">
<tr>
<td width="5%" align="center"><b>Cod. Ingreso</b></td>
<td width="40%" align="center"><b>Detalle de la adquisición</b></td>
<td width="10%" align="center"><b>Cuenta presupuestaria</b></td>
<td width="10%" align="center"><b>Ítem Gasto</b></td>
<td width="10%" align="center"><b>Monto</b></td>
</tr>';

$codigoHTML.='
<tr>
<td align="center" rowspan="'.$rowtotal.'">'.$memo->codGasto.'</td>
<td align="justify">'.$memo->productoAct.'</td>
<td align="center">'.$memo->nombreCuenta.'</td>
<td align="center">'.$memo->nombreItem.'</td>
<td align="center">$ '.number_format($memo->monto,0,",",".").'</td>
</tr>';


if($memo->nombreCuentaUno!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct1.'</td>
<td align="center">'.$memo->nombreCuentaUno.'</td>
<td align="center">'.$memo->nombreItemUno.'</td>
<td align="center">$ '.number_format($memo->monto1,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaDos!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct2.'</td>
<td align="center">'.$memo->nombreCuentaDos.'</td>
<td align="center">'.$memo->nombreItemDos.'</td>
<td align="center">$ '.number_format($memo->monto2,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaTres!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct3.'</td>
<td align="center">'.$memo->nombreCuentaTres.'</td>
<td align="center">'.$memo->nombreItemTres.'</td>
<td align="center">$ '.number_format($memo->monto3,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaCuatro!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct4.'</td>
<td align="center">'.$memo->nombreCuentaCuatro.'</td>
<td align="center">'.$memo->nombreItemCuatro.'</td>
<td align="center">$ '.number_format($memo->monto4,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaCinco!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct5.'</td>
<td align="center">'.$memo->nombreCuentaCinco.'</td>
<td align="center">'.$memo->nombreItemCinco.'</td>
<td align="center">$'.number_format($memo->monto5,0,",",".").'></td>
</tr>';
}


$totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5;
$codigoHTML.='
<tr>
<td colspan="4" align="right">'.$iva.'</td>
<td align="center">$'.number_format($totalMonto,0,",",".").'</td>
</tr>
</table>
</td>
</tr>

</table>
</td>
</tr>

<tr>
<td colspan="3" align="justify">
Esta solicitud cuenta con VºBº del '.$memo->nombreComp.' en virtud que se ajusta a lo presupuestado. Los gastos deberán ser imputados al '.$memo->nombreProg.', '.$memo->nombreComp.' '.$memo->romanoReg.' Región. <br><br>
Sin otro particular, se despide.
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="center"><b>
'.strtoupper($memo->directorreg).'<br>
DIRECTOR /A REGIONAL<br>
'.strtoupper($memo->nombreReg).'<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</b>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="left">
<b>'.$memo->visacion.'</b><br>
cc: Archivo Dirección Regional de '.$memo->nombreReg.'
</td>
</tr>
</table>
</td>
<td rowspan="16" width="5%">&nbsp;</td>

</table>
</div>
';
}
$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream($id.".pdf");


}

public function generate_cinco()
{

require_once("dompdf/dompdf_config.inc.php");
$conexion = mysql_connect("localhost","root","2wsxcde3");
mysql_select_db("aa_controlpresupuestario",$conexion);

$id=$this->uri->segment(3);

$set_memo=$this->persona_model->get_datos_memo($id);


foreach($set_memo as $memo){
if($memo->iva=="SI")
{
$iva="Total IVA incluido:";
}
else{
$iva="Total:";
}

$busca = array('á','é','í','ó','ú');
$remplaza = array('Á','É','Í','Ó','Ú');

if($memo->nombreCuentaUno!=NULL) { $AA=1;} else{ $AA=0; }
if($memo->nombreCuentaDos!=NULL) { $BB=1;} else{ $BB=0; }
if($memo->nombreCuentaTres!=NULL) { $CC=1;} else{ $CC=0; }
if($memo->nombreCuentaCuatro!=NULL) { $DD=1;} else{ $DD=0; }
if($memo->nombreCuentaCinco!=NULL) { $EE=1;} else{ $EE=0; }
$FF=1;
$rowtotal=$AA+$BB+$CC+$DD+$EE+$FF;

$totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5;

$codigoHTML='
<div class="well" style="font-size:9px;font-family:helvetica;">
<table width="100%" border="0">
<tr>
<td width="5%" valign="top"><img src="img/logo.png" alt="" width="90"></td>
</tr>
<tr>
</table>
<table width="100%" border="0">
<tr>
<td rowspan="16" width="12%">&nbsp;</td>
<td>
<table width="100%" border="0" cellpadding="5">
<tr>
<td colspan="3">MEMORANDUM '.strtoupper(str_replace($busca,$remplaza,$memo->nombreProg)).' - '.strtoupper($memo->romanoReg).' &nbsp;&nbsp;&nbsp;Nº &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/'.date("Y").'</td>
</tr>

<tr>
<td width="9%" valign="top">A</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
ORLANDO MANCILLA VASQUEZ<br>
JEFE DEPTO. DE ADMINISTRACIÓN Y FINANZAS<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">DE</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
'.strtoupper($memo->jefedepto).'<br>';

if($memo->jefedepto=="Soledad Castillo M"){
$nombresss="COORDINADORA DE PROGRAMA<br>";
}
else{
$nombresss="JEFE /A (S) DEPTO. DE COORDINACIÓN PROGRAMÁTICA<br>";
}


$codigoHTML.=''.$nombresss.'
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">REF</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">COORDINACIÓN PNUD</td>
</tr>

<tr>
<td width="9%" valign="top">MAT.</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">';


if ($memo->tipogasto==1) {
$tipopago= "PAGO DE LA FACTURA";
}
else if ($memo->tipogasto==2) {
$tipopago= "PAGO BOLETA HONORARIO";
}

else if ($memo->tipogasto==3) {
$tipopago= "PAGO";
}

else if ($memo->tipogasto==4) {
$tipopago= "PAGO DE LICITACIÓN";
}
else if ($memo->tipogasto==5) {
$tipopago= "PAGO DE LA FACTURA";
}

if ($memo->tipogasto==1) {
$tipoemision="el pago de la factura";
}
else if ($memo->tipogasto==2) {
$tipoemision="el pago de la Boleta de Honorario";
}

else if ($memo->tipogasto==3) {
$tipoemision="de el pago";
}

else if ($memo->tipogasto==4) {
$tipoemision="el pago de licitación";
}
else if ($memo->tipogasto==5) {
$tipoemision="el pago de la orden de compra";
}

$codigoHTML.=''.$tipopago.'

</td>
</tr>

<tr>
<td width="9%" valign="top">ANT.</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
MEMO Nº <b>'.$memo->codGasto.'</b> '.$memo->romanoReg.' REGIÓN
</td>
</tr>

<tr>
<td width="9%" valign="top">FECHA.</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top"></td>
</tr>


<tr>
<td colspan="3" align="justify">
De mi consideración:<br>
Junto con saludarle, solicito a usted tramitar la emisión '.$tipoemision.' para implementación de las actividad del DCP, de acuerdo a los datos expuestos a continuación:
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%" border="0">
<tr>
<td width="12%">Nombre :</td>
<td width="88%">'.$memo->nombreProv.'</td>
</tr>
<tr>
<td width="12%">RUT :</td>
<td width="88%">'.$memo->rutProv.'</td>
</tr>
<tr>
<td width="12%">Dirección :</td>
<td width="88%">'.$memo->direccionProv.'</td>
</tr>
<tr>
<td width="12%">Teléfono :</td>
<td width="88%">'.$memo->telefonoProv.'</td>
</tr>
<tr>
<td width="12%">Nº de O.C :</td>
<td width="88%">'.$memo->numerooc.'</td>
</tr>
<tr>
<td width="12%">Nº de Factura :</td>
<td width="88%">'.$memo->numerofactura.'</td>
</tr>
<tr>
<td width="12%">Tipo Cta :</td>
<td width="88%">'.$memo->tipodecuentaProv.'</td>
</tr>
<tr>
<td width="12%">Nombre Banco :</td>
<td width="88%">'.$memo->bancoProv.'</td>
</tr>
<tr>
<td width="12%">Nº de Cuenta :</td>
<td width="88%">'.$memo->rutProv.'</td>
</tr>

<tr>
<td colspan="3">&nbsp;</td>
</tr>

<tr>
<td colspan="3">
<table width="100%" border="1" cellpadding="2">
<tr>
<td width="5%" align="center"><b>Cod. Ingreso</b></td>
<td width="40%" align="center"><b>Detalle de la adquisición</b></td>
<td width="10%" align="center"><b>Cuenta presupuestaria</b></td>
<td width="10%" align="center"><b>Ítem Gasto</b></td>
<td width="10%" align="center"><b>Monto</b></td>
</tr>';

$codigoHTML.='
<tr>
<td align="center" rowspan="'.$rowtotal.'">'.$memo->codGasto.'</td>
<td align="justify">'.$memo->productoAct.'</td>
<td align="center">'.$memo->nombreCuenta.'</td>
<td align="center">'.$memo->nombreItem.'</td>
<td align="center">$ '.number_format($memo->monto,0,",",".").'</td>
</tr>';


if($memo->nombreCuentaUno!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct1.'</td>
<td align="center">'.$memo->nombreCuentaUno.'</td>
<td align="center">'.$memo->nombreItemUno.'</td>
<td align="center">$ '.number_format($memo->monto1,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaDos!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct2.'</td>
<td align="center">'.$memo->nombreCuentaDos.'</td>
<td align="center">'.$memo->nombreItemDos.'</td>
<td align="center">$ '.number_format($memo->monto2,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaTres!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct3.'</td>
<td align="center">'.$memo->nombreCuentaTres.'</td>
<td align="center">'.$memo->nombreItemTres.'</td>
<td align="center">$ '.number_format($memo->monto3,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaCuatro!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct4.'</td>
<td align="center">'.$memo->nombreCuentaCuatro.'</td>
<td align="center">'.$memo->nombreItemCuatro.'</td>
<td align="center">$ '.number_format($memo->monto4,0,",",".").'</td>
</tr>';
}

if($memo->nombreCuentaCinco!=NULL) {
$codigoHTML.='
<tr>
<td align="justify">'.$memo->productoAct5.'</td>
<td align="center">'.$memo->nombreCuentaCinco.'</td>
<td align="center">'.$memo->nombreItemCinco.'</td>
<td align="center">$'.number_format($memo->monto5,0,",",".").'></td>
</tr>';
}


$totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5;
$codigoHTML.='
<tr>
<td colspan="4" align="right">'.$iva.'</td>
<td align="center">$'.number_format($totalMonto,0,",",".").'</td>
</tr>
</table>
</td>
</tr>

</table>
</td>
</tr>

<tr>
<td colspan="3" align="justify">
Esta solicitud cuenta con VºBº del '.$memo->nombreComp.' en virtud que se ajusta a lo presupuestado. Los gastos deberán ser imputados al '.$memo->nombreProg.', '.$memo->nombreComp.' '.$memo->romanoReg.' Región. <br><br>
Sin otro particular, se despide.
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="center"><b>
'.strtoupper($memo->jefedepto).'<br>';

if($memo->jefedepto=="Soledad Castillo M"){
$nombress="COORDINADORA DE PROGRAMA<br>";
}else{

$nombress="JEFE /A DEPTO. DE COORDINACIÓN PROGRAMÁTICA<br>";

}

$codigoHTML.=''.$nombress.'
INSTITUTO NACIONAL DE LA JUVENTUD
</b>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="left">
<b>'.$memo->visacion.'</b><br>
cc: Archivo Dirección Regional de '.$memo->nombreReg.'
</td>
</tr>
</table>
</td>
<td rowspan="16" width="5%">&nbsp;</td>

</table>
</div>
';
}
$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream($id.".pdf");


}

public function css_reg_prog()
{
$options = "";
if($this->input->post('region'))
{
$region = $this->input->post('region');
$componente = $this->persona_model->css_reg_prog($region);
?>
<option value="">Seleccione Programa</option>
<?php
foreach($componente as $fila)
{
?>
<option value="<?=$fila -> idProg; ?>"><?php echo $fila->nombreProg;?></option>
<?php
}
}
}

public function css_prog_comp()
{
$options = "";
if($this->input->post('programa'))
{
$programa = $this->input->post('programa');
$componente = $this->persona_model->css_prog_comp($programa);
?>
<option value="">Seleccione Componente</option>
<?php
foreach($componente as $fila)
{
?>
<option value="<?=$fila -> idComp; ?>"><?php echo $fila->nombreComp;?></option>
<?php
}
}
}



public function css_comp_act()
{
$options = "";
if($this->input->post('componente'))
{
$componente = $this->input->post('componente');
$actividad = $this->persona_model->css_comp_act($componente);
?>
<option value="">Seleccione Actividad</option>
<?php
foreach($actividad as $fila)
{
?>
<option value="<?=$fila -> idAct; ?>"><?php echo $fila->nombreAct;?></option>
<?php
}
}
}


public function css_item_cuenta()
{
$options = "";
if($this->input->post('item'))
{
$item = $this->input->post('item');
$cuenta = $this->persona_model->css_item_cuenta($item);
?>
<option value="">Seleccione una Cuenta</option>
<?php
foreach($cuenta as $fila)
{
?>
<option value="<?=$fila -> idCuenta; ?>"><?php echo $fila->nombreCuenta;?></option>
<?php
}
}
}

//PROVEEDORES==============
//=========================

public function proveedor(){

$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'proveedor'=>$this->persona_model->listar_proveedor()
);


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/proveedor/ver_proveedor', $data);
if (isset($_POST['aceptar'])) {

$nombreProv=$this->input->post('nombreProv');


if($nombreProv==99){
$filtro=$this->persona_model->all_proveedor();
}else{
$filtro=$this->persona_model->filtro_proveedor($nombreProv);
}
$data['filtro']=$filtro;


if($filtro!=""){
$this->load->view('perfil/proveedor/busqueda',$data);
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

public function agregar_proveedor(){
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region()
);

if(isset($_POST['aceptar'])){
$this->form_validation->set_rules('nombreProv','Nombre del proveedor','required|trim|xss_clean');
$this->form_validation->set_rules('rutProv','Rut','required|trim|xss_clean|is_unique[proveedor.rutProv]');
$this->form_validation->set_rules('telefonoProv','Telefono','required|trim|xss_clean');
$this->form_validation->set_rules('direccionProv','Direccion','required|trim|xss_clean');
$this->form_validation->set_rules('bancoProv','Banco','required|trim|xss_clean');
$this->form_validation->set_rules('tipodecuentaProv','Tipo de Cuenta','required|trim|xss_clean');
$this->form_validation->set_rules('numerocuentaProv','Numero de Cuenta','required|trim|xss_clean');
$this->form_validation->set_message('required', 'Campo requerido');



if($this->form_validation->run()){

$nombreProv=$this->input->post('nombreProv');
$rutProv=$this->input->post('rutProv');
$telefonoProv=$this->input->post('telefonoProv');
$direccionProv=$this->input->post('direccionProv');
$bancoProv=$this->input->post('bancoProv');
$tipodecuentaProv=$this->input->post('tipodecuentaProv');
$numerocuentaProv=$this->input->post('numerocuentaProv');

$insert=$this->persona_model->nuevo_proveedor($nombreProv,$rutProv,$telefonoProv,$direccionProv,$bancoProv,$tipodecuentaProv,$numerocuentaProv);
if($insert){
echo "<script>alert('Acaba de agregar un proveedor');</script>";
}//fin run
else{
echo "<script>alert('Ocurrio un error por favor verique los datos ingresados');</script>";
}
}
}

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/proveedor/agregar_proveedor', $data);
$this->load->view('footer');

}


public function editarproveedor()
{
$session_data=$this->session->userdata('datosuser');
$id=$this->input->post('id');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'editar'=>$this->persona_model->listar_editar_proveedor($id)
);


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/proveedor/editar_proveedor', $data);
$this->load->view('footer');

}



//========================================
//NOTIFICACIONES==========================
//========================================

public function notificaciones()
{
$session_data=$this->session->userdata('datosuser');
$region=$session_data['regionUsr'];
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'notificaciones'=>$this->persona_model->listar_etapa_uno()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti/notificaciones', $data);
$this->load->view('footer');
}

public function revisados()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'revisados'=>$this->persona_model->listar_etapa_dos()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti/revisados', $data);
$this->load->view('footer');
}


public function memo_etapa_dos()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);

$id=$this->uri->segment(3);

$data['set_memo']=$this->persona_model->get_datos_memo($id);



$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti/memo_dos', $data);
$this->load->view('footer');
}

public function memo_etapa_tres()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);

$id=$this->uri->segment(3);

$data['set_memo']=$this->persona_model->get_datos_memo_tres($id);



$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pnud/memo_tres', $data);
$this->load->view('footer');
}

public function memo_etapa_cuatro()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);

$id=$this->uri->segment(3);

$data['set_memo']=$this->persona_model->get_datos_memo_tres($id);



$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti_reg/memo_cuatro', $data);
$this->load->view('footer');
}

public function memo_etapa_cinco()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);

$id=$this->uri->segment(3);

$data['set_memo']=$this->persona_model->get_datos_memo_cinco($id);



$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pago_facturas/memo_cinco', $data);
$this->load->view('footer');
}

public function all_noti()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti/all_noti', $data);
$this->load->view('footer');
}


//PNUD ===================================
public function pnud()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'notificaciones'=>$this->persona_model->listar_etapa_dos(),
'cant_noti'=>$this->persona_model->count_noti_etapa_dos()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pnud/pendientes', $data);
$this->load->view('footer');
}

public function pnud_aprobado()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'revisado_pnud'=>$this->persona_model->listar_etapa_tres(),
'cant_noti'=>$this->persona_model->count_noti_etapa_dos()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pnud/revisados', $data);
$this->load->view('footer');
}


public function revisar_etapa_tres()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region(),
'programa'=>$this->persona_model->listar_programa(),
'codigo'=>$this->persona_model->codigo_gasto(),
'proveedor'=>$this->persona_model->listar_proveedor()
);


$id=$this->uri->segment(3);

$data['revisar']=$this->persona_model->get_datos_memo_tres($id);


if (isset($_POST['aceptar'])) {
$this->form_validation->set_rules('numerooc', 'Numero OC', 'trim|required|xss_clean|is_unique[gastos.numerooc]');
$this->form_validation->set_message('is_unique',' Ya existe');

if($this->form_validation->run()){
$codigo=$id;
$numerooc=$this->input->post('numerooc');
$fechaoc=$this->input->post('fechaoc');
$fechafinanza=$this->input->post('fechafinanza');
$visacion=$this->input->post('visacion');
$mescontable=$this->input->post('mescontable');
$etapaFlag=2;

$update=$this->persona_model->aprobar_memo_etapa_tres($codigo,$numerooc,$fechaoc,$fechafinanza,$visacion,$mescontable,$etapaFlag);

if ($update) {
echo "<script>alert('Acaba de aprobar un memorandum, recuerde adjuntar la orden de compra para que pueda cambiar el estado de la solicitud.');window.location='".base_url('perfil/pnud')."';</script>";
}

}

}


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pnud/revisar_datos', $data);
$this->load->view('footer');
}


public function rechazar_etapa_tres()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr']
);

if(isset($_POST['aceptar'])){
$codigo=$this->input->post('idrechazo');

$update=$this->persona_model->rechazar_etapa_dos($codigo);
if($update){
echo "<script>alert('Acaba de Rechazar un memorandum.')</script>";
redirect('perfil/notificaciones','refresh');
}

}

}




//REGION 4ta ETAPA


public function noti_region()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'noti_reg'=>$this->persona_model->listar_etapa_tres(),
'cant_noti'=>$this->persona_model->count_noti_etapa_tres()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti_reg/pendientes', $data);
$this->load->view('footer');
}


public function revisar_etapa_cuatro()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region(),
'programa'=>$this->persona_model->listar_programa(),
'codigo'=>$this->persona_model->codigo_gasto(),
'proveedor'=>$this->persona_model->listar_proveedor()
);


$id=$this->uri->segment(3);

$data['ver_cuatro']=$this->persona_model->get_datos_memo_cuatro($id);


if (isset($_POST['aceptar'])) {
$codigo=$id;
$visacion=$this->input->post('visacion');
$numerofactura=$this->input->post('numerofactura');
$monto=$this->input->post('monto');

$etapaFlag=3;

$update=$this->persona_model->aprobar_memo_etapa_cuatro($codigo,$visacion,$numerofactura,$monto,$etapaFlag);

if ($update) {
echo "<script>alert('Acaba de aprobar un memorandum');window.location='".base_url('perfil/noti_region')."';</script>";
}

}


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti_reg/revisar_datos', $data);
$this->load->view('footer');
}



public function revisar_etapa_cinco()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region(),
'programa'=>$this->persona_model->listar_programa(),
'codigo'=>$this->persona_model->codigo_gasto(),
'proveedor'=>$this->persona_model->listar_proveedor()
);


$id=$this->uri->segment(3);

$data['ver_pago']=$this->persona_model->get_datos_memo_cinco($id);


if (isset($_POST['aceptar'])) {
$codigo=$id;
$visacion=$this->input->post('visacion');
$jefedepto=$this->input->post('jefedepto');
$numerofactura=$this->input->post('numerofactura');
$etapaFlag=4;
$adj_cinco="Falta";

$update=$this->persona_model->aprobar_memo_etapa_cinco($codigo,$visacion,$jefedepto,$numerofactura,$etapaFlag,$adj_cinco);

if ($update) {
echo "<script>alert('Acaba de aprobar un memorandum');window.location='".base_url('perfil/solicitud_pago_facturas')."';</script>";
}

}


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pago_facturas/revisar_datos', $data);
$this->load->view('footer');
}


public function reg_revisados()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'memo_rev_cuatro'=>$this->persona_model->listar_etapa_cuatro(),
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/noti_reg/revisados', $data);
$this->load->view('footer');
}




public function solicitud_pago_facturas()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'pago_facturas'=>$this->persona_model->listar_etapa_cinco()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pago_facturas/pendientes', $data);
$this->load->view('footer');
}


public function pago_facturas_revisada()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'pago_facturas_rev'=>$this->persona_model->listar_etapa_seis()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pago_facturas/revisados', $data);
$this->load->view('footer');
}


public function pagos_pendientes()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'pago_pendientes'=>$this->persona_model->listar_etapa_seis()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pagos_pendientes/pendientes', $data);
$this->load->view('footer');
}
// gasto_devengado




public function revisar_etapa_seis()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'item'=>$this->persona_model->listar_item(),
'region'=>$this->persona_model->listar_region(),
'programa'=>$this->persona_model->listar_programa(),
'codigo'=>$this->persona_model->codigo_gasto(),
'proveedor'=>$this->persona_model->listar_proveedor()
);


$id=$this->uri->segment(3);

$data['pendiente_etapa_seis']=$this->persona_model->get_datos_memo_seis($id);


if (isset($_POST['aceptar'])) {
$codigo=$id;
$fechapnud=$this->input->post('fechapnud');

$fechapnud=str_replace("-", "/", $fechapnud);

$mescontable=$this->input->post('mescontable');
$etapaFlag=6;

$update=$this->persona_model->aprobar_memo_etapa_seis($codigo,$fechapnud,$mescontable,$etapaFlag);

if ($update) {
echo "<script>alert('Acaba de devengar un gasto');window.location='".base_url('perfil/pagos_pendientes')."';</script>";
}

}


$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pagos_pendientes/revisar_datos', $data);
$this->load->view('footer');
}



public function gasto_devengado()
{
$session_data=$this->session->userdata('datosuser');
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'gasto_devengado'=>$this->persona_model->listar_etapa_siete()
);

$this->load->view('header');
if($data['perfilUsr']==4){
$data['cant_noti']=$this->persona_model->count_noti_etapa_uno();
$this->load->view('perfil/menu/menu-apoyo', $data);
}
else if($data['perfilUsr']==7){
$data['cant_cinco']=$this->persona_model->count_noti_etapa_cinco();
$data['cant_noti']=$this->persona_model->count_noti_etapa_dos();
$this->load->view('perfil/menu/menu-pnud', $data);
}
else if($data['perfilUsr']==6){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else if($data['perfilUsr']==5){
$data['cant_noti']=$this->persona_model->count_noti_etapa_tres();
$this->load->view('perfil/menu/menu-region', $data);
}
else{
$this->load->view('perfil/menu/menu-perfil', $data);
}
$this->load->view('perfil/pagos_pendientes/revisados', $data);
$this->load->view('footer');
}

//========================================
//CERRAR SESIÓN==========================
//========================================
public function logout()
{
$this->session->sess_destroy();
redirect('http://intranet.injuv.gob.cl/','refresh');
}


// =============
// ADJUNTOS
// =============

public function archivos_adjuntos_celda()
{
$session_data=$this->session->userdata('datosuser');
$gasto=$this->uri->segment(3);
$data=array(
'usuarioUsr'=>$session_data['usuarioUsr'],
'nombreUsr'=>$session_data['nombreUsr'],
'perfilUsr'=>$session_data['perfilUsr'],
'regionUsr'=>$session_data['regionUsr'],
'programaUsr'=>$session_data['programaUsr'],
'componenteUsr'=>$session_data['componenteUsr'],
'programa'=>$this->persona_model->listar_programa(),
'region'=>$this->persona_model->listar_region(),
'gasto_devengado'=>$this->persona_model->listar_etapa_siete(),
'arch_adjuntos'=>$this->persona_model->listar_adjuntos($gasto)
);

$this->load->view('header');

$this->load->view('perfil/adjuntos/home', $data);
}

}
/* End of file nivel.php */
/* Location: ./application/controllers/nivel.php */
