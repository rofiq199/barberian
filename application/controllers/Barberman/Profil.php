<?php

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->helper('string');
    }
    public function index()
    {
        $data['barber'] = $this->M_user->getwhere('data_barberman', ['username_bm' => $this->session->userdata('username')]);
        $this->load->view('barberman/header');
        $this->load->view('barberman/sidebar');
        $this->load->view('barberman/profil', $data);
        $this->load->view('barberman/footer');
    }
    function update()
    {
        $username = $this->session->userdata('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
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
                $file = $this->upload->data();
                $data = array(
                    'nama_bm' => $nama,
                    'email_bm' => $email,
                    'alamat_bm' => $alamat,
                    'no_bm' => $no,
                    'foto_bm' => $file['file_name']
                );
                $barber = $this->M_user->getwhere('data_barberman', ['username_bm' => $username]);
                if ($barber[0]->foto != '') {
                    unlink("./img/" . $barber[0]->foto);
                }
                $where = ['username_bm' => $username];
                $this->M_user->updatedata('data_barberman', $where, $data);
            }
        } else {
            $data = array(
                'nama_bm' => $nama,
                'email_bm' => $email,
                'alamat_bm' => $alamat,
                'no_bm' => $no
            );
            $where = ['username_bm' => $username];
            $this->M_user->updatedata('data_barberman', $where, $data);
        }

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect(base_url('barberman/profil'));
    }
}
