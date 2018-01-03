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
		

		$data['menu'] = $this->M_data->get_menu();

		$this->load->view('Owner/header-nav-side.php');
		$this->load->view('Owner/'.$page,$data);
		$this->load->view('Owner/footer-nav-side.php');

	}

	public function get_menu(){
		$data['menu']=$this->M_data->get_menu();
	}

	public function input_pesanan(){
		$total=$this->input->post('total');
		$nama_menu=$this->input->post('nama_menu');
		$harga=$this->input->post('harga');
		$quantity=$this->input->post('quantity');
		$jumlah=$this->input->post('jumlah');

		$pesanan = array('total_pesanan' => $total,
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
