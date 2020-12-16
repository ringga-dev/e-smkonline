<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        is_logged_in();
        siswa_menu();
    }
    public function tugas()
    {
        $data['title'] = 'Kerjakan <sup>tugas</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas_kelas'] = $this->user->getTugasKelas($data['user']['id_kelas']);

        // var_dump($data['tugas_kelas']);
        // die;

        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('siswa/tugas', $data);
        $this->load->view('tamplate/footer', $data);
    }


    public function kerjakan_esai($id)
    {
        $data['title'] = 'Kerjakan <sup>isian</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas'] = $this->user->getTugasTampil($id);
        $data['pertanyaan'] = $this->user->getPertanyaan($data['tugas']);



        $this->load->view('kerjakan/esai', $data);
        // var_dump($data['tugas_kelas']);
        // die;

        // $this->load->view('tamplate/head', $data);
        // $this->load->view('tamplate/sidebar', $data);
        // $this->load->view('tamplate/topbar', $data);
        // $this->load->view('siswa/tugas', $data);
        // $this->load->view('tamplate/footer', $data);
    }

    public function kerjakan_isian($id)
    {
        $data['title'] = 'Kerjakan <sup>isian</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas'] = $this->user->getTugasTampil($id);
        $data['pertanyaan'] = $this->user->getPertanyaan($data['tugas']);



        $this->load->view('kerjakan/isian', $data);
        // var_dump($data['tugas_kelas']);
        // die;

        // $this->load->view('tamplate/head', $data);
        // $this->load->view('tamplate/sidebar', $data);
        // $this->load->view('tamplate/topbar', $data);
        // $this->load->view('siswa/tugas', $data);
        // $this->load->view('tamplate/footer', $data);
    }
    public function kerjakan_upload($id)
    {
        $data['title'] = 'Kerjakan <sup>isian</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas'] = $this->user->getTugasTampil($id);
        $data['pertanyaan'] = $this->user->getPertanyaan($data['tugas']);



        // var_dump($data['pertanyaan']);
        // die;
        $this->load->view('kerjakan/upload', $data);

        // $this->load->view('tamplate/head', $data);
        // $this->load->view('tamplate/sidebar', $data);
        // $this->load->view('tamplate/topbar', $data);
        // $this->load->view('siswa/tugas', $data);
        // $this->load->view('tamplate/footer', $data);
    }

    public function pertemuan()
    {
        $data['title'] = 'Managemen <sup>tugas</sup>';
        $data['user'] = $this->user->getUser();
        $data['pertemuan_kelas'] = $this->user->getPertemuanKelas($data['user']['id_kelas']);

        // var_dump($data['pertemuan_kelas']);
        // die;

        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('siswa/pertemuan', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function hadir_pertemuan($id)
    {
        $data['user'] = $this->user->getUser();
        $data['pertemuan'] = $this->user->getPertemuanId($id);


        date_default_timezone_set('asia/jakarta');
        $data = [
            'id_pertemuan' => $data['pertemuan']['id'],
            'id_siswa' => $data['user']['id'],
            'jam' => date("H:i:s"),
            'tgl' => date("Y-m-d")
        ];


        $this->db->insert('perte_siswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                anda berhasil menghadiri !
                                                    </div>');
        redirect('ui_con/siswa/pertemuan');
    }

    public function pertemuan_dihadiri()
    {
        $data['title'] = 'Managemen <sup>tugas</sup>';
        $data['user'] = $this->user->getUser();
        $data['pertemuan_dihadiri'] = $this->user->getPertemuanHadir($data['user']['id']);

        // var_dump($data['pertemuan_dihadiri']);
        // die;

        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('siswa/pertemuan_hadir', $data);
        $this->load->view('tamplate/footer', $data);
    }
}
