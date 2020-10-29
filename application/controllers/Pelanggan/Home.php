<?php

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/index');
        $this->load->view('pelanggan/footer');
    }
}


?>