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
    function invoice_produk($id)
    {
        $data['penjualan'] = $this->M_user->getjoinfilter('penjualan', 'data_customer', 'penjualan.username_cs=data_customer.username_cs', ['kode_jual' => $id]);
        $data['detail'] = $this->M_user->getjoinfilter('detail_penjualan', 'produk', 'detail_penjualan.kode_produk=produk.kode_produk', ['kode_jual' => $id]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/invoice_produk', $data);
        $this->load->view('pelanggan/footer');
    }
    function keranjang()
    {
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/keranjang');
        $this->load->view('pelanggan/footer');
    }
    function show_cart()
    {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $a) {
            $no++;
            $output .= '<div class="row">
        <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
        </div>
        <div class="col-xs-4">
            <h4 class="product-name"><strong>' . $a['name'] . '</strong></h4>
        </div>
        <div class="col-xs-6">
            <div class="col-xs-4 text-right">
                <h6><strong>' . $a['price'] . '</strong></h6>
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control input-sm" id="qty" data-subtotal="' . $a['subtotal'] . '" data-row="' . $a['rowid'] . '" value="' . $a['qty'] . '">
            </div>
            <div class="col-xs-2 text-right">
                <h6><strong>' . $a['subtotal'] . '</strong></h6>
            </div>
            <div class="col-xs-2">
                <button type="button" id="hapus" data-row="' . $a['rowid'] . '" class="btn btn-link btn-xs">
                    <span class="glyphicon glyphicon-trash"> </span>
                </button>
            </div>
        </div>
    </div>
    <hr>';
        }
        return $output;
    }
    function load_cart()
    {
        echo $this->show_cart();
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
        echo $this->show_cart();
    }
    function hapus_cart()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
    function proses_beli()
    {
        $total = 0;
        foreach ($this->cart->contents() as $a) {
            $total += $a['subtotal'];
        }
        $kode = strtoupper(date('Ymd') . random_string('alnum', 4));
        $username = $this->session->userdata('username');

        $data = ['kode_jual' => $kode, 'username_cs' => $username, 'total_harga' => $total];

        $this->M_user->insertdata('penjualan', $data);
        foreach ($this->cart->contents() as $b) {
            $insertdetail = ['kode_jual' => $kode, 'kode_produk' => $b['id'], 'jumlah' => $b['qty']];
            $this->M_user->insertdata('detail_penjualan', $insertdetail);
        }
        redirect(base_url('pelanggan/pemesanan/invoice_produk/' . $kode));
    }
}
