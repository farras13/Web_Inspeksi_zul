<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Model', 'm');
    }

    public function index()
    {
        $this->load->view('login');
    }
    public function signin()
    {
        $w = array(
            'username' => $this->input->post('usern'),
            'password' => md5($this->input->post('password'))
        );
        $check = $this->m->getDataId('user',$w)->row();
        if ($check != null) {
            $userdata = array('username' => $check->username, 'level' => $check->level);
            $this->session->set_userdata('user_login', $userdata);
            redirect('Home', 'refresh');
        } else {
            $this->session->set_flashdata('flash-data', 'username or Pass masih salah bre');
            redirect('Login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
		redirect('Login');
    }
}
    
    /* End of file Login.php */
