<?php
class User_model extends CI_model
{
    public function user_post($data)
    {
        $this->db->insert('user', $data);
        return true;
    }
}