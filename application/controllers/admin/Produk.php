<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->helper('string');
    }
    public function index()
    {
        $username = ['username_bs' => $this->session->userdata('username')];
        $data['produk'] = $this->M_user->getwhere('produk', $username);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/produk', $data);
        $this->load->view('admin/footer');
    }
    function getproduk()
    {
        $kode_produk = ['kode_produk' => $this->input->get('id')];
        $data = $this->M_user->getwhere('produk', $kode_produk);
        echo json_encode($data);
    }
    function add()
    {
        $config = [
            'file_name' => random_string('alnum', 8),
            'upload_path' => './img/',
            'allowed_types' => 'gif|jpg|png',
            // 'max_size' => 1000, 'max_width' => 1000,
            // 'max_height' => 1000
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) //jika gagal upload
        {
            $error = array('error' => $this->upload->display_errors()); //tampilkan error
            print_r($error);
        } else {
            $file = $this->upload->data();
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $data = array(
                'username_bs' => $this->session->userdata('username'),
                'nama_produk' => $nama,
                'harga_produk' => $harga,
                'foto_produk' => $file['file_name'],
                'stok' => $stok
            );
            $this->M_user->insertdata('produk', $data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('admin/produk'));
        }
    }
    function update()
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        if ($_FILES['foto']['name'] != '') {
            $config = [
                'file_name' => random_string('alnum', 8),
                'upload_path' => './img/',
                'allowed_types' => 'gif|jpg|png',
                // 'max_size' => 1000, 'max_width' => 1000,
                // 'max_height' => 1000
            ];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) //jika gagal upload
            {
                $error = array('error' => $this->upload->display_errors()); //tampilkan error
                print_r($error);
            } else {
                $file = $this->upload->data();
                $data = array(
                    'nama_produk' => $nama,
                    'harga_produk' => $harga,
                    'foto_produk' => $file['file_name'],
                    'stok' => $stok
                );
                $produk = $this->M_user->getwhere('produk', ['kode_produk' => $this->input->post('kode')]);
                if ($produk[0]->foto_produk != '') {
                    unlink("./img/" . $produk[0]->foto_produk);
                }
                $where = ['kode_produk' => $this->input->post('kode')];
                $this->M_user->updatedata('produk', $where, $data);
            }
        } else {
            $data = array(
                'nama_produk' => $nama,
                'harga_produk' => $harga,
                'stok' => $stok
            );
            $where = ['kode_produk' => $this->input->post('kode')];
            $this->M_user->updatedata('produk', $where, $data);
        }
        $this->session->set_flashdata('flash', 'Diupdate');
        redirect(base_url('admin/produk'));
    }
    function hapus($id)
    {
        $where = ['kode_produk' => $id];
        $this->M_user->delete('produk', $where);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('admin/produk'));
    }
}
