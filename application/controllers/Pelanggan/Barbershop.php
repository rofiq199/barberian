<?php

class Barbershop extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_user');
    }

    function index(){
        $this->load->view('pelanggan/index');
    }
    function barbershop(){
        $data['data_barber'] = $this->m_user->getData('data_barber');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/barbershop', $data);
        $this->load->view('pelanggan/footer');
    }

    function detail_barber(){
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/detail_barbershop');
        $this->load->view('pelanggan/footer');
    }

    function profil(){
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/profil');
        $this->load->view('pelanggan/footer');

    }
}


?>