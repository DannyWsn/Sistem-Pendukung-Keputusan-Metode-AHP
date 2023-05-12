<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Perbandingan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Form_validation');
		$this->load->library('M_db');
		$this->load->model('Kriteria_model', 'mod_kriteria');
		$this->load->model('Subkriteria_model', 'mod_subkriteria');
		$this->load->model('Proses_model', 'mod_pro');
		$this->load->model('Alternatif_model', 'mod_alternatif');
		$this->load->model('Frontend_model', 'fm');
		$this->load->library('Ion_auth');
		ceklogin();
	}



	



	function rankalternatif()
	{
		$total = $this->input->post('total');
		if (!empty($total)) {
			foreach ($total as $rk => $rv) {
				$s = array(
					'id_alternatif' => $rk,
				);
				if ($this->m_db->is_bof('alternatif', $s) == TRUE) {
					$d = array(
						'id_alternatif' => $rk,
						'total' => $rv,
					);
					$this->m_db->add_row('alternatif', $d);
				} else {
					$d = array(
						'total' => $rv,
					);
					$this->m_db->edit_row('alternatif', $d, $s);
				}
			}
			echo json_encode('ok');
		} else {
			echo json_encode('no');
		}
	}



	function proseshitung()
	{
		$this->mod_pro->proseshitung();
		if ($this->mod_pro->proseshitung() == TRUE) {
			//set_header_message('success','Proses Beasiswa','Beasiswa telah diproses');
			//redirect(base_url(akses().'/beasiswa/beasiswa').'?id='.$id);
			echo json_encode(array('status' => 'ok'));
		} else {
			//set_header_message('danger','Proses Beasiswa','Beasiswa gagal diproses');
			//redirect(base_url(akses().'/beasiswa/beasiswa'));
			echo json_encode(array('status' => 'no'));
		}
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
		$this->template->load('template/backend/dashboard', 'perbandingan/prosesview', $data);
	}


	function cetak()
	{
		return $this->load->view('perbandingan/cetak');
	}
}
