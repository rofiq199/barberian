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
        $data['barbershop'] = $this->M_user->getwhere('data_barber', ['username_bs' => $this->session->userdata('username')]);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/profil', $data);
        $this->load->view('admin/footer');
    }
    function update()
    {
        $username = $this->session->userdata('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $no = $this->input->post('no');
        $password = $this->input->post('password');
        $jam_buka =  $this->input->post('jam_buka');
        $jam_tutup =  $this->input->post('jam_tutup');
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
                    'nama_bs' => $nama,
                    'email_bs' => $email,
                    'alamat_bs' => $alamat,
                    'jam_buka' => $jam_buka,
                    'jam_tutup' => $jam_tutup,
                    'no_bs' => $no,
                    'password_bs' => md5($password),
                    'foto' => $file['file_name']
                );
                $barber = $this->M_user->getwhere('data_barber', ['username_bs' => $username]);
                if ($barber[0]->foto != '') {
                    unlink("./img/" . $barber[0]->foto);
                }
                $where = ['username_bs' => $username];
                $this->M_user->updatedata('data_barber', $where, $data);
            }
        } else {
            $data = array(
                'nama_bs' => $nama,
                'email_bs' => $email,
                'alamat_bs' => $alamat,
                'jam_buka' => $jam_buka,
                'jam_tutup' => $jam_tutup,
                'no_bs' => $no,
                'password_bs' => md5($password)
            );
            $where = ['username_bs' => $username];
            $this->M_user->updatedata('data_barber', $where, $data);
        }

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect(base_url('admin/profil'));
    }
}
