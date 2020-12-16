<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        is_logged_in();
        admin_menu();
    }

    public function guru()
    {
        $data['title'] = 'Managemen <sup>guru</sup>';
        $data['user'] = $this->user->getUser();
        $data['pengajar'] = $this->user->getPengajar();

        $this->form_validation->set_rules('nrp', 'nrp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_phone', 'no_phone', 'required');
        $this->form_validation->set_rules('prodi', 'prodi', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nidn', 'nidn', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('manager/guru', $data);
            $this->load->view('tamplate/footer', $data);
        } else {

            if ($this->db->get_where('user_login', ['email' => $this->input->post('email')])->num_rows() < 1) {
                if ($this->db->get_where('data_guru', ['nrp' => $this->input->post('nrp')])->num_rows() < 1) {

                    $datalogin = [
                        'no_identitas' => $this->input->post('nrp'),
                        'email' => $this->input->post('email'),
                        'pass' => password_hash(123456, PASSWORD_DEFAULT),
                        'role' => 2
                    ];

                    $data = [
                        'nidn' => $this->input->post('nidn'),
                        'nrp' => $this->input->post('nrp'),
                        'nama' => $this->input->post('nama'),
                        'no_phone' => $this->input->post('no_phone'),
                        'prodi' => $this->input->post('prodi'),
                        'alamat' => $this->input->post('alamat'),
                        'image' => 'user.jpg',
                    ];


                    $this->db->insert('user_login', $datalogin);
                    $this->db->insert('data_guru', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
                    redirect('ui_con/sekolah/guru');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">
                                                    nrp sudah terdaftar !
                                                        </div>');
                    redirect('ui_con/sekolah/guru');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">
                                                    email sudah terdaftar !
                                                        </div>');
                redirect('ui_con/sekolah/guru');
            }
        }
    }

    public function delete_guru($id)
    {
        $this->db->delete('user_login', ['no_identitas' => $id, 'role' => 2]);
        $this->db->delete('data_guru', ['nrp' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');
        redirect('ui_con/sekolah/guru');
    }

    public function edit_guru()
    {
        // $data['user'] = $this->user->getUser();

        // //cek gamar kalo ada
        // $upload_image = $_FILES['foto'];

        // if ($upload_image) {
        //     $config['upload_path'] = './assets/foto_user/';
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size']     = '10000';

        //     $this->load->library('upload', $config);

        //     $old_image = $data['user']['image'];
        //     if ($old_image != 'defaul.jpg') {
        //         unlink(FCPATH . '/assets/foto_user/' . $old_image);
        //     }

        //     if ($this->upload->do_upload('image')) {
        //         $new_image = $this->upload->data('file_name');
        //         $this->db->set('image', $new_image);
        //     } else {
        //         echo $this->upload->display_errors();
        //     }
        // }


        $data['set'] = [
            'nrp' => $this->input->post('nrp'),
            'nidn' => $this->input->post('nidn'),
            'nama' => $this->input->post('nama'),
            'no_phone' => $this->input->post('no_phone'),
            'alamat' => $this->input->post('alamat'),
            'id' => $this->input->post('id')
        ];

        $this->db->set('nrp', $this->input->post('nrp'));
        $this->db->set('nidn', $this->input->post('nidn'));
        $this->db->set('nama', $this->input->post('nama'));
        $this->db->set('no_phone', $this->input->post('no_phone'));
        $this->db->set('prodi', $this->input->post('prodi'));
        $this->db->set('alamat', $this->input->post('alamat'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_guru');

        $this->session->set_flashdata('message', '<div class="alert alert-success">
             profil telah di Update !
                 </div>');
        redirect('ui_con/sekolah/guru');
    }


    public function siswa()
    {
        $data['title'] = 'Managemen <sup>guru</sup>';
        $data['user'] = $this->user->getUser();
        $data['siswa'] = $this->user->getSiswa();

        // var_dump($data['siswa']);
        // die;
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_phone', 'no_phone', 'required');
        $this->form_validation->set_rules('prodi', 'prodi', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('manager/siswa', $data);
            $this->load->view('tamplate/footer', $data);
        } else {

            if ($this->db->get_where('user_login', ['email' => $this->input->post('email')])->num_rows() < 1) {
                if ($this->db->get_where('data_siswa', ['nim' => $this->input->post('nim')])->num_rows() < 1) {

                    $datalogin = [
                        'no_identitas' => $this->input->post('nim'),
                        'email' => $this->input->post('email'),
                        'pass' => password_hash(123456, PASSWORD_DEFAULT),
                        'role' => 3
                    ];

                    $data = [
                        'nim' => $this->input->post('nim'),
                        'nama' => $this->input->post('nama'),
                        'no_phone' => $this->input->post('no_phone'),
                        'prodi' => $this->input->post('prodi'),
                        'alamat' => $this->input->post('alamat'),
                        'image' => 'user.jpg',
                    ];


                    $this->db->insert('user_login', $datalogin);
                    $this->db->insert('data_siswa', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
                    redirect('ui_con/sekolah/siswa');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">
                                                    nrp sudah terdaftar !
                                                        </div>');
                    redirect('ui_con/sekolah/siswa');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">
                                                    email sudah terdaftar !
                                                        </div>');
                redirect('ui_con/sekolah/siswa');
            }
        }
    }

    public function edit_siswa()
    {
        // $data['user'] = $this->user->getUser();

        // //cek gamar kalo ada
        // $upload_image = $_FILES['foto'];

        // if ($upload_image) {
        //     $config['upload_path'] = './assets/foto_user/';
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size']     = '10000';

        //     $this->load->library('upload', $config);

        //     $old_image = $data['user']['image'];
        //     if ($old_image != 'defaul.jpg') {
        //         unlink(FCPATH . '/assets/foto_user/' . $old_image);
        //     }

        //     if ($this->upload->do_upload('image')) {
        //         $new_image = $this->upload->data('file_name');
        //         $this->db->set('image', $new_image);
        //     } else {
        //         echo $this->upload->display_errors();
        //     }
        // }



        $this->db->set('nim', $this->input->post('nim'));
        $this->db->set('nama', $this->input->post('nama'));
        $this->db->set('no_phone', $this->input->post('no_phone'));
        $this->db->set('prodi', $this->input->post('prodi'));
        $this->db->set('alamat', $this->input->post('alamat'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_siswa');

        $this->session->set_flashdata('message', '<div class="alert alert-success">
             profil telah di Update !
                 </div>');
        redirect('ui_con/sekolah/siswa');
    }

    public function delete_siswa($id)
    {
        $this->db->delete('user_login', ['no_identitas' => $id, 'role' => 3]);
        $this->db->delete('data_siswa', ['nim' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');
        redirect('ui_con/sekolah/siswa');
    }

    public function prodi()
    {
        $data['title'] = 'Managemen <sup>prodi</sup>';
        $data['user'] = $this->user->getUser();
        $data['prodi'] = $this->user->getProdi();

        $this->form_validation->set_rules('prodi', 'prodi', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('manager/prodi', $data);
            $this->load->view('tamplate/footer', $data);
        } else {

            if ($this->db->get_where('prodi', ['prodi' => $this->input->post('prodi')])->num_rows() < 1) {


                $this->db->insert('prodi', ['prodi' => $this->input->post('prodi')]);
                $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
                redirect('ui_con/sekolah/prodi');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">
                                                    prodi sudah terdaftar !
                                                        </div>');
                redirect('ui_con/sekolah/prodi');
            }
        }
    }

    public function delete_prodi($id)
    {
        $this->db->delete('prodi', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');
        redirect('ui_con/sekolah/prodi');
    }


    public function kelas()
    {
        $data['title'] = 'Managemen <sup>prodi</sup>';
        $data['user'] = $this->user->getUser();
        $data['kelas'] = $this->user->getKelas();

        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('tingkat', 'tingkat', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('manager/kelas', $data);
            $this->load->view('tamplate/footer', $data);
        } else {
            $data = [
                'kelas' => $this->input->post('kelas'),
                'tingkat' => $this->input->post('tingkat'),
                'inisial' => $this->input->post('kelas') . $this->input->post('tingkat'),
            ];

            if ($this->db->get_where('kelas', ['inisial' => $this->input->post('inisial') . $this->input->post('kelas')])->num_rows() < 1) {


                $this->db->insert('kelas', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
                redirect('ui_con/sekolah/kelas');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">
                                                    data sudah terdaftar !
                                                        </div>');
                redirect('ui_con/sekolah/kelas');
            }
        }
    }

    public function delete_kelas($id)
    {
        $this->db->delete('kelas', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');
        redirect('ui_con/sekolah/kelas');
    }
}
