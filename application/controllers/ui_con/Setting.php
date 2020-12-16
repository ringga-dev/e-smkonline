<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        is_logged_in();
        admin_menu();
    }

    public function menu()
    {
        $data['title'] = 'Managemen <sup>Menu</sup>';
        $data['user'] = $this->user->getUser();
        $data['menu'] = $this->user->getMenu();
        $data['submenu'] = $this->user->getSubMenu();


        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('conten/menu', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function akses_menu()
    {
        $data['title'] = 'Managemen <sup>Akses Menu</sup>';
        $data['user'] = $this->user->getUser();
        $role_id = 'all';
        $data['role'] = $this->user->getRole($role_id);


        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('conten/akses_menu', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function atur_menu($role_id)
    {
        $data['title'] = 'Managemen <sup>Role Menu</sup>';
        $data['user'] = $this->user->getUser();
        $data['role'] = $this->user->getRole($role_id);
        $data['menu'] = $this->user->getMenu();


        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('conten/atur_menu', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function ganti_akses()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
            'is_aktif' => 1
        ];


        $result = $this->db->get_where('user_akses_menu', $data);
        if ($result->num_Rows() < 1) {
            $this->db->insert('user_akses_menu', $data);
        } else {
            $this->db->delete('user_akses_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        anda berhasil mengubah data!       
        </div>');
    }


    public function add_role()
    {
        $role = $this->input->post('role');

        $result = $this->db->get_where('user_role', ['role' => $role]);


        if ($result->num_rows() < 1) {
            $this->db->insert('user_role', ['role' => $role]);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                anda berhasil menambahkan data!       
                </div>');
            redirect('ui_con/setting/akses_menu');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                data sudah ada!       
                </div>');
            redirect('ui_con/setting/akses_menu');
        }
    }

    public function add_menu()
    {
        $data = [
            'menu' => $this->input->post('menu'),
            'logo' => 'fa-' . $this->input->post('logo_user')
        ];
        $result = $this->db->get_where('user_menu', $data);
        if ($result != null) {

            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                                data ditambahkan!       
                                                </div>');
            redirect('ui_con/setting/menu');
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                                data sudah ada!       
                                                </div>');
            redirect('ui_con/setting/menu');
        }
    }

    public function add_submenu()
    {
        $data = [
            'menu_id' => $this->input->post('menu_id'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'is_aktif' => 1
        ];

        $result = $this->db->get_where('user_sub_menu', $data);
        if ($result != null) {

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                                data ditambahkan!       
                                                </div>');
            redirect('ui_con/setting/menu');
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                                data sudah ada!       
                                                </div>');
            redirect('ui_con/setting/menu');
        }
    }

    public function hapus_menu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');
        redirect('ui_con/setting/menu');
    }

    public function hapus_sub_menu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');
        redirect('ui_con/setting/menu');
    }

    public function hapus_role($id)
    {
        $this->db->delete('user_role', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                                        anda berhasil menghapus!       
                                        </div>');
        redirect('ui_con/setting/akses_menu');
    }

    public function data_admin()
    {
        $data['title'] = 'Managemen <sup>Admin</sup>';
        $data['user'] = $this->user->getUser();
        $data['admin'] = $this->user->getAdmin();

        $this->form_validation->set_rules('no_identitas', 'no_identitas', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_phone', 'no_phone', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/head', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('tamplate/topbar', $data);
            $this->load->view('manager/admin', $data);
            $this->load->view('tamplate/footer', $data);
        } else {

            if ($this->db->get_where('user_login', ['email' => $this->input->post('email')])->num_rows() < 1) {
                if ($this->db->get_where('data_admin', ['no_identitas' => $this->input->post('no_identitas')])->num_rows() < 1) {

                    $datalogin = [
                        'no_identitas' => $this->input->post('no_identitas'),
                        'email' => $this->input->post('email'),
                        'pass' => password_hash(123456, PASSWORD_DEFAULT),
                        'role' => 1
                    ];

                    $data = [
                        'no_identitas' => $this->input->post('no_identitas'),
                        'nama' => $this->input->post('nama'),
                        'no_phone' => $this->input->post('no_phone'),
                        'jabatan' => $this->input->post('jabatan'),
                        'alamat' => $this->input->post('alamat'),
                        'image' => 'user.jpg',
                    ];


                    $this->db->insert('user_login', $datalogin);
                    $this->db->insert('data_admin', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success">
                                                    data sudah di simpan !
                                                        </div>');
                    redirect('ui_con/setting/data_admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">
                                                    nrp sudah terdaftar !
                                                        </div>');
                    redirect('ui_con/setting/data_admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">
                                                    email sudah terdaftar !
                                                        </div>');
                redirect('ui_con/setting/data_admin');
            }
        }
    }

    public function edit_admin()
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



        $this->db->set('no_identitas', $this->input->post('no_identitas'));
        $this->db->set('nama', $this->input->post('nama'));
        $this->db->set('no_phone', $this->input->post('no_phone'));
        $this->db->set('jabatan', $this->input->post('jabatan'));
        $this->db->set('alamat', $this->input->post('alamat'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success">
             profil telah di Update !
                 </div>');
        redirect('ui_con/setting/data_admin');
    }
}
