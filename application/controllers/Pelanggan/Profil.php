<?php

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->helper('string');
    }

    function index()
    {
        $data['customer'] = $this->M_user->getwhere('data_customer', ['username_cs' => $this->session->userdata('username')]);
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/profil', $data);
        $this->load->view('pelanggan/footer');
    }
    function update()
    {
        $username = $this->session->userdata('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no = $this->input->post('no');
        $password = $this->input->post('password');
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
                if ($password == '') {
                    $file = $this->upload->data();
                    $data = array(
                        'nama_cs' => $nama,
                        'email_cs' => $email,
                        'no_cs' => $no,
                        'foto_cs' => $file['file_name']
                    );
                    $customer = $this->M_user->getwhere('data_customer', ['username_cs' => $username]);
                    if ($customer[0]->foto_cs != '') {
                        unlink("./img/" . $customer[0]->foto_cs);
                    }
                    $where = ['username_cs' => $username];
                    $this->M_user->updatedata('data_customer', $where, $data);
                } else {
                    $file = $this->upload->data();
                    $data = array(
                        'nama_cs' => $nama,
                        'email_cs' => $email,
                        'no_cs' => $no,
                        'password_cs' => md5($password),
                        'foto_cs' => $file['file_name']
                    );
                    $customer = $this->M_user->getwhere('data_customer', ['username_cs' => $username]);
                    if ($customer[0]->foto_cs != '') {
                        unlink("./img/" . $customer[0]->foto_cs);
                    }
                    $where = ['username_cs' => $username];
                    $this->M_user->updatedata('data_customer', $where, $data);
                }
            }
        } else {
            if ($password == '') {
                $data = array(
                    'nama_cs' => $nama,
                    'email_cs' => $email,
                    'no_cs' => $no,
                );
                $where = ['username_cs' => $username];
                $this->M_user->updatedata('data_customer', $where, $data);
            } else {
                $data = array(
                    'nama_cs' => $nama,
                    'email_cs' => $email,
                    'no_cs' => $no,
                    'password_cs' => md5($password)
                );
                $where = ['username_cs' => $username];
                $this->M_user->updatedata('data_customer', $where, $data);
            }
        }

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect(base_url('pelanggan/profil'));
    }
}
