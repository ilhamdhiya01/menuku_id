<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Level_id_model extends CI_Model
{
    public function getLevel()
    {
        $level_id = $this->session->userdata('level_id');
        $query = "SELECT `user_menu`.`id`, `nama_menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`level_id` = $level_id
                ORDER BY `user_access_menu`.`menu_id` ASC
                ";

        return $this->db->query($query)->row_array();
    }

}
