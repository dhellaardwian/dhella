<?php 

class M_laporanpelapak extends CI_Model{
    
    function tampil_data(){
        $this->db->select('*');
        $this->db->from('pelapakumkm');
        $this->db->join('kategori', 'kategori.idkategori = pelapakumkm.idkategori', 'left');
        $this->db->join('user_2', 'user_2.idUser = pelapakumkm.idUser', 'left');
        $this->db->order_by('idPelapak', 'desc');
        return $this->db->get()->result();
        $query=$this->db->get();
        return $query;
    }
    function get_all_contacts() {
        $query = $this->db->query('SELECT * FROM pelapakumkm');
        return $query;
    }

}