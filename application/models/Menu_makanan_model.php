<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Menu_makanan_model extends CI_Model
{
    public function getAllMenu()
    {
        $email = $this->session->userdata('email');
        $this->db->select('menu_makanan.*, kat_makanan.menu_kategori, tb_status.status');
        $this->db->from('menu_makanan');
        $this->db->join('tb_status', 'tb_status.id = menu_makanan.id_status');
        $this->db->join('users', 'users.id = menu_makanan.user_id');
        $this->db->join('kat_makanan', 'kat_makanan.id = menu_makanan.kat_id');
        $this->db->where('email', $email);

        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getMenuById($id)
    {
        $this->db->select('menu_makanan.*, tb_status.status');
        $this->db->from('menu_makanan');
        $this->db->join('tb_status', 'tb_status.id = menu_makanan.id_status');
        $this->db->where('menu_makanan.id', $id);

        return $this->db->get()->row_array();
    }

    public function getKatMenu() {
        $this->db->select('kat_makanan.*');
        $this->db->from('kat_makanan');
        $this->db->join('users', 'users.id = kat_makanan.user_id');
        $this->db->where('email', $this->session->userdata('email'));

        return $this->db->get()->result_array();
    }
}
