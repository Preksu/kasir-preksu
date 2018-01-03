<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('M_data');
	}

	public function index($page = 'penjualan')
	{
		

		$data['menu'] = $this->M_data->get_menu();

		$this->load->view('admin/header-nav-side.php');
		$this->load->view('admin/'.$page,$data);
		$this->load->view('admin/footer-nav-side.php');

	}
	public function get_rincian_menu(){
		$data=$this->M_data->get_rincian_menu($this->input->post('id'));
		echo json_encode($data);
	}
	public function input_pesanan(){
		$total=$this->input->post('total');
		$nama_menu=$this->input->post('nama_menu');
		$harga=$this->input->post('harga');
		$quantity=$this->input->post('quantity');
		$jumlah=$this->input->post('jumlah');
		$no_meja=$this->input->post('no_meja');

		$pesanan = array('total_pesanan' => $total,
							'no_meja' => $no_meja,
							'id_pesanan' => '');

		$this->M_data->input_pesanan($pesanan);
		$id=$this->M_data->get_new_pesanan()->id_pesanan;

		$a=count($nama_menu);
		for ($i=0; $i < $a; $i++) { 
			$data = array('id_rincian_pesanan' => '',
							  'id_pesanan' => $id,
							   'nama_menu' => $nama_menu[$i],
							 	'harga'    => $harga[$i],
							 	'quantity' => $quantity[$i],
							'jumlah_harga' => $jumlah[$i]
						);
			$this->M_data->input_rincian_pesanan($data);
		}
	}
	
}
