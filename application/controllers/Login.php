<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->model('M_data');	
	}
	public function index($page ='login')
	{
		$this->load->view($page);

	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
				'nama_pengguna' => $username,
				'password' => $password
				);
		$cek=$this->M_data->cek_user($data);

		if($cek>0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 			if ($username=='owner') {
 				redirect(base_url("owner"));
 			}
 			else{
				redirect(base_url("penjualan"));
			}
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}