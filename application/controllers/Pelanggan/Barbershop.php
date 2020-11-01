<?php

class Barbershop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    function index()
    {
        $this->load->view('pelanggan/index');
    }
    function barbershop()
    {
        $data['data_barber'] = $this->M_user->getData('data_barber');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/barbershop', $data);
        $this->load->view('pelanggan/footer');
    }

    function detail_barber()
    {
        $data['barberman'] = $this->M_user->getwhere('data_barberman', ['username_bs' => $this->uri->segment(4)]);
        $data['barber'] = $this->M_user->getwhere('data_barber', ['username_bs' => $this->uri->segment(4)]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/detail_barbershop', $data);
        $this->load->view('pelanggan/footer');
    }

    
}
