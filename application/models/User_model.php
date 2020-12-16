<?php

class User_model extends CI_Model
{
    public function getUser()
    {
        if ($this->session->userdata('role_id') == 1) {
            $tabel = 'data_admin';
            $name = 'no_identitas';
        } elseif ($this->session->userdata('role_id') == 2) {
            $tabel = 'data_guru';
            $name = 'nidn';
        } elseif ($this->session->userdata('role_id') == 3) {
            $tabel = 'data_siswa';
            $name = 'nim';
        }
        $isi = $this->session->userdata('no_iden');

        return $this->db->get_where($tabel, [$name => $isi])->row_array();
    }

    public function tambah($data)
    {
        $this->db->insert('absen_absen', $data);
        return $this->db->affected_rows();
    }

    public function getMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function getSubMenu()
    {
        return $this->db->get('user_sub_menu')->result_array();
    }

    public function getRole($role_id)
    {
        if ($role_id == 'all') {
            return $this->db->get('user_role')->result_array();
        } else {
            return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        }
    }

    public function getPengajar()
    {
        $guery = "SELECT `user_login`.`email`, `data_guru`.* 
        FROM `user_login` JOIN `data_guru` 
        ON `user_login`.`no_identitas` = `data_guru`.`nrp` 
        WHERE `user_login`.`role` = 2";
        return $this->db->query($guery)->result_array();
    }

    public function getSiswa()
    {
        $guery = "SELECT `user_login`.`email`, `data_siswa`.* 
        FROM `user_login` JOIN `data_siswa` 
        ON `user_login`.`no_identitas` = `data_siswa`.`nim` 
        WHERE `user_login`.`role` = 3";
        return $this->db->query($guery)->result_array();
    }

    public function getProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    public function getKelas()
    {
        return $this->db->get('kelas')->result_array();
    }

    public function getAdmin()
    {
        $guery = "SELECT `user_login`.`email`, `data_admin`.* 
        FROM `user_login` JOIN `data_admin` 
        ON `user_login`.`no_identitas` = `data_admin`.`no_identitas` 
        WHERE `user_login`.`role` = 1";
        return $this->db->query($guery)->result_array();
    }

    public function getTugas($id)
    {
        $guery = "SELECT `mapel`.`mapel`,`data_guru`.`nama` ,`tugas`.* FROM `tugas` 
        JOIN `mapel` ON `mapel`.`id` = `tugas`.`id_mapel` 
        JOIN `data_guru` ON `data_guru`.`id` = `tugas`.`id_pengajar` 
        WHERE `data_guru`.`id`= $id
        ";
        return $this->db->query($guery)->result_array();
    }

    public function getMapel()
    {
        return $this->db->get_where('mapel', ['is_aktif' => 1])->result_array();
    }

    public function getTugasTampil($id)
    {
        return $this->db->get_where('tugas', ['id' => $id])->row_array();
    }

    public function getPertanyaan($data)
    {
        if ($data['tipe'] == 1) {
            return $this->db->get_where('tugas_pertanyaan_upload', ['tugas_id' => $data['id']])->result_array();
        } elseif ($data['tipe'] == 2) {
            return $this->db->get_where('tugas_pertanyaan_esai', ['tugas_id' => $data['id']])->result_array();
        } elseif ($data['tipe'] == 3) {
            return $this->db->get_where('tugas_pertanyaan_isian', ['tugas_id' => $data['id']])->result_array();
        } else {
            return 'errors';
        }
    }
    public function getSatuPertanyaan($id)
    {
        return $this->db->get_where('tugas_pertanyaan_esai', ['id' => $id])->result_array();
    }

    public function getPertemuan($id)
    {
        $guery = "SELECT `pertemuan`.`id`,`pertemuan`.`jadwal`,`pertemuan`.`jam`,
                            `pertemuan`.`info` ,`mapel`.`mapel`,`data_guru`.`nama`,`kelas`.`kelas` 
        FROM `pertemuan` JOIN `mapel` ON `mapel`.`id` = `pertemuan`.`id_mapel` 
        JOIN `data_guru` ON `data_guru`.`id` = `pertemuan`.`id_pengajar` 
        JOIN `kelas` ON `kelas`.`id` = `pertemuan`.`id_kelas` 
        WHERE `data_guru`.`id`= $id";
        return $this->db->query($guery)->result_array();
    }

    public function getTugasKelas($id_kelas)
    {
        $guery = " SELECT `tugas`.* FROM `tugas` JOIN `tugas_kelas` ON `tugas`.`id` = `tugas_kelas`.`tugas_id` WHERE `tugas_kelas`.`id_kelas` = $id_kelas";
        return $this->db->query($guery)->result_array();
    }

    public function getPertemuanKelas($id_kelas)
    {
        $guery = "SELECT `pertemuan`.`id`,`pertemuan`.`jadwal`,`pertemuan`.`jam`,
        `pertemuan`.`info` ,`mapel`.`mapel`,`data_guru`.`nama`,`kelas`.`kelas` 
        FROM `pertemuan` JOIN `mapel` ON `mapel`.`id` = `pertemuan`.`id_mapel` 
        JOIN `data_guru` ON `data_guru`.`id` = `pertemuan`.`id_pengajar` 
        JOIN `kelas` ON `kelas`.`id` = `pertemuan`.`id_kelas` 
        WHERE `kelas`.`id`= $id_kelas";
        return $this->db->query($guery)->result_array();
    }
    public function getPertemuanId($id)
    {
        return $this->db->get_where('pertemuan', ['id' => $id])->row_array();
    }

    public function getPertemuanHadir($id_siswa)
    {
        $guery = "SELECT `pertemuan`.info,`perte_siswa`.`jam`,`perte_siswa`.`tgl` ,`data_guru`.`nama` ,`mapel`.`mapel`
        FROM `pertemuan` JOIN `perte_siswa` ON `pertemuan`.`id` = `perte_siswa`.`id_pertemuan` 
        JOIN `data_guru` ON `data_guru`.`id` = `pertemuan`.`id_pengajar` 
        JOIN `mapel` ON `mapel`.`id` = `pertemuan`.`id_mapel` 
        WHERE `perte_siswa`.`id_siswa`= $id_siswa";
        return $this->db->query($guery)->result_array();
    }
}
