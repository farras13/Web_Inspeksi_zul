<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Inspeksi extends CI_Controller
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
        // $data['pk'] = ['kasa_steril','perban_5cm','perban_10cm','plester_1.25','plester_cepat','kapas','mitela','gunting','pentil','sarung_tangan','masker','pinset','senter','gelas','kantong_plastik','aquades','povidon_lodin','alkohol_70','buku_panduan','buku_catatan'];
        // $data['pkd'] = ['Kasa steril','Perban 5cm','Perban 10cm','Plester 1.25','Plester cepat','Kapas','Mitela','Gunting','Pentil','Sarung tangan','Masker','Pinset','Senter','Gelas','Kantong plastik','Aquades','Povidon lodin','Alkohol 70','Buku panduan','Buku catatan'];
        $data['pkd'] = $this->m->getdata('list_p3k')->result();
        $this->load->view('template/header');
        $this->load->view('form', $data);
        $this->load->view('template/footer');
    }

    public function p3k()
    {
        $data['pk'] = $this->m->getPk()->result();
        // $data['pk'] = $this->m->getdata('list_p3k')->result();
        $data['pks'] = $this->m->getdata('p3k')->result();
        $this->load->view('template/header');
        $this->load->view('tabel/p3k', $data);
        $this->load->view('template/footer');
    }

    public function apar()
    {
        $data['ap'] = $this->m->getdata('apar')->result();
        $this->load->view('template/header');
        $this->load->view('tabel/apar', $data);
        $this->load->view('template/footer');
    }
    public function shk()
    {
        $data['sk'] = $this->m->getdata('shk')->result();
        $this->load->view('template/header');
        $this->load->view('tabel/shk', $data);
        $this->load->view('template/footer');
    }

    public function hydrant()
    {
        $data['hd'] = $this->m->getdata('hydrant')->result();
        $data['cp'] = $this->m->getdata('cp_hydrant')->result();
        $this->load->view('template/header');
        $this->load->view('tabel/hydrant', $data);
        $this->load->view('template/footer');
    }

    public function fire()
    {
        $data['fr'] = $this->m->getdata('fire_alarm')->result();
        $this->load->view('template/header');
        $this->load->view('tabel/fire', $data);
        $this->load->view('template/footer');
    }

    public function ins_apar()
    {

        // $this->input->post('tgl_apar');
        $object = array(
            'fire_extinguisher' =>  $this->input->post('Fire'),
            'tgl_refil' =>  $this->input->post('Refilling'),
            'tgl_berlaku' =>  $this->input->post('berlaku'),
            'kondisi_tabung' =>  $this->input->post('Tabung'),
            'hose' =>  $this->input->post('Hose'),
            'pen_pengaman' =>  $this->input->post('Pen'),
            'segel_pengaman' =>  $this->input->post('Segel'),
            'pressure' =>  $this->input->post('Pressure'),
            'petugas' =>  $this->input->post('Petugas'),
            'tanggal_apar' =>  date('Y-m-d H:i:s')
        );
        $this->m->insData('apar', $object);

        redirect('inspeksi', 'refresh');
    }
    public function ins_shk()
    {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pict')) {
            $error = $this->upload->display_errors();
            echo $error;
        } else {
            $object = array(
                'problem' =>  $this->input->post('Kendala'),
                'action'  =>  $this->input->post('Solusi'),
                'picture' =>  $this->upload->data('file_name'),
                'petugas' =>  $this->input->post('Petugas'),
                'tanggal_shk' =>  date('Y-m-d H:i:s')
            );
            $this->m->insData('shk', $object);
            redirect('inspeksi', 'refresh');
        }
    }
    public function ins_p3k()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pict')) {
            $error = $this->upload->display_errors();
            echo $error;
        } else {
            $object = array(
                'lokasi' => $this->input->post('Lokasi'),
                'gambar' =>  $this->upload->data('file_name'),
                'checked_by' => $this->input->post('Petugas'),
                'inspect_date' => date('Y-m-d H:i:s')
            );
            $this->m->insData('p3k', $object);

            $a = $this->m->gl('p3k')->row();
            for ($i = 1; $i < 22; $i++) {
                $object1 = array(
                    'id_p3k' => $a->id_p3k,
                    'id_list_p3k' =>  $i,
                    'stok' => $this->input->post('stok' . $i),
                    'add' =>  $this->input->post('add' . $i)
                );
                $this->m->insData('detail_p3k', $object1);

                redirect('inspeksi', 'refresh');
            }
        }
    }
    public function ins_fire()
    {
        $object = array(
            'lokasi' => $this->input->post('Lokasi'),
            'peralatan' => $this->input->post('Peralatan'),
            'jumlah_instalasi' => $this->input->post('jumlah'),
            'smoke' => $this->input->post('Smoke'),
            'heat' => $this->input->post('Heat'),
            'equip' => $this->input->post('equip'),
            'tanggal_inspeksi' => date('Y-m-d'),
            'kondisi_peralatan' => $this->input->post('Kondisi'),
            'keterangan' => $this->input->post('Keterangan'),
            'petugas' => $this->input->post('Petugas'),
        );
        $this->m->insData('fire_alarm', $object);
        redirect('inspeksi', 'refresh');
    }
    public function ins_hydrant()
    {
        $object = array(
            'hydrant' => $this->input->post('Hydrant'),
            'lokasi' => $this->input->post('Lokasi'),
            'pipe_hydrant' => $this->input->post('Pipe'),
            'valve_hydrant' => $this->input->post('Valve'),
            'machino' => $this->input->post('Machino'),
            'hose_hydrant' => $this->input->post('Hose'),
            'box_hydrant' => $this->input->post('Box'),
            'nozzle' =>  $this->input->post('Nozzle'),
            'pressure_hydrant' =>  $this->input->post('Pressure'),
            'tanggal_hydrant' => date('Y-m-d'),
            'petugas' =>  $this->input->post('Petugas')
        );
        $this->m->insData('hydrant', $object);
        redirect('inspeksi', 'refresh');
    }
    public function ins_cph()
    {
        $object = array(
            'equipment' => $this->input->post('Equipment'),
            'lokasi' => $this->input->post('Lokasi'),
            'week' => $this->input->post('Week'),
            'bensin' => $this->input->post('Bensin'),
            'olie' => $this->input->post('Olie'),
            'total_jam' => $this->input->post('Jam'),
            'petugas' =>  $this->input->post('Petugas'),
            'inspect_date' => date('Y-m-d')
        );
        $this->m->insData('cp_hydrant', $object);
        redirect('inspeksi', 'refresh');
    }

    public function edit_apar($id)
    {
        $w = array('id_apar' => $id);
        $data['ap'] = $this->m->getDataId('apar', $w)->result();
        $this->load->view('template/header');
        $this->load->view('edit/apar', $data);
        $this->load->view('template/footer');
    }
    public function edit_shk($id)
    {
        $w = array('id_shk' => $id);
        $data['sh'] = $this->m->getDataId('shk', $w)->result();
        $this->load->view('template/header');
        $this->load->view('edit/shk', $data);
        $this->load->view('template/footer');
    }
    public function edit_fire($id)
    {
        $w = array('id_fa' => $id);
        $data['fa'] = $this->m->getDataId('fire_alarm', $w)->result();
        $this->load->view('template/header');
        $this->load->view('edit/fire', $data);
        $this->load->view('template/footer');
    }

    public function edit_hydrant($id)
    {
        $w = array('id_hydrant' => $id);
        $data['hy'] = $this->m->getDataId('hydrant', $w)->result();
        $this->load->view('template/header');
        $this->load->view('edit/hydrant', $data);
        $this->load->view('template/footer');
    }

    public function edit_p3k($id)
    {
        $w = array('id_p3k' => $id);
        $data['pk'] = $this->m->getDataId('p3k', $w)->result();
        $data['pkd'] = $this->m->getPk()->result();
        $this->load->view('template/header');
        $this->load->view('edit/p3k', $data);
        $this->load->view('template/footer');
    }
    public function updateData()
    {
        $id = $this->input->post('id');
        $j = $this->input->post('jpos');
        if ($j == "SHK") {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('pict')) {
                $w = array('id_shk' => $id);
                $object = array(
                    'problem' =>  $this->input->post('Kendala'),
                    'action'  =>  $this->input->post('Solusi'),
                    'petugas' =>  $this->input->post('Petugas'),
                    'lokasi' =>  $this->input->post('Lokasi')
                );
                $this->m->updData('shk', $object, $w);
                redirect('inspeksi/shk', 'refresh');
            } else {
                $w = array('id_shk' => $id);
                $object = array(
                    'problem' =>  $this->input->post('Kendala'),
                    'action'  =>  $this->input->post('Solusi'),
                    'picture' =>  $this->upload->data('file_name'),
                    'petugas' =>  $this->input->post('Petugas'),
                    'tanggal_shk' =>  date('Y-m-d H:i:s')
                );
                $this->m->updData('shk', $object, $w);
                redirect('inspeksi/shk', 'refresh');
            }
        } elseif ($j == "APAR") {
            $w = array('id_apar' => $id);
            $object = array(
                'fire_extinguisher' =>  $this->input->post('Fire'),
                'tgl_refil' =>  $this->input->post('Refilling'),
                'tgl_berlaku' =>  $this->input->post('berlaku'),
                'kondisi_tabung' =>  $this->input->post('Tabung'),
                'hose' =>  $this->input->post('Hose'),
                'pen_pengaman' =>  $this->input->post('Pen'),
                'segel_pengaman' =>  $this->input->post('Segel'),
                'pressure' =>  $this->input->post('Pressure'),
                'petugas' =>  $this->input->post('Petugas')
            );
            $this->m->updData('apar', $object, $w);

            redirect('inspeksi/apar', 'refresh');
        } elseif ($j == "FIRE") {
            $w = array('id_fa' => $id);
            $object = array(
                'lokasi' => $this->input->post('Lokasi'),
                'peralatan' => $this->input->post('Peralatan'),
                'jumlah_instalasi' => $this->input->post('jumlah'),
                'smoke' => $this->input->post('Smoke'),
                'heat' => $this->input->post('Heat'),
                'equip' => $this->input->post('equip'),
                'kondisi_peralatan' => $this->input->post('Kondisi'),
                'keterangan' => $this->input->post('Keterangan'),
                'petugas' => $this->input->post('Petugas'),
            );
            $this->m->updData('fire_alarm', $object, $w);
            redirect('inspeksi/fire', 'refresh');
        } elseif ($j == "HYDRANT") {
            $w = array('id_hydrant' => $id);
            $object = array(
                'hydrant' => $this->input->post('Hydrant'),
                'lokasi' => $this->input->post('Lokasi'),
                'pipe_hydrant' => $this->input->post('Pipe'),
                'valve_hydrant' => $this->input->post('Valve'),
                'machino' => $this->input->post('Machino'),
                'hose_hydrant' => $this->input->post('Hose'),
                'box_hydrant' => $this->input->post('Box'),
                'nozzle' =>  $this->input->post('Nozzle'),
                'pressure_hydrant' =>  $this->input->post('Pressure'),
                'tanggal_hydrant' => date('Y-m-d'),
                'petugas' =>  $this->input->post('Petugas')
            );
            $this->m->updData('hydrant', $object, $w);
            redirect('inspeksi/hydrant', 'refresh');
        } elseif ($j == "P3K") {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);
            $w = array('id_p3k' => $id);
            
            if (!$this->upload->do_upload('pict')) {
                $object = array(
                    'lokasi' => $this->input->post('Lokasi'),                    
                    'checked_by' => $this->input->post('Petugas')
                );
                $this->m->updData('p3k', $object, $w);

                // $a = $this->m->gl('p3k')->row();
                for ($i = 1; $i < 22; $i++) {
                    $object1 = array(
                        'id_list_p3k' => $i,
                        'stok' => $this->input->post('stok'.$i),
                        'add' =>  $this->input->post('add'.$i)
                    );
                    $we = array('id_detail' => $this->input->post('idd'.$i));
                    $this->m->updData('detail_p3k', $object1, $we);
                    var_dump($we);
                }
                redirect('inspeksi/p3k', 'refresh');
            } else {
                $object = array(
                    'lokasi' => $this->input->post('Lokasi'),
                    'gambar' =>  $this->upload->data('file_name'),
                    'checked_by' => $this->input->post('Petugas')
                );
                $this->m->updData('p3k', $object, $w);

                for ($i = 1; $i < 22; $i++) {
                    $object1 = array(
                        'id_list_p3k' => $i,
                        'stok' => $this->input->post('stok'.$i),
                        'add' =>  $this->input->post('add'.$i)
                    );
                    $we = array('id_detail' => $this->input->post('idd'.$i));
                    $this->m->updData('detail_p3k', $object1, $we);
                }
                redirect('inspeksi/p3k', 'refresh');
            }
        }
    }

    public function delp3k($id)
    {
        $w = array('id_p3k' => $id);
        $this->m->delData('detail_p3k', $w);
        $this->m->delData('p3k', $w);
        redirect('inspeksi/p3k','refresh');
    }
    public function delapar($id)
    {
        $w = array('id_apar' => $id);
        $this->m->delData('apar', $w);
        redirect('inspeksi/apar','refresh');
    }
    public function delfire($id)
    {
        $w = array('id_fa' => $id);
        $this->m->delData('fire_alarm', $w);
        redirect('inspeksi/fire','refresh');
    }
    public function delhydrant($id)
    {
        $w = array('id_hydrant' => $id);
        $this->m->delData('hydrant', $w);
        redirect('inspeksi/hydrant','refresh');
    }
    public function delshk($id)
    {
        $w = array('id_shk' => $id);
        $this->m->delData('shk', $w);
        redirect('inspeksi/shk','refresh');
    }
}
/* End of file Inspeksi.php */
