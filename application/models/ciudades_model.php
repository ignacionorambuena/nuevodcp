<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciudades_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function provincias()
    {
        $provincia = $this->db->get('componente');
        if($provincia->num_rows()>0)
        {
            return $provincia->result();
        }
    }

    public function localidades($provincia)
    {
        $this->db->where('idProg',$provincia);
        $localidades = $this->db->get('presprograma');
        if($localidades->num_rows()>0)
        {
            return $localidades->result();
        }
    }
}
