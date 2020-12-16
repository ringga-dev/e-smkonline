<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth/user');
    }
}

function admin_menu()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 1) {
        redirect('error/tampil/error_404');
    }
}

function pengajar_menu()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 2) {

        redirect('error/tampil/error_404');
    }
}

function siswa_menu()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 3) {

        redirect('error/tampil/error_404');
    }
}

function cek_akses($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_akses_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function cek_akses_tugas($tugas_id, $kelas_id)
{
    $ci = get_instance();
    $ci->db->where('id_kelas', $kelas_id);
    $ci->db->where('tugas_id', $tugas_id);
    $result = $ci->db->get('tugas_kelas');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function cek_hadir_pertemuan($id_pertemuan, $id_siswa)
{
    $ci = get_instance();
    $ci->db->where('id_pertemuan', $id_pertemuan);
    $ci->db->where('id_siswa', $id_siswa);
    $result = $ci->db->get('perte_siswa');

    if ($result->num_rows() > 0) {
        return "hidden";
    }
}
