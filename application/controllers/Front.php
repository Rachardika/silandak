<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $rate['rating'] = $this->m_rate->get_rating();
        $rate['average'] = $this->m_rate->get_avg();
        $rate['pengaduan'] = $this->m_pengaduan->get_pengaduan();

        $data = [
            'tittle' => 'silandak.',
        ];

        $this->load->view('template/landing_header', $data);
        $this->load->view('template/landing_caro', $data);
        $this->load->view('template/landing_topbar', $data);
        $this->load->view('front/rate', $rate);
        $this->load->view('front/describe', $data);
        $this->load->view('front/index', $data);
        $this->load->view('template/landing_footer', $data);
    }
}
