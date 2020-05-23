<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Model', 'm');
		$datauser = $this->session->userdata('user_login');
		if ($datauser == null) {
			redirect('Login', 'refresh');
		}
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}
}
