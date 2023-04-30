<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Form_validation');
		$this->load->library('M_db');
		$this->load->model('Supplier_model', 'mod_supplier');
		$this->load->model('Kriteria_model', 'mod_kriteria');
		$this->load->model('Alternatif_model', 'mod_alternatif');
		$this->load->library('Ion_auth');
		ceklogin();
	}

	function index()
	{

		$sql = "SELECT alternatif.id_alternatif,supplier.id_supplier,supplier.nama_supplier,supplier.alamat_supplier, supplier.no_telpon FROM alternatif LEFT JOIN supplier ON alternatif.id_supplier = supplier.id_supplier ";
		$data['data'] = $this->m_db->get_query_data($sql);
		$this->template->load('template/backend/dashboard', 'alternatif/alternatif_list', $data);
	}

	function create()
	{

		$id_supplier = $this->input->post('id_supplier');
		$kriteria = $this->input->post('kriteria');
		$this->mod_alternatif->alternatif_add($id_supplier, $kriteria);

		$d2 = $this->m_db->get_data('alternatif');
		if (!empty($d2)) {
			$listSupplier = "";
			foreach ($d2 as $r) {
				$listSupplier .= $r->id_supplier . ",";
			}
			$listSupplier = substr($listSupplier, 0, -1);

			$sql = "Select * from supplier Where id_supplier NOT IN ($listSupplier)";
			$d['supplier'] = $this->m_db->get_query_data($sql);
			$d['kriteria'] = $this->mod_kriteria->kriteria_data();
			$this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
		} else {

			$d['supplier'] = $this->mod_supplier->supplier_data();
			$d['kriteria'] = $this->mod_kriteria->kriteria_data();
			$this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
		}
	}

	function hapus()
	{
		$id = $this->input->get('alternatif');
		if ($this->mod_alternatif->alternatif_delete($id) == TRUE) {
			redirect('alternatif');
		} else {
			redirect('alternatif');
		}
	}
}
