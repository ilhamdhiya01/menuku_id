<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

function menuku_id()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Silahkan login terlebih dahulu
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('auth');
    } else {
        // cek siapa yg login
        $level_id = $ci->session->userdata('level_id');
        // ambil urutan menu
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['nama_menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        // cek jika user access
        // jika ada boleh access
        $user_access = $ci->db->get_where('user_access_menu', ['level_id' => $level_id, 'menu_id' => $menu_id]);
        if ($user_access->num_rows() < 1) {
            redirect('auth/block');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('level_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
