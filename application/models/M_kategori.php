<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model 
{

    public function tampil_kategori($as_array=false)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('idkategori', 'desc');
        if ($as_array) {
            return $this->db->get()->result_array();       
        }else{
            return $this->db->get()->result();       
        }
               
    }

    public function add($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function edit($data) 
    {
        $this->db->where('idkategori', $data['idkategori']);
        $this->db->update('kategori', $data);
        
        
    }

    public function delete($data) 
    {
        $this->db->where('idkategori', $data['idkategori']);
        $this->db->delete('kategori', $data);
        
        
    }

}