<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tampil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        is_logged_in();
    }
    public function error_404()
    {
        $data['user'] = $this->user->getUser();
        $data['heading'] = 'bukan akses anda....!';
        $data['message'] = 'anda tidak dapat mengakses halaman ini';


        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('errors/error', $data);
        $this->load->view('tamplate/footer', $data);
    }
}
