<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Alternatif_model extends CI_Model
{

	private $tb_alternatif = 'alternatif';
	function __construct()
	{
		$this->load->library('M_db');
	}

	function alternatif_data()
	{
		$this->db->select('alternatif.*, supplier.nama_supplier');
		$this->db->from('alternatif');
		$this->db->join('supplier', 'supplier.id_supplier = alternatif.id_supplier', "left");
		$d = $this->db->get();
		return $d->result();
	}
	function alternatif_hasil_by_id($id)
	{;
		$d = $this->db->get_where('alternatif_hasil', array('id_alternatif' => $id));
		return $d->result();
	}

	function alternatif_add($id_supplier, $kriteriaData = array(), $sub = array())
	{
		if ($this->m_db->is_bof('supplier') == FALSE) {
			if (!empty($kriteriaData)) {
				$d = array(
					'id_supplier' => $id_supplier,
				);
				if ($this->m_db->add_row('alternatif', $d) == TRUE) {
					$alternatifID = $this->m_db->last_insert_id();
					foreach ($kriteriaData as $rK => $rV) {
						$d2 = array(
							'id_alternatif' => $alternatifID,
							'id_kriteria' => $rK,
							'id_subkriteria' => $rV,
						);
						$this->m_db->add_row('alternatif_nilai', $d2);
					}
					redirect('Alternatif', 'refresh');
				} else {
					//echo "GAGAL TAMBAH PESERTA";
					return false;
				}
			} else {
				//echo "DATA KRITERIA TAK ADA";
				return false;
			}
		} else {
			//echo "SISWA TIDAK ADA";
			return false;
		}
	}

	function alternatif_delete($id_alternatif)
	{
		$s = array(
			'id_alternatif' => $id_alternatif,
		);
		if ($this->m_db->delete_row($this->tb_alternatif, $s) == TRUE) {
			return true;
		} else {
			return false;
		}
	}
}
