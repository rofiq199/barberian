<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->library('cart');
    }

    function index()
    {
        $data['produk'] = $this->M_user->getjoin('produk', 'data_barber', 'produk.username_bs=data_barber.username_bs');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/produk', $data);
        $this->load->view('pelanggan/footer');
    }
    function addcart()
    {
        $kode = $this->input->post('produk');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $data = array(
            'id'      => $kode,
            'qty'     => 1,
            'price'   => $harga,
            'name'    => $nama,
        );
        $this->cart->insert($data);
        $show = $this->cart->contents();
        echo json_encode($show);
    }
    function getproduk()
    {
        $keyword = $this->input->post('produk');
        $data = $this->M_user->search('produk', 'nama_produk', $keyword);
        echo json_encode($data);
    }
}
