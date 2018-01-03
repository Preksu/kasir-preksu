<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('M_data');
	}

	public function index($page = 'owner')
	{
		
		if (!$this->input->post('bulan_masuk')) {
			$bulan=date('m');
			$data['pesanan']=$this->M_data->get_pesanan($bulan);
			$data['inventory']=$this->M_data->get_inventory($bulan);
			$data['bln']=$bulan;	
		}else{
			$bulan=$this->input->post('bln_masuk');
			$data['pesanan']=$this->M_data->get_pesanan($bulan);
			$data['inventory']=$this->M_data->get_inventory($bulan);
			$data['bln']=$bulan;
		}


		$data['menu'] = $this->M_data->get_menu();
		$data['bulanan']=$this->M_data->get_data_bulanan();
		$data['pengguna']=$this->M_data->get_pengguna();


		$this->load->view('Owner/header-nav-side.php');
		$this->load->view('Owner/'.$page,$data);
		$this->load->view('Owner/footer-nav-side.php');

	}

	public function get_menu(){
		$data['menu']=$this->M_data->get_menu();
	}

	public function get_pesanan(){
		$dat=$this->M_data->get_pesanan();
		$data=$this->M_data->get_data_bulanan();
		foreach ($data as $key) {
			echo $key->no_meja;
		}
	}


	public function input_inventory(){
		$total=$this->input->post('total');
		$inventory=$this->input->post('inventory');
		$harga=$this->input->post('harga');
		$quantity=$this->input->post('quantity');

		$pesanan = array('total' => $total,
							'id_inventory' => '');

		$this->M_data->input_inventory($pesanan);
		$id=$this->M_data->get_new_inventory()->id_inventory;

		$a=count($inventory);
		for ($i=0; $i < $a; $i++) { 
			$data = array('id_rincian_inventory' => '',
							  'id_inventory' => $id,
							   'nama_inventory' => $inventory[$i],
							 	'harga'    => $harga[$i],
							 	'quantity' => $quantity[$i]
						);
			$this->M_data->input_rincian_inventory($data);
		}
	}
	//hapus menu
	public function hapus_menu($id){
		$this->M_data->hapus_menu($id);
		redirect('owner/menu');
	}
	public function operasi_menu(){
		if ($this->input->post('tambah')) {
			$this->input_menu();
		}
		if ($this->input->post('simpan')){
			$this->update_menu();	
		}
	}
	public function input_menu(){
		$nama_menu=$this->input->post('nama_menu');
		$bahan=$this->input->post('bahan');
		$harga=$this->input->post('harga');
	
			$data = array('id_menu' => '',
							   'nama_menu' => $nama_menu,
							   'deskripsi'	=> $bahan,
							 	'harga'    => $harga,
						);
		$this->M_data->input_menu($data);
		redirect('owner/menu');
		
	}
	public function update_menu(){
		$id=$this->input->post('id');
		$nama_menu=$this->input->post('nama_menu');
		$bahan=$this->input->post('bahan');
		$harga=$this->input->post('harga');
	
			$data = array(
							   'nama_menu' => $nama_menu,
							   'deskripsi'	=> $bahan,
							 	'harga'    => $harga,
						);
		$this->M_data->update_menu($id,$data);
		redirect('owner/menu');
		
	}


	public function tambah_pengguna(){
		$nama_lengkap=$this->input->post('nama_lengkap');
		$nama_pengguna=$this->input->post('nama_pengguna');
		$alamat=$this->input->post('alamat');
		$password=$this->input->post('password');
	
			$data = array('id_user' => '',
							   'nama_lengkap' => $nama_lengkap,
							   'nama_pengguna'	=> $nama_pengguna,
							 	'alamat'    => $alamat,
							 	'password' => $password
						);
		$this->M_data->input_pengguna($data);
		redirect('owner/pengguna');
		
	}
	public function hapus_pengguna($id){
		$this->M_data->hapus_pengguna($id);
		redirect('owner/pengguna');
	}
	
}
