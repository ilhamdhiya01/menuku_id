<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Profil_model extends CI_Model
{
    public function getAllProfil()
    {
        $this->db->select('profil_resto.*, users.*, profil_resto.id');
        $this->db->from('profil_resto');
        $this->db->join('users' , 'users.id = profil_resto.user_id');
        $this->db->where('email', $this->session->userdata('email'));
        return $this->db->get()->row_array();
    }
}
