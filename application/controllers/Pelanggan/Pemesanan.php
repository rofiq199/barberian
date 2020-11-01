<?php

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    function index()
    {
        $barber = $this->M_user->getwhere('data_barberman', ['username_bm' => $this->uri->segment(4)]);
        $data['harga'] = $this->M_user->getwhere('harga_barber', ['username_bs' => $barber[0]->username_bs]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/pemesanan', $data);
        $this->load->view('pelanggan/footer');
    }
}
