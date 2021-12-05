<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function getRole()
    {
        $queryRole = "SELECT `users` . * , `user_role` . `role`
                    FROM `users` JOIN `user_role`
                    ON `users`.`level_id` = `user_role`.`id`";

        return $this->db->query($queryRole)->result_array();
    }

    public function getRoleRow()
    {
        $queryRole = "SELECT `users` . * , `user_role` . `role`
        FROM `users` JOIN `user_role`
        ON `users`.`level_id` = `user_role`.`id`";

        return $this->db->query($queryRole)->row_array();
    }
}
