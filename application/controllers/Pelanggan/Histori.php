<?php
class Histori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->helper('string');
        $this->load->library('cart');
    }

    function index()
    {
        $data['pesan'] = $this->M_user->getwhere('pesan', ['username_cs' => $this->session->userdata('username')]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/histori', $data);
        $this->load->view('pelanggan/footer');
    }
    function histori_produk()
    {
        $data['penjualan'] = $this->M_user->getwhere('penjualan', ['username_cs' => $this->session->userdata('username')]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/histori_produk', $data);
        $this->load->view('pelanggan/footer');
    }
}
