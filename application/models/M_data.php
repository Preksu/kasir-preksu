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
	public function get_pesanan($bulan){
		$this->db->where('MONTH(tanggal_pesanan)',$bulan);
		$this->db->order_by('tanggal_pesanan','DESC');
		return $this->db->get('pesanan')->result();		
	}
	public function get_inventory($bulan){
		$this->db->where('MONTH(tanggal_inventory)',$bulan);
		$this->db->order_by('tanggal_inventory','DESC');
		return $this->db->get('inventory')->result();		
	}
	public function get_data_bulanan(){
		return $this->db->query("SELECT MONTH(tanggal_pesanan) AS bulan, COUNT(*) AS jumlah_bulanan FROM pesanan GROUP BY MONTH(tanggal_pesanan) ORDER BY tanggal_pesanan ASC")->result();
	}
	//inventory insert
	public function input_inventory($data){
		$this->db->set('tanggal_inventory', date('Y-m-d H:i:s'));
		$this->db->insert('inventory',$data);
	}
	public function get_new_inventory(){
		$this->db->order_by('id_inventory','DESC');
		return $this->db->get('inventory',1)->row();
	}
	public function input_rincian_inventory($data){
		$this->db->insert('rincian_inventory',$data);
	}

	////
	public function hapus_menu($id)
	{
		$this->db->delete('menu',array('id_menu'=>$id));
	}
	public function input_menu($data){
		$this->db->insert('menu',$data);
	}
	public function update_menu($id,$data){
		$this->db->where('id_menu',$id);
		$this->db->update('menu',$data);	
	}

	//
	public function get_pengguna(){
		return $this->db->get('pengguna')->result();
	}


	public function cek_user($data){
		$this->db->where($data);
		return $this->db->get('pengguna')->num_rows();	
	}


	
}
