<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    function ceklogin($tabel, $data)
    {
        return $this->db->table($tabel)->where($data)->limit(1)->get();
    }
    function register($tabel, $data)
    {
        return $this->db->insert($tabel, $data);
    }
}
