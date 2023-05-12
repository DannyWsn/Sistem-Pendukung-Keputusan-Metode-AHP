<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('Form_validation');
        $this->load->library('Ion_auth');
        ceklogin();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'supplier/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'supplier/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'supplier/index.html';
            $config['first_url'] = base_url() . 'supplier/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Supplier_model->total_rows($q);
        $supplier = $this->Supplier_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'supplier_data' => $supplier,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/backend/dashboard', 'supplier/supplier_list', $data);
    }

    public function read($id)
    {
        $row = $this->Supplier_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_supplier' => $row->id_supplier,
                'nama_supplier' => $row->nama_supplier,
                'alamat_supplier' => $row->alamat_supplier,
                'komoditi' => $row->komoditi,
                'no_telpon' => $row->no_telpon,
            );
            $this->template->load('template/backend/dashboard', 'supplier/supplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('supplier/create_action'),
            'id_supplier' => set_value('id_supplier'),
            'nama_supplier' => set_value('nama_supplier'),
            'alamat_supplier' => set_value('alamat_supplier'),
            'komoditi' => set_value('komoditi'),
            'no_telpon' => set_value('no_telpon'),
        );
        $this->template->load('template/backend/dashboard', 'supplier/supplier_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_supplier' => $this->input->post('nama_supplier', TRUE),
                'alamat_supplier' => $this->input->post('alamat_supplier', TRUE),
                'komoditi' => $this->input->post('komoditi', TRUE),
                'no_telpon' => $this->input->post('no_telpon', TRUE),
            );

            $this->Supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supplier'));
        }
    }

    public function update($id)
    {
        $row = $this->Supplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('supplier/update_action'),
                'id_supplier' => set_value('id_supplier', $row->id_supplier),
                'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
                'alamat_supplier' => set_value('alamat_supplier', $row->alamat_supplier),
                'komoditi' => set_value('komoditi', $row->komoditi),
                'no_telpon' => set_value('no_telpon', $row->no_telpon),
            );
            $this->template->load('template/backend/dashboard', 'supplier/supplier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_supplier', TRUE));
        } else {
            $data = array(
                'nama_supplier' => $this->input->post('nama_supplier', TRUE),
                'alamat_supplier' => $this->input->post('alamat_supplier', TRUE),
                'komoditi' => $this->input->post('komoditi', TRUE),
                'no_telpon' => $this->input->post('no_telpon', TRUE),
            );

            $this->Supplier_model->update($this->input->post('id_supplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supplier'));
        }
    }

    public function delete($id)
    {
        $row = $this->Supplier_model->get_by_id($id);

        if ($row) {
            $this->Supplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_supplier', 'nama supplier', 'trim|required');
        $this->form_validation->set_rules('alamat_supplier', 'alamat supplier', 'trim|required');
        $this->form_validation->set_rules('komoditi', 'komoditi', 'trim|required');
        $this->form_validation->set_rules('no_telpon', 'no telpon', 'trim|required');

        $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "supplier.xls";
        $judul = "supplier";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Supplier");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat Supplier");
        xlsWriteLabel($tablehead, $kolomhead++, "Komoditi");
        xlsWriteLabel($tablehead, $kolomhead++, "No Telpon");

        foreach ($this->Supplier_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_supplier);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat_supplier);
            xlsWriteLabel($tablebody, $kolombody++, $data->komoditi);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_telpon);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}