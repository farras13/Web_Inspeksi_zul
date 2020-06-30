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
		$datauser = $this->session->userdata('datauser');
		if ($datauser == null) {
			redirect('Login', 'refresh');
		}
	}

	public function index()
	{
		$data['jdl'] = $this->m->getData('jadwal')->result();
		$data['cj'] = $this->m->count('jadwal','id_jadwal','jadwal')->row();
		$data['cr'] = $this->m->count('tgl_inspeksi','id_harian','harian')->row();
		$data['ca'] = $this->m->count('tanggal_apar','id_apar','apar')->row();
		$data['ch'] = $this->m->count('tanggal_hydrant','id_hydrant','hydrant')->row();
		$data['cp'] = $this->m->count('inspect_date','id_p3k','p3k')->row();
		$data['cs'] = $this->m->count('tanggal_shk','id_shk','shk')->row();
		$data['cf'] = $this->m->count('tanggal_inspeksi','id_fa','fire_alarm')->row();
		$data['cu'] = $this->m->count(NULL,'id_user','user')->row();
		$this->load->view('template/header');
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}

	public function Jadwal()
	{
		$t = $this->input->get('time');

		if ($t == 1) {
			$w = array('jadwal' => date('Y-m-d'));
			$data['tbl'] = $this->m->getDataId('jadwal', $w)->result();
		} elseif ($t == 3) {
			$day1 = date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d'))));
			$day2 = date('Y-m-d', strtotime('+2 days', strtotime(date('Y-m-d'))));
			$w = array('jadwal' => date('Y-m-d'));
			$w1 = array('jadwal' => $day1);
			$w2 = array('jadwal' => $day2);
			$data['tbl'] = $this->m->getDataW3('jadwal', $w, $w1, $w2)->result();
		} elseif ($t == 7) {
			$day1 = date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d'))));
			$day2 = date('Y-m-d', strtotime('+2 days', strtotime(date('Y-m-d'))));
			$day3 = date('Y-m-d', strtotime('+3 days', strtotime(date('Y-m-d'))));
			$day4 = date('Y-m-d', strtotime('+4 days', strtotime(date('Y-m-d'))));
			$day5 = date('Y-m-d', strtotime('+5 days', strtotime(date('Y-m-d'))));
			$day6 = date('Y-m-d', strtotime('+6 days', strtotime(date('Y-m-d'))));
			$w = array('jadwal' => date('Y-m-d'));	$w1 = array('jadwal' => $day1);
			$w2 = array('jadwal' => $day2);	$w3 = array('jadwal' => $day3);
			$w4 = array('jadwal' => $day4);	$w5 = array('jadwal' => $day5);
			$w6 = array('jadwal' => $day6);
			$data['tbl'] = $this->m->getDataW7('jadwal', $w, $w1, $w2, $w3, $w4, $w5, $w6)->result();
		} else {
			$data['tbl'] = $this->m->getDataO('jadwal', 'jadwal', 'asc')->result();
		}
		$this->load->view('template/header');
		$this->load->view('jadwal', $data);
		$this->load->view('template/footer');
	}

	public function User()
	{
		$data['usr'] = $this->m->getData('user')->result();
		$this->load->view('template/header');
		$this->load->view('user', $data);
		$this->load->view('template/footer');
	}

	public function ins_jdl()
	{
		$objek = array(
			'keterangan' => $this->input->post('jdl'),
			'jadwal' => $this->input->post('tgl')
		);
		$this->m->insData('jadwal', $objek);
		redirect('Home/jadwal', 'refresh');
	}

	public function ins_usr()
	{
		$objek = array(
			'username' => $this->input->post('usr'),
			'level' => $this->input->post('lvl'),
			'password' => md5($this->input->post('pass'))
		);
		$this->m->insData('user', $objek);
		redirect('Home/user', 'refresh');
	}

	public function edt_jdl()
	{
		$id = $this->input->post('id');

		$objek = array(
			'keterangan' => $this->input->post('jdl'),
			'jadwal' => $this->input->post('tgl')
		);
		$this->m->updData('jadwal', $objek, ['id_jadwal' => $id]);
		redirect('Home/jadwal', 'refresh');
	}
	public function edt_usr()
	{
		$id = $this->input->post('id');
		$objek = array(
			'username' => $this->input->post('usr'),
			'level' => $this->input->post('lvl'),
			'password' => md5($this->input->post('pass'))
		);
		$this->m->updData('user', $objek, ['id_user' => $id]);
		redirect('Home/user', 'refresh');
	}
	public function del_jdl()
	{
		$a = $this->uri->segment(3);
		$this->m->delData('jadwal', ['id_jadwal' => $a]);
		redirect('Home/jadwal', 'refresh');
	}
	public function del_usr()
	{
		$a = $this->uri->segment(3);
		$this->m->delData('user', ['id_user' => $a]);
		redirect('Home/user', 'refresh');
	}
}
