<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Data_model', 'data');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = $this->data->getData();
        $data['user'] = $this->user->getUser();



        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('conten/dashboard', $data);
        $this->load->view('tamplate/footer', $data);
    }


    public function profile()
    {
        $data['title'] = 'Admin <sup>Profile</sup>';
        $data['user'] = $this->user->getUser();

        // var_dump($data['user']);
        // die;

        $this->load->view('tamplate/head', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('tamplate/topbar', $data);
        $this->load->view('auth/profil', $data);
        $this->load->view('tamplate/footer', $data);
    }
}
