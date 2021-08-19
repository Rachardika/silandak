<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI

    }
    public function index()
    {
        $id = $this->session->userdata('username');
        $tampil['tujuan'] = $this->m_pengaduan->get_bagianByid($id);
        $tampil['pengaduan'] = $this->m_pengaduan->get_pengaduan();

        $data = [
            'tittle' => 'Dashboard Operator',
            'aktif' => 'dashboard'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/operator_header', $data);
        $this->load->view('template/operator_sidebar', $data);
        $this->load->view('template/operator_topbar', $data);
        $this->load->view('operator/index_opt', $tampil);
        $this->load->view('template/operator_footer');
    }
    public function profil()
    {
        // $this->check_login();
        $data = [
            'tittle' => 'Dashboard Operator',
            'aktif' => 'profil'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/operator_header', $data);
        $this->load->view('template/operator_sidebar', $data);
        $this->load->view('template/operator_topbar', $data);
        $this->load->view('operator/profil', $data);
        $this->load->view('template/operator_footer');
    }
    public function editprofil()
    {
        // $this->check_login();
        $data = [
            'tittle' => 'Edit Profil Operator',
            'aktif' => 'profil'
        ];


        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/operator_header', $data);
            $this->load->view('template/operator_sidebar', $data);
            $this->load->view('template/operator_topbar', $data);
            $this->load->view('operator/editprofil', $data);
            $this->load->view('template/operator_footer');
        } else {
            $id_user = $data['user']['id_user'];
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $email = $this->input->post('email');
            $bagian = $this->input->post('bagian');

            $username = $this->input->post('username');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $nama_gambar = './assets/images/avatar/' . $data['user']['image'];
                if (is_readable($nama_gambar) && unlink($nama_gambar)) {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('user/editprofil/' . $data['user']['id_user']);
                    }
                } else {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('user/editprofil/' . $data['user']['id_user']);
                    }
                }
            }

            $this->db->set('nim', $nim);
            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->set('bagian', $bagian);
            $this->db->set('username', $username);
            $this->db->where('id_user', $id_user);
            $this->db->update('user');

            $this->session->set_flashdata('profil', 'Diubah');
            redirect('operator/profil');
        }
    }

    function get_ajax_datalistdok()
    {
        $list = $this->Dok_model->get_datatables1();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nim;
            $row[] = $item->subjek;
            $row[] = $item->tanggal;
            $row[] = $item->tujuan;
            $row[] = $item->file;

            $row[] = '<a href="' . base_url('assets/uploads/' . $item->file) . '" target=" _blank" class="btn btn-warning btn-xs pb-2 text-white"><i class="fa fa-search"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Dok_model->count_all1(),
            "recordsFiltered" => $this->Dok_model->count_filtered1(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function listdok()
    {

        // $this->check_login();
        $data = [
            'tittle' => 'List Dokumen',
            'aktif' => 'listdok'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/operator_header', $data);
        $this->load->view('template/operator_sidebar', $data);
        $this->load->view('template/operator_topbar', $data);
        $this->load->view('operator/listdok', $data);
    }

    public function pengaduan()
    {
        $id = $this->session->userdata('username');
        $tampil['tujuan'] = $this->m_pengaduan->get_bagianByid($id);
        $tampil['pengaduan'] = $this->m_pengaduan->get_pengaduan();

        $data = [
            'tittle' => 'Pengaduan',
            'aktif' => 'pengaduan'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/operator_header', $data);
        $this->load->view('template/operator_sidebar', $data);
        $this->load->view('template/operator_topbar', $data);
        $this->load->view('operator/pengaduan', $tampil);
        $this->load->view('template/operator_footer', $data);
    }
    public function detailpengaduan($id)
    {
        $data = [
            'tittle' => 'Detail Pengaduan',
            'aktif' => 'pengaduan'
        ];

        $where = array('id' => $id);
        $edit['pengaduan'] = $this->m_pengaduan->edit_data($where, 'pengaduan')->result();

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/operator_header', $data);
        $this->load->view('template/operator_sidebar', $data);
        $this->load->view('template/operator_topbar', $data);
        $this->load->view('operator/detailpengaduan', $edit);
        $this->load->view('template/operator_footer');
    }
    public function pengaduandetail($id)
    {
        $data = [
            'tittle' => 'Detail Pengaduan',
            'aktif' => 'pengaduan'
        ];

        $where = array('id' => $id);

        $edit['pengaduan'] = $this->m_pengaduan->edit_data($where, 'pengaduan')->result();

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/operator_header', $data);
        $this->load->view('template/operator_sidebar', $data);
        $this->load->view('template/operator_topbar', $data);
        $this->load->view('operator/pengaduandetail', $edit);
        $this->load->view('template/operator_footer');
    }


    public function balaspengaduan()
    {

        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');
            $balasan = $this->input->post('balasan');
            $status = $this->input->post('status');
            $subjek = $this->input->post('subjek');
            $email = $this->input->post('email');
            $emailtujuan = $this->input->post('email_tujuan');
        }

        if (!empty($email)) {
            $config = [
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_user' => 'silandakadm@gmail.com',
                'smtp_pass' => 'silandakLPM41',
                'smtp_port' => 465,
                'starttls' => true,
                'newline' => "\r\n",
            ];
            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from('Silandak');
            $this->email->to($email);
            // $this->email->cc();
            $this->email->subject($subjek);
            $this->email->message('Pesan Baru Telah Diterima, anda dapat mengeceknya di http://localhost/silandak');
        }
        $this->m_pengaduan->update_data($id, $balasan, $email, $subjek, $status, $emailtujuan);
        if ($this->email->send()) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengaduan Berhasil dikirim</div>');
            redirect('operator/pengaduan');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengaduan Berhasil dikirim</div>');
            redirect('operator/pengaduan');
        }
    }

    public function check_login()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
            redirect('auth');
        } elseif ($this->session->userdata('id_role') == 2) {
            redirect('admin');
        } elseif ($this->session->userdata('id_role') == 1) {
            redirect('user');
        } else {
            redirect('operator');
        }

        $this->session->unset_userdata('hasil');
        $this->session->unset_userdata('id_nilai');
    }

    public function ubah_password()
    {

        $data = [
            'tittle' => 'Dashboard Operator',
            'aktif' => 'dashboard',

        ];

        $data['title'] = 'Ubah Password | SUPER super';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/operator_header', $data);
            $this->load->view('template/operator_sidebar', $data);
            $this->load->view('template/operator_topbar', $data);
            $this->load->view('operator/ubahpassword', $data);
            $this->load->view('template/operator_footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah!</div>');
                redirect('operator/ubah_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru tidak Boleh sama dengan Password Bama!!</div>');
                    redirect('operator/ubah_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('password', '<div class="alert alert-success text-center" role="alert"> Password Berhasil Diubah!!</div>');
                    redirect('operator/index');
                }
            }
        }
    }
}
