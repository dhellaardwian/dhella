<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model 
{
	// data pesanan masuk //
    public function simpan($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function tampil_penarikan()
    {
        $this->db->select('*');
        $this->db->from('penarikandana');
        $this->db->join('pelapakumkm', 'pelapakumkm.idPelapak = penarikandana.idPelapak', 'left');
        $this->db->order_by('penarikan_id', 'desc');
        return $this->db->get()->result();       
    }

    public function tampil_dana()
    {
        $this->db->select('*');
        $this->db->from('pelapakumkm');
        $this->db->order_by('idPelapak', 'desc');
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['pelapakumkm.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        return $this->db->get()->result();
    }

    public function dana($idPelapak)
    {
        
        $this->db->select('*');
        $this->db->from('pelapakumkm');
        $this->db->order_by('idPelapak', 'desc');
        $this->db->where(array('pelapakumkm.idPelapak' => $idPelapak));
        return $this->db->get()->result();
    }

    public function detailtransaksi($idPelapak)
    {
        
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('statusOrder=3');
        $this->db->order_by('idTransaksi', 'desc');
        $this->db->where(array('transaksi.idPelapak' => $idPelapak));
        return $this->db->get()->result();
    }

    public function detailpacking($idPelapak)
    {
        
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('statusOrder=1');
        $this->db->order_by('idTransaksi', 'desc');
        $this->db->where(array('transaksi.idPelapak' => $idPelapak));
        return $this->db->get()->result();
    }

    public function detailkirim($idPelapak)
    {
        
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('statusOrder=2');
        $this->db->order_by('idTransaksi', 'desc');
        $this->db->where(array('transaksi.idPelapak' => $idPelapak));
        return $this->db->get()->result();
    }

    public function detailmasuk($idPelapak)
    {
        
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('statusOrder=0');
        $this->db->order_by('idTransaksi', 'desc');
        $this->db->where(array('transaksi.idPelapak' => $idPelapak));
        return $this->db->get()->result();
    }


    // data pesanan masuk // 
    public function pesananmasuk()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('statusOrder=0');
        $this->db->order_by('idTransaksi', 'desc');
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['transaksi.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        return $this->db->get()->result();
    }

    public function packing()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('statusOrder=1');
        $this->db->order_by('idTransaksi', 'desc');
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['transaksi.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        return $this->db->get()->result();
    }

    public function kirim()
    {
         $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('statusOrder=2');
        $this->db->order_by('idTransaksi', 'desc');
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['transaksi.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        return $this->db->get()->result();
    }

    public function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('statusOrder=3');
        $this->db->order_by('idTransaksi', 'desc');
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['transaksi.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        return $this->db->get()->result();
    }

    public function update_order($data)
    {
        $this->db->where('idTransaksi', $data['idTransaksi']);
        if ($this->session->userdata('level') == 'Pelapak') {
            $this->db->where(['transaksi.idPelapak' => $this->session->userdata('idPelapak')]);
        }
        $updateOrder = $this->db->update('transaksi', $data);
        if ($updateOrder && $data['statusOrder'] == 1) { //cek apakah status 3
            $dataTransaksi = $this->db->where(['idTransaksi' => $data['idTransaksi']])->get('transaksi')->row_array(); //ambildata transaksi
            $dataPelapak = $this->db->where(['idPelapak' => $dataTransaksi['idPelapak']])->get('pelapakumkm')->row_array(); //ambil data pelapak
            if ($dataTransaksi && $dataPelapak) { //jika data keduanya ada
                $saldoOld = $dataPelapak['totalSaldo'] ? $dataPelapak['totalSaldo'] : 0; //proses mengambil slado lama
                $saldoNew = $saldoOld + $dataTransaksi['totalBayar']; //saldo baru
                $updateSaldo = $this->db->where(['idPelapak' => $dataPelapak['idPelapak']])->update('pelapakumkm', ['totalSaldo' => $saldoNew]); //
            }
        }
    }

    // data pesanan pelanggan //
     public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('idPelanggan', $this->session->userdata('idPelanggan'));
        $this->db->where('statusOrder=0');
        $this->db->order_by('idTransaksi', 'desc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('idPelanggan', $this->session->userdata('idPelanggan'));
        $this->db->where('statusOrder=1');
        $this->db->order_by('idTransaksi', 'desc');
        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('idPelanggan', $this->session->userdata('idPelanggan'));
        $this->db->where('statusOrder=2');
        $this->db->order_by('idTransaksi', 'desc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('idPelanggan', $this->session->userdata('idPelanggan'));
        $this->db->where('statusOrder=3');
        $this->db->order_by('idTransaksi', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pesanan($idTransaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('idTransaksi', $idTransaksi);
        return $this->db->get()->row();
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('idTransaksi', $data['idTransaksi']);
        $this->db->update('transaksi', $data);
    }


   
}