<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {

    public function get_penilaian()
    {
        return $this->db->get('penilaian')->result();
    }

    public function get_penilaian_by_id($id)
    {
        return $this->db->get_where('penilaian', array('id_penilaian' => $id))->row();
    }

    public function insert_penilaian($data)
    {
        $this->db->insert('penilaian', $data);
    }

    public function update_penilaian($id, $data)
    {
        $this->db->where('id_penilaian', $id);
        $this->db->update('penilaian', $data);
    }

    public function delete_penilaian($id)
    {
        $this->db->where('id_penilaian', $id);
        $this->db->delete('penilaian');
    }

}
