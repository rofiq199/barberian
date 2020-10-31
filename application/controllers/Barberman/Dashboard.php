<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }
    public function index()
    {
        $this->load->view('barberman/header');
        $this->load->view('barberman/sidebar');
        $this->load->view('barberman/dashboard');
        $this->load->view('barberman/footer');
    }
}
