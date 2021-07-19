<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekening extends CI_Model 
{

    public function tampil_rekening()
    {
        $this->db->select('*');
        $this->db->from('rekdinas');
        $this->db->order_by('idRekening', 'desc');
        return $this->db->get()->result();       
               
    }
    public function add($data)
    {
        $this->db->insert('rekdinas', $data);
    }

    public function edit($data) 
    {
        $this->db->where('idRekening', $data['idRekening']);
        $this->db->update('rekdinas', $data);
        
        
    }

    public function delete($data) 
    {
        $this->db->where('idRekening', $data['idRekening']);
        $this->db->delete('rekdinas', $data);
        
        
    }

}