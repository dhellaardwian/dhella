<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model 
{

     public function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('idkategori', 'desc');
        return $this->db->get()->result();       
               
    }

    
}