<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    // halaman awal index admin
    public function index()
    {
        $this->check_login();
        $tampil['pengaduan'] = $this->m_pengaduan->get_pengaduan();
        $data = [
            'tittle' => 'Dashboard Admin',
            'aktif' => 'dashboard'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/index_admin', $tampil);
        $this->load->view('template/admin_footer');
    }

    //halaman profil admin
    public function profil()
    {
        $this->check_login();

        $data = [
            'tittle' => 'Dashboard Admin',
            'aktif' => 'profil',
        ];

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('template/admin_footer');
    }

    //halaman edit profil admin
    public function editprofil()
    {
        $this->check_login();

        $data = [
            'tittle' => 'edit profil Admin',
            'aktif' => 'profil'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin/editprofil', $data);
            $this->load->view('template/admin_footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $nim = $this->input->post('nim');
            $bagian = $this->input->post('bagian');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

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
                        redirect('admin/editprofil/' . $data['user']['id_user']);
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
                        redirect('admin/editprofil/' . $data['user']['id_user']);
                    }
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('nim', $nim);
            $this->db->set('email', $email);
            $this->db->set('bagian', $bagian);
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->set_flashdata('profil', 'Diubah');
            redirect('admin/profil');
        }
    }

    //mengambil value dari database yang dibuat didalam model_user untuk menampilkan data user teraftar 
    function get_ajax_datauser()
    {
        $list = $this->User_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nama;
            $row[] = $item->nim;
            $row[] = $item->fakultas;

            $row[] = '<a href="' . base_url('assets/images/avatar/' . $item->image) . '" target="_blank"><img src="' . base_url('assets/images/avatar/' . $item->image) . '" class="img" style="width:100px"></a>';

            $row[] = '<a href="' . base_url('admin/editUser/' . $item->id_user) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteUser/' . $item->id_user) . '" class="btn btn-danger btn-xs float-center hapus-member"><i class="fas fa-trash-alt"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->User_model->count_all(),
            "recordsFiltered" => $this->User_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    //menampilkan data user terdaftar
    public function data_user()
    {
        $data = [
            'tittle' => 'Dashboard Admin',
            'aktif' => 'user'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/data_user', $data);
    }

    // menambahkan data user 
    public function addUser()
    {
        $data = [
            'tittle' => 'Tambah Data User',
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
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin/add_user', $data);
            $this->load->view('template/admin_footer');
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
            $this->session->set_flashdata('user', 'Ditambah');
            redirect('admin/data_user');
        }
    }

    //mengedit data user terdaftar sesuai id yang masuk didalam database
    public function editUser($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data User',
            'aktif' => 'user',

        ];

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->User_model->getUserById($id);



        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin/edit_user', $data);
            $this->load->view('template/admin_footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $nim = $this->input->post('nim');
            $fakultas = $this->input->post('fakultas');
            $progdi = $this->input->post('progdi');
            $username = $this->input->post('username');

            $file_lama = $this->User_model->getUserById($id);
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $nama_file = './assets/images/avatar/' . $file_lama['image'];
                if (is_readable($nama_file) && unlink($nama_file)) {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('image', $new_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('super/editUser/' . $data['user']['id_user']);
                    }
                } else {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('image', $new_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editUser/' . $data['user']['id_user']);
                    }
                }
            }

            $this->User_model->editUser($id, $nama, $nim, $email, $username, $fakultas, $progdi);
            $this->session->set_flashdata('user', 'Diubah');
            redirect('admin/data_user');
        }
    }

    //fungsi delete user sesuai id yang sudah terdaftar
    public function deleteUser($id)
    {
        $data = $this->User_model->getUserById($id);
        $nama_gambar = './assets/images/avatar/' . $data->image;
        if (is_readable($nama_gambar) && unlink($nama_gambar)) {
            $this->User_model->deleteAdmin($id);
            $this->session->set_flashdata('user', 'Dihapus');
            redirect('admin/data_user');
        }
        $this->User_model->deleteUser($id);
        $this->session->set_flashdata('user', 'Dihapus');
        redirect('admin/data_user');
    }

    //mengambil value dari model yang dibuat di operator model untuk menampilkan data dari operator terdaftar
    function get_ajax_dataopt()
    {
        $list = $this->Opt_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nama;
            $row[] = $item->nim;
            $row[] = $item->bagian;

            $row[] = '<a href="' . base_url('assets/images/avatar/' . $item->image) . '" target="_blank"><img src="' . base_url('assets/images/avatar/' . $item->image) . '" class="img" style="width:100px"></a>';

            $row[] = '<a href="' . base_url('admin/editOpt/' . $item->id_user) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteOpt/' . $item->id_user) . '" class="btn btn-danger btn-xs float-center hapus-member"><i class="fas fa-trash-alt"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Opt_model->count_all(),
            "recordsFiltered" => $this->Opt_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    // menampilkan data operator yang sudah terdaftar
    public function data_opt()
    {
        $data = [
            'tittle' => 'Dashboard Admin',
            'aktif' => 'operator'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/data_opt', $data);
    }

    // menambah data dari operator
    public function addOpt()
    {
        $data = [
            'tittle' => 'Tambah Data Operator',
            'aktif' => 'operator'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[user.nim', [
            'is_unique' => 'Nomor induk sudah terdaftar!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('nim', 'NIM', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin/add_opt', $data);
            $this->load->view('template/admin_footer');
        } else {

            $tipe_member = 3;
            $nama = $this->input->post('nama');
            $img = 'default.png';
            $email = $this->input->post('email');
            $nim = $this->input->post('nim');
            $bagian = $this->input->post('bagian');

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));


            $data = [

                'id_role' => $tipe_member,
                'nama' => $nama,
                'email' => $email,
                'image' => $img,
                'nim' => $nim,
                'bagian' => $bagian,
                'username' => $username,
                'password' => $password,

            ];


            $this->Opt_model->inputOpt($data, 'user');
            $this->session->set_flashdata('user', 'Ditambah');
            redirect('admin/data_opt');
        }
    }

    //edit data operator terdaftar sesuai id dari database
    public function editOpt($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Edit Data Operator',
            'aktif' => 'operator',

        ];

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['opt'] = $this->Opt_model->getOptById($id);



        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin/edit_opt', $data);
            $this->load->view('template/admin_footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $nim = $this->input->post('nim');
            $bagian = $this->input->post('bagian');
            $username = $this->input->post('username');

            $file_lama = $this->Opt_model->getOptById($id);
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $nama_file = './assets/images/avatar/' . $file_lama['image'];
                if (is_readable($nama_file) && unlink($nama_file)) {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('image', $new_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('super/editOpt/' . $data['user']['id_user']);
                    }
                } else {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '0';
                    $config['upload_path'] = './assets/images/avatar';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('image', $new_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editOpt/' . $data['user']['id_user']);
                    }
                }
            }

            $this->Opt_model->editOpt($id, $nama, $nim, $email, $username, $bagian);
            $this->session->set_flashdata('user', 'Diubah');
            redirect('admin/data_opt');
        }
    }

    //fungsi delete operator sesuai id yang ada di database
    public function deleteOpt($id)
    {
        $data = $this->Opt_model->getOptById($id);
        $nama_gambar = './assets/images/avatar/' . $data->image;
        if (is_readable($nama_gambar) && unlink($nama_gambar)) {
            $this->Opt_model->deleteAdmin($id);
            $this->session->set_flashdata('user', 'Dihapus');
            redirect('admin/data_opt');
        }
        $this->Opt_model->deleteOpt($id);
        $this->session->set_flashdata('user', 'Dihapus');
        redirect('admin/data_opt');
    }

    // menampilkan data dari pengaduan 
    public function pengaduan()
    {
        $this->check_login();
        $tampil['pengaduan'] = $this->m_pengaduan->get_pengaduan();

        $data = [
            'tittle' => 'Dashboard Admin',
            'aktif' => 'pengaduan'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/pengaduan', $tampil);
    }

    // menampilkan data detail pengaduan sesuai id yang sudah ada didatabase
    public function detailpengaduan($id)
    {
        $this->check_login();
        $data = [
            'tittle' => 'Detail Pengaduan',
            'aktif' => 'pengaduan'
        ];

        $where = array('id' => $id);

        $edit['pengaduan'] = $this->m_pengaduan->edit_data($where, 'pengaduan')->result();

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // echo 'selamat datang ' . $data['user']['username'];
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/detailpengaduan', $edit);
        $this->load->view('template/admin_footer');
    }

    // menghapus pengaduan sesuai id database
    public function deletepengaduan($id)
    {
        $data = $this->m_pengaduan->get_pengaduanByid($id);
        $nama_gambar = './assets/images/avatar/' . $data->image;
        if (is_readable($nama_gambar) && unlink($nama_gambar)) {
            $this->m_pengaduan->deletepeng($id);
            $this->session->set_flashdata('pengaduan', 'Dihapus');
            redirect('admin/pengaduan');
        }
        $this->m_pengaduan->deletepeng($id);
        $this->session->set_flashdata('pengaduan', 'Dihapus');
        redirect('admin/pengaduan');
    }

    //menampilkan detail pengaduan sesuai id database
    public function pengaduandetail($id)
    {
        $this->check_login();

        $data = [
            'tittle' => 'Detail Pengaduan',
            'aktif' => 'pengaduan'
        ];

        $where = array('id' => $id);

        $edit['pengaduan'] = $this->m_pengaduan->edit_data($where, 'pengaduan')->result();

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // echo 'selamat datang ' . $data['user']['username'];
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/pengaduandetail', $edit);
        $this->load->view('template/admin_footer');
    }

    //fungsi update dari operator yang menggunakan metode post untuk mengupdate data dari user
    public function balaspengaduan()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');
            $email = $this->input->post('email');
            $subjek = $this->input->post('subjek');
            $balasan = $this->input->post('balasan');
            $status = $this->input->post('aksi');
            $emailtujuan = $this->input->post('email_tujuan');
        }

        if (!empty($emailtujuan)) {
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
            $this->email->to($emailtujuan, $email);
            // $this->email->cc();
            $this->email->subject($subjek);
            $this->email->message('Pesan Baru Telah Diterima, anda dapat mengeceknya di http://localhost/silandak');
        }
        $this->m_pengaduan->update_data($id, $balasan, $email, $subjek, $status, $emailtujuan);
        if ($this->email->send()) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengaduan Berhasil dikirim</div>');
            // redirect('user/pengaduan');
            redirect('admin/pengaduan');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengaduan Berhasil dikirim</div>');
            redirect('admin/pengaduan');
        }
    }


    public function user_data()
    {
        $data = [
            'tittle' => 'Dashboard Admin',
            'aktif' => 'user'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/user_data', $data);
    }

    //mengambil value dari model dokumen untuk menampilkan data dari dokumen
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

            // $row[] = '<a href="' . base_url('assets/images/avatar/' . $item->image) . '" target="_blank"><img src="' . base_url('assets/images/avatar/' . $item->image) . '" class="img" style="width:100px"></a>';
            $row[] = '<a href="' . base_url('assets/uploads/' . $item->file) . '" target=" _blank" class="btn btn-warning btn-xs pb-2 ml-3 text-white"><i class="fa fa-search"></i> </a>
                     <a href="' . base_url('admin/deletelistdok/' . $item->id_dok) . '" class="btn btn-danger btn-xs float-center"><i class="fas fa-trash"></i> </a>';
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

    //menampilkan data dokumen 
    public function listdok()
    {

        // $this->check_login();
        $data = [
            'tittle' => 'List Dokumen',
            'aktif' => 'listdok'
        ];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/listdok', $data);
    }

    //menghapus data dari dokumen sesuai id database
    public function deletelistdok($id)
    {
        $data = $this->Dok_model->getlistdokById($id);
        $nama_gambar = './assets/images/avatar/' . $data->image;
        if (is_readable($nama_gambar) && unlink($nama_gambar)) {
            $this->Dok_model->deletelistdok($id);
            $this->session->set_flashdata('admin', 'Dihapus');
            redirect('admin/listdok');
        }
        $this->Dok_model->deletelistdok($id);
        $this->session->set_flashdata('admin', 'Dihapus');
        redirect('admin/listdok');
    }

    //fungsi pengecekan untuk login akun 
    public function check_login()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('id_role') == '1') {
                redirect('user');
            } elseif ($this->session->userdata('id_role') == '3') {
                redirect('operator');
            }
            $this->session->unset_userdata('hasil');
            $this->session->unset_userdata('id_nilai');
        }
    }

    //fungsi cek id untuk mendapatkan akun user terdaftar sebagai operator admin atau user biasa
    public function check_id()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('id_role') == '1') {
                redirect('user');
            }
        }
    }

    // menampilkan halaman ubah password
    public function ubah_password()
    {

        $this->check_login();
        $data = [
            'tittle' => 'Dashboard Admin',
            'aktif' => 'dashboard',

        ];

        $data['title'] = 'Ubah Password | SUPER super';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin/ubahpassword', $data);
            $this->load->view('template/admin_footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah!</div>');
                redirect('admin/ubah_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru tidak Boleh sama dengan Password Bama!!</div>');
                    redirect('admin/ubah_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
                    $this->session->set_flashdata('password', '<div class="alert alert-success text-center" role="alert"> Password Berhasil Diubah!!</div>');
                    redirect('admin/index');
                }
            }
        }
    }
}
