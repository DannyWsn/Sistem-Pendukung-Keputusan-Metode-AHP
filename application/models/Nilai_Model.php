<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai_model extends CI_Model
{

    public $table = 'nilai_kategori';
    public $id = 'id_nilai';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
}
