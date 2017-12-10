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

	public function index($page = 'admin')
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
	
}
