<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {

        if ($this->session->userdata('username')) {
            redirect('auth/logout');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'silandak.';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {

        $username = $this->input->post('username');
        // $password = $this->input->post('password');
        $password = md5($this->input->post('password'));
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'id_role' => $user['id_role'],
                    'nim' => $user['nim']
                ];
                $this->session->set_userdata($data);
                if ($user['id_role'] == 1) {
                    redirect('user');
                } elseif ($user['id_role'] == 2) {
                    redirect('admin');
                } else {
                    redirect('operator');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak ada</div>');
            redirect('auth');
        }
    }

    public function regist()
    {
        $data = [
            'tittle' => 'Daftar',
            'aktif' => 'user'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[user.nim', [
            'is_unique' => 'Nomor induk mahasiswa sudah terdaftar!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('nim', 'NIM', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/regist', $data);
            $this->load->view('template/auth_footer');
        } else {

            $tipe_member = 1;
            $nama = $this->input->post('nama');
            $img = 'default.png';
            $email = $this->input->post('email');
            $nim = $this->input->post('nim');
            $fakultas = $this->input->post('fakultas');
            $progdi = $this->input->post('progdi');

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));


            $data = [

                'id_role' => $tipe_member,
                'nama' => $nama,
                'email' => $email,
                'image' => $img,
                'nim' => $nim,
                'fakultas' => $fakultas,
                'progdi' => $progdi,
                'username' => $username,
                'password' => $password,

            ];


            $this->User_model->inputUser($data, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil ditambahkan, silahkan login.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('nim');
        $this->session->unset_userdata('hasil');
        $this->session->unset_userdata('keyword');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda telah keluar</div>');
        redirect('auth');
    }
}
