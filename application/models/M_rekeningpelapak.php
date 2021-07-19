<?php

class M_rekeningpelapak extends CI_Model
{ 
	
  public function tampil_rekeningpelapak()
    {
        $this->db->select('*');
        $this->db->from('rekpelapak');
        $this->db->join('pelapakumkm', 'pelapakumkm.idPelapak = rekpelapak.idPelapak', 'left');
        $this->db->order_by('idRekening', 'desc');
        return $this->db->get()->result();       
               
    }

  public function add($data)
    {
        $this->db->insert('rekpelapak', $data);
        
    }

  public function edit($data) 
    {
        $this->db->where('idRekening', $data['idRekening']);
        $this->db->update('rekpelapak', $data);
        
        
  }
  public function delete($data) 
    {
        $this->db->where('idRekening', $data['idRekening']);
        $this->db->delete('rekpelapak', $data);
        
    }
}
