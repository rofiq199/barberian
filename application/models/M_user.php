<?php

class M_user extends CI_Model
{
    function getdata($tabel)
    {
        return $this->db->get($tabel)->result();
    }
    function getwhere($tabel, $where)
    {
        return $this->db->get_where($tabel, $where)->result();
    }
    function insertdata($tabel, $data)
    {
        return $this->db->insert($tabel, $data);
    }
    function updatedata($tabel, $where, $data)
    {
        $this->db->update($tabel, $data, $where);
    }
    function delete($tabel, $data)
    {
        # code...
    }
}
