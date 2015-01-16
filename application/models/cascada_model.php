<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cascada_model extends CI_Model{

public function __construct()
{
parent::__construct();
$this->db_intranet = $this->load->database('prueba',true);
$this->db_distribucion = $this->load->database('default',true);
}

public function componente()
{
$componente = $this->db_distribucion->get('componente');
if($componente->num_rows()>0)
{
return $componente->result();
}
}

public function item($componente)
{
$this->db_distribucion->where('idAct',$componente);
$item = $this->db_distribucion->get('item');
if($item->num_rows()>0)
{
return $item->result();
}
}

public function actividad($componente)
{
$this->db_distribucion->where('idComp',$componente);
$actividad = $this->db_distribucion->get('actividad');
if($actividad->num_rows()>0)
{
return $actividad->result();
}
}
public function actividad2()
{
$actividad2=$this->db_distribucion->select('A.*,B.*')
		  ->from('actividad A')
		  ->join('componente B','A.idComp=B.idComp','left')
		  ->get();

if($actividad2->num_rows()>0)
{
return $actividad2->result();
}
}
public function cuenta($actividad2)
{
$actividad2=$this->db_distribucion->where('idAct',$actividad2);
$cuenta = $this->db_distribucion->get('item');
if($cuenta->num_rows()>0)
{
return $cuenta->result();
}

}
public function itemCuenta()
{

$itemCuenta= $this->db_distribucion->get('item');
if($itemCuenta->num_rows()>0)
{
return $itemCuenta->result();
}
}

public function cuentaPresupuestaria($itemCuenta)
{
$itemCuenta=$this->db_distribucion->where('idItem',$itemCuenta);
$cuentaPresupuestaria = $this->db_distribucion->get('cuenta');
if($cuentaPresupuestaria->num_rows()>0)
{
return $cuentaPresupuestaria->result();
}
}

public function comp_act()
{
$comp_act=$this->db_distribucion->select('*')
                             ->from('actividad A')
                             ->join('componente B','A.idComp=B.idComp','left')
                             ->join('presupactividad C','C.idAct=A.idAct','left')
                             ->get();
return $comp_act->result();
}

public function item_CuePres($comp_act)
{

$item_CuePres=$this->db_distribucion->select('A.*,B.*,C.*')
				->from('item A')
				->join('actividad B','A.idAct=B.idAct','left')
				->join('cuenta C','A.idItem=C.idItem','left')
				->where('A.idAct',$comp_act)
				->get();
if($item_CuePres->num_rows()>0)
{
return $item_CuePres->result();
}
}
}
