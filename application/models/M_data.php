<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	public function get_menu()
	{
		return $this->db->get('menu')->result();

	}
	public function get_rincian_menu($id){
		$this->db->where('id_menu',$id);
		return $this->db->get('menu')->row();
	}
	
}
