<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                password salah !
                </div>');
            redirect('ui_con/dashboard');
        }

        $data['title'] = 'User Login';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'Pass', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    // public function register()
    // {
    //     $data['title'] = 'User Register';
    //     $this->load->view('auth/register', $data);
    // }

    // public function register_2()
    // {
    //     $data['title'] = 'Masukkan Data Diri';
    //     $this->load->view('auth/register_2', $data);
    // }

    private function _login()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        $user = $this->db->get_where('user_login', ['email' => $email])->row_array();

        if ($user) {

            if (password_verify($pass, $user['pass'])) {

                $data = [
                    'no_iden' => $user['no_identitas'],
                    'email' => $user['email'],
                    'role_id' => $user['role']
                ];

                $this->session->set_userdata($data);
                redirect('ui_con/Dashboard');
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                password salah !
                </div>');
                redirect('auth/user');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            akun tidak ada!
            </div>');
            redirect('auth/user');
        }
    }
    public function loqout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('no_iden');

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        anda berhasil keluar!        
        </div>');
        redirect('auth/user');
    }
}
