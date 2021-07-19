<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_keranjang extends CI_Model 
{

    public function get_keranjang()
    {
        $this->db->where(['idPelanggan' => $this->session->userdata('idPelanggan')]);
        $this->db->order_by('namaProduk', 'asc');
        $this->db->join('dataproduk', 'dataproduk.idProduk=keranjang.idProduk', 'left');
        $this->db->join('pelapakumkm', 'pelapakumkm.idPelapak=keranjang.idPelapak', 'left');
        return $this->db->get('keranjang')->result_array();
    }

    public function cek_keranjang($idProduk)
    {
        $this->db->where([
            'idProduk'      => $idProduk,
            'idPelanggan'   => $this->session->userdata('idPelanggan')
        ]);
        return $this->db->get('keranjang')->row_array();
    }

    public function detail_keranjang($idCart)
    {
        $this->db->where([
            'idCart'        => $idCart,
            'idPelanggan'   => $this->session->userdata('idPelanggan')
        ]);
        return $this->db->get('keranjang')->row_array();
    }

    public function add($data)
    {
        $this->db->insert('keranjang', $data);
    }

    public function edit($where, $data) 
    {
        $this->db->where($where);
        $this->db->update('keranjang', $data);
    }

    public function delete($where) 
    {
        $this->db->where($where);
        $this->db->delete('keranjang');   
    }

}