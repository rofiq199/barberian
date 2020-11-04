<?php

class Pemesanan extends CI_Controller
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
        $barber = $this->M_user->getwhere('data_barberman', ['username_bm' => $this->uri->segment(4)]);
        $data['harga'] = $this->M_user->getwhere('harga_barber', ['username_bs' => $barber[0]->username_bs]);

        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/pemesanan', $data);
        $this->load->view('pelanggan/footer');
    }
    function proses_pesan()
    {
        $order = $this->input->post('kode_order');
        $username = $this->input->post('username_cs');
        $barber = $this->input->post('username_bm');
        $alamat = $this->input->post('alamat');
        $total = $this->input->post('total');
        $insert = [
            'kode_pesan' => $order,
            'username_cs' => $username,
            'username_bm' => $barber,
            'alamat_pesan' => $alamat,
            'status' => 'pending',
            'total_pesan' => $total
        ];
        $this->M_user->insertdata('pesan', $insert);
        foreach ($this->input->post('kode_ck') as $a) {
            $insertdetail = ['kode_pesan' => $order, 'kode_ck' => $a];
            $this->M_user->insertdata('detail_pesan', $insertdetail);
        }
        redirect(base_url('pelanggan/pemesanan/invoice/' . $order));
    }
    function invoice($id)
    {
        $data['pesan'] = $this->M_user->getjoinfilter('pesan', 'data_customer', 'pesan.username_cs=data_customer.username_cs', ['kode_pesan' => $id]);
        $data['detail'] = $this->M_user->getjoinfilter('detail_pesan', 'harga_barber', 'detail_pesan.kode_ck=harga_barber.kode_ck', ['kode_pesan' => $id]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/invoice', $data);
        $this->load->view('pelanggan/footer');
    }

    function histori()
    {
        $data['pesan'] = $this->M_user->getwhere('pesan', ['username_cs' => $this->session->userdata('username')]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/histori', $data);
        $this->load->view('pelanggan/footer');
    }

    function keranjang()
    {
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/keranjang');
        $this->load->view('pelanggan/footer');
    }
    function update_cart()
    {
        $qty = $this->input->post('qty');
        $row = $this->input->post('row');
        $update = [
            'rowid' => $row,
            'qty' => $qty
        ];
        $this->cart->update($update);
        $data = $this->cart->contents();
        echo json_encode($data);
    }
}
