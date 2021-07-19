<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{

    public function register($data)
    {
        $this->db->insert('pelanggan', $data);
    }

   public function login_pelanggan($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(array(
        'email' => $email, 
        'pass' => $pass
        ));
    return $this->db->get()->row();  
    }
}

/* End of file M_pelanggan.php */
