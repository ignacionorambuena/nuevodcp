<?php
class Persona_model extends CI_Model {
protected $db_intranet;
function __construct()
{
parent::__construct();
$this->db_intranet = $this->load->database('prueba',true);
$this->db_distribucion = $this->load->database('default',true);
}


//======USUARIOS===============

public function listar_usuario()
{
$query =  $this->db_intranet->select('A.*,B.*')
->from('egw_accounts A')
->join('egw_addressbook B','A.account_id=B.account_id','left')
->where('B.n_fn != "" ');
return $query->get()->result();
}

public function verificar_usuario($id)
{
$this->db_distribucion->select('*')
->from('usuario')
->where('usuarioUsr',$id);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return true;
}else{
return false;
}
}
public function nombre_usuario($id)
{
$query =  $this->db_intranet->select('A.*,B.*')
->from('egw_accounts A')
->join('egw_addressbook B','A.account_id=B.account_id','left')
->where('A.account_lid',$id);
return $query->get()->result();
}

public function insertar_usuario($id,$nom,$perfil,$region,$programa,$componente)
{
$data=array(
'usuarioUsr'=>$id,
'nombreUsr'=>$nom,
'perfilUsr'=>$perfil,
'regionUsr'=>$region,
'programaUsr'=>$programa,
'componenteUsr'=>$componente
);
return $this->db_distribucion->insert('usuario', $data);
}
public function ver_usuarios()
{
$query=$this->db_distribucion->get('usuario');
return $query->result();
}

public function verificarNivelUsuario($usuario)
{
$query = $this->db->where("usuarioUsr",$usuario)
->get("usuario");
return $query->result();
}

//======PROGRAMA===============

public function n_prog($programa)
{
$query = $this->db_distribucion->get_where('programa',array('idProg'=>$programa));
foreach ($query->result() as $row)
{
 return $row->nombreProg;
}
}

public function listar_programa()
{
$query = $this->db_distribucion->get('programa');

return $query->result();
}

public function nuevo_programa($subtitulo,$item,$asignacion,$nombre)
{
$data=array(
'subtituloProg'=>$subtitulo,
'itemProg'=>$item,
'asignacionProg'=>$asignacion,
'nombreProg'=>$nombre
);
return $this->db_distribucion->insert('programa', $data);
}

public function filtro_programa($ano,$programa)
{
$this->db_distribucion->from('presprograma A')
->join('programa B','A.idProg=B.idProg','left')
->where('A.anoPP',$ano)
->where('A.idProg',$programa);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function all_programa($ano,$programa)
{
$this->db_distribucion->from('presprograma A')
->join('programa B','A.idProg=B.idProg','left')
->where('A.anoPP',$ano);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function presupuesto_programa($programa,$ano,$monto)
{
$data=array(
'idProg'=>$programa,
'anoPP'=>$ano,
'montoPP'=>$monto
);
return $this->db_distribucion->insert('presprograma', $data);
}

public function existe_reg_ano($ano,$programa)
{
$this->db_distribucion->select('*')
->from('presprograma')
->where('anoPP',$ano)
->where('idProg',$programa);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return true;
}else{
return false;
}
}


public function existe_pres_actividad($ano,$actividad)
{
$this->db_distribucion->select('*')
->from('presupactividad')
->where('anoPA',$ano)
->where('idAct',$actividad);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return true;
}else{
return false;
}
}

public function editarProgramaPre($data)
{
$query=$this->db_distribucion->where('idPP',$data['idPP'])
							   ->update('presprograma',$data);
return $this->db_distribucion->affected_rows();
}

public function get_progPre_por_id($idPP){

$query = $this
->db_distribucion
->where('idPP',$idPP)
->select('A.*,B.*')
->from('presprograma A')
->join('programa B','A.idProg=B.idProg','left');

return $query->get()->result();
}

//=======COMPONENTE=====================

public function listar_componente()
{
$query = $this->db_distribucion->get('componente');

return $query->result();
}

public function existe_pres_comp($ano,$componente)
{
$this->db_distribucion->select('*')
->from('prescomponente')
->where('idComp',$componente)
->where('anoPC',$ano);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return true;
}else{
return false;
}
}

public function detalle_componente()
{
$this->db_distribucion->select('A.*,B.*');
$this->db_distribucion->from('componente A');
$this->db_distribucion->join('prescomponente B','A.idComp=B.idComp','left');

$query = $this->db_distribucion->get();

return $query->result();
}


