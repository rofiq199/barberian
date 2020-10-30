<?php

class Barber extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->helper('string');
    }
    public function index()
    {
        $username = ['username_bs' => $this->session->userdata('username')];
        $data['barber'] = $this->M_user->getwhere('data_barberman', $username);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/barber', $data);
        $this->load->view('admin/footer');
    }
    function getbarberman()
    {
        $username = ['username_bm' => $this->input->get('id')];
        $data = $this->M_user->getwhere('data_barberman', $username);
        echo json_encode($data);
    }
    function add()
    {
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
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no = $this->input->post('no');
            $password = $this->input->post('password');
            $data = array(
                'username_bm' => $username,
                'username_bs' => $this->session->userdata('username'),
                'nama_bm' => $nama,
                'email_bm' => $email,
                'alamat_bm' => $alamat,
                'no_bm' => $no,
                'password_bm' => md5($password),
                'foto_bm' => $file['file_name']
            );
            $this->M_user->insertdata('data_barberman', $data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('admin/barber'));
        }
    }
    function update()
    {
        $username = $this->input->post('username');
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
                    'username_bs' => $this->session->userdata('username'),
                    'nama_bm' => $nama,
                    'email_bm' => $email,
                    'alamat_bm' => $alamat,
                    'no_bm' => $no,
                    'password_bm' => md5($password),
                    'foto_bm' => $file['file_name']
                );
                $barber = $this->M_user->getwhere('data_barberman', ['username_bm' => $username]);
                if ($barber[0]->foto_bm != '') {
                    unlink("./img/" . $barber[0]->foto_bm);
                }
                $where = ['username_bm' => $username];
                $this->M_user->updatedata('data_barberman', $where, $data);
            }
        } else {
            $data = array(
                'username_bs' => $this->session->userdata('username'),
                'nama_bm' => $nama,
                'email_bm' => $email,
                'alamat_bm' => $alamat,
                'no_bm' => $no,
                'password_bm' => md5($password)
            );
            $where = ['username_bm' => $username];
            $this->M_user->updatedata('data_barberman', $where, $data);
        }

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect(base_url('admin/barber'));
    }
    function hapus($id)
    {
        $where = array('username_bm' => $id);
        $this->M_user->delete('data_barberman', $where);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('admin/barber'));
    }
}
