<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index()
    {
        $this->load->view('login');
    }
    function proses_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $customer = ['username_cs' => $username, 'password_cs' => $password];
        $barber = ['username_bm' => $username, 'password_bm' => $password];
        $barbershop = ['username_bs' => $username, 'password_bs' => $password];
        $cekcostumer = $this->M_auth->ceklogin('data_customer', $customer)->num_rows();
        $cekbarber = $this->M_auth->ceklogin('data_barberman', $barber)->num_rows();
        $cekbarbershop = $this->M_auth->ceklogin('data_barber', $barbershop)->num_rows();
        if ($cekcostumer > 0) {
            $datacustomer = $this->M_auth->ceklogin('data_customer', $customer)->result_array();
            $data_session = array(
                'username' => $datacustomer[0]['username_cs'],
                'foto' => $datacustomer[0]['foto_cs']
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('home'));
        } elseif ($cekbarber > 0) {
            $databarber = $this->M_auth->ceklogin('data_barberman', $barber)->result_array();
            $data_session = array(
                'username' => $databarber[0]['username_bm'],
                'foto' => $databarber[0]['foto_bm']
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('barberman/dashboard'));
        } elseif ($cekbarbershop > 0) {
            $databarbershop = $this->M_auth->ceklogin('data_barber', $barbershop)->result_array();
            $data_session = array(
                'username' => $databarbershop[0]['username_bs'],
                'foto' => $databarbershop[0]['foto']
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('admin/dashboard'));
        } else {
            $this->session->set_flashdata('gagal', 'Username atau Password salah!!!');
            redirect(base_url('auth'));
        }
    }
    function register()
    {
        $this->load->view('register');
    }
    function proses_register()
    {
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no = $this->input->post('no');
        $password = md5($this->input->post('password'));
        $data = [
            'username_cs' => $username,
            'nama_cs' => $nama,
            'email_cs' => $email,
            'no_cs' => $no,
            'password_cs' => $password
        ];
        $this->M_auth->register('data_customer', $data);
        redirect(base_url('home/'));
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth/'));
    }
}
