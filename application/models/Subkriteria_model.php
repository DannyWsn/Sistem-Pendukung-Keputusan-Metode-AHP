<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subkriteria_model extends CI_Model
{

    public $table = 'subkriteria';
    public $join1 = 'kriteria';
    public $table_hasil = 'subkriteria_hasil';
    public $id = 'id_subkriteria';
    public $order = 'ASC';
    public $id_kriteria = 'id_kriteria';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->join($this->join1, $this->join1 . '.' . $this->id_kriteria . "=" . $this->table . '.' . $this->id_kriteria);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();


    }

    function subkriteria_data_with_hasil($id_penilaian)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table_hasil, $this->table_hasil . '.' . $this->id . '=' . $this->table . '.' . $this->id, "left");
        $this->db->where("id_penilaian", $id_penilaian);
        $d = $this->db->get();
        return $d->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function index()
    {
        $query = " SELECT
                    subkriteria.id_subkriteria,
                    subkriteria.nama_subkriteria,
                    subkriteria.id_kriteria
                    FROM
                    subkriteria
                    INNER JOIN kriteria ON kriteria.id_kriteria = subkriteria.id_kriteria";
        return $this->db->query($query);
    }

    function get_by_kriteria_id($id_kriteria)
    {
        $query = " SELECT
                    subkriteria.id_subkriteria,
                    subkriteria.nama_subkriteria,
                    subkriteria.id_kriteria
                    FROM
                    subkriteria 
                    INNER JOIN kriteria ON '$id_kriteria' = subkriteria.id_kriteria  WHERE kriteria.id_kriteria = '$id_kriteria' ORDER BY nama_subkriteria ASC  ";
        return $this->db->query($query);
    }


    function subkriteria_edit($subkriteriaID, $kriteria, $nama_subkriteria)
    {
        $s = array(
            'id_subkriteria' => $subkriteriaID,
        );
        $d = array(
            'id_kriteria' => $kriteria,
            'nama_subkriteria' => $nama_subkriteria,
        );

        if ($this->m_db->edit_row($this->table, $d, $s) == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_subkriteria', $q);
        $this->db->or_like('nama_subkriteria', $q);
        $this->db->or_like('id_kriteria', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_subkriteria', $q);
        $this->db->or_like('nama_subkriteria', $q);
        $this->db->or_like('id_kriteria', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function subkriteria_add($id_kriteria, $nama_subkriteria)
    {
        $data = array(
            'id_kriteria' => $id_kriteria,
            'nama_subkriteria' => $nama_subkriteria
        );

        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function subkriteria_info($subkriteriaID, $output)
    {
        $s = array(
            $this->id => $subkriteriaID,
        );
        $item = $this->m_db->get_row($this->table, $s, $output);
        return $item;
    }
}