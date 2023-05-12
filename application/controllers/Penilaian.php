<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penilaian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['penilaian'] = $this->penilaian_model->get_penilaian();
        $this->template->load('template/backend/dashboard', 'penilaian/index', $data);
    }

    public function add()
    {
        $this->template->load('template/backend/dashboard', 'penilaian/add');
    }

    public function store()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template/backend/dashboard', 'penilaian/add');
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->penilaian_model->insert_penilaian($data);
            redirect('penilaian');
        }
    }

    public function edit($id)
    {
        $data['penilaian'] = $this->penilaian_model->get_penilaian_by_id($id);
        $this->template->load('template/backend/dashboard', 'penilaian/edit', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $data['penilaian'] = $this->penilaian_model->get_penilaian_by_id($id);
            $this->template->load('template/backend/dashboard', 'penilaian/edit', $data);
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->penilaian_model->update_penilaian($id, $data);
            redirect('penilaian');
        }
    }

    public function delete($id)
    {
        $this->penilaian_model->delete_penilaian($id);
        redirect('penilaian');
    }


    function rank()
    {

        $output = array();

        $alternatif = $this->mod_alternatif->alternatif_data();
        foreach ($alternatif as $key => $value) {
            $alternatif[$key]->nilai = $this->mod_alternatif->alternatif_hasil_by_id($value->id_alternatif);
        }
        $output["alternatif"] = $alternatif;

        $output["kriteria"] = $this->mod_kriteria->kriteria_data_with_hasil();
        $output['subkriteria'] = $this->mod_subkriteria->subkriteria_data_with_hasil();
        $output['data'] = $this->fm->tampilkan_data()->result();

        // $this->template->load('template/backend/dashboard', 'perbandingan/prosesview', $output);
        $this->load->view('perbandingan/prosesview', $output);
    }

    function printRank()
    {
        return $this->load->view('perbandingan/cetak');
    }
}