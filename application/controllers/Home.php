<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		date_default_timezone_set('Asia/jakarta');
		$this->load->model('Model', 'm');
		$datauser = $this->session->userdata('user_login');
		if ($datauser == null) {
			redirect('Login', 'refresh');
		}
	}

	public function index()
	{
		$data['jdl'] = $this->m->getData('jadwal')->result();
		// $data['pj'] = $this->m->getData('penanggung_jawab')->result();
		$this->load->view('template/header');
		$this->load->view('dashboard',$data);
		$this->load->view('template/footer');
	}

	public function Jadwal()
	{
		$data['tbl'] = $this->m->getData('jadwal')->result();
		// $data['pj'] = $this->m->getData('penanggung_jawab')->result();
		$this->load->view('template/header');
		$this->load->view('jadwal', $data);
		$this->load->view('template/footer');
	}

	public function ins_jdl()
	{
		$objek = array(
			'keterangan' => $this->input->post('jdl'),
			'jadwal' => $this->input->post('tgl')
		);
		$this->m->insData('jadwal', $objek);
		$s = $this->m->getWL('jadwal', 'id_jadwal')->row();

		// $ob = array(
		// 	'id_jadwal' => $s->id_jadwal,
		// 	'nama' => $this->input->post('name')
		// );
		// $this->m->insData('penanggung_jawab', $ob);
		redirect('Home/jadwal', 'refresh');
	}

	public function edt_jdl()
	{
		$id = $this->input->post('id');
		
		$objek = array(
			'keterangan' => $this->input->post('jdl'),
			'jadwal' => $this->input->post('tgl')
		);
		$this->m->updData('jadwal', $objek, ['id_jadwal' => $id]);
		$s = $this->m->getWL('jadwal', 'id_jadwal')->row();

		$ob = array(
			'nama' => $this->input->post('name')
		);
		// $this->m->updData('penanggung_jawab', $ob, ['id_jadwal' => $id]);
		redirect('Home/jadwal', 'refresh');
	}
	public function del_jdl()
	{
		$a = $this->uri->segment(3);
		$this->m->delData('penanggung_jawab', ['id_jadwal' => $a]);
		$this->m->delData('jadwal', ['id_jadwal' => $a]);
		redirect('Home/jadwal','refresh');		
	}
}
