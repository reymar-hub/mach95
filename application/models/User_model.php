<?php
class User_model extends CI_model
{
    public function user_post($user)
    {
        $this->db->insert('user', $user);
    }
}