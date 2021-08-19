<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI

    }
    public function index()
    {
        $this->check_login();

        $nim = $this->session->userdata('nim');
        $tampil['pengaduan'] = $this->m_pengaduan->get_pengaduanBynim($nim);
        $data = [
            'tittle' => 'Dashboard User',
            'aktif' => 'dashboard',
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/index_user', $tampil);
        $this->load->view('template/user_footer');
    }


    public function profil()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard User',
            'aktif' => 'profil'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // echo 'selamat datang ' . $data['user']['username'];
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('template/user_footer');
    }
    public function editprofil()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Profil User',
            'aktif' => 'profil'
        ];


        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/user_header', $data);
            $this->load->view('template/user_sidebar', $data);
            $this->load->view('template/user_topbar', $data);
            $this->load->view('user/editprofil', $data);
            $this->load->view('template/user_footer');
        } else {
            $id_user = $data['user']['id_user'];
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $email = $this->input->post('email');
            $fakultas = $this->input->post('fakultas');
            $progdi = $this->input->post('progdi');

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
            $this->db->set('fakultas', $fakultas);
            $this->db->set('progdi', $progdi);
            $this->db->set('username', $username);
            $this->db->where('id_user', $id_user);
            $this->db->update('user');

            $this->session->set_flashdata('profil', 'Diubah');
            redirect('user/profil');
        }
    }

    public function dok()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Dashboard User',
            'aktif' => 'listdok'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['IKI LENG!'] = $this->m_pengaduan->get_pengaduan();
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');

        if (empty($_FILES['file']['name'])) {
            $this->form_validation->set_rules('file', 'File dok', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view('template/user_header', $data);
                $this->load->view('template/user_sidebar', $data);
                $this->load->view('template/user_topbar', $data);
                $this->load->view('user/dok', $data);
                $this->load->view('template/user_footer');
            }
        } else {
            if ($this->form_validation->run() == false) {
                $this->load->view('template/user_header', $data);
                $this->load->view('template/user_sidebar', $data);
                $this->load->view('template/user_topbar', $data);
                $this->load->view('user/dok', $data);
                $this->load->view('template/user_footer');
            } else {
                $judul = $this->input->post('pesan');
                $subjek = $this->input->post('subjek');
                $tujuan = $this->input->post('tujuan');
                $tanggal = $this->input->post('tanggal');
                $jam = $this->input->post('jam');
                $status = $this->input->post('status');
                $nama = $data['user']['nama'];
                $nim = $data['user']['nim'];
                $email = $data['user']['email'];
                $fakultas = $data['user']['fakultas'];
                $progdi = $data['user']['progdi'];
                $id_user = $data['user']['id_user'];
                $size = $_FILES['file']['size'];
                $upload_file = $_FILES['file']['name'];

                if ($upload_file) {
                    $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/uploads';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('file')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('file', $new_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('user/dok');
                    }
                }

                $data = [

                    'pesan' => $judul,
                    'id_user' => $id_user,
                    'size' => $size,
                    'nama' => $nama,
                    'nim' => $nim,
                    'email' => $email,
                    'progdi' => $progdi,
                    'fakultas' => $fakultas,
                    'subjek' => $subjek,
                    'tujuan' => $tujuan,
                    'tanggal' => $tanggal,
                    'jam' => $jam,
                    'status' => $status,
                ];
                $this->db->insert('dok', $data);

                $this->session->set_flashdata('informasi', 'Ditambah');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Terkirim</div>');
                redirect('user/listdok');
            }
        }
    }
    function get_ajax_datalistdok()
    {
        $list = $this->Dok_model->get_datatables();
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

            $row[] = '<a href="' . base_url('assets/uploads/' . $item->file) . '" target=" _blank" class="btn btn-warning btn-xs pb-2 text-white"><i class="fa fa-search"></i></a>
                     <a href="' . base_url('user/deletelistdok/' . $item->id_dok) . '" class="btn btn-danger btn-xs float-center"><i class="fas fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Dok_model->count_all(),
            "recordsFiltered" => $this->Dok_model->count_filtered(),
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
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/listdok', $data);
        // $this->load->view('template/user_footer');
    }
    public function deletelistdok($id)
    {
        $data = $this->Dok_model->getlistdokById($id);
        $nama_gambar = './assets/images/avatar/' . $data->image;
        if (is_readable($nama_gambar) && unlink($nama_gambar)) {
            $this->Dok_model->deletelistdok($id);
            $this->session->set_flashdata('user', 'Dihapus');
            redirect('user/listdok');
        }
        $this->Dok_model->deletelistdok($id);
        $this->session->set_flashdata('user', 'Dihapus');
        redirect('user/listdok');
    }

    function get_ajax_datapengaduan()
    {
        $list = $this->m_pengaduan->get_datatables();
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
            $row[] = $item->status;


            $row[] = '<a href="' . base_url('user/detailpengaduan/' . $item->id) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->m_pengaduan->count_all(),
            "recordsFiltered" => $this->m_pengaduan->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function form()
    {
        $this->check_login();
        $data = [
            'tittle' => 'Form Pengaduan',
            'aktif' => 'pengaduan'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/formpengaduan');
        $this->load->view('template/user_footer');
    }

    public function pengaduan()
    {

        $this->check_login();
        $data = [
            'tittle' => 'Pengaduan',
            'aktif' => 'pengaduan'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/pengaduan', $data);
        // $this->load->view('template/user_footer');
    }

    public function deletepengaduan($id)
    {
        $data = $this->m_pengaduan->get_pengaduanByid($id);
        $nama_gambar = './assets/images/avatar/' . $data->image;
        if (is_readable($nama_gambar) && unlink($nama_gambar)) {
            $this->m_pengaduan->deletepeng($id);
            $this->session->set_flashdata('pengaduan', 'Dihapus');
            redirect('user/pengaduan');
        }
        $this->m_pengaduan->deletepeng($id);
        $this->session->set_flashdata('pengaduan',  '<div class="alert alert-danger" role="alert"> Data berhasil dihapus!</div>');
        redirect('user/pengaduan');
    }

    public function tambahpengaduan()
    {
        if (isset($_POST['submit'])) {
            $nim = $this->input->post('nim');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $tujuan = $this->input->post('tujuan');
            // $emailtujuan = $this->input->post('email_tujuan');
            $pesan = $this->input->post('pesan');
            $tanggal = $this->input->post('tanggal');
            $semester = $this->input->post('semester');
            $jam = $this->input->post('jam');
            $subjek = $this->input->post('subjek');
            $status = $this->input->post('status');
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
            $this->email->cc('silandakadm@gmail.com');
            $this->email->subject($subjek);
            $this->email->message('Pengaduan Berhasil dikirim anda dapat mengeceknya di http://localhost/silandak');
        }
        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'email' => $email,
            'tujuan' => $tujuan,
            'email_tujuan' => 'silandakadm@gmail.com',
            'pesan' => $pesan,
            'tanggal' => $tanggal,
            'semester' => $semester,
            'jam' => $jam,
            'subjek' => $subjek,
            'status' => $status,

        );
        $this->m_pengaduan->input_pengaduan($data, 'pengaduan');
        if ($this->email->send()) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengaduan Berhasil dikirim</div>');
            redirect('user/pengaduan');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengaduan Berhasil dikirim</div>');
            redirect('user/pengaduan');
        }
    }

    public function rate($id)
    {
        $pengaduan['pengaduan'] = $this->m_pengaduan->get_pengaduanByid($id);
        $data = [
            'tittle' => 'Rate!!',
            'aktif' => 'pengaduan'
        ];

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/input_rating', $pengaduan);
        $this->load->view('template/user_footer', $data);
    }

    public function postrate()
    {

        $nim = $this->input->post('nim');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $id_peng = $this->input->post('id_pengaduan');
        $saran = $this->input->post('saran');
        $subjek = $this->input->post('subjek');
        $tujuan = $this->input->post('tujuan');
        $rate = $this->input->post('rate');

        $data = array(
            'nim' => $nim,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'id_pengaduan' => $id_peng,
            'rate' => $rate,
            'subjek' => $subjek,
            'tujuan' => $tujuan,
            'saran' => $saran,

        );

        $this->m_rate->input_rate($data, 'rating');
        $this->session->set_flashdata('informasi', 'Ditambah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert"> Terimakasih sudah memberikan rating!</div>');
        redirect('user/pengaduan');
        // }
    }

    public function check_login()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('id_role') != 1) {
                redirect('admin');
            }
            $this->session->unset_userdata('hasil');
            $this->session->unset_userdata('id_nilai');
        }
    }
    public function detailpengaduan($id)
    {

        $this->check_login();
        $pengaduan = [
            // 'rating' => $this->m_pengaduan->get_ratingId($id),
            'rating' => $this->m_pengaduan->findRate($id),
            'pengaduan' => $this->m_pengaduan->get_pengaduanByid($id),
        ];
        $data = [
            'tittle' => 'Detail Pengaduan',
            'aktif' => 'pengaduan'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // var_dump($pengaduan['rating']);
        $this->load->view('template/user_header', $data);
        $this->load->view('template/user_sidebar', $data);
        $this->load->view('template/user_topbar', $data);
        $this->load->view('user/detailpengaduan', $pengaduan);
        $this->load->view('template/user_footer');
    }

    public function ubah_password()
    {

        $this->check_login();
        $data = [
            'tittle' => 'Dashboard User',
            'aktif' => 'dashboard',

        ];

        $data['title'] = 'Ubah Password | SUPER super';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/user_header', $data);
            $this->load->view('template/user_sidebar', $data);
            $this->load->view('template/user_topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('template/user_footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah!</div>');
                redirect('user/ubah_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru tidak Boleh sama dengan Password Bama!!</div>');
                    redirect('user/ubah_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('password', '<div class="alert alert-success text-center" role="alert"> Password Berhasil Diubah!!</div>');
                    redirect('user/index');
                }
            }
        }
    }
}
