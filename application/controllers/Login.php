<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
	}
	public function index($page ='login')
	{
		$this->load->view($page);
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username=='admin'&&$password=='admin'){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}