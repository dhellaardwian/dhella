<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model 
{

    public function tampil_pengguna()
    {
        $this->db->select('*');
        $this->db->from('user_2');
        $this->db->order_by('idUser', 'desc');
        return $this->db->get()->result();       
               
    }

    public function add($data)
    {
        $this->db->insert('user_2', $data);
        
    }

    public function edit($data) 
    {
        $this->db->where('idUser', $data['idUser']);
        $this->db->update('user_2', $data);  
    }

    public function delete($data) 
    {
        $this->db->where('idUser', $data['idUser']);
        $this->db->delete('user_2', $data);
        
        
    }

}