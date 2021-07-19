<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{

    public function tampil_umkm()
    {
        $this->db->select('*');
        $this->db->from('dataproduk');
        $this->db->join('pelapakumkm', 'pelapakumkm.idPelapak = dataproduk.idPelapak', 'left');
        $this->db->order_by('idProduk', 'asc');
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['pelapakumkm.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        return $this->db->get()->result();
    }

    public function tampil_produk($idProduk)
    {
        $this->db->select('*');
        $this->db->from('dataproduk');
        $this->db->join('pelapakumkm', 'pelapakumkm.idPelapak = dataproduk.idPelapak', 'left');
        $this->db->where('idProduk', $idProduk);
        return $this->db->get()->row();
    }

    public function tampil_produk_by_lapak($idPelapak)
    {
        $this->db->select('*');
        $this->db->from('dataproduk');
        $this->db->where('idPelapak', $idPelapak);
        return $this->db->get()->result_array();
    }
    
    public function tampil_produk_by_detailproduk($idProduk)
    {
        $this->db->select('*');
        $this->db->from('dataproduk');
        $this->db->where('idProduk', $idProduk);
        return $this->db->get()->row_array();
    }

    public function add($data)
    {
        $this->db->insert('dataproduk', $data);
    }

    public function edit($data)
    {
        $this->db->where('idProduk', $data['idProduk']);
        $this->db->update('dataproduk', $data);
    }

    public function delete($data)
    {
        $this->db->where('idProduk', $data['idProduk']);
        $this->db->delete('dataproduk', $data);
    }
}
