<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Matriks extends CI_Controller
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



    function kriteria()
    {
        $output = array();
        $dKriteria = $this->mod_kriteria->kriteria_data();
        foreach ($dKriteria as $rK) {
            $output[$rK->id_kriteria] = $rK->nama_kriteria;
        }
        $d['arr'] = $output;
        // $this->template->load('template/backend/dashboard', 'perbandingan/matriks/matrikutama', $d);
        $this->load->view('perbandingan/matriks/kriteria', $d);
    }

    function subkriteria_container()
    {
        $d['kriteria'] = $this->mod_kriteria->kriteria_data();
        $this->load->view('perbandingan/matriks/subkriteria_container', $d);
    }

    function subkriteria()
    {
        $id = $this->input->get('kriteria');
        $namaKriteria = $this->mod_kriteria->kriteria_info($id, 'nama_kriteria');
        $dSub = $this->mod_kriteria->subkriteria_child($id, 'id_nilai ASC');
        $output = array();
        if (!empty($dSub)) {
            foreach ($dSub as $rK) {
                $nama = field_value('nilai_kategori', 'id_nilai', $rK->id_nilai, 'nama_nilai');
                $output[$rK->id_subkriteria] = $rK->nama_subkriteria;
            }
        }

        $d['arr'] = $output;
        $d['kriteriaid'] = $id;
        $d['namakriteria'] = $namaKriteria;
        $this->load->view('perbandingan/matriks/subkriteria', $d);
    }


    function alternatif_container()
    {
        $d['subkriteria'] = $this->mod_subkriteria->get_all();
        $this->load->view('perbandingan/matriks/alternatif_container', $d);
    }
    function alternatif()
    {
        $id = $this->input->get('subkriteria');
        $namaKriteria = $this->mod_subkriteria->subkriteria_info($id, 'nama_subkriteria');
        $alternatif = $this->mod_alternatif->alternatif_data();


        $d['subkriteriaid'] = $id;
        $d['namasubkriteria'] = $namaKriteria;

        $output = array();
        foreach ($alternatif as $rK) {
            $output[$rK->id_alternatif] = $rK->nama_supplier;
        }


        $d['arr'] = $output;
        $this->load->view('perbandingan/matriks/alternatif', $d);
    }

    function update_kriteria()
    {
        $error = FALSE;
        $msg = "";
        $s = array(
            'id_kriteria_nilai !=' => ''
        );
        $this->m_db->delete_row('kriteria_nilai', $s);

        $cr = $this->input->post('crvalue');
        if ($cr > 0.1) {
            $msg = "Gagal diupdate karena nilai CR kurang dari 0.01";
            $error = TRUE;
        } else {
            foreach ($_POST as $k => $v) {
                if ($k != "crvalue") {
                    foreach ($v as $x => $x2) {
                        $d = array(
                            'kriteria_id_dari' => $k,
                            'kriteria_id_tujuan' => $x,
                            'nilai' => $x2,
                        );
                        $this->m_db->add_row('kriteria_nilai', $d);
                    }
                }
            }
            $msg = "Berhasil update nilai kriteria";
            $error = FALSE;
        }


        if ($error == FALSE) {
            echo json_encode(array('status' => 'ok', 'msg' => $msg));
        } else {
            echo json_encode(array('status' => 'no', 'msg' => $msg));
        }
    }

    function update_kriteria_prioritas()
    {
        $prio = $this->input->post('prio');
        if (!empty($prio)) {
            foreach ($prio as $rk => $rv) {
                $s = array(
                    'id_kriteria' => $rk,
                );
                if ($this->m_db->is_bof('kriteria_hasil', $s) == TRUE) {
                    $d = array(
                        'id_kriteria' => $rk,
                        'prioritas' => $rv,
                    );
                    $this->m_db->add_row('kriteria_hasil', $d);
                } else {
                    $d = array(
                        'prioritas' => $rv,
                    );
                    $this->m_db->edit_row('kriteria_hasil', $d, $s);
                }
            }
            echo json_encode('ok');
        } else {
            echo json_encode('no');
        }
    }

    function update_subkriteria()
    {
        $error = FALSE;
        $kriteriaid = $this->input->post('kriteriaid');
        if (!empty($kriteriaid)) {
            $msg = "";
            $s = array(
                'id_kriteria' => $kriteriaid,
            );
            $this->m_db->delete_row('subkriteria_nilai', $s);

            $cr = $this->input->post('crvalue');
            if ($cr > 0.01) {
                $msg = "Gagal diupdate karena nilai CR kurang dari 0.1";
                $error = TRUE;
            } else {
                foreach ($_POST as $k => $v) {
                    if ($k != "crvalue" && $k != "kriteriaid") {
                        foreach ($v as $x => $x2) {
                            $d = array(
                                'id_kriteria' => $kriteriaid,
                                'subkriteria_id_dari' => $k,
                                'subkriteria_id_tujuan' => $x,
                                'nilai' => $x2,
                            );
                            $this->m_db->add_row('subkriteria_nilai', $d);
                        }
                    }
                }
                $msg = "Berhasil update nilai subkriteria";
                $error = FALSE;
            }


            if ($error == FALSE) {
                echo json_encode(array('status' => 'ok', 'msg' => $msg));
            } else {
                echo json_encode(array('status' => 'no', 'msg' => $msg));
            }
        } else {
            $msg = "Gagal mengubah nilai subkriteria";
            echo json_encode(array('status' => 'no', 'msg' => $msg));
        }
    }

    function update_subkriteria_prioritas()
    {
        $kriteriaid = $this->input->post('kriteriaid');
        $prio = $this->input->post('prio');
        if (!empty($prio)) {
            foreach ($prio as $rk => $rv) {
                $s = array(
                    'id_subkriteria' => $rk,
                );
                if ($this->m_db->is_bof('subkriteria_hasil', $s) == TRUE) {
                    $d = array(
                        'id_subkriteria' => $rk,
                        'prioritas' => $rv,
                    );
                    $this->m_db->add_row('subkriteria_hasil', $d);
                } else {
                    $d = array(
                        'prioritas' => $rv,
                    );
                    $this->m_db->edit_row('subkriteria_hasil', $d, $s);
                }
            }
            echo json_encode('ok');
        } else {
            echo json_encode('no');
        }
    }
    function update_alternatif()
    {
        $error = FALSE;
        $subkriteriaid = $this->input->post('subkriteriaid');
        if (!empty($subkriteriaid)) {
            $msg = "";

            $cr = $this->input->post('crvalue');
            if ($cr > 0.1) {
                $msg = "Gagal diupdate karena nilai CR kurang dari 0.1";
                $error = TRUE;
            } else {
                $s = array(
                    'id_subkriteria' => $subkriteriaid,
                );
                $this->m_db->delete_row('alternatif_nilai', $s);
                foreach ($_POST as $k => $v) {
                    if ($k != "crvalue" && $k != "subkriteriaid") {
                        foreach ($v as $x => $x2) {
                            $d = array(
                                'id_subkriteria' => $subkriteriaid,
                                'alternatif_id_dari' => $k,
                                'alternatif_id_tujuan' => $x,
                                'nilai' => $x2,
                            );
                            $this->m_db->add_row('alternatif_nilai', $d);
                        }
                    }
                }
                $msg = "Berhasil update nilai alternatif";
                $error = FALSE;
            }


            if ($error == FALSE) {
                echo json_encode(array('status' => 'ok', 'msg' => $msg));
            } else {
                echo json_encode(array('status' => 'no', 'msg' => $msg));
            }
        } else {
            $msg = "Gagal mengubah nilai alternatif";
            echo json_encode(array('status' => 'no', 'msg' => $msg));
        }
    }

    function update_alternatif_prioritas()
    {
        $subkriteriaid = $this->input->post('subkriteriaid');
        $prio = $this->input->post('prio');
        if (!empty($prio)) {
            foreach ($prio as $rk => $rv) {
                $s = array(
                    'id_alternatif' => $rk,
                    'subkriteriaid' => $subkriteriaid,
                );
                if ($this->m_db->is_bof('alternatif_hasil', $s) == TRUE) {
                    $d = array(
                        'id_alternatif' => $rk,
                        'subkriteriaid' => $subkriteriaid,
                        'prioritas' => $rv,
                    );
                    $this->m_db->add_row('alternatif_hasil', $d);
                } else {
                    $d = array(
                        'prioritas' => $rv,
                    );
                    $this->m_db->edit_row('alternatif_hasil', $d, $s);
                }
            }
            echo json_encode('ok');
        } else {
            echo json_encode('no');
        }
    }


}