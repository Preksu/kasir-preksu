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
	public function input_rincian_pesanan($data){
		$this->db->insert('rincian_pesanan',$data);
	}
	public function input_pesanan($data){
		$this->db->set('tanggal_pesanan', date('Y-m-d H:i:s'));
		$this->db->insert('pesanan',$data);
	}
	public function get_new_pesanan(){
		$this->db->order_by('id_pesanan','DESC');
		return $this->db->get('pesanan',1)->row();
	}
	
}
