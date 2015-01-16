<?php
class Access_model extends CI_Model {
protected $db_intranet;
function __construct()
{
parent::__construct();
$this->db_intranet = $this->load->database('prueba',true);
$this->db_distribucion = $this->load->database('default',true);
}
public function verificarUser($id)
{
$query = $this->db_intranet->select('loginid')
->from('intranet.egw_access_log')
->where('sessionid',$id);
return $query->get()->result();
}
public function verificarUserList($id)
{
$user = explode("@", $id);
$query = $this->db_distribucion->select('usuarioUsr, nombreUsr, perfilUsr, regionUsr, programaUsr, componenteUsr')
->from('usuario')
->where('usuarioUsr',$user[0]);

return $query->get()->result();
}
}
?>