public function nuevo_componente($programa,$componente){
$data=array(
'idProg'=>$programa,
'nombreComp'=>$componente
);
return $this->db_distribucion->insert('componente', $data);
}

public function nuevo_presupuesto_componente($componente,$ano,$monto){
$data=array(
'idComp'=>$componente,
'anoPC'=>$ano,
'montoPC'=>$monto
);
return $this->db_distribucion->insert('prescomponente', $data);
}


public function 	comp_prog()
{
$this->db_distribucion->select('A.*,B.*');
$this->db_distribucion->from('componente A');
$this->db_distribucion->join('programa B','A.idProg=B.idProg','left');
$query=$this->db_distribucion->get();
return $query->result();
}


public function filtro_componente($ano,$componente)
{
$this->db_distribucion->from('prescomponente A')
->join('componente B','A.idComp=B.idComp','left')
->join('programa C','B.idProg=C.idProg','left')
->where('A.anoPC',$ano)
->where('A.idComp',$componente);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function all_componente($ano,$componente)
{
$this->db_distribucion->from('prescomponente A')
->join('componente B','A.idComp=B.idComp','left')
->join('programa C','B.idProg=C.idProg','left')
->where('A.anoPC',$ano);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function editarComponentePre($data)
{
$query=$this->db_distribucion->where('idPC',$data['idPC'])
							   ->update('prescomponente',$data);
return $this->db_distribucion->affected_rows();
}

public function get_compPre_por_id($idPC){

$query = $this
->db_distribucion
->where('idPC',$idPC)
->select('A.*,B.*,C.*')
->from('prescomponente A')
->join('componente B','A.idComp=B.idComp','left')
->join('programa C','B.idProg=C.idProg','left');

return $query->get()->result();
}

//====REGION=========

public function listar_region()
{
$query = $this->db_distribucion->get('region');

return $query->result();
}

public function listar_region_b($region)
{
$query = $this->db_distribucion->where('idReg',$region);
$query = $this->db_distribucion->get('region');

return $query->result();
}


//=======ACTIVIDAD============

public function listar_actividad()
{
$query = $this->db_distribucion->get('actividad');
return $query->result();
}

public function nueva_actividad($componente,$nombreAct){
$data=array(
'idComp'=>$componente,
'nombreAct'=>$nombreAct
);
return $this->db_distribucion->insert('actividad',$data);
}

public function filtro_actividad($ano,$actividad)
{
$this->db_distribucion->from('presupactividad A')
->join('actividad B','A.idAct=B.idAct','left')
->join('componente C','B.idComp=C.idComp','left')
->where('A.anoPA',$ano)
->where('A.idAct',$actividad);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function all_actividad($ano,$actividad)
{
$this->db_distribucion->from('presupactividad A')
->join('actividad B','A.idAct=B.idAct','left')
->join('componente C','B.idComp=C.idComp','left')
->where('A.anoPA',$ano);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function nueva_actividad_presupuesto($actividad,$ano,$monto,$afecto){
$data=array(
'idAct'=>$actividad,
'anoPA'=>$ano,
'montoPA'=>$monto,
'afectoPA'=>$afecto
);
return $this->db_distribucion->insert('presupactividad',$data);
}

public function listar_presact()
{
$this->db_distribucion->select('A.*,B.*');
$this->db_distribucion->from('actividad A');
$this->db_distribucion->join('presupactividad B','A.idAct=B.idAct','left');
$query=$this->db_distribucion->get();
return $query->result();
}


public function act_comp()
{
$this->db_distribucion->select('A.*,B.*');
$this->db_distribucion->from('actividad A');
$this->db_distribucion->join('componente B','A.idComp=B.idComp','left');
$query=$this->db_distribucion->get();
return $query->result();
}

public function comp_act()
{
$this->db_distribucion->select('A.*,B.*');
$this->db_distribucion->from('actividad A');
$this->db_distribucion->join('componente B','A.idComp=B.idComp','left');
$query=$this->db_distribucion->get();
return $query->result();
}

public function editarActividadPre($data)
{
$query=$this->db_distribucion->where('idPA',$data['idPA'])
							   ->update('presupactividad',$data);
return $this->db_distribucion->affected_rows();
}

public function get_actPre_por_id($idPA){

$query = $this
->db_distribucion
->where('idPA',$idPA)
->select('A.*,B.*,C.*')
->from('presupactividad A')
->join('actividad B','A.idAct=B.idAct','left')
->join('componente C','B.idComp=C.idComp','left');

return $query->get()->result();
}

//========ITEM==================

public function listar_item()
{
$query = $this->db_distribucion->get('item');

return $query->result();
}

public function nuevo_item($nombre){
$data=array(
'nombreItem'=>$nombre
);
return $this->db_distribucion->insert('item', $data);
}

public function filtro_item($item)
{
$query=$this->db_distribucion->select('*')
			->from('item')
			->where('idItem',$item);

$query=$this->db_distribucion->get();

if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function all_item($item)
{
$query=$this->db_distribucion->get('item');

if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function editarItem($data)
{
$query=$this->db_distribucion->where('idItem',$data['iditem'])
							   ->update('item',$data);
return $this->db_distribucion->affected_rows();
}

public function get_item_por_id($idItem){

$query = $this
->db_distribucion
->where('idItem',$idItem)
->get('item');

return $query->result();
}

//==========CUENTA==================

public function nueva_cuenta($item,$nombreCuenta){
$data=array(
'idItem'=>$item,
'nombreCuenta'=>$nombreCuenta
);
return $this->db_distribucion->insert('cuenta',$data);
}
public function nueva_cuenta_presupuesto($cuenta,$ano,$monto){
$data=array(
'idCta'=>$cuenta,
'anoPCta'=>$ano,
'montoPCta'=>$monto
);
return $this->db_distribucion->insert('presupcuenta',$data);
}

public function listar_cuenta()
{
$query=$this->db_distribucion->get('cuenta');
return $query->result();
}

public function filtro_cuenta($ano,$cuenta)
{
$query = $this->db_distribucion->select('SUM(montoPropir) as total, A.*, B.*, C.*,D.*')
									->from ('propir A')
									->join('cuenta B','A.idCP = B.idCuenta','left')
									->join('presupcuenta C','B.idCuenta = C.idCta','left')
									->join('presupactividad D','A.idPA = D.idPA','left')
									->group_by('idCP')
									->where('D.anoPA',$ano)

->where('A.idCP',$cuenta);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function all_cuenta($ano)
{
$query = $this->db_distribucion->select('SUM(montoPropir) as total, A.*, B.*, C.*,D.*')
									->from ('propir A')
									->join('cuenta B','A.idCP = B.idCuenta','left')
									->join('presupcuenta C','B.idCuenta = C.idCta','left')
									->join('presupactividad D','A.idPA = D.idPA','left')
									->group_by('idCP')
									->where('D.anoPA',$ano);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function existe_pres_cuenta($cuenta,$ano,$monto)
{
$this->db_distribucion->select('*')
->from('presupcuenta')
->where('idCta',$cuenta)
->where('anoPCta',$ano);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return false;
}else{
return true;
}
}

public function editarCuentaPre($data)
{
$query=$this->db_distribucion->where('idPCta',$data['idPCta'])
							   ->update('presupcuenta',$data);
return $this->db_distribucion->affected_rows();
}

public function get_cuePre_por_id($idPCta){

$query = $this
->db_distribucion
->where('idPCta',$idPCta)
->select('A.*,B.*,C.*')
->from('presupcuenta A')
->join('cuenta B','A.idCta=B.idCuenta','left')
->join('item C','B.idItem=C.idItem','left');

return $query->get()->result();
}
//===========PROPIR===========

public function agregarPropir($actividad,$cuenta,$region,$monto){
$data=array(
'idPA'=>$actividad,
'idCP'=>$cuenta,
'idReg'=>$region,
'montoPropir'=>$monto,
'fechaPropir'=> date('y-m-d')
);
return $this->db_distribucion->insert('propir',$data);
}

public function all_propir()//$ano
{
$this->db_distribucion->from('propir A')
->join('presupactividad B','A.idPA=B.idPA','left')
->join('actividad C','B.idAct=C.idAct','left')
->join('cuenta D','A.idCP=D.idCuenta','left')
->join('presupcuenta E','D.idCuenta=E.idCta','left')
->join('region F','A.idReg=F.idReg','left')
->join('componente G','C.idComp=G.idComp','left')
->join('item H','H.idItem=D.idItem','left')
->order_by('F.idReg','DESC');
//->where('D.anoPCta',$ano);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function editarPropir($data)
{
$query=$this->db_distribucion->where('idPropir',$data['idPropir'])
->update('propir',$data);
return $this->db_distribucion->affected_rows();
}

public function get_propir_por_id($idPropir){

$query = $this
->db_distribucion
->where('idPropir',$idPropir)
->select('A.*,B.*,C.*,D.*,F.*,G.*,H.*')
->from('propir A')
->join('presupactividad B','A.idPA=B.idPA','left')
->join('actividad C','B.idAct=C.idAct','left')
->join('cuenta D','A.idCP=D.idCuenta','left')
->join('presupcuenta F','D.idCuenta=F.idCta','left')
->join('componente G','C.idComp=G.idComp','left')
->join('region H','A.idReg=H.idReg','left');

return $query->get()->result();
}


public function item_cuenta()
{
$this->db_distribucion->select('A.*,B.*');
$this->db_distribucion->from('cuenta A');
$this->db_distribucion->join('item B','A.idItem=B.idItem','left');
$query=$this->db_distribucion->get();
return $query->result();
}

public function existe_propir($actividad,$cuenta,$region)
{
$this->db_distribucion->select('*')
->from('propir')
->where('idPA',$actividad)
->where('idCP',$cuenta)
->where('idReg',$region);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return false;
}else{
return true;
}
}


//============GASTOS====

public function gasto_comp($componente)
{
$this->db_distribucion->select('*')
->from('programa A')
->join('presprograma B','A.idProg=B.idProg','left')
->join('componente C','C.idProg=A.idProg','left')
->join('prescomponente D','C.idComp=D.idComp','left')
->join('actividad E','E.idComp=C.idComp','left')
->join('presupactividad F','F.idAct=E.idAct','left')
->join('propir G','G.idPA=F.idPA','left')
->join('region H','H.idReg=G.idReg','left')
->join('cuenta J','J.idCuenta=G.idCP','left')
->where('C.idComp',$componente);

$query=$this->db_distribucion->get();
return $query->result();

}

public function listar_proveedor()
{
$query=$this->db_distribucion->select('*')
			          ->from('proveedor')
			          ->where('nombreProv !=','');
$query=$this->db_distribucion->get();
return $query->result();
}

public function recoje_datos($propir)
{
$this->db_distribucion->select('*')
->from('programa A')
->join('presprograma B','A.idProg=B.idProg','left')
->join('componente C','C.idProg=A.idProg','left')
->join('prescomponente D','C.idComp=D.idComp','left')
->join('actividad E','E.idComp=C.idComp','left')
->join('presupactividad F','F.idAct=E.idAct','left')
->join('propir G','G.idPA=F.idPA','left')
->join('region H','H.idReg=G.idReg','left')
->join('cuenta J','J.idCuenta=G.idCP','left')
->join('item K','K.idItem=J.idItem','left')
->where('G.idPropir',$propir);

$query=$this->db_distribucion->get();
return $query->result();
}

public function insertar_gastos($datas){

return $this->db_distribucion->insert('gastos', $datas);
}

public function codigo_gasto()
{
$query=$this->db_distribucion->get('gastos');
return $query->num_rows();
}

//AHORA
public function listar_gastos()
{
$flag=0;
$query=$this->db_distribucion->select('*')
				->from('gastos A')
				->join('programa B','B.idProg=A.idProg','left')
				->join('componente C','C.idComp=A.idComp','left')
				->join('actividad D','D.idAct=A.idAct','left')
				->join('cuenta E','E.idCuenta=A.idCuenta','left')
				->join('item F','F.idItem=A.idItem','left')
				->join('region G','G.idReg=A.idReg','left')
				->where('etapaFlag',$flag)
				->where('estado !=','Anulado');
$query=$this->db_distribucion->get();
return $query->result();
}


public function listar_gastos_b($region)
{
$query=$this->db_distribucion->select('*')
				->from('gastos A')
				->join('programa B','B.idProg=A.idProg','left')
				->join('componente C','C.idComp=A.idComp','left')
				->join('actividad D','D.idAct=A.idAct','left')
				->join('cuenta E','E.idCuenta=A.idCuenta','left')
				->join('item F','F.idItem=A.idItem','left')
				->join('region G','G.idReg=A.idReg','left')
				->where('A.idReg',$region);
$query=$this->db_distribucion->get();
return $query->result();
}

public function css_prog_comp($programa)
{
$this->db_distribucion->where('idProg',$programa);
$programa = $this->db_distribucion->get('componente');
if($programa->num_rows()>0)
{
return $programa->result();
}
}



public function css_comp_act($componente)
{
$this->db_distribucion->where('idComp',$componente);
$actividad = $this->db_distribucion->get('actividad');
if($actividad->num_rows()>0)
{
return $actividad->result();
}
}


public function css_item_cuenta($item)
{
$this->db_distribucion->where('idItem',$item);
$cuenta = $this->db_distribucion->get('cuenta');
if($cuenta->num_rows()>0)
{
return $cuenta->result();
}
}

// public function update_adjunto($id,$ruta)
// {
// $data = array(
// 'codGasto' => $id,
// 'adjunto' => $ruta
// );

// $this->db->where('codGasto', $id);
// $up=$this->db->update('gastos', $data);
// if ($up) {
// return TRUE;
// }
// else{
// return FALSE;
// }
// }



public function update_adjunto($id,$archivouno)
{
$data = array(
'codGasto' => $id,
'adj_memo_uno' => "uploads/".$id."/".$archivouno
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}



public function update_adjuntodos($id,$archivodos)
{
$data = array(
'codGasto' => $id,
'adjunto' => "uploads/".$id."/".$archivodos,
'etapaFlag'=>1
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}




public function update_adjunto_tres($id,$archivotres,$etapaFlag)
{
$data = array(
'codGasto' => $id,
'adj_memo_dos' => "uploads/".$id."/".$archivotres,
'etapaFlag'=>$etapaFlag
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}


public function update_adjunto_boleta($id,$archivotres,$etapaFlag)
{
$data = array(
'codGasto' => $id,
'adjunto' => "uploads/".$id."/".$archivotres,
'etapaFlag'=>$etapaFlag
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}


public function update_adjuntouno_oc_nc($id,$archivouno,$etapaFlag)
{
$data = array(
'codGasto' => $id,
'adj_memo_dos' => "uploads/".$id."/".$archivouno,
'etapaFlag'=>$etapaFlag
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}



public function update_adjunto_oc_nc($id,$archivodos)
{
$data = array(
'codGasto' => $id,
'adjunto' => "uploads/".$id."/".$archivodos
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}



public function update_adjunto_cuatro($id,$archivotres)
{
$data = array(
'codGasto' => $id,
'adj_memo_tres' => "uploads/".$id."/".$archivotres,
'etapaFlag'=>3
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}



public function update_adjunto_cuatro_oc_nc($id,$archivotres)
{
$data = array(
'codGasto' => $id,
'adj_memo_tres' => "uploads/".$id."/".$archivotres,
'etapaFlag'=>4
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}

public function update_adjunto_cinco($id,$archivocuatro)
{
$data = array(
'codGasto' => $id,
'adj_memo_cuatro' => "uploads/".$id."/".$archivocuatro,
'etapaFlag'=>4
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}


public function update_adjunto_seis($id,$archivocinco)
{
$data = array(
'codGasto' => $id,
'adj_memo_cinco' => "uploads/".$id."/".$archivocinco,
'etapaFlag'=>5
);

$this->db->where('codGasto', $id);
$up=$this->db->update('gastos', $data);
if ($up) {
return TRUE;
}
else{
return FALSE;
}
}

public function get_datos_memo($id)
{
// $query=$this->db_distribucion->where('codGasto',$id)
// 							->get('gastos');

$query=$this->db_distribucion->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*,H.*,B.*,J.nombreCuenta as nombreCuentaUno,K.nombreItem as nombreItemUno,L.nombreCuenta as nombreCuentaDos,M.nombreItem as nombreItemDos,N.nombreCuenta as nombreCuentaTres,O.nombreItem as nombreItemTres,P.nombreCuenta as nombreCuentaCuatro,Q.nombreItem as nombreItemCuatro,R.nombreCuenta as nombreCuentaCinco,S.nombreItem as nombreItemCinco')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')

							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')

							 ->join('cuenta J','J.idCuenta=B.idCuenta1','left')
							 ->join('item K','K.idItem=B.idItem1','left')

							 ->join('cuenta L','L.idCuenta=B.idCuenta2','left')
							 ->join('item M','M.idItem=B.idItem2','left')

							 ->join('cuenta N','N.idCuenta=B.idCuenta3','left')
							 ->join('item O','O.idItem=B.idItem3','left')

							 ->join('cuenta P','P.idCuenta=B.idCuenta4','left')
							 ->join('item Q','Q.idItem=B.idItem4','left')

							 ->join('cuenta R','R.idCuenta=B.idCuenta5','left')
							 ->join('item S','S.idItem=B.idItem5','left')

							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.codGasto',$id);
$query=$this->db_distribucion->get();
return $query->result();
}


public function get_datos_memo_tres($id)
{
// $query=$this->db_distribucion->where('codGasto',$id)
// 							->get('gastos');
$query=$this->db_distribucion->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*,H.*,B.*,J.nombreCuenta as nombreCuentaUno,K.nombreItem as nombreItemUno,L.nombreCuenta as nombreCuentaDos,M.nombreItem as nombreItemDos,N.nombreCuenta as nombreCuentaTres,O.nombreItem as nombreItemTres,P.nombreCuenta as nombreCuentaCuatro,Q.nombreItem as nombreItemCuatro,R.nombreCuenta as nombreCuentaCinco,S.nombreItem as nombreItemCinco')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')

							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')

							 ->join('cuenta J','J.idCuenta=B.idCuenta1','left')
							 ->join('item K','K.idItem=B.idItem1','left')

							 ->join('cuenta L','L.idCuenta=B.idCuenta2','left')
							 ->join('item M','M.idItem=B.idItem2','left')

							 ->join('cuenta N','N.idCuenta=B.idCuenta3','left')
							 ->join('item O','O.idItem=B.idItem3','left')

							 ->join('cuenta P','P.idCuenta=B.idCuenta4','left')
							 ->join('item Q','Q.idItem=B.idItem4','left')

							 ->join('cuenta R','R.idCuenta=B.idCuenta5','left')
							 ->join('item S','S.idItem=B.idItem5','left')

							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.codGasto',$id);
$query=$this->db_distribucion->get();
return $query->result();
}

public function get_datos_memo_cuatro($id)
{
// $query=$this->db_distribucion->where('codGasto',$id)
// 							->get('gastos');
$query=$this->db_distribucion->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*,H.*,B.*,J.nombreCuenta as nombreCuentaUno,K.nombreItem as nombreItemUno,L.nombreCuenta as nombreCuentaDos,M.nombreItem as nombreItemDos,N.nombreCuenta as nombreCuentaTres,O.nombreItem as nombreItemTres,P.nombreCuenta as nombreCuentaCuatro,Q.nombreItem as nombreItemCuatro,R.nombreCuenta as nombreCuentaCinco,S.nombreItem as nombreItemCinco')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')

							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')

							 ->join('cuenta J','J.idCuenta=B.idCuenta1','left')
							 ->join('item K','K.idItem=B.idItem1','left')

							 ->join('cuenta L','L.idCuenta=B.idCuenta2','left')
							 ->join('item M','M.idItem=B.idItem2','left')

							 ->join('cuenta N','N.idCuenta=B.idCuenta3','left')
							 ->join('item O','O.idItem=B.idItem3','left')

							 ->join('cuenta P','P.idCuenta=B.idCuenta4','left')
							 ->join('item Q','Q.idItem=B.idItem4','left')

							 ->join('cuenta R','R.idCuenta=B.idCuenta5','left')
							 ->join('item S','S.idItem=B.idItem5','left')

							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.codGasto',$id);
$query=$this->db_distribucion->get();
return $query->result();
}


public function get_datos_memo_cinco($id)
{
// $query=$this->db_distribucion->where('codGasto',$id)
// 							->get('gastos');
$query=$this->db_distribucion->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*,H.*,B.*,J.nombreCuenta as nombreCuentaUno,K.nombreItem as nombreItemUno,L.nombreCuenta as nombreCuentaDos,M.nombreItem as nombreItemDos,N.nombreCuenta as nombreCuentaTres,O.nombreItem as nombreItemTres,P.nombreCuenta as nombreCuentaCuatro,Q.nombreItem as nombreItemCuatro,R.nombreCuenta as nombreCuentaCinco,S.nombreItem as nombreItemCinco')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')

							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')

							 ->join('cuenta J','J.idCuenta=B.idCuenta1','left')
							 ->join('item K','K.idItem=B.idItem1','left')

							 ->join('cuenta L','L.idCuenta=B.idCuenta2','left')
							 ->join('item M','M.idItem=B.idItem2','left')

							 ->join('cuenta N','N.idCuenta=B.idCuenta3','left')
							 ->join('item O','O.idItem=B.idItem3','left')

							 ->join('cuenta P','P.idCuenta=B.idCuenta4','left')
							 ->join('item Q','Q.idItem=B.idItem4','left')

							 ->join('cuenta R','R.idCuenta=B.idCuenta5','left')
							 ->join('item S','S.idItem=B.idItem5','left')

							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.codGasto',$id);
$query=$this->db_distribucion->get();
return $query->result();
}

public function get_datos_memo_seis($id)
{
// $query=$this->db_distribucion->where('codGasto',$id)
// 							->get('gastos');
$query=$this->db_distribucion->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*,H.*,B.*,J.nombreCuenta as nombreCuentaUno,K.nombreItem as nombreItemUno,L.nombreCuenta as nombreCuentaDos,M.nombreItem as nombreItemDos,N.nombreCuenta as nombreCuentaTres,O.nombreItem as nombreItemTres,P.nombreCuenta as nombreCuentaCuatro,Q.nombreItem as nombreItemCuatro,R.nombreCuenta as nombreCuentaCinco,S.nombreItem as nombreItemCinco')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')

							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')

							 ->join('cuenta J','J.idCuenta=B.idCuenta1','left')
							 ->join('item K','K.idItem=B.idItem1','left')

							 ->join('cuenta L','L.idCuenta=B.idCuenta2','left')
							 ->join('item M','M.idItem=B.idItem2','left')

							 ->join('cuenta N','N.idCuenta=B.idCuenta3','left')
							 ->join('item O','O.idItem=B.idItem3','left')

							 ->join('cuenta P','P.idCuenta=B.idCuenta4','left')
							 ->join('item Q','Q.idItem=B.idItem4','left')

							 ->join('cuenta R','R.idCuenta=B.idCuenta5','left')
							 ->join('item S','S.idItem=B.idItem5','left')

							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.codGasto',$id);
$query=$this->db_distribucion->get();
return $query->result();
}


//PROVEEDOR================
//=========================




public function nuevo_proveedor($nombreProv,$rutProv,$telefonoProv,$direccionProv,$bancoProv,$tipodecuentaProv,$numerocuentaProv)
{
$data=array(
'nombreProv'=>$nombreProv,
'rutProv'=>$rutProv,
'telefonoProv'=>$telefonoProv,
'direccionProv'=>$direccionProv,
'bancoProv'=>$bancoProv,
'tipodecuentaProv'=>$tipodecuentaProv,
'numerocuentaProv'=>$numerocuentaProv
);

return $this->db_distribucion->insert('proveedor', $data);
}

public function filtro_proveedor($proveedor)
{
$this->db_distribucion->from('proveedor')
->where('idProv',$proveedor);

$query=$this->db_distribucion->get();
if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}

public function all_proveedor()
{
$query=$this->db_distribucion->get('proveedor');

if ( $query->num_rows() > 0) {
return $query->result();
}else{
return false;
}
}


public function listar_editar_proveedor($id)
{
$query=$this->db_distribucion->select('*')
							 ->from('proveedor')
							 ->where('idProv',$id);
$query=$this->db_distribucion->get();
return $query->result();
}


//NOTIFICACIONES=====================

public function listar_etapa_uno()
{
$flag=1;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->result();
}


public function listar_etapa_uno_b($region)
{
$flag=1;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag)
							 ->where('B.idReg',$region);
$query=$this->db_distribucion->get();
return $query->result();
}


public function listar_etapa_dos()
{
$flag=2;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->result();
}


public function listar_etapa_tres()
{
$flag=3;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->result();
}

public function listar_etapa_cuatro()
{
$flag=4;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->result();
}

public function listar_etapa_cinco()
{
$flag=4;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->result();
}


public function listar_etapa_seis()
{
$flag=5;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->result();
}

public function listar_etapa_siete()
{
$flag=6;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->result();
}

public function count_noti_etapa_uno()
{
$flag=1;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->num_rows();
}

public function count_noti_etapa_dos()
{
$flag=2;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->num_rows();
}

public function count_noti_etapa_tres()
{
$flag=3;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->num_rows();
}

public function count_noti_etapa_cuatro()
{
$flag=4;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->num_rows();
}


public function count_noti_etapa_cinco()
{
$flag=5;
$query=$this->db_distribucion->select('*')
							 ->from('region A')
							 ->join('gastos B','B.idReg=A.idReg','left')
							 ->join('programa C','C.idProg=B.idProg','left')
							 ->join('componente D','D.idComp=B.idComp','left')
							 ->join('actividad E','E.idAct=B.idAct','left')
							 ->join('cuenta F','F.idCuenta=B.idCuenta','left')
							 ->join('item G','G.idItem=B.idItem','left')
							 ->join('proveedor H','H.idProv=B.idProv','left')
							 ->where('B.etapaFlag',$flag);
$query=$this->db_distribucion->get();
return $query->num_rows();
}

public function rechazar_etapa_dos($codigo)
{
$data = array(
               'estado' => "Anulado"
            );

$this->db->where('codGasto', $codigo);
$this->db->update('gastos', $data);

return TRUE;
}



public function aprobar_memo_etapa_dos($codigo,$visacion,$a,$de,$observaciones,$etapaFlag)
{
$data=array(
'visacion'=>$visacion,
'jefedepto'=>$a,
'directorreg'=>$de,
'observaciones'=>$observaciones,
'etapaFlag'=>$etapaFlag,
'adj_memo_dos'=>"Falta"
);

$this->db->where('codGasto', $codigo);
$this->db->update('gastos', $data);

if (mysql_affected_rows()) {
return TRUE;
}else{
return FALSE;
}
}

public function aprobar_memo_etapa_tres($codigo,$nombreactividad,$producto,$observaciones,$numerooc,$fechaoc,$fechafinanza,$visacion,$mescontable,$etapaFlag)
{
$data=array(
'numerooc'=>$numerooc,
'nombreActGastos'=>$nombreactividad,
'productoAct'=>$producto,
'observaciones'=>$observaciones,
'fechaoc'=>$fechaoc,
'fechafinanza'=>$fechafinanza,
'visacion'=>$visacion,
'mescontable'=>$mescontable,
'etapaFlag'=>$etapaFlag
);

$this->db->where('codGasto', $codigo);
$this->db->update('gastos', $data);

if (mysql_affected_rows()) {
return TRUE;
}else{
return FALSE;
}


}


public function aprobar_memo_etapa_cuatro($codigo,$visacion,$numerofactura,$monto,$jefe,$director,$observaciones,$etapaFlag)
{
$data=array(
'visacion'=>$visacion,
'numerofactura'=>$numerofactura,
'monto'=>$monto,
'jefedepto'=>$jefe,
'directorreg'=>$director,
'observaciones'=>$observaciones,
'etapaFlag'=>$etapaFlag
);

$this->db->where('codGasto', $codigo);
$this->db->update('gastos', $data);

if (mysql_affected_rows()) {
return TRUE;
}else{
return FALSE;
}


}


public function aprobar_memo_etapa_cinco($codigo,$visacion,$jefedepto,$director,$observaciones,$etapaFlag,$adj_cinco)
{
$data=array(
'visacion'=>$visacion,
'jefedepto'=>$jefedepto,
'directorreg'=>$director,
'observaciones'=>$observaciones,
'etapaFlag'=>$etapaFlag,
'adj_memo_cinco'=>$adj_cinco
);

$this->db->where('codGasto', $codigo);
$this->db->update('gastos', $data);

if (mysql_affected_rows()) {
return TRUE;
}else{
return FALSE;
}


}


public function aprobar_memo_etapa_cinco_fct($codigo,$visacion,$jefedepto,$director,$observaciones,$etapaFlag,$adj_cinco,$numerofactura)
{
$data=array(
'visacion'=>$visacion,
'jefedepto'=>$jefedepto,
'directorreg'=>$director,
'observaciones'=>$observaciones,
'etapaFlag'=>$etapaFlag,
'adj_memo_cinco'=>$adj_cinco,
'numerofactura'=>$numerofactura,
);

$this->db->where('codGasto', $codigo);
$this->db->update('gastos', $data);

if (mysql_affected_rows()) {
return TRUE;
}else{
return FALSE;
}


}

public function aprobar_memo_etapa_seis($codigo,$fechapnud,$mescontable,$etapaFlag)
{
$data=array(
'fechaenviopnud'=>$fechapnud,
'mescontable'=>$mescontable,
'estado'=>"Devengado",
'etapaFlag'=>$etapaFlag
);

$this->db->where('codGasto', $codigo);
$this->db->update('gastos', $data);

if (mysql_affected_rows()) {
return TRUE;
}else{
return FALSE;
}


}



public function listar_adjuntos($gasto)
{
$query=$this->db_distribucion->select('adj_memo_uno,adj_memo_dos,adj_memo_tres,adj_memo_cuatro,adj_memo_cinco,adjunto')
				->from('gastos')
				->where('codGasto',$gasto);
$query=$this->db_distribucion->get();

return $query->result();
}


}


?>
