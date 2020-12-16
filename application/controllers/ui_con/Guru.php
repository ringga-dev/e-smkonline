<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        is_logged_in();
        pengajar_menu();
    }

    public function tugas()
    {
        $data['title'] = 'Managemen <sup>tugas</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas'] = $this->user->getTugas($data['user']['id']);
        $data['mapel'] = $this->user->getMapel();

        // var_dump($data['mapel']);
        // die;


        $this->form_validation->set_rules('id_mapel', 'mapel', 'required');
        $this->form_validation->set_rules('tipe', 'tipe', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('durasi', 'durasi', 'required');
        $this->form_validation->set_rules('info', 'info', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('guru/tugas', $data);
            $this->load->view('tamplate/footer', $data);
        } else {
            date_default_timezone_set('asia/jakarta');

            $data = [
                'id_mapel' => $this->input->post('id_mapel'),
                'id_pengajar' => $data['user']['id'],
                'tipe' => $this->input->post('tipe'),
                'judul' => $this->input->post('judul'),
                'durasi' => $this->input->post('durasi'),
                'info' => $this->input->post('info'),
                'tgl_buat' => date("Y-m-d"),
                'is_aktif' => 0,
            ];


            $this->db->insert('tugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
            redirect('ui_con/guru/tugas');
        }
    }

    public function add_pertanyaan_esai($id)
    {
        $data['title'] = 'Managemen <sup>tugas</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas'] = $this->user->getTugasTampil($id);
        $data['pertanyaan'] = $this->user->getPertanyaan($data['tugas']);

        $id_tugas = $data['tugas']['id'];

        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');
        $this->form_validation->set_rules('tugas_id', 'tugas_id', 'required');
        $this->form_validation->set_rules('a', 'a', 'required');
        $this->form_validation->set_rules('b', 'b', 'required');
        $this->form_validation->set_rules('c', 'c', 'required');
        $this->form_validation->set_rules('d', 'e', 'required');
        $this->form_validation->set_rules('e', 'e', 'required');
        $this->form_validation->set_rules('jawaban', 'jawaban', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('guru/add_pertanyaan_esai', $data);
            $this->load->view('tamplate/footer', $data);
        } else {
            date_default_timezone_set('asia/jakarta');

            $data = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'tugas_id' => $this->input->post('tugas_id'),
                'a' => $this->input->post('a'),
                'b' => $this->input->post('b'),
                'c' => $this->input->post('c'),
                'd' => $this->input->post('d'),
                'e' => $this->input->post('e'),
                'jawaban' => $this->input->post('jawaban'),
            ];



            $this->db->insert('tugas_pertanyaan_esai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
            redirect('ui_con/guru/add_pertanyaan_esai/' . $id_tugas);
        }
    }

    public function tampil_tugas($id)
    {
        $data['title'] = 'Managemen <sup>tugas</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas_tampil'] = $this->user->getTugasTampil($id);
        $data['kelas'] = $this->user->getKelas();
        // var_dump($data['tugas_tampil']);
        // die;

        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('guru/atur_kelas', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function akses_tampil()
    {
        $menu_id = $this->input->post('tugasId');
        $role_id = $this->input->post('kelasId');
        $data = [
            'id_kelas' => $role_id,
            'tugas_id' => $menu_id,
            'is_aktif' => 1
        ];


        $result = $this->db->get_where('tugas_kelas', $data);
        if ($result->num_Rows() < 1) {
            $this->db->insert('tugas_kelas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            anda berhasil menambah data!       
            </div>');
        } else {
            $this->db->delete('tugas_kelas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            anda berhasil menghapus data!       
            </div>');
        }
    }
    public function delete_tugas($id)
    {

        $this->db->delete('tugas', ['id' => $id]);
        $this->db->delete('tugas_kelas', ['tugas_id' => $id]);


        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');
        redirect('ui_con/guru/tugas');
    }

    public function delete_pertanyaan_esai()
    {
        $id = $this->input->get('id');
        $tugas_id = $this->input->get('tugas_id');
        $data = $this->user->getSatuPertanyaan($id);


        $this->db->delete('tugas_pertanyaan_esai', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');

        redirect('ui_con/guru/add_pertanyaan_esai/' . $tugas_id);
    }

    public function add_pertanyaan_upload($id)
    {
        $data['title'] = 'Managemen <sup>tugas</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas'] = $this->user->getTugasTampil($id);
        $data['pertanyaan'] = $this->user->getPertanyaan($data['tugas']);

        $id_tugas = $data['tugas']['id'];
        // var_dump($data);
        // die;

        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');
        $this->form_validation->set_rules('tugas_id', 'tugas_id', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('guru/add_pertanyaan_upload', $data);
            $this->load->view('tamplate/footer', $data);
        } else {
            date_default_timezone_set('asia/jakarta');

            $data = [
                'soal' => $this->input->post('pertanyaan'),
                'tugas_id' => $this->input->post('tugas_id'),
            ];

            $this->db->insert('tugas_pertanyaan_upload', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
            redirect('ui_con/guru/add_pertanyaan_upload/' . $id_tugas);
        }
    }

    public function delete_pertanyaan_upload()
    {
        $id = $this->input->get('id');
        $tugas_id = $this->input->get('tugas_id');


        $this->db->delete('tugas_pertanyaan_upload', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');

        redirect('ui_con/guru/add_pertanyaan_upload/' . $tugas_id);
    }



    public function add_pertanyaan_isian($id)
    {
        $data['title'] = 'Managemen <sup>tugas</sup>';
        $data['user'] = $this->user->getUser();
        $data['tugas'] = $this->user->getTugasTampil($id);
        $data['pertanyaan'] = $this->user->getPertanyaan($data['tugas']);

        $id_tugas = $data['tugas']['id'];
        // var_dump($data);
        // die;

        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');
        $this->form_validation->set_rules('tugas_id', 'tugas_id', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('guru/add_pertanyaan_isian', $data);
            $this->load->view('tamplate/footer', $data);
        } else {
            date_default_timezone_set('asia/jakarta');

            $data = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'tugas_id' => $this->input->post('tugas_id'),
            ];

            $this->db->insert('tugas_pertanyaan_isian', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
            redirect('ui_con/guru/add_pertanyaan_isian/' . $id_tugas);
        }
    }

    public function delete_pertanyaan_isian()
    {
        $id = $this->input->get('id');
        $tugas_id = $this->input->get('tugas_id');


        $this->db->delete('tugas_pertanyaan_isian', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');

        redirect('ui_con/guru/add_pertanyaan_isian/' . $tugas_id);
    }

    public function pertemuan()
    {
        $data['title'] = 'Managemen <sup>Pertemuan</sup>';
        $data['user'] = $this->user->getUser();
        $data['pertemuan'] = $this->user->getPertemuan($data['user']['id']);
        $data['mapel'] = $this->user->getMapel();
        $data['kelas'] = $this->user->getKelas();

        // var_dump($data);
        // die;


        $this->form_validation->set_rules('id_mapel', 'mapel', 'required');
        $this->form_validation->set_rules('id_kelas', 'kelas', 'required');
        $this->form_validation->set_rules('jadwal', 'jadwal', 'required');
        $this->form_validation->set_rules('jam', 'jam', 'required');
        $this->form_validation->set_rules('info', 'info', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('guru/pertemuan', $data);
            $this->load->view('tamplate/footer', $data);
        } else {
            date_default_timezone_set('asia/jakarta');

            $data = [
                'id_mapel' => $this->input->post('id_mapel'),
                'id_pengajar' => $data['user']['id'],
                'id_kelas' => $this->input->post('id_kelas'),
                'jadwal' => $this->input->post('jadwal'),
                'jam' => $this->input->post('jam'),
                'info' => $this->input->post('info'),
            ];

            // var_dump($data);
            // die;

            $this->db->insert('pertemuan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
            redirect('ui_con/guru/pertemuan');
        }
    }
}
