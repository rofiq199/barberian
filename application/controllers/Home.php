<?php

class Home extends CI_Controller
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

    function detail_barber($id)
    {
        $data['barberman'] = $this->M_user->getwhere('data_barberman', ['username_bs' => $id]);
        $data['barber'] = $this->M_user->getwhere('data_barber', ['username_bs' => $id]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/detail_barbershop', $data);
        $this->load->view('pelanggan/footer');
    }
    function getbarbershop()
    {
        $keyword = $this->input->post('barber');
        $data = $this->M_user->search('data_barber', 'nama_bs', $keyword);
        echo json_encode($data);
    }

    function cobacoba(){
        $data['barberman'] = $this->M_user->getData('data_barberman');
        $this->load->view('latihan', $data);
    }
}
