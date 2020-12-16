<?php

class Data_model extends CI_Model
{
    public function getData($name = null)
    {
        if ($this->session->userdata('role_id') == 1) {
            $data = 'Dashboard <sup>\Admin</sup>';
        } elseif ($this->session->userdata('role_id') == 2) {
            $data = 'Dashboard <sup>\Dosen</sup>';
        } elseif ($this->session->userdata('role_id') == 3) {
            $data = 'Dashboard <sup>\Siswa</sup>';
        }

        return $data;
    }

    public function tambah($data)
    {
        $this->db->insert('absen_absen', $data);
        return $this->db->affected_rows();
    }
}
