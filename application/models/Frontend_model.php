<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Frontend_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function tampilkan_data()
	{
		// $sql = " SELECT
		// alternatif.status,
		// alternatif.total,
		// supplier.nama_supplier,
		// supplier.alamat_supplier,
		// supplier.id_supplier,
		// alternatif.id_supplier,
		// alternatif.id_alternatif
		// FROM
		// alternatif
		// INNER JOIN supplier ON supplier.id_supplier = alternatif.id_supplier ORDER BY total DESC ";
		$sql = " SELECT
					alternatif.total,
					supplier.nama_supplier,
					supplier.alamat_supplier,
					supplier.id_supplier,
					alternatif.id_supplier,
					alternatif.id_alternatif
					FROM
					alternatif
					INNER JOIN supplier ON supplier.id_supplier = alternatif.id_supplier ORDER BY total DESC ";
		return $this->db->query($sql);
	}

	function tampilkan_detail($id_supplier)
	{
		// $param = array('id_supplier' =>$id_supplier);
		// return $this->db->get_where('supplier', $param);
		$sql = " SELECT
					alternatif_nilai.id_alternatif_nilai,
					alternatif_nilai.id_alternatif,
					alternatif_nilai.id_kriteria,
					alternatif_nilai.id_subkriteria,
					alternatif.id_alternatif,
					alternatif.id_supplier,
					alternatif.status,
					alternatif.total,
					kriteria.id_kriteria,
					kriteria.nama_kriteria,
					subkriteria.id_subkriteria,
					subkriteria.nama_subkriteria,
					subkriteria.id_kriteria,
					supplier.id_supplier,
					supplier.nama_supplier,
					supplier.nama_kepsek,
					supplier.alamat_supplier,
					supplier.visi,
					supplier.misi,
					supplier.no_telpon
					FROM
					alternatif_nilai
					INNER JOIN alternatif ON alternatif_nilai.id_alternatif = alternatif.id_alternatif
					INNER JOIN kriteria ON alternatif_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND alternatif_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN supplier ON alternatif.id_supplier = supplier.id_supplier
					WHERE supplier.id_supplier = '$id_supplier'
				 ";
		return $this->db->query($sql);
	}

	function detail_kriteria($id_supplier)
	{
		$sql = " SELECT
					alternatif_nilai.id_alternatif_nilai,
					alternatif_nilai.id_alternatif,
					alternatif_nilai.id_kriteria,
					alternatif_nilai.id_subkriteria,
					alternatif.id_alternatif,
					alternatif.id_supplier,
					alternatif.status,
					alternatif.total,
					kriteria.id_kriteria,
					kriteria.nama_kriteria,
					subkriteria.id_subkriteria,
					subkriteria.nama_subkriteria,
					subkriteria.id_kriteria,
					supplier.id_supplier,
					supplier.nama_supplier,
					supplier.nama_kepsek,
					supplier.alamat_supplier,
					supplier.visi,
					supplier.misi,
					supplier.no_telpon
					FROM
					alternatif_nilai
					INNER JOIN alternatif ON alternatif_nilai.id_alternatif = alternatif.id_alternatif
					INNER JOIN kriteria ON alternatif_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND alternatif_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN supplier ON alternatif.id_supplier = supplier.id_supplier
					WHERE supplier.id_supplier = '$id_supplier'
				 ";
		return $this->db->query($sql);
	}
}
