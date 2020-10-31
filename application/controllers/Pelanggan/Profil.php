<?php

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    function index()
    {
        $data['customer'] = $this->M_user->getwhere('data_customer', ['username_cs' => $this->session->userdata('username')]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/profil', $data);
        $this->load->view('pelanggan/footer');
    }
}
