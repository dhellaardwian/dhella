<?php

class M_pelapakumkm extends CI_Model
{ 
	
    public function tampil_pelapakumkm($isarray=false)
    {
        $this->db->select('*');
        $this->db->from('pelapakumkm');
        $this->db->join('kategori', 'kategori.idkategori = pelapakumkm.idkategori', 'left');
        $this->db->join('user_2', 'user_2.idUser = pelapakumkm.idUser', 'left');
        $this->db->order_by('pelapakumkm.idPelapak', 'desc');
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['pelapakumkm.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        if ($isarray) {
            return $this->db->get()->result_array();
        }else{
            return $this->db->get()->result();       
        }
    }

    public function tampil_pelapakumkm_by_kategori($idkategori)
    {
        $this->db->select('*');
        $this->db->from('pelapakumkm');
        $this->db->join('kategori', 'kategori.idkategori = pelapakumkm.idkategori', 'left');
        $this->db->join('user_2', 'user_2.idUser = pelapakumkm.idUser', 'left');
        $this->db->order_by('pelapakumkm.idPelapak', 'desc');
        if ($idkategori != 'all') {
            $this->db->where(['pelapakumkm.idkategori' => $idkategori]);
        }
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['pelapakumkm.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        return $this->db->get()->result_array();
    }
   
    public function tampil_pelapak($idPelapak, $isarray=false)
    {
        $this->db->select('*');
        $this->db->from('pelapakumkm');
        $this->db->join('kategori', 'kategori.idkategori = pelapakumkm.idkategori', 'left');
        $this->db->where('idPelapak', $idPelapak);
        if ($isarray) {
            return $this->db->get()->row_array();
        }else{
            return $this->db->get()->row();       
        }
               
    }

    public function simpan($data) 
    {
    
    $this->db->insert('pelapakumkm', $data);
    }

    public function edit($data) 
    {
        $this->db->where('idPelapak', $data['idPelapak']);
        $this->db->update('pelapakumkm', $data);
    }

    public function delete($data) 
    {
        $this->db->where('idPelapak', $data['idPelapak']);
        $this->db->delete('pelapakumkm', $data);    
    }
}
