<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index($page = 'admin')
	{

		$this->load->view('admin/header-nav-side.php');
		$this->load->view('admin/'.$page);
		$this->load->view('admin/footer-nav-side.php');

	}
	
}
