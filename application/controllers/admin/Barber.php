<?php

class Barber extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    public function index()
    {
        $username = ['username_bs' => $this->session->userdata('username')];
        $data['barber'] = $this->M_user->getwhere('data_barberman', $username);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/barber', $data);
        $this->load->view('admin/footer');
    }
    function add()
    {
        $produk = $this->input->post('nip');
        $nama_dosen = $this->input->post('nama_dosen');
        $prodi = $this->input->post('prodi');
        $password = $this->input->post('password_dosen');
        $data = array(
            'nip' => $nip,
            'password_dosen' => md5($password),
            'kode_prodi' => $prodi,
            'nama_dosen' => $nama_dosen
        );
        $this->m_admin->add($data, 'dosen');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/DataDosen');
    }
    function update()
    {
        $nip = $this->input->post('nip');
        $nama_dosen = $this->input->post('nama_dosen');
        $prodi = $this->input->post('prodi');
        $password = $this->input->post('password_dosen');

        $data = array(
            'password_dosen' => md5($password),
            'kode_prodi' => $prodi,
            'nama_dosen' => $nama_dosen
        );

        $where = array(
            'nip' => $nip
        );
        $this->m_admin->update($where, $data, 'dosen');
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('admin/DataDosen');
    }
    function hapus($nip)
    {
        $where = array('nip' => $nip);
        $this->m_admin->hapus($where, 'dosen');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/DataDosen');
    }
}
