<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Frontend_model', 'fm');
        $this->load->model('Kriteria_model', 'mod_kriteria');
        $this->load->library('M_db');
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $this->template->load('template/frontend/home', 'frontend/home');
    }

    public function ranking()
    {
        $data['data'] = $this->fm->tampilkan_data()->result();
        $this->template->load('template/backend/dashboard', 'perbandingan/prosesview', $data);
    }

    public function detail()
    {
        $id_supplier = $this->input->get('supplier');
        $data['supplier'] = $this->fm->tampilkan_detail($id_supplier)->row_array();
        $data['kriteria'] = $this->fm->detail_kriteria($id_supplier)->result();
        $this->template->load('template/backend/dashboard', 'perbandingan/detail', $data);
    }

    public function galeri()
    {
        //$this->load->view('welcome_message');
        $this->template->load('template/frontend/home', 'frontend/galeri');
    }
}
